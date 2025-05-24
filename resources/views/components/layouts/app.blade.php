<!DOCTYPE html>
<html>
<head>
    <title>{{ $title ?? 'Dashboard' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="flex">
    <aside class="w-64 bg-gray-800 text-white h-screen">
        @if (auth()->user()->role === 'siswa')
            @include('components.layouts.app.siswa-sidebar')
        @elseif (auth()->user()->role === 'guru')
            @include('components.layouts.app.guru-sidebar')
        @endif
    </aside>
    <main class="flex-1 p-4">
        {{ $slot }}
    </main>
    @livewireScripts
</body>
</html>
