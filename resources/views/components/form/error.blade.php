@props(['name'])

@error($name)
    <p class="mt-1 mb-4 text-xs text-red-500">{{ $message }}</p>
@enderror
