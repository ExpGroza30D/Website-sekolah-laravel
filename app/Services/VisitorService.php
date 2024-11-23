<?php

namespace App\Services;

use App\Models\Visitor;
use Illuminate\Support\Facades\Cache;

class VisitorService
{
    public function trackVisit()
    {
        $ip = request()->ip();
        $userAgent = request()->userAgent();
        
        $visitor = Visitor::firstOrNew(['ip_address' => $ip]);
        
        if (!$visitor->exists || $visitor->last_visit->diffInMinutes(now()) > 30) {
            $visitor->last_visit = now();
            $visitor->visit_count++;
            $visitor->user_agent = $userAgent;
            $visitor->save();
        }
        
        $this->updateOnlineUsers($ip);
    }
    
    private function updateOnlineUsers($ip)
    {
        $onlineUsers = Cache::get('online_users', []);
        $onlineUsers[$ip] = time();
        
        // Remove users inactive for more than 5 minutes
        $onlineUsers = array_filter($onlineUsers, function($lastSeen) {
            return time() - $lastSeen < 300;
        });
        
        Cache::put('online_users', $onlineUsers, now()->addMinutes(10));
    }
    
    public function getStats()
    {
        return [
            'total_visits' => Visitor::sum('visit_count'),
            'today_visitors' => Visitor::whereDate('last_visit', today())->count(),
            'online_users' => count(Cache::get('online_users', [])),
        ];
    }
}