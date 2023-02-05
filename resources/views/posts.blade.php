<x-layout>

    @include('_posts-header')

    <main class="mx-auto mt-6 max-w-6xl space-y-6 lg:mt-20">
        @if ($posts->count())
            <x-posts-grid :posts="$posts" />
        @else
            <p class="text-center">No post yet. Please, Check again later.</p>
        @endif
    </main>


    {{-- @foreach ($posts as $post)
        <article>
            <h2><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h2>
            {{ $post->excerpt }}

            <p>
                <x-post-author :post=$post />
                <b>Category: </b>
                <a href="/categories/{{ $post->category->slug }}">
                    {{ $post->category->name }}
                </a>
            </p>

        </article>
    @endforeach --}}
</x-layout>
