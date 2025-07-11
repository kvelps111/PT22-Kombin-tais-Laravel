<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All posts') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="post-list">
                        <a href="{{ route('posts.create') }}" type="button" class="button">Create</a>
                        <ul>
                            @foreach($posts as $post)
                            <li>
                                <h2>
                                    <a href="{{ route('posts.show', $post->id) }}">
                                        {{ $post->title }}
                                    </a>
                                    @if ($post->isPrivate)
                                        <span class="inline-block bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded-full">
                                            private
                                        </span>
                                    @endif
                                </h2>

                                <h3>by {{ $post->user->name }}</h3>
                                <p>{{ $post->content }}</p>
                                @if ($post->image_path)
                                    <img src="{{ Storage::url($post->image_path) }}" alt="Post Image">
                                @endif
                                <a href="{{ route('posts.show', $post->id) }}" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900" >Show</a>                            
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>