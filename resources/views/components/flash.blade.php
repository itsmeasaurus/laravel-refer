@if (session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
        class="bg-blue-500 bottom-3 fixed px-3 py-6 right-3 rounded text-white text-xs">
        <p>{{ session('success') }}</p>
    </div>
@endif
