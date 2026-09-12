<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WelfareHub | Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen items-center justify-center bg-[#F4F7F6] px-4 py-8">
    
    <div class="w-full max-w-md rounded-2xl bg-[#0C2F23] px-8 py-10 shadow-2xl sm:px-10">

        {{-- Logo --}}
        <div class="flex justify-center">
            <img src="{{ asset('images/logo.png') }}"
                    alt="logo"
                    class="w-[125px] h-[125px]">
        </div>

        {{-- Heading --}}
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-bold text-white">
                Welcome back
            </h2>

            <p class="mt-3 text-sm text-[#D1E7DE]">
                Sign in to manage members, fees and meetings.
            </p>
        </div>

        {{-- Validation errors --}}
        <x-validation-errors class="p-4 mb-5 text-sm text-red-600 rounded-lg bg-red-50" />

        {{-- Session status --}}
        @session('status')
            <div class="p-4 mb-5 text-sm font-medium text-green-700 rounded-lg bg-green-50">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div>
                <label
                    for="email"
                    class="block mb-2 font-medium text-white text-s"
                >
                    Email address
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter your email address"
                    required
                    autofocus
                    autocomplete="username"
                    class="block w-full rounded-xl border border-[#D1D5DB]
                           bg-white px-4 py-3 text-[#0C2F23]
                           placeholder:text-[#94A3B8]
                           outline-none transition
                           focus:border-[#F97316]
                           focus:ring-2 focus:ring-[#F97316]/25"
                >
            </div>

            {{-- Password --}}
            <div class="mt-5">
                <label
                    for="password"
                    class="block mb-2 font-medium text-white text-s"
                >
                    Password
                </label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                    autocomplete="current-password"
                    class="block w-full rounded-xl border border-[#D1D5DB]
                           bg-white px-4 py-3 text-[#0C2F23]
                           placeholder:text-[#94A3B8]
                           outline-none transition
                           focus:border-[#F97316]
                           focus:ring-2 focus:ring-[#F97316]/25"
                >
            </div>

            {{-- Login button --}}
            <button
                type="submit"
                class="mt-7 w-full rounded-xl bg-[#F97316]
                       px-4 py-3 font-semibold text-white
                       transition duration-200
                       hover:bg-[#EA580C]
                       focus:outline-none focus:ring-2
                       focus:ring-[#F97316] focus:ring-offset-2
                       focus:ring-offset-[#0C2F23]"
            >
                Sign In
            </button>
        </form>

        <p class="mt-7 text-center text-xs text-[#9FBDB2]">
            © {{ date('Y') }} WelfareHub. All rights reserved.
        </p>
    </div>
</body>
</html>