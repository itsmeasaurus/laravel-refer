@props(['name'])
<div class="mb-6">
    <x-form.label name="{{$name}}"></x-label>
    <textarea class="border border-gray-400 p-2 w-full block rounded"
            name="{{$name}}"
            id="{{$name}}"
            cols="30"
            rows="10"
            {{$attributes}}
    >{{ $slot ?? old($name) }}
    </textarea>
    <x-form.error name="{{$name}}"></x-form>
</div>