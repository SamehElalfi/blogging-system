<select class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold" id="all-categories">
    <option value="category" disabled selected>Category</option>
    <option value="all">All</option>

    @foreach ($categories as $category)
        <option value="{{ $category->slug }}"
            {{ isset($currentCategory) && $category->slug === $currentCategory ? 'selected' : '' }}>
            {{ ucwords($category->name) }}
        </option>
    @endforeach
</select>
