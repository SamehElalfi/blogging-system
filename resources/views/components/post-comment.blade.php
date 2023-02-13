@props(['comment'])

<article class="rounded-xl border border-gray-200 bg-gray-100 p-4">
    <div class="flex items-start space-x-4">
        <img src="https://i.pravatar.cc/100?img={{ $comment->author->id }}" alt="{{ $comment->author->username }}"
            class="rounded-xl" />
        <div>
            <h3 class="text-sm">
                <a href="/?author={{ $comment->author->username }}">
                    {{ $comment->author->name }}
                </a>
            </h3>

            <header class="mb-1 block text-xs text-gray-400">
                Published <time>{{ $comment->created_at->diffForHumans() }}</time>
            </header>

            <p>
                {{ $comment->body }}
            </p>
        </div>
    </div>
</article>
