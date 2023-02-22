<x-layout>
    <main class="mx-auto mt-6 max-w-6xl space-y-6 lg:mt-20">
        <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="w-full max-w-md space-y-8">
                <div>
                    <img class="mx-auto h-12 w-auto" src="/images/logo.svg" alt="Your Company">
                    <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Sign up a new account
                    </h2>
                    <p class="mt-2 text-center text-sm text-gray-600">
                        Or
                        <a href="/login" class="font-medium text-indigo-600 hover:text-indigo-500">Sign in to your
                            existing account</a>
                    </p>
                </div>

                <form class="mt-8 space-y-6" action="/register" method="POST">
                    @csrf

                    <div class="space-y-2 rounded-md shadow-sm">
                        <x-form.input name="name" />
                        <x-form.input name="username" />
                        <x-form.input name="email" type="email" autocomplete="email" />
                        <x-form.input name="password" type="password" autocomplete="current-password" />
                        <x-form.input name="password_confirmation" type="password" autocomplete="password_confirmation"
                            placeholder="Confirm Password" />
                    </div>

                    <div class="flex items-center">
                        <div class="ml-2 block text-xs text-gray-900">By clicking Register, you
                            agree to our Terms, Privacy Policy and Cookies Policy.</div>
                    </div>

                    <x-form.button name="Register" />
                </form>
            </div>
        </div>
    </main>
</x-layout>
