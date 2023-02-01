<x-layout>
    @foreach ($posts as $post)
        <article>
            <h2><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h2>
            {{ $post->excerpt }}

            {{-- The next few lines will cause a n+1 problem --}}
            {{-- for every post, make SQL query to get the category of the post --}}
            {{-- TODO: Fix n+1 problem of posts' categories --}}
            <p>
                <b>Category: </b>
                <a href="/category/{{ $post->category->slug }}">
                    {{ $post->category->name }}
                </a>
            </p>

        </article>
    @endforeach
</x-layout>
