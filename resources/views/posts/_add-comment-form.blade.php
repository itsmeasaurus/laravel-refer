@auth
    <x-panel>
        <form action="/posts/{{ $post->slug }}/comment" method="POST">
            @csrf
            <header class="flex items-center space-x-5">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}">
                <p>Do you have any thought on this ?</p>
            </header>
            <textarea
                name="body"
                rows="5"
                placeholder="write down what you are thinkging!"
                class="focus:outline-none focus:ring mt-3 p-3 text-xs w-full"></textarea>
            @error('body')
                <p class="text-xs text-red-500">{{$message}}</p>
            @enderror
            <x-submit-button>POST</x-submit-button>
        </form>
    </x-panel>
@else
    <p class="text-xs font-semibold">
        <a href="/register">Register</a> or <a href="/login">Login</a> to leave a comment!
    </p>
@endauth
