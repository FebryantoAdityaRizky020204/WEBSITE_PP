<div>
    <footer class="footer pt-5 mt-5">
        <div class="container">
            <div class=" row">
                <div class="col-md-3 mb-4 ms-auto">
                    <div>
                        <a href="./index.html">
                            <img src="{{ asset('assets') }}/guest/img/logos/logo-1.png" class="mb-3 footer-logo" alt="main_logo">
                        </a>
                        <h6 class="font-weight-bolder mb-4">Himee Laundry</h6>
                    </div>
                    <div>
                        <ul class="d-flex flex-row ms-n3 nav">
                            <li class="nav-item">
                                <a class="nav-link pe-1" href="javascript:void(0)">
                                    <i class="fab fa-facebook text-lg opacity-8"></i>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link pe-1" href="javascript:void(0)">
                                    <i class="fab fa-twitter text-lg opacity-8"></i>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link pe-1" href="javascript:void(0)">
                                    <i class="fab fa-instagram text-lg opacity-8"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-2 col-sm-6 col-6 mb-4">
                    <div>
                        <h6 class="text-sm">Resources</h6>
                        <ul class="flex-column ms-n3 nav">
                            <li class="nav-item">
                                <a class="nav-link" href="https://iradesign.io/" target="_blank">
                                    Illustrations
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="https://www.creative-tim.com/bits" target="_blank">
                                    Bits & Snippets
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="https://www.creative-tim.com/affiliates/new" target="_blank">
                                    Affiliate Program
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-2 col-sm-6 col-6 mb-4">
                    <div>
                        <h6 class="text-sm">Help & Support</h6>
                        <ul class="flex-column ms-n3 nav">
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.creative-tim.com/contact-us" target="_blank">
                                    Contact Us
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="https://www.creative-tim.com/knowledge-center"
                                    target="_blank">
                                    Knowledge Center
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="https://services.creative-tim.com/?ref=ct-mk2-footer"
                                    target="_blank">
                                    Custom Development
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="https://www.creative-tim.com/sponsorships" target="_blank">
                                    Sponsorships
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="col-md-2 col-sm-6 col-6 mb-4 me-auto">

                </div>

                <div class="col-md-2 col-sm-6 col-6 mb-4">

                </div>

                <div class="col-12">
                    <div class="text-center">
                        <p class="text-dark mt-4 mb-1 text-sm font-weight-normal">
                            All rights reserved. Copyright ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            Material Kit by <a href="https://www.creative-tim.com" target="_blank">Creative
                                Tim</a>.
                        <p class="text-secondary text-sm font-weight-normal">
                            USED BY SITE TEAM
                            <!-- [Site Team] Aditya Rizky Febryanto & Boyke Danan Filtranda -->
                        </p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--   Core JS Files   -->
    <script src="{{ asset('assets') }}/guest/js/core/popper.min.js" type="text/javascript"></script>
    <script src="{{ asset('assets') }}/guest/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{ asset('assets') }}/guest/js/plugins/perfect-scrollbar.min.js"></script>
    <!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
    <script src="{{ asset('assets') }}/guest/js/plugins/countup.min.js"></script>
    <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
    <script src="{{ asset('assets') }}/guest/js/material-kit.min.js?v=3.0.4" type="text/javascript"></script>
    <script>
        // get the element to animate
        var element = document.getElementById('count-stats');
        var elementHeight = element.clientHeight;

        // listen for scroll event and call animate function

        document.addEventListener('scroll', animate);

        // check if element is in view
        function inView() {
            // get window height
            var windowHeight = window.innerHeight;
            // get number of pixels that the document is scrolled
            var scrollY = window.scrollY || window.pageYOffset;
            // get current scroll position (distance from the top of the page to the bottom of the current viewport)
            var scrollPosition = scrollY + windowHeight;
            // get element position (distance from the top of the page to the bottom of the element)
            var elementPosition = element.getBoundingClientRect().top + scrollY + elementHeight;

            // is scroll position greater than element position? (is element in view?)
            if (scrollPosition > elementPosition) {
                return true;
            }

            return false;
        }

        var animateComplete = true;
        // animate element when it is in view
        function animate() {

            // is element in view?
            if (inView()) {
                if (animateComplete) {
                    if (document.getElementById('state1')) {
                        const countUp = new CountUp('state1', document.getElementById("state1").getAttribute(
                            "countTo"));
                        if (!countUp.error) {
                            countUp.start();
                        } else {
                            console.error(countUp.error);
                        }
                    }
                    if (document.getElementById('state2')) {
                        const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute(
                            "countTo"));
                        if (!countUp1.error) {
                            countUp1.start();
                        } else {
                            console.error(countUp1.error);
                        }
                    }
                    if (document.getElementById('state3')) {
                        const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute(
                            "countTo"));
                        if (!countUp2.error) {
                            countUp2.start();
                        } else {
                            console.error(countUp2.error);
                        };
                    }
                    animateComplete = false;
                }
            }
        }

        if (document.getElementById('typed')) {
            var typed = new Typed("#typed", {
                stringsElement: '#typed-strings',
                typeSpeed: 90,
                backSpeed: 90,
                backDelay: 200,
                startDelay: 500,
                loop: true
            });
        }
    </script>
    <script>
        if (document.getElementsByClassName('page-header')) {
            window.onscroll = debounce(function() {
                var scrollPosition = window.pageYOffset;
                var bgParallax = document.querySelector('.page-header');
                var oVal = (window.scrollY / 3);
                bgParallax.style.transform = 'translate3d(0,' + oVal + 'px,0)';
            }, 6);
        }
    </script>
</div>
