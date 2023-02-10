@if (session()->has('success'))
    <div class="flash-message fixed bottom-4 right-4 rounded bg-blue-500 px-4 py-2 text-sm text-white transition">
        <p>{{ session('success') }}</p>
    </div>
@endif
