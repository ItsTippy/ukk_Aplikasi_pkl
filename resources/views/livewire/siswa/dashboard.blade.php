@if (session()->has('error'))
    <div class="bg-red-500 text-white p-3 rounded mb-4">
        {{ session('error') }}
    </div>
@endif

@if (session()->has('success'))
    <div class="bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div>
    <h1 class="text-2xl font-bold mb-4 text-white">Dashboard Siswa</h1>
    <p class="text-white">
    Anda Login Sebagai, {{ auth()->user()->name }}(
    {{ auth()->user()->getRoleNames()->first() }})
    </p>


    <div class="p-6">
        <h2 class="text-xl font-bold mb-4 text-white text-center">Laporan Siswa PKL</h2>

        <button wire:click="showModal"
                class="bg-gray-500 text-white px-4 py-2 rounded mb-4">
            Create Laporan PKL
        </button>
  {{-- Modal & Overlay --}}
            @if($modalVisible)
                @include('livewire.siswa.create-pkl')
            @endif
        <table class="w-full border text-sm mb-6">
            <thead class="bg-gray-800">
                <tr>
                    <th class="border px-2 py-1">No</th>
                    <th class="border px-2 py-1">Nama Siswa</th>
                    <th class="border px-2 py-1">Industri</th>
                    <th class="border px-2 py-1">Bidang Usaha</th>
                    <th class="border px-2 py-1">Mulai</th>
                    <th class="border px-2 py-1">Selesai</th>
                    <th class="border px-2 py-1">Durasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pkls as $index => $pkl)
                    <tr>
                        <td class="border px-2 py-1">{{ $index + 1 }}</td>
                        <td class="border px-2 py-1">{{ $pkl->siswa->nama }}</td>
                        <td class="border px-2 py-1">{{ $pkl->industri->nama }}</td>
                        <td class="border px-2 py-1">{{ $pkl->industri->bidang_usaha }}</td>
                        <td class="border px-2 py-1">{{ $pkl->mulai }}</td>
                        <td class="border px-2 py-1">{{ $pkl->selesai }}</td>
                        <td class="border px-2 py-1">{{ $pkl->durasi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

      
    </div>
</div>