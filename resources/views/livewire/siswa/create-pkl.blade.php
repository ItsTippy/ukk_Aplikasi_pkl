<div class="fixed inset-0 bg-black bg-opacity-50 z-40 flex items-center justify-center">
    <div class="bg-gray-800 rounded-lg shadow-lg w-full max-w-md p-6 z-50 text-white">
        <h2 class="text-xl font-semibold mb-4">Laporan PKL</h2>

        <form wire:submit.prevent="store">
            <div class="mb-4">
                <label class="block text-gray-300">Siswa</label>
                <select wire:model="siswa_id" class="w-full bg-gray-700 border-gray-600 text-white rounded">
                    <option value="">Pilih Siswa</option>
                    @foreach($siswas as $siswa)
                        <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-300">Industri</label>
                <select wire:model="industri_id" class="w-full bg-gray-700 border-gray-600 text-white rounded">
                    <option value="">Pilih Industri</option>
                    @foreach($industris as $industri)
                        <option value="{{ $industri->id }}">{{ $industri->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-300">Guru Pembimbing</label>
                <select wire:model="guru_id" class="w-full bg-gray-700 border-gray-600 text-white rounded">
                    <option value="">Pilih Guru</option>
                    @foreach($gurus as $guru)
                        <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-300">Mulai</label>
                <input type="date" wire:model="mulai" class="w-full bg-gray-700 border-gray-600 text-white rounded">
            </div>

            <div class="mb-4">
                <label class="block text-gray-300">Selesai</label>
                <input type="date" wire:model="selesai" class="w-full bg-gray-700 border-gray-600 text-white rounded">
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" wire:click="$emit('closeModal')" class="px-4 py-2 bg-gray-600 hover:bg-gray-500 rounded text-white">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-500 rounded text-white">Save</button>
            </div>
        </form>
    </div>
</div>
