<x-layout>

    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
            <x-post-grid :posts="$posts"></x-post-grid>
            {{ $posts->links() }}
        @else
            <p class="text-center">No posts yet. Check back later</p>
        @endif
    </main>
    {{-- <div class="container">
            @foreach ($posts as $post)
                <article class={{$loop->iteration == 3? 'itisthree':''}}>
                    <h3><a href="post/{{$post->slug}}">{{$post->title}}</a></h3>
                    By <a href="authors/{{$post->author->username}}">{{ $post->author->name }}</a> on <a href="categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
                    <p>{{$post->excerpt}}</p>
                </article>
            @endforeach
        </div> --}}
</x-layout>
