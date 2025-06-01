<div class="p-4 bg-gray-900 rounded-lg shadow text-white">
    <h2 class="text-xl font-semibold mb-4 text-center">Mitra Industri SIJA</h2>


    <div class="flex justify-between items-center mb-4">
        <input wire:model.live="search" type="text" placeholder="Cari..." 
        class="bg-gray-800 text-white border border-gray-700 rounded px-4 py-2 w-full max-w-xs">

        <button wire:click="create"
            class="bg-blue-600 hover:bg-blue-700 transition text-white font-medium px-4 py-2 rounded mb-4 shadow">
        + Tambah Industri
    </button>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-600 text-white px-4 py-2 rounded mb-4 shadow">
            {{ session('message') }}
        </div>
    @endif

    <table class="w-full text-sm text-left border border-gray-700">
        <thead class="bg-gray-700 text-gray-300 uppercase">
            <tr>
                <th class="px-4 py-2 border border-gray-600">No</th>
                <th class="px-4 py-2 border border-gray-600">Nama</th>
                <th class="px-4 py-2 border border-gray-600">Bidang Usaha</th>
                <th class="px-4 py-2 border border-gray-600">Alamat</th>
                <th class="px-4 py-2 border border-gray-600">Kontak</th>
                <th class="px-4 py-2 border border-gray-600">Email</th>
                <th class="px-4 py-2 border border-gray-600">Website</th>
            </tr>
        </thead>
        <tbody>
            @forelse($industris as $i => $industri)
                <tr class="bg-gray-800 hover:bg-gray-700 transition">
                    <td class="px-4 py-2 border border-gray-700">{{ $i + 1 }}</td>
                    <td class="px-4 py-2 border border-gray-700">{{ $industri->nama }}</td>
                    <td class="px-4 py-2 border border-gray-700">{{ $industri->bidang_usaha }}</td>
                    <td class="px-4 py-2 border border-gray-700">{{ $industri->alamat }}</td>
                    <td class="px-4 py-2 border border-gray-700">{{ $industri->kontak }}</td>
                    <td class="px-4 py-2 border border-gray-700">{{ $industri->email }}</td>
                    <td class="px-4 py-2 border border-gray-700">{{ $industri->website }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-gray-400 py-4">Belum ada data industri.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $industris->links() }}
    </div>

    {{-- Modal --}}
    @if($showModal)
        @include('livewire.siswa.create-industri')
    @endif
</div>
