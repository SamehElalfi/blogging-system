<x-layout>
    <main class="mx-auto mt-6 max-w-6xl space-y-6 lg:mt-20">
        <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="w-full space-y-8">
                <form class="mt-8 space-y-6" action="/admin/posts" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="-space-y-px rounded-md shadow-sm">
                        <div>
                            <label for="title" class="sr-only">Title</label>
                            <input id="title" name="title" type="text" autocomplete="title" required
                                class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                value="{{ old('title') }}" placeholder="title">
                            @error('title')
                                <p class="mt-1 mb-4 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="excerpt" class="sr-only">Excerpt</label>
                            <input id="excerpt" name="excerpt" type="text" autocomplete="excerpt" required
                                class="relative block w-full appearance-none rounded-none border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                value="{{ old('excerpt') }}" placeholder="excerpt">
                            @error('excerpt')
                                <p class="mt-1 mb-4 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="body" class="sr-only">Body</label>
                            <textarea name="body" id="body" cols="30" rows="10" placeholder="Body Text" required
                                class="relative block w-full appearance-none rounded-none border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">{{ old('body') }}</textarea>
                            @error('body')
                                <p class="mt-1 mb-4 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="category_id" class="sr-only">category</label>
                            <select name="category_id" id="category_id">
                                @foreach (\App\Models\Category::all() as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ ucwords($category->name) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="mt-1 mb-4 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="thumbnail" class="sr-only">Thumbnail</label>
                            <input type="file" name="thumbnail" id="thumbnail">
                            @error('thumbnail')
                                <p class="mt-1 mb-4 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="group relative flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-layout>
