<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-end">
                <button type="button" data-drawer-target="drawer-right-example" data-drawer-show="drawer-right-example"
                    data-drawer-placement="right"
                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Tambah</button>
            </div>

            <div
                class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default bg-white rounded-lg mt-4">
                <table class="w-full text-sm text-left rtl:text-right text-body">
                    <thead class="bg-neutral-100 border-b border-default">
                        <tr>

                            <th scope="col" class="px-6 py-3 font-medium">
                                Gambar
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Judul
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Deskripsi
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Github 
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Link Demo
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $item)
                            <tr class="odd:bg-white even:bg-neutral-100 border-b border-default">
                                <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                        class="w-20 h-20 object-cover rounded-lg">
                                </th>
                                <td class="px-6 py-4">
                                    {{ $item->title }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->description }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->github_url }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->demo_link }}
                                </td>
                                <td class="px-6 py-4">
                                    <button type="button"
                                        data-drawer-target="drawer-edit-example"
                                        data-drawer-show="drawer-edit-example"
                                        data-drawer-placement="right"
                                        data-project="{{ $item }}"
                                        onclick="openEditDrawer(this)"
                                        class="font-medium text-fg-brand hover:underline">Edit</button>
                                    <button
                                        data-modal-target="default-modal"
                                        data-modal-toggle="default-modal"
                                        data-project-id="{{ $item->id }}"
                                        onclick="setDeleteAction(this)"
                                        class="font-medium text-fg-brand hover:underline ms-3">Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>


    {{-- dialog delete --}}
    <div id="default-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Hapus Project
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Apakah anda yakin ingin menghapus project ini?
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="default-modal" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Batal</button>
                    <form id="delete-form" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button data-modal-hide="default-modal" type="submit"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- drawer component -->
    <div id="drawer-right-example"
        class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-80 dark:bg-gray-800"
        tabindex="-1" aria-labelledby="drawer-right-label">
        <h5 id="drawer-right-label"
            class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400"><svg
                class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>Tambah Project</h5>
        <button type="button" data-drawer-hide="drawer-right-example" aria-controls="drawer-right-example"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close menu</span>
        </button>

        {{-- form --}}
        <form class="space-y-4" action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Image -->
            <div x-data="{ previewUrl: null }">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Unggah
                    Gambar</label>
                <input name="image"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="user_avatar" type="file" accept="image/*"
                    @change="previewUrl = $event.target.files[0] ? URL.createObjectURL($event.target.files[0]) : null">
                <!-- Preview -->
                <div x-show="previewUrl" class="mt-3">
                    <img :src="previewUrl" alt="Preview"
                        class="w-full max-h-48 object-cover rounded-lg border border-gray-300 dark:border-gray-600">
                </div>
            </div>
            <!-- Title -->
            <div class="mb-5">
                <label for="title"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                <input type="text" id="title" name="title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Masukan judul" required />
            </div>
            <!-- Description -->
            <div>
                <label for="message"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                <textarea id="message" rows="4" name="description"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Masukkan deskripsi" required></textarea>
            </div>

            <!-- Github -->
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Tautan GitHub</label>
                <input type="text" id="github" name="github_url"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Masukan tautan github" />
            </div>

            <!-- Link -->
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Tautan Demo</label>
                <input type="text" id="link" name="demo_link"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Masukan tautan demo" />
            </div>

            <!-- Submit -->
            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Submit
            </button>
        </form>
    </div>

    <!-- Edit drawer component -->
    <div id="drawer-edit-example"
        class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-80 dark:bg-gray-800"
        tabindex="-1" aria-labelledby="drawer-edit-label">
        <h5 id="drawer-edit-label"
            class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400"><svg
                class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>Edit Project</h5>
        <button type="button" data-drawer-hide="drawer-edit-example" aria-controls="drawer-edit-example"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close menu</span>
        </button>

        {{-- form --}}
        <form id="edit-form" class="space-y-4" action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Image -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="edit_image">Unggah
                    Gambar (Abaikan jika tidak diubah)</label>
                <input name="image" id="edit_image" type="file" accept="image/*"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    onchange="document.getElementById('edit_preview').src = window.URL.createObjectURL(this.files[0]); document.getElementById('preview-container').classList.remove('hidden');">
                <!-- Preview -->
                <div id="preview-container" class="mt-3 hidden">
                    <img id="edit_preview" src="" alt="Preview"
                        class="w-full max-h-48 object-cover rounded-lg border border-gray-300 dark:border-gray-600">
                </div>
            </div>
            <!-- Title -->
            <div class="mb-5">
                <label for="edit_title"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                <input type="text" id="edit_title" name="title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Masukan judul" required />
            </div>
            <!-- Description -->
            <div>
                <label for="edit_description"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                <textarea id="edit_description" rows="4" name="description"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Masukkan deskripsi" required></textarea>
            </div>

            <!-- Github -->
            <div>
                <label for="edit_github"
                    class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Tautan GitHub</label>
                <input type="text" id="edit_github" name="github_url"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Masukan tautan github" />
            </div>

            <!-- Link -->
            <div>
                <label for="edit_link" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Tautan
                    Demo</label>
                <input type="text" id="edit_link" name="demo_link"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Masukan tautan demo" />
            </div>

            <!-- Submit -->
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Simpan Perubahan
            </button>
        </form>
    </div>

    <script>
        function setDeleteAction(btn) {
            const projectId = btn.getAttribute('data-project-id');
            const baseUrl = '{{ url('dashboard/project') }}';
            document.getElementById('delete-form').action = baseUrl + '/' + projectId;
        }

        function openEditDrawer(btn) {
            const project = JSON.parse(btn.getAttribute('data-project'));
            const baseUrl = '{{ url('dashboard/project') }}';
            const storageUrl = '{{ asset('storage') }}';

            document.getElementById('edit-form').action = baseUrl + '/' + project.id;
            document.getElementById('edit_title').value = project.title;
            document.getElementById('edit_description').value = project.description;
            document.getElementById('edit_github').value = project.github || '';
            document.getElementById('edit_link').value = project.link || '';

            if (project.image) {
                document.getElementById('edit_preview').src = storageUrl + '/' + project.image;
                document.getElementById('preview-container').classList.remove('hidden');
            }
        }
    </script>

</x-app-layout>