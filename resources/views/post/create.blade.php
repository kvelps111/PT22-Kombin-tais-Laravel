<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create new post
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900 dark:text-gray-100">
                    <div class="post-form">
                        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="@error('title') border-red-500 @enderror" value="{{ old('title') }}">

                                @error('title')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="content">Content</label>
                                <textarea name="content">{{ old('content') }}</textarea>

                                @error('content')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="status">Status</label>
                                <select name="status_id" id="status">
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-4">
                                <div class="mt-1">
                                    <input type="file" name="image" id="image" accept="image/*" class="hidden" onchange="updateFileName()">
                                    <label for="image" class="rounded-md border px-3 py-1 cursor-pointer">
                                        Choose Image
                                    </label>
                                    <p id="file-name" class="ml-1 mb-5 text-gray-600"></p>
                                </div>
                            </div>

                            <button type="submit" class="button">Create</button>
                        </form>
                        
                        <script>
                            function updateFileName() {
                                const input = document.getElementById('image');
                                const fileName = document.getElementById('file-name');
                                fileName.textContent = input.files.length > 0 ? input.files[0].name : '';
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>