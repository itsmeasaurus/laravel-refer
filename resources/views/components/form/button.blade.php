@props(['color'=>'blue'])
<div class="mb-6">
    <button type="submit" {{ $attributes->merge(['class' => "bg-$color-400 text-white rounded py-2 px-4 hover:bg-$color-500"]) }}>
        {{$slot}}
    </button>
</div>