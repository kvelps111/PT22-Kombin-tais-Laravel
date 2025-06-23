<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Post: $post->title") }}

            @if ($post->isPrivate)
                <span class="inline-block bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded-full">
                    private
                </span>
            @endif
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3>by {{ $post->user->name }}</h3>
                    <p>{{ $post->content }}</p>

                    <div>
                        @if ($post->image_path)
                            <img src="{{ Storage::url($post->image_path) }}" alt="Post Image">
                        @endif
                    </div>

                    <div class="min-w-fit min-h-fit my-3">
                        <a href="{{ route('posts.edit', $post->id) }}" 
                            class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900"
                        >Edit</a>
                    </div>
                    <div class="min-w-fit min-h-fit my-3">
                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('delete')
                            
                            <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                Delete
                            </button>
                        </form>
                    </div>

                    <h2>Comments:</h2>
                    @foreach ($post->comments as $comment)
                        <div>
                            <h3>by {{ $comment->user->name }}</h3>
                            <p>{{ $comment->content }}</p>
                        </div>
                    @endforeach

                    <form action="{{ route('comments.store', $post) }}" method="post">
                        @csrf
                        <div>
                            <textarea
                                name="content" id="content" rows="4" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                                placeholder="Write your comment here..."
                            ></textarea>
                        </div>
                        <button
                            type="submit"
                            class="inline-flex items-center mt-2 px-4 py-2 bg-blue-600 border border-transparent rounded-md shadow-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                        >Add Comment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>