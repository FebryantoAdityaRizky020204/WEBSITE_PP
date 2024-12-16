<div>
    <div class="container-fluid py-4">

        <div class="row mt-2">
            <div class="col-12 col-md-6">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header d-flex flex-row justify-content-between pb-2">
                        <h5 class="mb-0">Detail Transaksi</h5>
                        <h6 class="bg-dark text-white rounded px-1 py-0">{{ $transaksi->id_transaksi }}</h6>
                    </div>
                    <div class="col-12 position-relative">
                        <div class="card card-plain">
                            <div class="card-body p-3 ps-4">
                                <hr class="horizontal my-1">
                                <ul class="list-group">
                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm text-capitalize">
                                        <strong class="text-dark">Nama Pelanggan:</strong>
                                        &nbsp; <span></span>{{ $transaksi->pelanggan->nama_pelanggan }}
                                    </li>
                                    <li class="list-group-item border-0 ps-0 text-sm">
                                        <strong class="text-dark">Nomor Telepon:</strong>
                                        &nbsp; {{ $transaksi->pelanggan->nomor_telepon }}
                                    </li>
                                    <li class="list-group-item border-0 ps-0 text-sm">
                                        <strong class="text-dark">Total Pembayaran:</strong>
                                        &nbsp; @currency($transaksi->pemasukan->pemasukan)
                                    </li>
                                    <li class="list-group-item border-0 ps-0 text-sm">
                                        <strong class="text-dark">Tanggal Transaksi:</strong>
                                        &nbsp; {{ $transaksi->created_at->format('d-m-Y H:i') }}
                                    </li>

                                    <li class="list-group-item border-0 ps-0 text-sm">
                                        <strong class="text-dark">Status Pembayaran:</strong>
                                        &nbsp;
                                        <span
                                            class="badge badge-sm {{ $transaksi->pemasukan->status_pembayaran == 'Lunas' ? 'bg-gradient-success' : 'bg-gradient-warning' }}">
                                            {{ $transaksi->pemasukan->status_pembayaran }}
                                        </span>
                                    </li>
                                    <li class="list-group-item border-0 ps-0 text-sm">
                                        <strong class="text-dark">Status Laundry:</strong>
                                        &nbsp;
                                        <span
                                            class="badge badge-sm 
                                                {{ $transaksi->status_laundry == 'Sedang Diproses' ? 'bg-gradient-warning' : '' }} 
                                                {{ $transaksi->status_laundry == 'Selesai' ? 'bg-gradient-success' : '' }} 
                                                {{ $transaksi->status_laundry == 'Sudah Diambil' ? 'bg-gradient-dark' : '' }}">
                                            {{ $transaksi->status_laundry }}
                                        </span>
                                    </li>
                                    <li class="list-group-item border-0 text-sm mt-2 bg-secondary p-2 rounded g-1">
                                        <a href="{{ route('transactions') }}"
                                            class="badge badge-sm text-dark bg-gradient-light mt-0 mb-0 me-1 border-0">
                                            KEMBALI
                                        </a>

                                        <button type="button"
                                            class="badge badge-sm bg-gradient-dark mt-0 mb-0 me-1 border-0"
                                            data-bs-toggle="modal" data-bs-target="#cetakTransaksi"
                                            wire:click="showEditTransaksi">
                                            CETAK
                                        </button>

                                        <button type="button"
                                            class="badge badge-sm bg-gradient-warning mt-0 mb-0 me-1 border-0"
                                            data-bs-toggle="modal" data-bs-target="#editTransaksi"
                                            wire:click="showEditTransaksi">
                                            EDIT
                                        </button>

                                        <button type="button"
                                            class="badge badge-sm bg-gradient-danger mt-0 mb-0 me-1 border-0"
                                            data-bs-toggle="modal" data-bs-target="#hapusTransaksi"
                                            wire:click="showDeleteTransaksi">
                                            HAPUS
                                        </button>

                                    </li>
                                </ul>
                            </div>
                        </div>
                        <hr class="vertical dark">
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header d-flex flex-row justify-content-between pb-2">
                        <h5 class="mb-0">Layanan Laundry</h5>
                    </div>
                    <div class="col-12 position-relative">
                        <div class="table-responsive mx-3">
                            <table class="table table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                            <span class="text-xs text-secondary text-uppercase">
                                                Layanan
                                            </span>
                                        </th>
                                        <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                            <span class="text-xs text-secondary text-uppercase">
                                                Berat/Jumlah
                                            </span>
                                        </th>
                                        <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                            <span class="text-xs text-secondary text-uppercase">
                                                Estimasi Selesai
                                            </span>
                                        </th>
                                        <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                            <span class="text-xs text-secondary text-uppercase">
                                                Pembayaran
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $layanan = $transaksi->transaksiLayanan;
                                        @endphp
                                    @if ($layanan)
                                    @foreach ($layanan as $l => $ly)
                                            <tr>
                                                <td class="text-sm font-weight-normal align-middle border-bottom">
                                                    {{ $ly->layanan->nama_layanan }}
                                                </td>
                                                <td class="text-sm font-weight-normal align-middle border-bottom">
                                                    {{ $ly->nilai_barang }} {{ $ly->layanan->satuan_barang }}
                                                </td>
                                                <td class="text-sm font-weight-normal align-middle border-bottom">
                                                    @if ($ly->layanan->satuan_waktu == 'Hari')
                                                        {{ $transaksi->created_at->addDay($ly->layanan->estimasi_pengerjaan)->format('d-m-Y') }}
                                                    @elseif($ly->layanan->satuan_waktu == 'Jam')
                                                        {{ $transaksi->created_at->addHours($ly->layanan->estimasi_pengerjaan)->format('d-m-Y H:i') }}
                                                    @endif
                                                </td>
                                                <td class="text-sm font-weight-normal align-middle border-bottom">
                                                    @currency($ly->layanan->harga_layanan * $ly->nilai_barang)
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr></tr>
                                        <tr class="mt-2 border-top border-dark">
                                            <td colspan="3" class="text-sm font-weight-normal align-middle">
                                                <strong>Total Pembayaran</strong>
                                            </td>
                                            <td class="text-sm font-weight-normal align-middle">
                                                <strong>@currency($transaksi->pemasukan->pemasukan)</strong>
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="3">
                                                <span class="d-block text-center pt-2 text-bold text-small">DATA
                                                    KOSONG</span>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <hr class="vertical dark">
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 my-3">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header d-flex flex-row justify-content-between pb-2">
                        <h5 class="mb-0">Rincian Laundry</h5>

                        <button type="button" class="btn btn-sm bg-gradient-dark mt-0 mb-0 me-4" data-bs-toggle="modal"
                            data-bs-target="#tambahRincianLaundry">
                            <i class="material-icons text-sm">add</i>
                            &nbsp;&nbsp;Add
                        </button>
                    </div>
                    <div class="col-12 position-relative">
                        <div class="table-responsive mx-3">
                            <table class="table table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                            <span class="text-xs text-secondary text-uppercase">
                                                Nama Barang
                                            </span>
                                        </th>
                                        <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                            <span class="text-xs text-secondary text-uppercase">
                                                Jumlah
                                            </span>
                                        </th>
                                        <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                            <span class="text-xs text-secondary text-uppercase">
                                                Actions
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $rincian = $transaksi->rincianLaundry;
                                    @endphp
                                    @if ($rincian)

                                        @foreach ($rincian as $r => $rnc)
                                            <tr>
                                                <td class="text-sm font-weight-normal align-middle border-bottom">
                                                    {{ $rnc->nama_barang }}
                                                </td>
                                                <td class="text-sm font-weight-normal align-middle border-bottom">
                                                    {{ $rnc->jumlah_barang }}
                                                </td>
                                                <td class="text-sm font-weight-normal align-middle border-bottom">
                                                    <button type="button"
                                                        class="btn btn-sm btn-warning p-1 px-2 text-center btn-link"
                                                        data-bs-toggle="modal" data-bs-target="#editRincianLaundry"
                                                        wire:click="showEditRincian({{ $rnc->id }})">
                                                        <i style="font-size: 15px" class="fa fa-pen-to-square"
                                                            aria-hidden="true"></i>
                                                    </button>

                                                    <button type="button"
                                                        class="btn btn-sm btn-danger px-2 p-1 text-center btn-link"
                                                        data-bs-toggle="modal" data-bs-target="#hapusRincianLaundry"
                                                        wire:click="showDeleteRincian({{ $rnc->id }})">
                                                        <i style="font-size: 15px" class="fa fa-trash"
                                                            aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3">
                                                <span class="d-block text-center pt-2 text-bold text-small">DATA
                                                    KOSONG</span>
                                            </td>
                                        </tr>
                                    @endif



                                </tbody>
                            </table>
                        </div>
                        <hr class="vertical dark">
                    </div>
                </div>
            </div>


        </div>
    </div>

    <!-- Modal Tambah Rincian Laundry -->
    <div wire:ignore.self class="modal fade" id="tambahRincianLaundry" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahRincianLaundryLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambahRincianLaundryLabel">TAMBAH RINCIAN LAUNDRY</h1>
                    <button type="button" class="btn-close btn-dark bg-dark" data-bs-dismiss="modal"
                        aria-label="Close" wire:click='resetInputs'></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addRincianLaundry" class=''>

                        <div class="form-group col-12">
                            <label for="nama_barang">Nama Barang</label>
                            <input wire:model='nama_barang' type="string" class="form-control border border-2 p-2"
                                id="nama_barang" placeholder="Masukkan Jenis Laundry" autocomplete="off">
                            @error('nama_barang')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="jumlah_barang">Jumlah Barang</label>
                            <input wire:model='jumlah_barang' type="number" class="form-control border border-2 p-2"
                                id="jumlah_barang" placeholder="Masukkan Jenis Laundry" autocomplete="off">
                            @error('nama_barang')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col">
                            <div class="col mt-3">
                                <button type="submit" class="btn btn-dark btn-sm">
                                    <i class="material-icons text-sm">add</i> Tambah Rincian
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm my-1 btn-secondary" data-bs-dismiss="modal"
                        data-bs-target="#tambahRincianLaundry" wire:click="resetInputs">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Rincian Laundry -->
    <div wire:ignore.self class="modal fade" id="editRincianLaundry" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="editRincianLaundryLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editRincianLaundryLabel">EDIT RINCIAN LAUNDRY</h1>
                    <button type="button" class="btn-close btn-dark bg-dark" data-bs-dismiss="modal"
                        aria-label="Close" wire:click='resetInputs'></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="editRincianLaundry" class=''>

                        <div class="form-group col-12">
                            <label for="nama_barang">Nama Barang</label>
                            <input wire:model='nama_barang' type="string" class="form-control border border-2 p-2"
                                id="nama_barang" placeholder="Masukkan Jenis Laundry" autocomplete="off">
                            @error('nama_barang')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="jumlah_barang">Jumlah Barang</label>
                            <input wire:model='jumlah_barang' type="number" class="form-control border border-2 p-2"
                                id="jumlah_barang" placeholder="Masukkan Jenis Laundry" autocomplete="off">
                            @error('jumlah_barang')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col">
                            <div class="col mt-3">
                                <button type="submit" class="btn btn-warning btn-sm">
                                    <i class="material-icons text-sm">add</i> Edit Rincian
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm my-1 btn-secondary" data-bs-dismiss="modal"
                        data-bs-target="#editRincianLaundry" wire:click="resetInputs">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Hapus Rincian Laundry -->
    <div wire:ignore.self class="modal fade" id="hapusRincianLaundry" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="hapusRincianLaundryLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="col-12 text-center">
                        <i class="material-icons text-danger" style="font-size: 160px">
                            error_outline
                        </i>

                        <p class="text-sm">
                            Anda Yakin Ingin Menghapus Rincian<br />
                            <span class="text-bold">{{ $nama_barang }}</span>
                        </p>
                    </div>
                    <form wire:submit="store" class=''>
                        <div class="col">
                            <div class="col mt-3 text-center">
                                <button type="button" class="btn btn-danger btn-sm"
                                    wire:click="deleteRincianLaundry">
                                    <i style="font-size: 15px" class="fas fa-trash" aria-hidden="true"></i>
                                    HAPUS
                                </button>

                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"
                                    data-bs-target="#hapusRincianLaundry" aria-label="Close"
                                    wire:click='resetInputs'>
                                    <i style="font-size: 15px" class="fas fa-xmark"></i>
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Hapus Transaksi-->
    <div wire:ignore.self class="modal fade" id="hapusTransaksi" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="hapusTransaksiLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="col-12 text-center">
                        <i class="material-icons text-danger" style="font-size: 160px">
                            error_outline
                        </i>

                        <p class="text-sm">
                            Anda Yakin Ingin Menghapus Transaksi<br />
                            <span class="text-bold">{{ $teks_operation }}</span>
                        </p>
                    </div>
                    <form wire:submit.prevent="deleteTransaksi" class=''>
                        <div class="col">
                            <div class="col mt-3 text-center">
                                <button type="button" class="btn btn-danger btn-sm" wire:click="deleteTransaksi">
                                    <i style="font-size: 15px" class="fas fa-trash" aria-hidden="true"></i>
                                    HAPUS
                                </button>

                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"
                                    data-bs-target="#hapusTransaksi" aria-label="Close" wire:click='resetInputs'>
                                    <i style="font-size: 15px" class="fas fa-xmark"></i>
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Transaksi -->
    <div wire:ignore.self class="modal fade" id="editTransaksi" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="editTransaksiLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editTransaksiLabel">EDIT TRANSAKSI</h1>
                    <button type="button" class="btn-close btn-dark bg-dark" data-bs-dismiss="modal"
                        aria-label="Close" wire:click='resetInputs'></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="editTransaksi" class=''>

                        <div class="form-group col-12">
                            <label for="nama_pelanggan">Nama Pelanggan</label>
                            <input wire:model='nama_pelanggan' type="string"
                                class="form-control border border-2 p-2" id="nama_pelanggan"
                                placeholder="Masukkan Jenis Laundry" autocomplete="off" disabled>

                            @error('nama_pelanggan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="nomor_telepon">Nomor Telepon</label>
                            <input wire:model='nomor_telepon' type="string" class="form-control border border-2 p-2"
                                id="nomor_telepon" placeholder="Masukkan Jenis Laundry" autocomplete="off" disabled>
                            @error('nomor_telepon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="status_pembayaran">Status Pembayaran</label>
                            <select class="form-select border  border-2 p-2" name="status_pembayaran"
                                id="status_pembayaran" wire:model='status_pembayaran'>
                                <option class="text-dark" value="Belum Lunas">Belum Lunas</option>
                                <option class="text-dark" value="Lunas">Lunas</option>
                            </select>

                            @error('status_pembayaran')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="status_laundry">Status Laundry</label>
                            <select class="form-select border border-2 p-2" name="status_laundry" id="status_laundry"
                                wire:model='status_laundry'>
                                <option class="text-dark" value="Sedang Diproses">Sedang Diproses</option>
                                <option class="text-dark" value="Selesai">Selesai</option>
                                <option class="text-dark" value="Sudah Diambil">Sudah Diambil</option>
                            </select>

                            @error('status_laundry')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col">
                            <div class="col mt-3">
                                <button type="submit" class="btn btn-warning btn-sm">
                                    <i style="font-size: 15px" class="fa fa-pen-to-square" aria-hidden="true"></i>
                                    Edit Transaksi
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm my-1 btn-secondary" data-bs-dismiss="modal"
                        data-bs-target="#editTransaksi" wire:click="resetInputs">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Cetak Transaksi -->
    <div wire:ignore.self class="modal fade" id="cetakTransaksi" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="cetakTransaksiLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cetakTransaksiLabel">CETAK TRANSAKSI</h1>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm my-1 btn-dark" onclick="printToPDF()">
                        Cetak
                    </button>
                    <button type="button" class="btn btn-sm my-1 btn-secondary" data-bs-dismiss="modal"
                        data-bs-target="#cetakTransaksi" wire:click="resetInputs">
                        Batal
                    </button>
                </div>
                <div class="modal-body bg-dark">
                    <div class="my-2">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-12">
                                <div class="card rounded-0" id="buktiTransaksiPrint">
                                    <div class="d-flex flex-row p-2 pb-0 justify-content-between">
                                        <div class="d-flex flex-column">
                                            <span class="font-weight-bold">BUKTI TRANSAKSI</span>
                                            <small>Kode Transaksi : <span
                                                    class="text-bold">{{ $transaksi->id_transaksi }}</span></small>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <span class="font-weight-bold text-end">HIMEE LAUNDRY</span>
                                            <small class="text-end">Jl. Hasan Mansur No.xx</small>
                                            <small class="text-end">Telp: 081275849384</small>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="table-responsive p-2 pt-0 pb-0 border-bottom">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr class="text-sm">
                                                    <td class="pb-0">Yth. Pelanggan</td>
                                                </tr>
                                                <tr class="text-sm">
                                                    <td class="font-weight-bold text-capitalize">
                                                        {{ $transaksi->pelanggan->nama_pelanggan }}
                                                        <br>TELP: {{ $transaksi->pelanggan->nomor_telepon }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="products p-2 py-0 border-bottom">
                                        <table class="table table-borderless text-sm">
                                            <tbody>
                                                <tr class="add">
                                                    <td class="text-dark text-bold">Layanan</td>
                                                    <td class="text-dark text-bold">Jumlah</td>
                                                    <td class="text-dark text-bold">Harga</td>
                                                    <td class="text-center text-dark text-bold">Total</td>
                                                </tr>
                                                @php
                                                    $layanan = $transaksi->transaksiLayanan;
                                                @endphp
                                                @if ($layanan)
                                                    @foreach ($layanan as $l => $ly)
                                                        <tr class="content text-dark">
                                                            <td>{{ $ly->layanan->nama_layanan }}</td>
                                                            <td>{{ $ly->nilai_barang }}
                                                                {{ $ly->layanan->satuan_barang }}</td>
                                                            <td>{{ $ly->layanan->harga_layanan }}</td>
                                                            <td class="text-center">@currency($ly->layanan->harga_layanan * $ly->nilai_barang)</td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="products p-2 py-0 border-bottom mt-2">
                                        <table class="table table-borderless text-sm">
                                            <tbody>
                                                <tr class="text-dark text-bold">
                                                    <td class="py-1">Total Pembayaran</td>
                                                    <td class="py-1 text-end">@currency($transaksi->pemasukan->pemasukan)</td>
                                                </tr>
                                                <tr class="text-dark text-bold">
                                                    <td class="py-1">Status Pembayaran</td>
                                                    <td class="py-1 text-end">
                                                        {{ $transaksi->pemasukan->status_pembayaran }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="products p-2 py-0 border-bottom mt-2">
                                        <table class="table table-borderless text-sm">
                                            <tbody>
                                                <tr class="text-dark text-bold">
                                                    <td class="py-1">Layanan</td>
                                                    <td class="py-1 text-end">Estimasi Pengambilan</td>
                                                </tr>

                                                @php
                                                    $layanan = $transaksi->transaksiLayanan;
                                                    $c = 0
                                                @endphp
                                                @if ($layanan)
                                                    @foreach ($layanan as $l => $ly)
                                                    @php
                                                        $c += 70;
                                                    @endphp
                                                        <tr class="text-dark">
                                                            <td class="py-1">{{ $ly->layanan->nama_layanan }} ({{ $ly->layanan->estimasi_pengerjaan }} {{ $ly->layanan->satuan_waktu }})</td>
                                                            <td class="py-1 text-end">
                                                                @if ($ly->layanan->satuan_waktu == 'Hari')
                                                                    {{ $transaksi->created_at->addDay($ly->layanan->estimasi_pengerjaan)->format('d-m-Y') }}
                                                                @elseif($ly->layanan->satuan_waktu == 'Jam')
                                                                    {{ $transaksi->created_at->addHours($ly->layanan->estimasi_pengerjaan)->format('d-m-Y H:i') }}
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="products p-2 py-0 border-bottom">
                                        <table class="table table-borderless text-sm m-2">
                                            <tbody>
                                                <tr class="text-dark text-bold">
                                                    <td class="py-1 text-center">
                                                        Cek Status Pesanan Anda Di
                                                        <u>himeelaundry.mwebs.id</u>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="address p-2 py-0">
                                        <table class="table table-borderless text-sm">
                                            <tbody>
                                                <tr class="">
                                                    <td class="text-bold">
                                                        Himee Laundry
                                                        @php
                                                            use Carbon\Carbon;
                                                            Carbon::setLocale('id');
                                                            $formattedTime = Carbon::now()->translatedFormat(
                                                                'd F Y H:i:s',
                                                            );
                                                        @endphp
                                                        <br> {{ $formattedTime }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>


@push('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $('#tambahRincianLaundry').modal('hide');
            $('#editRincianLaundry').modal('hide');
            $('#editTransaksi').modal('hide');
            $('#hapusRincianLaundry').modal('hide');
            $('#hapusTransaksi').modal('hide');
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
        function printToPDF() {
            console.log({{$c}});
            const element = document.getElementById("buktiTransaksiPrint");

            const options = {
                margin: 1,
                filename: 'bukti_transaksi_' + '{{ $transaksi->id_transaksi }}' + '.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'px',
                    format: [466, {{520+$c}}],
                    orientation: 'portrait'
                }
            };

            html2pdf().set(options).from(element).save();
            $('#cetakTransaksi').modal('hide');
        }
    </script>
@endpush
