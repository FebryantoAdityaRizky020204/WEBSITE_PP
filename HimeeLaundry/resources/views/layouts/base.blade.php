<!--
=========================================================
* Material Dashboard 2 - v3.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com) & UPDIVISION (https://www.updivision.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by www.creative-tim.com & www.updivision.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

@if (auth()->user())
    <!DOCTYPE html>
    <html lang='en'>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets') }}/img/apple-icon.png">
        <link rel="icon" type="image/png" href="{{ asset('assets') }}/img/logo-1.png">
        <title>
            Himee Laundry
        </title>

        <!-- Metas -->
        @if (env('IS_DEMO'))
            <meta name="keywords"
                content="creative tim, updivision, material, html dashboard, laravel, livewire, laravel livewire, alpine.js, html css dashboard laravel, material dashboard laravel, livewire material dashboard, material admin, livewire dashboard, livewire admin, web dashboard, bootstrap 5 dashboard laravel, bootstrap 5, css3 dashboard, bootstrap 5 admin laravel, material dashboard bootstrap 5 laravel, frontend, responsive bootstrap 5 dashboard, material dashboard, material laravel bootstrap 5 dashboard" />
            <meta name="description"
                content="Dozens of handcrafted UI components, Laravel authentication, register & profile editing, Livewire & Alpine.js" />
            <meta itemprop="name" content="Material Dashboard 2 Laravel Livewire by Creative Tim & UPDIVISION" />
            <meta itemprop="description"
                content="Dozens of handcrafted UI components, Laravel authentication, register & profile editing, Livewire & Alpine.js" />
            <meta itemprop="image"
                content="https://s3.amazonaws.com/creativetim_bucket/products/600/original/material-dashboard-laravel-livewire.jpg" />
            <meta name="twitter:card" content="product" />
            <meta name="twitter:site" content="@creativetim" />
            <meta name="twitter:title" content="Material Dashboard 2 Laravel Livewire by Creative Tim & UPDIVISION" />
            <meta name="twitter:description"
                content="Dozens of handcrafted UI components, Laravel authentication, register & profile editing, Livewire & Alpine.js" />
            <meta name="twitter:creator" content="@creativetim" />
            <meta name="twitter:image"
                content="https://s3.amazonaws.com/creativetim_bucket/products/600/original/material-dashboard-laravel-livewire.jpg" />
            <meta property="fb:app_id" content="655968634437471" />
            <meta property="og:title" content="Material Dashboard 2 Laravel Livewire by Creative Tim & UPDIVISION" />
            <meta property="og:type" content="article" />
            <meta property="og:url" content="https://www.creative-tim.com/live/material-dashboard-laravel-livewire" />
            <meta property="og:image"
                content="https://s3.amazonaws.com/creativetim_bucket/products/600/original/material-dashboard-laravel-livewire.jpg" />
            <meta property="og:description"
                content="Dozens of handcrafted UI components, Laravel authentication, register & profile editing, Livewire & Alpine.js" />
            <meta property="og:site_name" content="Creative Tim" />
        @endif
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css"
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
        <!-- Nucleo Icons -->
        <link href="{{ asset('assets') }}/css/nucleo-icons.css" rel="stylesheet" />
        <link href="{{ asset('assets') }}/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
        <!-- CSS Files -->
        <link id="pagestyle" href="{{ asset('assets') }}/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
            integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        

            <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
            <style>
                /* Chrome, Safari, Edge, Opera */
                input::-webkit-outer-spin-button,
                input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
                }
                
                /* Firefox */
                input[type=number] {
                -moz-appearance: textfield;
                }
            </style>
        @livewireStyles
    </head>

    <body
        class="g-sidenav-show {{ Route::currentRouteName() == 'register' || Route::currentRouteName() == 'static-sign-up' ? '' : 'bg-gray-200' }}">

        {{ $slot }}

        <script src="{{ asset('assets') }}/js/core/popper.min.js"></script>
        <script src="{{ asset('assets') }}/js/core/bootstrap.min.js"></script>
        <script src="{{ asset('assets') }}/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="{{ asset('assets') }}/js/plugins/smooth-scrollbar.min.js"></script>
        @stack('js')
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ asset('assets') }}/js/material-dashboard.min.js?v=3.0.0"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
            integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
        @stack('scripts')
        @livewireScripts
    </body>

    </html>
@else
    {{-- ============================================================ --}}
    <!--
    =========================================================
    * Material Kit 2 - v3.0.4
    =========================================================
    
    * Product Page:  https://www.creative-tim.com/product/material-kit
    * Copyright 2023 Creative Tim (https://www.creative-tim.com)
    * Coded by www.creative-tim.com
    
    * * Used and Edit by Aditya Rizky Febryanto & Boyke Danan Filtranda for personal use
    
     =========================================================
    
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image/png" href="{{ asset('assets') }}/guest/img/logos/logo-1.png">
        <title>
            HIMEE LAUNDRY - GUEST
        </title>
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css"
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
        <!-- Nucleo Icons -->
        <link href="{{ asset('assets') }}/guest/css/nucleo-icons.css" rel="stylesheet" />
        <link href="{{ asset('assets') }}/guest/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
        <!-- CSS Files -->
        <link id="pagestyle" href="{{ asset('assets') }}/guest/css/material-kit.css?v=3.0.4" rel="stylesheet" />
        <!-- file css tambahan -->
        <link rel="stylesheet" href="{{ asset('assets') }}/guest/css/mine.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
            integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            /* Chrome, Safari, Edge, Opera */
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
            }
            
            /* Firefox */
            input[type=number] {
            -moz-appearance: textfield;
            }
        </style>
        @livewireStyles
        @livewireScripts
    </head>

    <body class="about-us bg-gray-200">
        {{ $slot }}

        @livewireScripts
    </body>

    </html>
@endif