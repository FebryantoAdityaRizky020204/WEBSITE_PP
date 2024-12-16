<x-layouts.base>
    @if (auth()->user())
    <x-navbars.sidebar></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-navbars.navs.auth></x-navbars.navs.auth>
        {{ $slot }}
        <x-footers.auth></x-footers.auth>
    </main>
    {{-- <x-plugins></x-plugins> --}}
    @else
    <x-navbars.navs.guest-navbar></x-navbars.navs.guest-navbar>
    {{ $slot }}
    <x-footers.guest-footers></x-footers.guest-footers>
    {{-- <x-plugins></x-plugins> --}}
    @endif
</x-layouts.base>