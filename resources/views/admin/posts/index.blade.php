<x-layout>
    <x-setting heading="Published Posts">
        <ul role="list" class="divide-y divide-gray-100">
            @foreach ($posts as $post)
                <li class="flex justify-between gap-x-6 py-5">
                    <div class="flex min-w-0 gap-x-4">
                      <div class="min-w-0 flex-auto">
                          <p class="text-sm font-semibold leading-6 text-gray-900"><a href="/admin/posts/{{ $post->id }}">{{ $post->title }}</a></p>
                          <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $post->author->name }}</p>
                      </div>
                    </div>
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                      <p class="text-sm leading-6 text-gray-900">{{ ucwords($post->category->name) }}</p>
                      <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">{{ $post->created_at->diffForHumans() }}</time></p>
                    </div>
                </li>
            @endforeach
          </ul>
    </x-setting>
</x-layout>