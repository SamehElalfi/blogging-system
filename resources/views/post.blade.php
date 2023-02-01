<x-layout>
    <article>
        <h2>{{ $post->title }}</h2>
        <datetime>{{ gmdate('d M Y', $post->date) }}</datetime>
        <p>{!! $post->body !!}</p>
        <p>
            <b>Category: </b><a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
        </p>
    </article>

    <a href="/">Go Back</a>
</x-layout>
