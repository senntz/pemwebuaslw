<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Destinasi Wisata') }}
        </h2>
    </x-slot>

    <div class="py-12 grid grid-cols-4 gap-4 sm:px-6 lg:px-16">
        <div class="lg:col-span-1 sm:col-span-4">
            <div class="mx-auto">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <label for="kota">Kota</label>
                        <select id="kota" name="kota" class="block mt-1 w-full rounded" wire:model="filterkota">
                            <option value="">Semua</option>
                            @foreach ($kotas as $kota)
                                <option value="{{ $kota->id }}">{{ $kota->nama_kota }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="p-6 text-gray-900">
                        <label for="biaya">Biaya Masuk</label>
                        <input type="text" id="biaya" name="biaya" class="block mt-1 w-full rounded " placeholder="ex. 20.000" wire:model="filterbiaya">
                    </div>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-b w-full" wire:click="filter">
                        Cari
                    </button>
                </div>
            </div>
        </div>
        <div class="lg:col-span-3 sm:col-span-4">
            <div class="mx-auto">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                    <div class="grid grid-flow-row gap-4">
                        @if ($wisatas->isEmpty())
                            <div class="text-center text-gray-500">
                                Tidak ada destinasi wisata yang ditemukan.
                            </div>
                        @else
                            @foreach ($wisatas as $wisata)
                                <a href="{{ route('tampilwisata', ['wisata_id' => $wisata->id]) }}" class="shadow-lg rounded overflow-hidden bg-gray-100 flex flex-row">
                                    <div class="w-5/6 px-6 py-4">
                                        <div class="font-bold text-xl">{{$wisata->nama_wisata}}</div>
                                        <p class="text-gray-700 text-base">{{$wisata->deskripsi}}</p>
                                        <div class="mt-2 flex flex-row">
                                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $wisata->kota->nama_kota }}</span>
                                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-auto mb-2">#{{ $wisata->kategori->nama_kategori }}</span>
                                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Rp {{ $wisata->biaya_masuk }}</span>
                                        </div>
                                    </div>
                                    <div class="w-1/6 bg-blue-500 text-white px-4 py-2 flex flex-row justify-center items-center gap-3">
                                        <span class="text-lg">⭐ {{ number_format($wisata->avg_rating, 1) ?? 0}}</span>
                                        <span class="text-lg">📄 {{$wisata->total_ulasan ?? 0}}</span>
                                    </div>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
