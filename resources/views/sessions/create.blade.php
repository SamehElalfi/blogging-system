<x-layout>
    <main class="mx-auto mt-6 max-w-6xl space-y-6 lg:mt-20">
        <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="w-full max-w-md space-y-8">
                <div>
                    <img class="mx-auto h-12 w-auto" src="/images/logo.svg" alt="Your Company">
                    <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Welcome Back!
                    </h2>
                    <p class="mt-2 text-center text-sm text-gray-600">
                        Don't have an account?
                        <a href="/register" class="font-medium text-indigo-600 hover:text-indigo-500">Create one now!</a>
                    </p>
                </div>

                <form class="mt-8 space-y-6" action="/login" method="POST">
                    @csrf

                    <div class="-space-y-px rounded-md shadow-sm">
                        <x-form.input name="email" type="email" autocomplete="email" />
                        <x-form.input name="password" type="password" autocomplete="current-password" />
                    </div>

                    <x-form.button name="Login" />
                </form>
            </div>
        </div>
    </main>
</x-layout>
