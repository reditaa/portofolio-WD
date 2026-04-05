<!-- Navbar Component -->
<nav class="bg-white dark:bg-gray-800 shadow">
    <div class="mx-auto container px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="/" class="text-2xl font-bold text-gray-900 dark:text-white">
                    Portfolio
                </a>
            </div>

            <!-- Menu -->
            <div class="hidden md:flex md:space-x-8">
                <a href="#home" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium transition">
                    Home
                </a>
                <a href="#about" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium transition">
                    About
                </a>
                <a href="#skills" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium transition">
                    Skills
                </a>
                <a href="#project" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium transition">
                    Project
                </a>
                <a href="#contact" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium transition">
                    Contact
                </a>
            </div>

            <!-- Auth Links -->
            <div class="hidden md:flex md:space-x-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Dashboard
                    </a>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="bg-blue-600 text-white hover:bg-blue-700 px-3 py-2 rounded-md text-sm font-medium">
                        Register
                    </a>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-btn" type="button" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white p-2 rounded-md">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden pb-3 pt-2 space-y-1">
            <a href="#home" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                Home
            </a>
            <a href="#about" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                About
            </a>
            <a href="#skills" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                Skills
            </a>
            <a href="#project" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                Project
            </a>
            <a href="#contact" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                Contact
            </a>
            @auth
                <a href="{{ route('dashboard') }}" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                    Dashboard
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white block px-3 py-2 rounded-md text-base font-medium w-full text-left">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                    Login
                </a>
                <a href="{{ route('register') }}" class="bg-blue-600 text-white hover:bg-blue-700 block px-3 py-2 rounded-md text-base font-medium">
                    Register
                </a>
            @endauth
        </div>
    </div>
</nav>

<script>
    document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>
