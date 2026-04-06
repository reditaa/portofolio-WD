<!-- Navbar -->
<nav x-data="{ open:false, scrolled:false }" 
     @scroll.window="scrolled = window.scrollY > 50"
     class="fixed top-0 left-0 w-full z-50 backdrop-blur-md"
     :class="scrolled 
        ? 'bg-gray-900/90 backdrop-blur shadow-lg border-b border-red-500/20' 
        : 'bg-gradient-to-r from-gray-900/90 via-red-900/90 to-black/90 backdrop-blur'">

    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        <div class="flex justify-between items-center h-16">

            <!-- Logo -->
            <a href="#home" class="text-2xl font-bold text-white">
                <span class="text-red-400">Porto</span>folio
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-6 items-center">

                <a href="#home" class="nav-link text-gray-300 hover:text-red-400 transition">Home</a>
                <a href="#about" class="nav-link text-gray-300 hover:text-red-400 transition">About</a>
                <a href="#skills" class="nav-link text-gray-300 hover:text-red-400 transition">Skills</a>
                <a href="#project" class="nav-link text-gray-300 hover:text-red-400 transition">Project</a>
                <a href="#contact" class="nav-link text-gray-300 hover:text-red-400 transition">Contact</a>

                @auth
                    <a href="{{ route('dashboard') }}" class="text-gray-300 hover:text-red-400 transition">
                        Dashboard
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:scale-105 transition shadow-lg">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:scale-105 transition shadow-lg">
                        Login
                    </a>

                    <a href="{{ route('register') }}" 
                       class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:scale-105 transition shadow-lg">
                        Register
                    </a>
                @endauth

            </div>

            <!-- Mobile Button -->
            <button @click="open = !open" class="md:hidden text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                        d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

        </div>

        <!-- Mobile Menu -->
        <div x-show="open"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-5"
             x-transition:enter-end="opacity-100 translate-y-0"
             class="md:hidden mt-4 space-y-3 pb-4">

            <a href="#home" class="block nav-link text-gray-300 hover:text-red-400">Home</a>
            <a href="#about" class="block nav-link text-gray-300 hover:text-red-400">About</a>
            <a href="#skills" class="block nav-link text-gray-300 hover:text-red-400">Skills</a>
            <a href="#project" class="block nav-link text-gray-300 hover:text-red-400">Project</a>
            <a href="#contact" class="block nav-link text-gray-300 hover:text-red-400">Contact</a>

            @auth
                <a href="{{ route('dashboard') }}" class="block text-gray-300 hover:text-red-400">
                    Dashboard
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="block w-full bg-gradient-to-r from-red-500 to-pink-500 text-white px-4 py-2 rounded-lg text-center font-semibold hover:scale-105 transition shadow-lg">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block w-full bg-gradient-to-r from-red-500 to-pink-500 text-white px-4 py-2 rounded-lg text-center font-semibold hover:scale-105 transition shadow-lg mb-2">
                    Login
                </a>

                <a href="{{ route('register') }}" 
                   class="block w-full bg-gradient-to-r from-red-500 to-pink-500 text-white px-4 py-2 rounded-lg text-center font-semibold hover:scale-105 transition shadow-lg">
                    Register
                </a>
            @endauth

        </div>

    </div>
</nav>

<!-- ACTIVE MENU SCRIPT -->
<script>
const sections = document.querySelectorAll("section");
const navLinks = document.querySelectorAll(".nav-link");

window.addEventListener("scroll", () => {
    let current = "";

    sections.forEach(section => {
        const sectionTop = section.offsetTop - 100;
        if (scrollY >= sectionTop) {
            current = section.getAttribute("id");
        }
    });

    navLinks.forEach(link => {
        link.classList.remove("text-red-400", "font-semibold");

        if (link.getAttribute("href") === "#" + current) {
            link.classList.add("text-red-400", "font-semibold");
        }
    });
});
</script>