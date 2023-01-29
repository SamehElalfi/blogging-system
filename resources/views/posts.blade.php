<x-layout>
    @foreach ($posts as $post)
        <article>
            <h2><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
            {{ $post->excerpt }}
        </article>
    @endforeach
</x-layout>
