@props(['name'])

<div>
    <x-form.label name="{{ $name }}" />

    <input {{ $attributes }} id="{{ $name }}" name="{{ $name }}" required
        class="relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
        value="{{ old($name) }}" placeholder="{{ ucwords($name) }}">

    <x-form.error name="{{ $name }}" />
</div>
