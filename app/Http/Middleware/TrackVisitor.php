<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\VisitorService;

class TrackVisitor
{
    protected $visitorService;

    public function __construct(VisitorService $visitorService)
    {
        $this->visitorService = $visitorService;
    }

    public function handle($request, Closure $next)
    {
        $this->visitorService->trackVisit();
        return $next($request);
    }
}