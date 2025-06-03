@php
    $user = auth()->user();
@endphp

@if ($user && $user->hasRole('guru'))
    <x-layouts.app.guru-sidebar :title="$title ?? null">
        <flux:main>
            {{ $slot }}
        </flux:main>
    </x-layouts.app.guru-sidebar>
@elseif ($user && $user->hasRole('siswa'))
    <x-layouts.app.siswa-sidebar :title="$title ?? null">
        <flux:main>
            {{ $slot }}
        </flux:main>
    </x-layouts.app.siswa-sidebar>
@else
    {{-- Fallback sidebar atau guest --}}
    <x-layouts.app.siswa-sidebar :title="$title ?? null">
        <flux:main>
            {{ $slot }}
        </flux:main>
    </x-layouts.siswa-app.sidebar>
@endif
