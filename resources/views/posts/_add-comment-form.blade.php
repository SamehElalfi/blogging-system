{{-- This code displays a form for authenticated users to post a comment. It includes a profile image, a textarea for the comment, and a submit button. --}}
@auth
    <form action="/posts/{{ $post->slug }}/comments" method="post" class="mb-16">
        @csrf

        <header class="flex items-center">
            <img src="https://i.pravatar.cc/100?u={{ auth()->id() }}" alt="{{ auth()->user()->username }}"
                class="h-12 w-12 rounded-full" />
            <span class="ml-4">Wants to participate?</span>
        </header>

        <textarea class="my-4 w-full rounded border border-gray-200 p-4" name="body" cols="30" rows="10"
            placeholder="Quick, thing of something to say!" required>{{ old('body') }}</textarea>

        @error('body')
            <p class="mt-1 mb-4 text-xs text-red-500">{{ $message }}</p>
        @enderror

        <div>
            <button type="submit" class="rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600">
                Post
            </button>
        </div>
    </form>
@else
    <div class="rounded-xl border border-gray-200 bg-gray-100 p-4">
        <a href="/register" class="text-blue-500 underline">
            Register
        </a> or
        <a href="/login" class="text-blue-500 underline">Login</a>
        to leave a comment
    </div>
@endauth
