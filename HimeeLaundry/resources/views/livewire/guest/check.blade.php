<div>
    <!-- -------- START HEADER 7 w/ text and video ------- -->
    <header class="bg-gradient-dark">
        <div class="page-header min-vh-25" style="background-image: url('{{ asset('assets') }}/guest/img/bg.jpg');">
            <span class="mask bg-gradient-dark opacity-6"></span>
        </div>
    </header>
    <!-- -------- END HEADER 7 w/ text and video ------- -->
    <div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6 pb-0">
        <section>
            <div class="container py-4">
                <div class="row">
                    <div class="col-md-6 mx-auto d-flex justify-content-start flex-column" wire:ignore>
                        <h4 class="text-center mb-4">Check Your Laundry</h4>
                        <form role="form" id="contact-form" wire:submit.prevent="doFindTransaksi" autocomplete="off">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-dynamic mb-4">
                                            <label class="form-label" for="nama_pelanggan">Nama</label>
                                            <input class="form-control text-capitalize" aria-label="Name..."
                                                type="text" name="nama_pelanggan" wire:model='nama_pelanggan'>
                                            @error('nama_pelanggan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 ps-2">
                                        <div class="input-group input-group-dynamic mb-4">
                                            <label class="form-label" for="nomor_telepon">Nomor Telepon</label>
                                            <input type="number" class="form-control" aria-label="Nomor Telepon..."
                                                name="nomor_telepon" wire:model='nomor_telepon'>
                                            @error('nomor_telepon')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="input-group input-group-dynamic">
                                        <label class="form-label text-uppercase" for="id_transaksi">ID Transaksi</label>
                                        <input type="string" class="form-control" aria-label="Nomor Telepon..."
                                            name="id_transaksi" wire:model='id_transaksi'>
                                        @error('id_transaksi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn bg-gradient-dark w-100">
                                            Check
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <div class="text-center">
                            <h2 class="text-dark text-uppercase border-2 border p-3 border-dark rounded">
                                @if ($find_transaksi != null)
                                    {{ $find_transaksi->status_laundry }}
                                @else
                                    .........
                                @endif
                            </h2>
                        </div>
                        <div class="col-12">
                            <div class="page-content page-container" id="page-content">
                                <div class="row">
                                    @if ($find_transaksi != null)
                                        <div class="col-lg-12">
                                            <div class="timeline p-2 block mb-2">
                                                <div class="tl-item">
                                                    <div class="tl-dot b-primary"></div>
                                                    <div class="tl-content">
                                                        <div class="">Laundry Transaction Created</div>
                                                        <div>
                                                            <p class="text-sm my-1 font-weight-bold">
                                                                <span
                                                                    class="font-weight-bolder">{{ $find_transaksi->id_transaksi }}</span>
                                                                <br />
                                                                {{ $find_transaksi->pelanggan->nama_pelanggan }} |
                                                                {{ $find_transaksi->pelanggan->nomor_telepon }} <br />
                                                                @currency($find_transaksi->pemasukan->pemasukan) | <span
                                                                    class="text-dark text-bold">{{ $find_transaksi->pemasukan->status_pembayaran }}</span><br />
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!-- Section: Timeline -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
