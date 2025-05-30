<div class="p-4">
<h2 class="text-xl font-bold mb-4 text-white text-center">Mitra Industri SIJA</h2>
    <button wire:click="create" class="bg-gray-500 text-white px-4 py-2 rounded mb-4">
        Tambah Industri
    </button>

    @if (session()->has('message'))
        <div class="text-green-700 mb-4">{{ session('message') }}</div>
    @endif

    <table class="w-full border text-sm">
        <thead class="bg-gray-800">
            <tr>
                <th class="border px-2 py-1">No</th>
                <th class="border px-2 py-1">Nama</th>
                <th class="border px-2 py-1">Bidang Usaha</th>
                <th class="border px-2 py-1">Alamat</th>
                <th class="border px-2 py-1">Kontak</th>
                <th class="border px-2 py-1">Email</th>
                <th class="border px-2 py-1">Website</th>
            </tr>
        </thead>
        <tbody>
            @foreach($industris as $i => $industri)
                <tr>
                    <td class="border px-2 py-1">{{ $i + 1 }}</td>
                    <td class="border px-2 py-1">{{ $industri->nama }}</td>
                    <td class="border px-2 py-1">{{ $industri->bidang_usaha }}</td>
                    <td class="border px-2 py-1">{{ $industri->alamat }}</td>
                    <td class="border px-2 py-1">{{ $industri->kontak }}</td>
                    <td class="border px-2 py-1">{{ $industri->email }}</td>
                    <td class="border px-2 py-1">{{ $industri->website }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Modal --}}
    @if($showModal)
                @include('livewire.siswa.create-industri')
            </div>
        </div>
    @endif
</div>
