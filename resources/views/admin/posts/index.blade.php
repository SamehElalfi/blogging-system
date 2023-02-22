<x-admin-layout>
    <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
        <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr
                    class="{{ $loop->odd ? 'border-b bg-white dark:border-gray-700 dark:bg-gray-900' : 'border-b bg-gray-50 dark:border-gray-700 dark:bg-gray-800' }}">
                    <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                        <a href="/posts/{{ $post->slug }}" alt="{{ $post->title }}">{{ $post->title }}</a>
                    </th>
                    <td class="space-x-4 px-6 py-4">
                        <a href="/admin/posts/{{ $post->id }}/edit"
                            class="font-medium text-blue-600 hover:underline dark:text-blue-500">Edit</a>
                        <form action="/admin/posts/{{ $post->id }}" method="post" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="font-medium text-red-400 hover:underline dark:text-red-300">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-admin-layout>
