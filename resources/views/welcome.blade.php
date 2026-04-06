<x-landing-layout>
    @include('landing.navbar')
<!-- Hero Section -->
<section id="home" 
    x-data="typingEffect()" 
    x-init="startTyping()"
    class="min-h-screen flex items-center bg-gradient-to-br from-gray-900 via-red-900 to-black overflow-hidden">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 grid md:grid-cols-2 gap-10 items-center">

        <!-- IMAGE -->
        <div 
            class="flex justify-center relative order-1 md:order-2"
            x-show="showImage"
            x-transition:enter="transition ease-out duration-1000"
            x-transition:enter-start="opacity-0 translate-y-10"
            x-transition:enter-end="opacity-100 translate-y-0"
        >
            <div class="absolute w-56 h-56 md:w-80 md:h-80 bg-red-500 rounded-full blur-3xl opacity-30"></div>

            <img src="{{ asset('images/profile.jpg') }}" 
                 alt="Profile"
                 class="relative w-40 h-40 sm:w-52 sm:h-52 md:w-80 md:h-80 object-cover rounded-full border-4 border-red-400 shadow-2xl">
        </div>

        <!-- TEXT -->
        <div class="text-center md:text-left text-white order-2 md:order-1">

            <!-- Badge -->
            <span 
                x-show="showBadge"
                x-transition
                class="inline-block mb-4 px-3 py-1 bg-red-500/20 text-red-300 rounded-full text-xs sm:text-sm border border-red-400/30">
                🚀 Siswa SMK PPLG
            </span>

            <!-- Heading -->
            <h1 class="text-3xl sm:text-4xl md:text-6xl font-extrabold leading-tight mb-4">
                Hai, Saya Redita <br>

                <!-- Typing -->
                <span class="bg-gradient-to-r from-red-400 to-pink-500 bg-clip-text text-transparent">
                    <span x-text="text"></span><span class="animate-pulse">|</span>
                </span>
            </h1>

            <!-- Subheading -->
            <p 
                x-show="showText"
                x-transition
                class="text-sm sm:text-base md:text-lg text-gray-300 mb-6 max-w-md md:max-w-xl mx-auto md:mx-0">
                Saya adalah pelajar SMK jurusan PPLG yang fokus membuat website modern, responsif, 
                dan user-friendly menggunakan 
                <span class="text-red-400 font-semibold">Laravel</span> & 
                <span class="text-red-400 font-semibold">Tailwind CSS</span>.
            </p>

            <!-- Buttons -->
            <div 
                x-show="showButton"
                x-transition
                class="flex flex-col sm:flex-row gap-3 justify-center md:justify-start">

                <a href="{{ route('project.index') }}"
                   class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-6 py-3 rounded-lg text-sm sm:text-base font-semibold 
                   hover:scale-105 transition duration-300 shadow-lg text-center">
                    🚀 Lihat Project
                </a>

                <a href="#contact"
                   class="border border-red-400 text-red-300 px-6 py-3 rounded-lg text-sm sm:text-base font-semibold 
                   hover:bg-red-500 hover:text-white transition duration-300 text-center">
                    📩 Hubungi
                </a>

            </div>

            <!-- Skills -->
            <div class="mt-6 sm:mt-8 flex flex-wrap gap-2 sm:gap-3 justify-center md:justify-start">
                <span class="bg-white/10 backdrop-blur px-3 py-1 rounded-full text-xs sm:text-sm">Laravel</span>
                <span class="bg-white/10 backdrop-blur px-3 py-1 rounded-full text-xs sm:text-sm">Tailwind</span>
                <span class="bg-white/10 backdrop-blur px-3 py-1 rounded-full text-xs sm:text-sm">JavaScript</span>
                <span class="bg-white/10 backdrop-blur px-3 py-1 rounded-full text-xs sm:text-sm">MySQL</span>
            </div>

        </div>

    </div>
</section>

<!-- Typing Script -->
<script>
function typingEffect() {
    return {
        words: ['Web Developer', 'Frontend Enthusiast'],
        text: '',
        wordIndex: 0,
        charIndex: 0,

        showBadge: false,
        showText: false,
        showButton: false,
        showImage: false,

        startTyping() {
            setTimeout(() => this.showBadge = true, 200);
            setTimeout(() => this.showText = true, 800);
            setTimeout(() => this.showButton = true, 1200);
            setTimeout(() => this.showImage = true, 400);

            this.type();
        },

        type() {
            let currentWord = this.words[this.wordIndex];

            if (this.charIndex < currentWord.length) {
                this.text += currentWord.charAt(this.charIndex);
                this.charIndex++;
                setTimeout(() => this.type(), 80);
            } else {
                setTimeout(() => this.erase(), 1500);
            }
        },

        erase() {
            if (this.charIndex > 0) {
                this.text = this.text.slice(0, -1);
                this.charIndex--;
                setTimeout(() => this.erase(), 40);
            } else {
                this.wordIndex = (this.wordIndex + 1) % this.words.length;
                setTimeout(() => this.type(), 300);
            }
        }
    }
}
</script>

</body>
</html>

    <!-- Tambahkan ini di <html> -->
<html class="scroll-smooth">

