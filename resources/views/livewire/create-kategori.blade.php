<div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-2xl mx-auto">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Tambahkan Kategori</h1>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <form wire:submit.prevent="store">
                <div class="mb-6">

                    <label for="nama_kategori" class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Kategori
                    </label>

                    <input 
                        type="text" 
                        id="nama_kategori"
                        wire:model="nama_kategori"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nama_kategori') border-red-500 @enderror"
                        placeholder="Masukkan nama kategori"
                        required
                    >

                    @error('nama_kategori')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    
                </div>

                <div class="flex justify-end">
                    <button 
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    >
                        Simpan
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>