@props(['name'])
<div class="mb-6">
    <x-form.label name="{{$name}}"></x-label>
    <input class="border border-gray-400 p-2 w-full rounded"
            name={{$name}}
            id={{$name}}
            {{ $attributes(['value' => old($name)]) }}>
    @error($name)
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>