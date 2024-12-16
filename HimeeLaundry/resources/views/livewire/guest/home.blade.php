<div>
    <!-- -------- START HEADER 7 w/ text and video ------- -->
    <header class="bg-gradient-dark">
        <div class="page-header min-vh-75" style="background-image: url('{{ asset('assets') }}/guest/img/bg.jpg');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center mx-auto my-auto">
                        <h1 class="text-white">Himee Laundry</h1>
                        <p class="lead mb-4 text-white opacity-8">
                            Practical and High-Quality Laundry Solutions for an Easier Life.
                            <br />
                            Enjoy clean laundry without the hassle!"
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- -------- END HEADER 7 w/ text and video ------- -->
    <div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6 pb-0">

        <section class="pt-4 pb-6" id="count-stats">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-md-6">
                        <h1 class="text-gradient text-info">
                            <span id="state1"
                                countTo="{{ count($LayananLaundry) }}">{{ count($LayananLaundry) }}</span>
                        </h1>
                        <h5 class="mt-3">Services</h5>
                        <p class="">
                            Dengan {{ count($LayananLaundry) }} layanan yang tersedia, yang bisa anda pilih sesuai kebutuhan anda. 
                            dengan harga terbaik dan kualitas terjamin.
                        </p>
                    </div>
                    
                    <div class="col-md-6">
                        <h1 class="text-gradient text-info"><span id="state3" countTo="12">12</span>/6</h1>
                        <h5>Support</h5>
                        <p>
                            kami siap memproses laundry anda 12 jam setiap senin hingga sabtu, 
                            dapatkan layanan yang terbaik dalam waktu singkat.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-5">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row mt-4">
                            @foreach ($JenisLaundry as $j => $jenis)
                                <div class="col-md-6">
                                    <h5 class="bg-dark text-light text-bold p-3">{{ $jenis->jenis_laundry }}</h5>
                                    @foreach ($LayananLaundry as $l => $layanan)
                                        @if ($layanan->id_jenis_laundry == $jenis->id)
                                            <div class="row ms-2 p-1 border-start mb-2 border-secondary">
                                                <span class="text-sm text-secondary font-weight-bold mb-0">{{ $layanan->nama_layanan }} ({{ $layanan->estimasi_pengerjaan }} {{ $layanan->satuan_waktu }})</span>
                                                <span class="font-weight-bold">{{ $layanan->harga_layanan }} / {{ $layanan->satuan_barang }}</span>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-3 mx-auto mt-md-0 mt-5">
                        <div class="position-sticky" style="top:100px !important">
                            <h4 class>Our Services</h4>
                            <h6 class="text-secondary font-weight-normal">
                                temukan layanan laundry yang anda butuhkan, kami menyediakan layanan laundry dengan harga terbaik.
                            </h6>
                        </div>
                    </div>
                </div>
        </section>

        <!-- -------- START Features w/ pattern background & stats & rocket -------- -->
        <section class="pb-5 position-relative bg-gradient-dark mx-n3">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 text-start mb-5 mt-5">
                        <h3 class="text-white z-index-1 position-relative">
                            Our Place
                        </h3>
                        <p class="text-white opacity-8 mb-0">
                            Datang dan buktikan ke alamat kami di Jl. Hasan Mansur No.2024.
                        </p>
                    </div>
                    <div class="col-12 p-2 bg-white rounded">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d266.9633774397286!2d112.9606334629023!3d-2.519611119194795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sid!2sid!4v1732244711272!5m2!1sid!2sid"
                            width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="row">

                </div>
            </div>
        </section>
    </div>
</div>
