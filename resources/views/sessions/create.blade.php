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
                        <div>
                            <label for="email-address" class="sr-only">Email address</label>
                            <input id="email-address" name="email" type="email" autocomplete="email" required
                                class="relative block w-full appearance-none rounded-none border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                value="{{ old('email') }}" placeholder="Email address">
                            @error('email')
                                <p class="mt-1 mb-4 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="sr-only">Password</label>
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                required
                                class="relative block w-full appearance-none rounded-none border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                placeholder="Password">
                            @error('password')
                                <p class="mt-1 mb-4 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <button type="submit"
                            class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-layout>