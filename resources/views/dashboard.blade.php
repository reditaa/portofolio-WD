<x-app-layout>

@php
    $projects = \App\Models\Project::latest()->get();
    $totalProjects = $projects->count();
    $totalDemo = $projects->whereNotNull('demo_link')->count();
    $totalGithub = $projects->whereNotNull('github_url')->count();
@endphp

<div class="flex min-h-screen bg-gray-100 text-gray-800">

    <!-- SIDEBAR -->
   <aside class="w-64 bg-white shadow-lg sticky top-0 h-screen">
<div class="p-6 font-bold text-xl border-b flex items-center gap-2 whitespace-nowrap">
    <span>🚀</span>
    <span>Portfolio Admin</span>
</div>

        <nav class="mt-4">

            <a href="/dashboard"
               class="block px-6 py-3 bg-gray-200 font-semibold">
                🏠 Dashboard
            </a>

            <a href="/"
               class="block px-6 py-3 hover:bg-gray-100 transition">
                🌐 Lihat Website
            </a>

        </nav>

    </aside>

    <!-- CONTENT -->
    <main class="ml-64 w-full p-6">

        <!-- HEADER -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold">Halo, Admin 👋</h1>
                <p class="text-gray-500">Selamat datang di dashboard portfolio kamu</p>
            </div>

            <a href="{{ route('project.create') }}"
               class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg">
                Tambah
            </a>
        </div>

        <!-- STATS -->
        <div class="grid md:grid-cols-3 gap-6 mb-8">

            <div class="bg-white p-6 rounded-xl shadow">
                <h2 class="text-gray-500">Total Project</h2>
                <p class="text-4xl font-bold text-red-500">{{ $totalProjects }}</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <h2 class="text-gray-500">Demo Link</h2>
                <p class="text-4xl font-bold text-green-500">{{ $totalDemo }}</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <h2 class="text-gray-500">GitHub</h2>
                <p class="text-4xl font-bold text-blue-500">{{ $totalGithub }}</p>
            </div>

        </div>

        <!-- TABLE -->
        <div class="bg-white p-6 rounded-xl shadow">

            <h2 class="text-xl font-semibold mb-4">📂 Data Project</h2>

            <div class="overflow-x-auto">
                <table class="w-full text-left border rounded-lg overflow-hidden">

                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3">Gambar</th>
                            <th class="p-3">Judul</th>
                            <th class="p-3">Deskripsi</th>
                            <th class="p-3">Github</th>
                            <th class="p-3">Link Demo</th>
                            <th class="p-3">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($projects as $project)
                        <tr class="border-t hover:bg-gray-50 transition">

                            <!-- GAMBAR -->
                            <td class="p-3">
                                @if($project->image)
                                    <img src="{{ asset('storage/'.$project->image) }}"
                                         class="w-16 h-16 object-cover rounded-lg">
                                @else
                                    <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center text-xs">
                                        No Img
                                    </div>
                                @endif
                            </td>

                            <!-- JUDUL -->
                            <td class="p-3 font-semibold">
                                {{ $project->title }}
                            </td>

                            <!-- DESKRIPSI -->
                            <td class="p-3 text-sm text-gray-600">
                                {{ $project->description }}
                            </td>

                            <!-- GITHUB -->
                            <td class="p-3">
                                @if($project->github_url)
                                    <a href="{{ $project->github_url }}"
                                       target="_blank"
                                       class="text-blue-500 hover:underline">
                                        Link
                                    </a>
                                @else
                                    -
                                @endif
                            </td>

                            <!-- DEMO -->
                            <td class="p-3">
                                @if($project->demo_link)
                                    <a href="{{ $project->demo_link }}"
                                       target="_blank"
                                       class="text-green-500 hover:underline">
                                        Link
                                    </a>
                                @else
                                    -
                                @endif
                            </td>

                            <!-- AKSI -->
                            <td class="p-3 flex gap-3">
                                <a href="{{ route('project.edit', $project->id) }}"
                                   class="text-blue-500 hover:underline">
                                    Edit
                                </a>

                                <form action="{{ route('project.destroy', $project->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin hapus?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="text-red-500 hover:underline">
                                        Hapus
                                    </button>
                                </form>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-6 text-gray-400">
                                Belum ada project 😢
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>

    </main>

</div>

</x-app-layout>