<!-- ABOUT -->
<section id="about" class="py-20 bg-white scroll-mt-24">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-4xl font-bold text-center text-gray-900 mb-16">
            Tentang Saya
        </h2>

        <div class="grid md:grid-cols-2 gap-12 items-center">

            <!-- Foto -->
            <div class="flex justify-center">
                <img src="https://via.placeholder.com/400"
                     class="rounded-2xl shadow-xl hover:scale-105 transition duration-500">
            </div>

            <!-- Text -->
            <div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">
                    Halo, Saya <span class="text-red-500">Redita</span>
                </h3>

                <p class="text-gray-600 mb-6 leading-relaxed">
                    Saya seorang pelajar yang sedang belajar menjadi web developer.
                    Saya suka membuat website modern, interaktif, dan responsive menggunakan Laravel & Tailwind CSS.
                </p>

                <div class="grid grid-cols-2 gap-6">
                    <div class="text-center bg-red-50 p-4 rounded-lg">
                        <div class="text-3xl font-bold text-red-500">10+</div>
                        <div class="text-gray-600">Project</div>
                    </div>

                    <div class="text-center bg-red-50 p-4 rounded-lg">
                        <div class="text-3xl font-bold text-red-500">1+</div>
                        <div class="text-gray-600">Tahun Belajar</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SKILLS (FIX ERROR DISINI 🔥) -->
<section id="skills" class="py-20 bg-gray-50 scroll-mt-24">
    <div class="max-w-6xl mx-auto px-4">

        <h2 class="text-4xl font-bold text-center text-gray-900 mb-16">
            Skills
        </h2>

        <div class="grid md:grid-cols-3 gap-8">

            <div class="bg-white p-6 rounded-xl shadow-md text-center hover:shadow-xl hover:-translate-y-2 transition duration-300">
                <div class="text-4xl text-red-500 mb-4"><i class="fas fa-code"></i></div>
                <h3 class="text-xl font-semibold mb-2">Frontend</h3>
                <p class="text-gray-600">HTML, CSS, JavaScript, Tailwind</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md text-center hover:shadow-xl hover:-translate-y-2 transition duration-300">
                <div class="text-4xl text-red-500 mb-4"><i class="fas fa-cog"></i></div>
                <h3 class="text-xl font-semibold mb-2">Backend</h3>
                <p class="text-gray-600">PHP, Laravel, MySQL</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md text-center hover:shadow-xl hover:-translate-y-2 transition duration-300">
                <div class="text-4xl text-red-500 mb-4"><i class="fas fa-palette"></i></div>
                <h3 class="text-xl font-semibold mb-2">Design</h3>
                <p class="text-gray-600">Figma, UI/UX, Responsive</p>
            </div>

        </div>
    </div>
</section>

<!-- PROJECT -->
<section id="project" class="py-20 bg-white scroll-mt-24">
    <div class="max-w-6xl mx-auto px-4">

        <h2 class="text-4xl font-bold text-center text-gray-900 mb-16">
            Project Saya
        </h2>

        @if($projects->count() > 0)
            <div class="grid md:grid-cols-3 gap-8">
                @foreach($projects as $project)
                    <div class="bg-gray-50 rounded-xl overflow-hidden shadow-md hover:shadow-xl transition duration-300">
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2">{{ $project->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ $project->description }}</p>
                            <div class="flex gap-3">
                                <a href="{{ $project->demo_link }}" target="_blank" rel="noopener noreferrer" class="flex-1 text-center bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600 transition font-semibold">
                                    <i class="fas fa-arrow-up-right-from-square mr-1"></i>Live Demo
                                </a>
                                <a href="{{ $project->github_url }}" target="_blank" rel="noopener noreferrer" class="flex-1 text-center border border-red-500 text-red-600 px-3 py-2 rounded hover:bg-red-50 transition font-semibold">
                                    <i class="fas fa-code mr-1"></i>Source
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-gray-500 text-lg">Belum ada project yang ditampilkan. Mulai tambahkan project Anda!</p>
            </div>
        @endif
    </div>
</section>

<!-- CONTACT -->
<section id="contact" class="py-20 bg-gray-900 text-white scroll-mt-24">
    <div class="max-w-4xl mx-auto px-4 text-center">

        <h2 class="text-4xl font-bold mb-8">Hubungi Saya</h2>

        <p class="text-lg text-gray-300 mb-12">
            Yuk kerja sama atau tanya-tanya!
        </p>

        <div class="grid md:grid-cols-3 gap-8 mb-12">

            <a href="mailto:reditaraesya@gmail.com" class="hover:scale-105 transition duration-300">
                <div class="text-3xl text-red-500 mb-4"><i class="fas fa-envelope"></i></div>
                <h3 class="text-xl font-semibold">Email</h3>
                <p class="text-gray-300">reditaraesya@gmail.com</p>
            </a>

            <a href="https://wa.me/6287865252123" target="_blank" rel="noopener noreferrer" class="hover:scale-105 transition duration-300">
                <div class="text-3xl text-red-500 mb-4"><i class="fab fa-whatsapp"></i></div>
                <h3 class="text-xl font-semibold">Whatsapp</h3>
                <p class="text-gray-300">+62 878-6525-2123</p>
            </a>

            <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="hover:scale-105 transition duration-300">
                <div class="text-3xl text-red-500 mb-4"><i class="fab fa-instagram"></i></div>
                <h3 class="text-xl font-semibold">IG</h3>
                <p class="text-gray-300">@instagram_username</p>
            </a>

        </div>

    </div>
</section>
</x-landing-layout>