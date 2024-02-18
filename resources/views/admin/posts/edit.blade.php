<x-layout>
    <x-setting heading="Edit Post : {{$post->title}}">
        <form id="update_form" method="POST" action="/admin/posts/{{ $post->id }}" class="mt-10" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
                <x-form.input name="title" :value="old('title',$post->title)" required></x-form>
                <x-form.input name="slug" :value="old('slug',$post->slug)" required></x-form>
                <x-form.input name="excerpt" :value="old('excerpt',$post->excerpt)" required></x-form>
                <div class="flex">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail',$post->thumbnail)"></x-form>
                    <img src="{{asset('storage/'.$post->thumbnail)}}" alt="" class="rounded-xl ml-2" width="200">
                </div>
                <x-form.textarea name="body">{{ old('body',$post->body) }}</x-form>
                <x-form.field>
                    <x-form.label name="category"></x-form>
                    <select
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                        id="category_id"
                        name="category_id"
                    >
                        @foreach (\App\Models\Category::all() as $category)
                            <option
                                value="{{ $category->id }}"
                                selected={{ $category->id == old('category_id', $post->category->id) ? 'selected' : ''}}
                                >{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>
                    <x-form.error name="category_id"></x-form>
                </x-form>
                <div class="flex">
                    <x-form.button form="update_form">Update</x-form>
                    {{-- <form id="delete_form" action="/admin/posts/{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <x-form.button :color="'red'"
                                        class="ml-2"
                                        form="delete_form"
                                        >Delete</x-form>
                    </form> --}}
                </div>  
        </form>
    </x-setting>
</x-layout>