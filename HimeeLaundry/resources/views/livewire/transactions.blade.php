<div>
    <div class="container-fluid py-4">

        <div class="row mt-2">
            <div class="col-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header d-flex flex-row justify-content-between">
                        <h5 class="mb-0">Transactions</h5>

                        <button type="button" class="btn btn-sm bg-gradient-dark mt-0 mb-0 me-4" data-bs-toggle="modal"
                            data-bs-target="#tambahTransaksi" id="buttonAddTransaksi">
                            <i class="material-icons text-sm">add</i>
                            &nbsp;&nbsp;New
                        </button>
                    </div>
                    <div class="d-flex flex-row justify-content-between mx-4">
                        <div class="mt-3 ">
                            <input wire:model.live="search" type="text" class="form-control text-uppercase" placeholder="Search...">
                        </div>
                    </div>
                    <div class="table-responsive mx-3">
                        <table class="table table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                        <a class="text-xs text-secondary text-uppercase">
                                        <span>No</span>
                                        </a>
                                    </th>
                                    <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                        <a wire:click="sortBy('id')" class="text-xs text-secondary text-uppercase">
                                            <span>ID</span>
                                        </a>
                                    </th>
                                    <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                        <a class="text-xs text-secondary text-uppercase">
                                        <span>Name</span>
                                        </a>
                                    </th>
                                    <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                        <a class="text-xs text-secondary text-uppercase">
                                            <span>Pembayaran / Status</span>
                                        </a>
                                    </th>
                                    <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                        <a class="text-xs text-secondary text-uppercase">
                                            <span>Status</span>
                                        </a>
                                    </th>
                                    <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                        <span class="text-xs text-secondary text-uppercase">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (count($transaksi) != 0)
                                    @php
                                        $noT = 0;
                                    @endphp
                                    @foreach ($transaksi as $t => $tr)
                                        <tr>
                                            <td class="text-sm font-weight-normal align-middle border-bottom">
                                                {{ ++$noT }}
                                            </td>
                                            <td class="text-sm font-weight-normal align-middle">
                                                {{ $tr->id_transaksi }}
                                            </td>
                                            <td class="text-sm font-weight-normal align-middle text-capitalize">
                                                {{ $tr->pelanggan->nama_pelanggan }}
                                            </td>
                                            <td class="text-sm font-weight-normal align-middle border-bottom">
                                                <span class="text-bold">@currency($tr->pemasukan->pemasukan)</span> &nbsp;
                                                <select 
                                                    class="badge badge-sm border-0 {{ $tr->pemasukan->status_pembayaran == 'Belum Lunas' ? 'bg-gradient-warning' : 'bg-gradient-success' }}" 
                                                        name="e_status_pembayaran.{{ $t }}" id="e_status_pembayaran.{{ $t }}" 
                                                        wire:model.blur='e_status_pembayaran.{{ $t }}'
                                                        wire:change='updateStatusPembayaran({{ $t }}, {{ $tr->id }})'>
                                                    <option class="text-dark" value="Belum Lunas">Belum Lunas</option>
                                                    <option class="text-dark" value="Lunas">Lunas</option>
                                                </select>
                                            </td>
                                            <td class="text-sm font-weight-normal align-middle border-bottom">
                                                <select 
                                                    class="badge badge-sm border-0  
                                                        {{ $tr->status_laundry == 'Sedang Diproses' ? 'bg-gradient-warning' : '' }} 
                                                        {{ $tr->status_laundry == 'Selesai' ? 'bg-gradient-success' : '' }} 
                                                        {{ $tr->status_laundry == 'Sudah Diambil' ? 'bg-gradient-dark' : '' }}" 
                                                        name="e_status_laundry.{{ $t }}" id="e_status_laundry.{{ $t }}" 
                                                        wire:model.blur='e_status_laundry.{{ $t }}' 
                                                        wire:change='updateStatusLaundry({{ $t }}, {{ $tr->id }})'>
                                                    <option class="text-dark" value="Sedang Diproses">Sedang Diproses</option>
                                                    <option class="text-dark" value="Selesai">Selesai</option>
                                                    <option class="text-dark" value="Sudah Diambil">Sudah Diambil</option>
                                                </select>
                                            </td>
                                            <td class="text-sm font-weight-normal align-middle border-bottom">
                                                <div class="col">
                                                    <button type="button"
                                                        class="btn btn-sm btn-info p-1 px-2 text-center btn-link" 
                                                        wire:click="detailTransaksi('{{ $tr->id_transaksi }}')"
                                                        >
                                                        <i style="font-size: 15px" class="fa fa-magnifying-glass"
                                                            aria-hidden="true"></i>
                                                    </button>

                                                    <button type="button"
                                                        class="btn btn-sm btn-danger px-2 p-1 text-center btn-link"
                                                        data-bs-toggle="modal" data-bs-target="#hapusTransaksi"
                                                        wire:click="showDeleteTransaksi({{ $tr->id }})">
                                                        <i style="font-size: 15px" class="fa fa-trash"
                                                            aria-hidden="true"></i>
                                                    </button>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">
                                            <span class="d-block text-center pt-2 text-bold text-small">
                                                DATA KOSONG
                                            </span>
                                        </td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                    <div id="datatable-bottom">
                        <div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal Tambah Transaksi-->
    <div wire:ignore.self class="modal fade" data-bs-backdrop="static" id="tambahTransaksi" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="tambahTransaksiLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambahTransaksiLabel">TRANSAKSI BARU</h1>
                    <button type="button" class="btn-close" wire:click='resetInputs' data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form wire:submit="storeTransaksi" class=''>
                    <div class="modal-body">
                        <div class="form-group">
                            <p class="bg-dark text-center text-white my-3 text-sm py-1 text-bold">
                                PELANGGAN
                            </p>
                        </div>

                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label for="nama_pelanggan">Nama Pelanggan</label>
                                <input wire:model='nama_pelanggan' type="string"
                                    class="form-control border border-2 p-2 text-capitalize" id="nama_pelanggan"
                                    placeholder="Enter name" autocomplete="off">
                                
                                @error('nama_pelanggan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="nomor_telepon">Nomor Telepon</label>
                                <input wire:model='nomor_telepon' type="number"
                                    class="form-control border border-2 p-2" id="nomor_telepon"
                                    placeholder="Nomor Telepon" min="0">
                                @error('nomor_telepon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <p class="bg-dark text-center text-white my-3 text-sm py-1 text-bold">
                                LAUNDRY
                            </p>
                        </div>

                        <div class="row">
                            @if ($countLaundryService != 0)
                                @for ($i = 0; $i < $countLaundryService; $i++)
                                    <div class="row mt-1">
                                        <div class="form-group col-12 col-md-6">
                                            <label for="id_layanan{{ $i }}">Pilihan Service
                                                {{ $i + 1 }}</label>
                                            <select class="form-select border border-2 p-2"
                                                aria-label="Default select example"
                                                wire:model.live="id_layanan.{{ $i }}"
                                                id="id_layanan{{ $i }}">
                                                <option selected>--</option>
                                                @foreach ($layananLaundry as $LL => $layanan)
                                                    <option value="{{ $layanan->id }}">
                                                        {{ $layanan->nama_layanan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('id_layanan.{{ $i }}')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-9 col-md-6">
                                            <label for="nilai_arang{{ $i }}">Jumlah/Berat Laundry </label>
                                            <input wire:model.live="nilai_barang.{{ $i }}" type="number"
                                                class="form-control border border-2 p-2"
                                                id="nilai_arang{{ $i }}"
                                                placeholder="Jumlah/Berat Laundry" min="0">
                                            @error('nilai_barang.{{ $i }}')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                @endfor

                                <div class="col mt-2">
                                    @if ($countLaundryService > 1)
                                        <button type="button"
                                            class="btn btn-sm btn-danger px-2 p-1 text-center btn-link"
                                            wire:click="removeService()">
                                            <i style="font-size: 15px" class="fa fa-trash" aria-hidden="true"></i>
                                            Hapus Service
                                        </button>
                                    @endif

                                    <button type="button" class="btn btn-sm btn-dark px-2 p-1 text-center btn-link"
                                        wire:click="addService()">
                                        <i style="font-size: 15px" class="fa fa-plus" aria-hidden="true"></i>
                                        Tambah Service
                                    </button>

                                    <button type="button"
                                        class="btn btn-sm btn-primary px-2 p-1 text-center btn-link"
                                        wire:click="calculateTotalPayment">
                                        <i style="font-size: 15px" class="fas fa-gears"></i>
                                        PROCESS
                                    </button>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <p class="bg-dark text-center text-white my-3 text-sm py-1 text-bold">
                                PEMBAYARAN
                            </p>
                        </div>

                        <div class="row mt-1">
                            <div class="form-group col-12 col-md-6">
                                <label for="pemasukan">Jumlah Pembayaran</label>
                                <input wire:model='pemasukan' type="number"
                                    class="form-control bg-success text-white text-bold border border-2 p-2"
                                    id="pemasukan" placeholder="Rp. 000000" disabled>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="status_pembayaran">Status Pembayaran</label>
                                <select class="form-select border border-2 p-2" aria-label="Default select example"
                                    wire:model='status_pembayaran'>
                                    <option>--</option>
                                    <option value="Belum Lunas">Belum Lunas</option>
                                    <option value="Lunas">Lunas</option>
                                </select>
                                @error('status_pembayaran')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            data-bs-target="#tambahTransaksi" wire:click='resetInputs'>Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Hapus Transaksi-->
    <div wire:ignore.self class="modal fade" id="hapusTransaksi" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="hapusServiceLabel" aria-hidden="true">
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
                    <form wire:submit="store" class=''>
                        <div class="col">
                            <div class="col mt-3 text-center">
                                <button type="button" class="btn btn-danger btn-sm"
                                    wire:click="deleteTransaksi">
                                    <i style="font-size: 15px" class="fas fa-trash" aria-hidden="true"></i>
                                    HAPUS
                                </button>

                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"
                                    data-bs-target="#hapusTransaksi" aria-label="Close"
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
</div>


@push('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $('#tambahTransaksi').modal('hide');
            $('#hapusTransaksi').modal('hide');
        });

    </script>
    @if(session('do') === 'addTransaksi')
    <script>
        $(document).ready(function () {
            $('#buttonAddTransaksi').click();
        });
    </script>
    @endif
@endpush
