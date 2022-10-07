@props(['post' => $post] )

<div class="mb-6 border-solid border-2 border-slate-200 p-3 rounded-lg">
    <a href="{{ route('users.posts',$post->user) }}" class="font-bold">{{ $post->user->name }}</a> <span
        class="text-gray-600">{{
        $post->created_at->diffForHumans() }}</span>

    <p class="mb-2">{{ $post->body }}</p>


    @can('delete',$post)
    <form action="{{ route('posts.destroy',$post) }}" method="POST">
        @csrf
        @method('DELETE')
        <button
            class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
            Delete
        </button>
    </form>
    @endcan




    <div class="flex items-center">
        @auth
        @if (!$post->likedBy(auth()->user()))
        <form action="{{ route('posts.likes',$post) }}" method="POST" class="mr-1">
            @csrf
            <button type="submit" class="text-blue-500">Like</button>
        </form>
        @else
        <form action="{{ route('posts.likes',$post) }}" method="POST" class="mr-1">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Unlike</button>
        </form>
        @endif


        @endauth


        <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
    </div>
</div>
