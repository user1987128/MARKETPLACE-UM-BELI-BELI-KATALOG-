<header class="sticky top-0 bg-gray-900 text-white shadow-lg z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('marketplace') }}" class="text-2xl font-bold text-white hover:text-gray-300">
                    UM BELI BELI
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex space-x-8">
                <a href="{{ route('marketplace') }}" class="text-white hover:text-gray-300 transition duration-200">Home</a>
                <a href="{{ route('products.index') }}" class="text-white hover:text-gray-300 transition duration-200">Produk</a>
                <a href="{{ route('tentang') }}" class="text-white hover:text-gray-300 transition duration-200">Tentang</a>
                <a href="https://wa.me/6285736035251" target="_blank" class="text-white hover:text-gray-300 transition duration-200">WhatsApp</a>
            </nav>

            <!-- Icons -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="#" class="text-white hover:text-gray-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </a>
                <a href="{{ route('cart.index') }}" class="text-white hover:text-gray-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.1 5H19M7 13v8a2 2 0 002 2h10a2 2 0 002-2v-3"></path>
                    </svg>
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button type="button" class="text-white hover:text-gray-300 focus:outline-none focus:text-gray-300" id="mobile-menu-button">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 bg-gray-800">
                <a href="{{ route('marketplace') }}" class="block px-3 py-2 text-white hover:bg-gray-700">Home</a>
                <a href="{{ route('products.index') }}" class="block px-3 py-2 text-white hover:bg-gray-700">Produk</a>
                <a href="{{ route('tentang') }}" class="block px-3 py-2 text-white hover:bg-gray-700">Tentang</a>
                <a href="https://wa.me/6285736035251" target="_blank" class="block px-3 py-2 text-white hover:bg-gray-700">WhatsApp</a>
                <div class="flex px-3 py-2 space-x-4">
                    <a href="#" class="text-white hover:text-gray-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </a>
                    <a href="{{ route('cart.index') }}" class="text-white hover:text-gray-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.1 5H19M7 13v8a2 2 0 002 2h10a2 2 0 002-2v-3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>
