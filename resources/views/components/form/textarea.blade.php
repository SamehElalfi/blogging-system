@props(['name'])

<div>
    <x-form.label name="{{ $name }}" />

    <textarea name="{{ $name }}" id="{{ $name }}" cols="30" rows="10" placeholder="{{ $name }}"
        required
        class="relative block w-full appearance-none rounded-none border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">{{ old($name) }}</textarea>

    <x-form.error name="{{ $name }}" />
</div>
