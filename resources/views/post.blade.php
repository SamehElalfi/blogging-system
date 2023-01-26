<x-layout>
    <article>
        <h2>{{ $post->title }}</h2>
        <datetime>{{ gmdate('d M Y', $post->date) }}</datetime>
        {!! $post->body !!}
    </article>

    <a href="/">Go Back</a>
</x-layout>
