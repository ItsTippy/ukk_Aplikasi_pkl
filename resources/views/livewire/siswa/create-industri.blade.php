<div class="fixed inset-0 backdrop-brightness-50 z-40 flex items-center justify-center">
    <div class="bg-gray-800 rounded-lg shadow-lg w-full max-w-md p-6 z-50 text-white">
        <h2 class="text-xl font-semibold mb-4">Laporan PKL</h2>

        <form wire:submit.prevent="save">
            <div class="mb-4">
                <label class="block text-gray-300">Nama Industri</label>
                <input type="text" wire:model="nama" class="w-full border p-2 rounded">
                @error('nama') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-300">Bidang Usaha</label>
                <input type="text" wire:model="bidang_usaha" class="w-full border p-2 rounded">
        @error('bidang_usaha') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-300">Alamat</label>
                <textarea wire:model="alamat" class="w-full border p-2 rounded"></textarea>
                @error('alamat') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-300">Kontak</label>
                <input type="text" wire:model="kontak" class="w-full border p-2 rounded">
        @error('kontak') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-300">Email</label>
                <input type="email" wire:model="email" class="w-full border p-2 rounded">
                @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end space-x-2">
            <button
    type="button"
    wire:click="$set('showModal', false)"
    class="px-4 py-2 bg-gray-600 hover:bg-gray-500 rounded text-white"
>
    Cancel
</button>

                <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-500 rounded text-white">Save</button>
            </div>
        </form>
    </div>
</div>