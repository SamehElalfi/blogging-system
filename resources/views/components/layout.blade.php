<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:items-center md:justify-between">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 flex items-center space-x-2 md:mt-0">

                @guest
                    <a href="/login" class="text-xs font-bold uppercase">Login</a>
                    <a href="/register"
                        class="group relative flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Register
                    </a>
                @else
                    @can('admin')
                        <a href="/admin/posts" class="text-xs font-bold uppercase">Dashboard</a>
                    @endcan

                    <form action="/logout" method="post">
                        @csrf

                        <x-form.button name="Logout" />
                    </form>
                @endguest
            </div>
        </nav>

        {{ $slot }}

        <footer class="mt-16 rounded-xl border border-black border-opacity-5 bg-gray-100 py-16 px-10 text-center">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="mt-3 text-sm">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative mx-auto inline-block rounded-full lg:bg-gray-200">

                    <form method="POST" action="/newsletter" class="text-sm lg:flex">
                        @csrf

                        <div class="flex items-center lg:py-3 lg:px-5">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" name="email" type="text" placeholder="Your email address"
                                class="py-2 pl-4 focus-within:outline-none lg:bg-transparent lg:py-0">
                        </div>

                        <button type="submit"
                            class="mt-4 rounded-full bg-blue-500 py-3 px-8 text-xs font-semibold uppercase text-white transition-colors duration-300 hover:bg-blue-600 lg:mt-0 lg:ml-3">
                            Subscribe
                        </button>
                    </form>
                </div>
                @error('email')
                    <p class="mt-1 mb-4 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </footer>
    </section>

    <x-flash />


    <script>
        // When the user select a category redirect the browser to
        // the selected category page
        document.addEventListener('DOMContentLoaded', function(e) {
            function redirectAfterCategoryChange(e) {
                const currentURL = new URL(window.location.href);
                const searchParams = new URLSearchParams(currentURL.search)

                // return to page 1 when change category
                searchParams.delete('page');

                if (e.target.value === 'all') {
                    searchParams.delete('category');
                } else {
                    searchParams.set('category', e.target.value)
                }

                window.location = `/?${searchParams.toString()}`;
            }

            const allCategoriesDropdown = document.querySelector('#all-categories');
            if (allCategoriesDropdown) {
                allCategoriesDropdown.addEventListener(
                    'change',
                    redirectAfterCategoryChange
                );
            }

            // Hide flash messages after 4 seconds from page load
            // First select all flash messages in the DOM and convert them into
            // array of HTMLElements
            const flashMessages = [...document.querySelectorAll('.flash-message')];

            // Loop on each element and set timeout to make the message transparent
            // then remove it from the DOM completely
            flashMessages.forEach(message => {
                setTimeout(() => {
                    message.classList.add('opacity-0');
                    setTimeout(() => {
                        message.remove()
                    }, 1000);
                }, 4000);
            });
        });
    </script>

</body>
