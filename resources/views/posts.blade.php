<x-layout>
    @foreach ($posts as $post)
        <article>
            <h2><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h2>
            {{ $post->excerpt }}

            <p>
                <b>Category: </b>
                <a href="/categories/{{ $post->category->slug }}">
                    {{ $post->category->name }}
                </a>
            </p>

        </article>
    @endforeach
</x-layout>
