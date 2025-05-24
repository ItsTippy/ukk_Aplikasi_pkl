@props(['title' => ''])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
        <title>{{ $title }}</title>
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800 text-white">
        <div class="flex min-h-screen">
            <!-- Sidebar -->
            <aside class="w-64 bg-zinc-900 border-r border-zinc-700 p-4">
                <div class="text-2xl font-bold mb-6">Laravel Starter Kit</div>

                <nav class="space-y-2">
                    <a href="{{ route('siswa.dashboard') }}" class="block px-3 py-2 rounded hover:bg-zinc-800 {{ request()->routeIs('siswa.dashboard') ? 'bg-zinc-800' : '' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('pkl') }}" class="block px-3 py-2 rounded hover:bg-zinc-800 {{ request()->routeIs('pkl') ? 'bg-zinc-800' : '' }}">
                        PKL
                    </a>
                </nav>

                <div class="mt-10">
                    <div class="text-sm text-zinc-400 mb-2">Logged in as:</div>
                    <div class="font-semibold">{{ auth()->user()->name }}</div>
                </div>
            </aside>

            <!-- Content -->
            <main class="flex-1 p-6">
                {{ $slot }}
            </main>
        </div>

        @fluxScripts
    </body>
</html>
