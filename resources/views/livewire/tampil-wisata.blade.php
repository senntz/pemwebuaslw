<div>
    <!-- Hero Image Section -->
    <div id="hero-section" class="relative">
        <div id="hero-image" class="w-full h-96 bg-gray-300 transition-all duration-500 ease-in-out">
            @if($wisatas->nama_wisata)
                <img src="{{ asset('img/' . $wisatas->nama_wisata . ".png") }}" alt="{{ $wisatas->nama_wisata }}" 
                    class="w-full h-full object-cover">
            @else
                <div class="w-full h-full bg-gradient-to-r from-blue-400 to-purple-500 flex items-center justify-center">
                    <span class="text-white text-2xl font-semibold">No Image Available</span>
                </div>
            @endif
        </div>
        
        <div id="sticky-header" class="fixed top-0 left-0 right-0 bg-white shadow-lg z-50 transition-all duration-300 transform -translate-y-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex items-center">
                <div class="w-12 h-12 rounded-lg overflow-hidden mr-4 flex-shrink-0">
                    @if($wisatas->nama_wisata)
                        <img src="{{ asset('img/' . $wisatas->nama_wisata . ".png") }}" alt="{{ $wisatas->nama_wisata }}" 
                            class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gradient-to-r from-blue-400 to-purple-500"></div>
                    @endif
                </div>
                <div class="flex-1">
                    <h1 class="text-lg font-semibold text-gray-900 truncate">{{ $wisatas->nama_wisata }}</h1>
                    <p class="text-sm text-gray-600">{{ $wisatas->kota->nama_kota }}</p>
                </div>
                <div class="text-right">
                    <span class="text-lg font-bold text-green-600">
                        @if($wisatas->biaya_masuk > 0)
                            Rp {{ number_format($wisatas->biaya_masuk, 0, ',', '.') }}
                        @else
                            Gratis
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-8">
            <div class="flex justify-between items-start mb-4">
                <h1 class="text-3xl font-bold text-gray-900">{{ $wisatas->nama_wisata }}</h1>
                <div class="text-right">
                    <span class="text-2xl font-bold text-green-600">
                        @if($wisatas->biaya_masuk > 0)
                            Rp {{ number_format($wisatas->biaya_masuk, 0, ',', '.') }}
                        @else
                            Gratis
                        @endif
                    </span>
                    <p class="text-sm text-gray-500">Biaya Masuk</p>
                </div>
            </div>

            <div class="flex items-center space-x-4 mb-6">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span class="text-gray-600">{{ $wisatas->kota->nama_kota }}</span>
                </div>
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                        {{ $wisatas->kategori->nama_kategori }}
                    </span>
                </div>
            </div>

            <div class="prose max-w-none">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Deskripsi</h3>
                <p class="text-gray-700 leading-relaxed">{{ $wisatas->deskripsi }}</p>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-6">Ulasan & Rating</h3>

            @if($ulasans->count() > 0)
                <div class="mb-8 p-4 bg-gray-50 rounded-lg">
                    <div class="flex items-center space-x-4">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-yellow-500">{{ number_format($averageRating, 1) }}</div>
                            <div class="flex justify-center mt-1">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-5 h-5 {{ $i <= $averageRating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                @endfor
                            </div>
                        </div>
                        <div>
                            <p class="text-lg font-medium text-gray-900">{{ $ulasans->count() }} ulasan</p>
                            <p class="text-gray-600">Rating rata-rata dari pengunjung</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="mb-8 p-4 border border-gray-200 rounded-lg">
                <h4 class="font-semibold text-gray-900 mb-4">Berikan Ulasan Anda</h4>
                <form wire:submit.prevent="submitUlasan">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Rating *</label>
                        <div class="flex space-x-1">
                            @for($i = 1; $i <= 5; $i++)
                                <button type="button" 
                                        wire:click="setRating({{ $i }})"
                                        class="focus:outline-none">
                                    <svg class="w-8 h-8 {{ $rating >= $i ? 'text-yellow-400' : 'text-gray-300' }} hover:text-yellow-400 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                </button>
                            @endfor
                        </div>
                        @error('rating') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="ulasan" class="block text-sm font-medium text-gray-700 mb-2">
                            Ulasan (Opsional)
                        </label>
                        <textarea wire:model="isiUlasan" 
                            id="ulasan"
                            rows="4" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Ceritakan pengalaman Anda..."></textarea>
                        @error('isiUlasan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" 
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Kirim Ulasan
                    </button>
                </form>
            </div>

            <div class="space-y-4">
                @forelse($ulasans as $review)
                    <div class="border-b border-gray-200 pb-4 last:border-b-0">
                        <div class="flex items-start justify-between mb-2">
                            <div class="flex items-center space-x-2">
                                <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
                                    <span class="text-sm font-medium text-gray-700">
                                        {{ strtoupper(substr($review->user->name ?? 'A', 0, 1)) }}
                                    </span>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">{{ $review->user->name ?? 'Anonim' }}</p>
                                    <div class="flex items-center space-x-1">
                                        @for($i = 1; $i <= 5; $i++)
                                            <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <span class="text-sm text-gray-500">{{ $review->created_at->diffForHumans() }}</span>
                        </div>
                        @if($review->komentar)
                            <p class="text-gray-700 ml-10">{{ $review->komentar }}</p>
                        @endif
                    </div>
                @empty
                    <div class="text-center py-8">
                        <div class="w-16 h-16 mx-auto mb-4 bg-gray-100 rounded-full flex items-center justify-center">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <p class="text-gray-500">Belum ada ulasan untuk tempat wisatas ini.</p>
                        <p class="text-sm text-gray-400 mt-1">Jadilah yang pertama memberikan ulasan!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const heroSection = document.getElementById('hero-section');
            const stickyHeader = document.getElementById('sticky-header');
            const heroImage = document.getElementById('hero-image');
            
            let isSticky = false;
            
            function handleScroll() {
                const heroBottom = heroSection.offsetTop + heroSection.offsetHeight;
                const scrollTop = window.pageYOffset;
                
                if (scrollTop >= heroBottom && !isSticky) {
                    stickyHeader.classList.remove('-translate-y-full');
                    stickyHeader.classList.add('translate-y-0');
                    isSticky = true;
                } else if (scrollTop < heroBottom && isSticky) {
                    stickyHeader.classList.add('-translate-y-full');
                    stickyHeader.classList.remove('translate-y-0');
                    isSticky = false;
                }

                const shrinkRatio = Math.min(scrollTop / (heroBottom * 0.5), 1);
                const newHeight = 384 - (shrinkRatio * 100);
                heroImage.style.height = `${Math.max(newHeight, 200)}px`;
            }
            
            window.addEventListener('scroll', handleScroll);
        });
    </script>
</div>