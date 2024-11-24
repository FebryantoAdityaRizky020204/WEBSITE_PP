<x-layouts.base>
    @if (in_array(request()->route()->getName(), [
            'static-sign-in',
            'static-sign-up',
            'register',
            'login',
            'password.forgot',
            'reset-password',
            'user-home',
            'user-check',
        ]))
        @if (!auth()->user())
        <x-navbars.navs.guest-navbar></x-navbars.navs.guest-navbar>
        @endif
        
        
        {{ $slot }}
        @if (!auth()->user())
        <x-footers.guest-footers></x-footers.guest-footers>
        @endif
    @else
        @if (auth()->user())
        <x-navbars.sidebar></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <x-navbars.navs.auth></x-navbars.navs.auth>

            {{ $slot }}

            <x-footers.auth></x-footers.auth>
        </main>
        <x-plugins></x-plugins>
        @else
        {{ $slot }}
        <x-plugins></x-plugins>
        @endif
    @endif
</x-layouts.base>
