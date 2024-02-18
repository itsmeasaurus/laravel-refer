<x-layout>
    <x-setting heading="Publish a New Post">
        <form method="POST" action="/admin/posts/store" class="mt-10" enctype="multipart/form-data">
            @csrf
                <x-form.input name="title" required></x-form>
                <x-form.input name="slug" required></x-form>
                <x-form.input name="excerpt" required></x-form>
                <x-form.input name="thumbnail" type="file" requried></x-form>
                <x-form.textarea name="body"></x-form>
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
                                selected={{ $category->id == old('category_id') ? 'selected' : ''}}
                                >{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>
                    <x-form.error name="category_id"></x-form>
                </x-form>
                <x-form.button>Create</x-form>
        </form>
    </x-setting>
</x-layout>