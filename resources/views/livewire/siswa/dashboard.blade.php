@if (session()->has('error'))
    <div class="bg-red-600 text-white p-3 rounded mb-4 shadow">
        {{ session('error') }}
    </div>
@endif

@if (session()->has('success'))
    <div class="bg-green-600 text-white p-3 rounded mb-4 shadow">
        {{ session('success') }}
    </div>
@endif

<div class="p-4 bg-gray-900 rounded-lg shadow text-white">
    <h1 class="text-2xl font-semibold mb-2">Dashboard Siswa</h1>
    <p class="mb-4">Anda login sebagai: <span class="font-medium text-blue-400">{{ auth()->user()->name }}</span> ({{ auth()->user()->getRoleNames()->first() }})</p>

    <div class="p-4 bg-gray-800 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-4 text-center">Laporan Siswa PKL</h2>

        <div class="flex justify-between items-center mb-4">
        <input wire:model="search" type="text" placeholder="Cari..." 
    class="bg-gray-800 text-white border border-gray-700 rounded px-4 py-2 w-full max-w-xs">


        <button wire:click="showModal"
                class="bg-blue-600 hover:bg-blue-700 transition text-white font-medium px-4 py-2 rounded mb-4 shadow">
            + Create Laporan PKL
        </button>
    </div>
        

      
         <!-- #region -->
        {{-- Modal --}}
        @if($modalVisible)
            @include('livewire.siswa.create-pkl')
        @endif

        <table class="w-full text-sm text-left border border-gray-700">
            <thead class="bg-gray-700 text-gray-300 uppercase">
                <tr>
                    <th class="px-4 py-2 border border-gray-600">No</th>
                    <th class="px-4 py-2 border border-gray-600">Nama Siswa</th>
                    <th class="px-4 py-2 border border-gray-600">Industri</th>
                    <th class="px-4 py-2 border border-gray-600">Bidang Usaha</th>
                    <th class="px-4 py-2 border border-gray-600">Mulai</th>
                    <th class="px-4 py-2 border border-gray-600">Selesai</th>
                    <th class="px-4 py-2 border border-gray-600">Durasi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pkls as $index => $pkl)
                    <tr class="bg-gray-800 hover:bg-gray-700 transition">
                        <td class="px-4 py-2 border border-gray-700">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border border-gray-700">{{ $pkl->siswa->nama }}</td>
                        <td class="px-4 py-2 border border-gray-700">{{ $pkl->industri->nama }}</td>
                        <td class="px-4 py-2 border border-gray-700">{{ $pkl->industri->bidang_usaha }}</td>
                        <td class="px-4 py-2 border border-gray-700">{{ $pkl->mulai }}</td>
                        <td class="px-4 py-2 border border-gray-700">{{ $pkl->selesai }}</td>
                        <td class="px-4 py-2 border border-gray-700">{{ $pkl->durasi }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-gray-400 py-4">Belum ada laporan PKL.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">
        {{ $pkls->links() }}
    </div>
    </div>
</div>
