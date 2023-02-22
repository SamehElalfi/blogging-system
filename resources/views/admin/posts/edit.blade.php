<x-admin-layout>
    <main class="mx-auto mt-6 max-w-6xl space-y-6 lg:mt-20">
        <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="w-full space-y-8">
                <form class="mt-8 space-y-6" action="/admin/posts/{{ $post->id }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="space-y-4 rounded-md shadow-sm">
                        <x-form.input name="title" :value="$post->title" />
                        <x-form.input name="excerpt" :value="$post->excerpt" />
                        <x-form.textarea name="body" :value="$post->body" />

                        <div>
                            <x-form.label name="category" />

                            <select name="category_id" id="category_id">
                                @foreach (\App\Models\Category::all() as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id || $post->category->id == $category->id ? 'selected' : '' }}>
                                        {{ ucwords($category->name) }}
                                    </option>
                                @endforeach
                            </select>

                            <x-form.error name="category" />
                        </div>

                        <x-form.input name="thumbnail" type="file" />
                        @if ($post->thumbnail !== null)
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                                class="w-64">
                        @endif
                    </div>

                    <x-form.button name="Post" />
                </form>
            </div>
        </div>
    </main>
</x-admin-layout>
