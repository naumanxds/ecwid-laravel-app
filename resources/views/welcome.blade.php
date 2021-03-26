<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <div class="flex items-center justify-center mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Login') }}
            </a>
        </div>
        <div class="flex items-center justify-center mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                {{ __('Register') }}
            </a>
        </div>
    </x-auth-card>
</x-guest-layout>
