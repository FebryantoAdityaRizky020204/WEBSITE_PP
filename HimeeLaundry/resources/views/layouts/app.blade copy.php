<x-layouts.base>
    @if (in_array(request()->route()->getName(), [
            'static-sign-in',
            'static-sign-up',
            'register',
            'login',
            'password.forgot',
            'reset-password',
            'user-home',
            'user-check'
        ]))
        {{-- <div class="container position-sticky z-index-sticky top-0">
            <div class="row">
                <div class="col-12">
                    <x-navbars.navs.guest></x-navbars.navs.guest>
                </div>
            </div>
        </div> --}}
        @if (!auth()->user())
        <x-navbars.navs.guest-navbar></x-navbars.navs.guest-navbar>
        @endif
        
        
        {{ $slot }}
        {{-- <main class="main-content  mt-0">
            <div class="page-header page-header-bg align-items-start min-vh-100">
                <span class="mask bg-gradient-dark opacity-6"></span>
                <x-footers.guest></x-footers.guest>
            </div>
        </main> --}}
        @if (!auth()->user())
        <x-footers.guest-footers></x-footers.guest-footers>
        @endif

        {{-- @if (in_array(request()->route()->getName(), ['static-sign-in', 'login', 'password.forgot', 'reset-password']))
            @if (!auth()->user())
                <x-navbars.navs.guest-navbar></x-navbars.navs.guest-navbar>
            @endif


            {{ $slot }}
            <main class="main-content  mt-0">
                <div class="page-header page-header-bg align-items-start min-vh-100">
                        <span class="mask bg-gradient-dark opacity-6"></span>
                <x-footers.guest></x-footers.guest>
                </div>
            </main>
            @if (!auth()->user())
                <x-footers.guest-footers></x-footers.guest-footers>
            @endif
        @else
            {{ $slot }}
        @endif --}}
    @else
        @if (!auth()->user())
        <x-navbars.sidebar></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <x-navbars.navs.auth></x-navbars.navs.auth>

            {{ $slot }}

            <x-footers.auth></x-footers.auth>
        </main>
        <x-plugins></x-plugins>
        @else
            {{ $slot }}
        @endif
    @endif
</x-layouts.base>
