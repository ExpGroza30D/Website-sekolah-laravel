<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SMA 2 PSKD</title>
    
    <!-- Styles -->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <meta property="og:image" content="https://i.ibb.co.com/mbK1wXV/LOGO-PSKD.jpg" />
    <link rel="icon" type="image/jpeg" href="https://i.ibb.co.com/mbK1wXV/LOGO-PSKD.jpg" />
</head>
<body class="font-roboto">
    <!-- Header Section -->
    <div id="home">
        <x-top-bar />

        <x-go-to-up/>
    </div>

    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>

    <x-footer />

    <!-- Scripts -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>