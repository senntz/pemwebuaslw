<div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-2xl mx-auto">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Tambahkan Wisata</h1>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <form wire:submit.prevent="store">

                <div class="mb-6">
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Wisata
                    </label>
                    <input 
                        type="text" 
                        id="nama"
                        wire:model="nama"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nama') border-red-500 @enderror"
                        placeholder="Masukkan nama wisata"
                        required
                    >
                    @error('nama')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                        Deskripsi Wisata
                    </label>
                    <textarea 
                        id="deskripsi"
                        wire:model="deskripsi"
                        rows="4"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('deskripsi') border-red-500 @enderror"
                        placeholder="Masukkan deskripsi wisata"
                        required
                    ></textarea>
                    @error('deskripsi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="kota_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Kota
                    </label>
                    <select 
                        id="kota_id"
                        wire:model="kota_id"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('kota_id') border-red-500 @enderror"
                        required
                    >
                        <option value="">Pilih Kota</option>
                        @foreach($kota_list as $kota)
                            <option value="{{ $kota->id }}">{{ $kota->nama_kota }}</option>
                        @endforeach
                    </select>
                    @error('kota_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="kategori_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Kategori
                    </label>
                    <select 
                        id="kategori_id"
                        wire:model="kategori_id"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('kategori_id') border-red-500 @enderror"
                        required
                    >
                        <option value="">Pilih Kategori</option>
                        @foreach($kategori_list as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="biaya_masuk" class="block text-sm font-medium text-gray-700 mb-2">
                        Biaya Masuk
                    </label>
                    <input 
                        type="number" 
                        id="biaya_masuk"
                        wire:model="biaya_masuk"
                        min="0"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('biaya_masuk') border-red-500 @enderror"
                        placeholder="ex. 5000"
                        required
                    >
                    @error('biaya_masuk')
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