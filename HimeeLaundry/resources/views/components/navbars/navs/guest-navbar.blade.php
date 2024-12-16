<div>
    <!-- Navbar Transparent -->
    <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent ">
        <div class="container">
            <a class="navbar-brand text-white" href="{{ route('user-home') }}"
                rel="tooltip" title="Home" data-placement="bottom">
                <img class="navbar-toggler-icon mx-1" src="{{ asset('assets') }}/guest/img/logos/logo-1.png" alt="Himee Laundry Logo">
                Himee Laundry
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon mt-2">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </span>
            </button>
            <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0 ms-lg-12 ps-lg-5" id="navigation">
                <ul class="navbar-nav navbar-nav-hover ms-auto">
                    <li class="nav-item dropdown-hover mx-2 me-lg-4 {{ Route::currentRouteName() == 'user-home' ? ' link-active' : '' }}">
                        <a class="nav-link ps-2 d-flex cursor-pointer align-items-center"
                            href="{{ route('user-home') }}">
                            <i class="material-icons opacity-6 me-2 text-md">home</i>
                            Home
                        </a>
                    </li>
    
                    <li class="nav-item dropdown dropdown-hover mx-2 me-4 {{ Route::currentRouteName() == 'user-check' ? ' link-active' : '' }}">
                        <a class="nav-link ps-2 d-flex cursor-pointer align-items-center"
                            href="{{ route('user-check') }}">
                            <i class="fas fa-hourglass opacity-6 me-2 text-md" style="font-size: 13px !important;"></i>
                            Check Laundry
                        </a>
                    </li>
    
                    <li class="nav-item my-auto ms-3 ms-lg-0 bg-sm-dark">
                        @if ( Route::currentRouteName() == 'login')
                            <a href="{{ route('login') }}" class="btn btn-sm bg-white border border-white mb-0 me-1 mt-2 mt-md-0 text-dark">
                                ADMIN
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                            class="btn btn-sm bg-transparent border border-white mb-0 me-1 mt-2 mt-md-0 text-white">
                            ADMIN
                        </a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
</div>