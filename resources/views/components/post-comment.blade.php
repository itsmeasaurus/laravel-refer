@props(['comment'])
<x-panel class="bg-gray-100">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60?u={{$comment->author->id}}" alt="" class="rounded-xl">
        </div>
        <div>
            <header>
                <h3 class="font-bold">{{$comment->author->username}}</h3>
                <p class="text-xs">Posted
                    <time>{{$comment->created_at->diffForHumans()}}</time>
                </p>
            </header>
            <p class="mt-4">{{$comment->body}}</p>
        </div>
    </article>
</x-panel>