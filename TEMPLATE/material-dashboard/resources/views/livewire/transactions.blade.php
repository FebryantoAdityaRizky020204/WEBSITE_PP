<div>
    <div class="container-fluid py-4">

        <div class="row mt-2">
            <div class="col-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header d-flex flex-row justify-content-between">
                        <h5 class="mb-0">Transactions</h5>

                        <button type="button" class="btn btn-sm bg-gradient-dark mt-0 mb-0 me-4" data-bs-toggle="modal"
                            data-bs-target="#tambahTransaksi">
                            <i class="material-icons text-sm">add</i>
                            &nbsp;&nbsp;New Transaction
                        </button>
                    </div>
                    <div class="d-flex flex-row justify-content-between mx-4">
                        <div class="d-flex mt-3 align-items-center justify-content-center">
                            <p class="text-secondary pt-2">Show&nbsp;&nbsp;</p>
                            <select wire:model.live="perPage" class="form-control mb-2" id="entries">
                                <option value="5">-- 5 --</option>
                                <option selected value="10">-- 10 --</option>
                                <option value="15">-- 15 --</option>
                                <option value="20">-- 20 --</option>
                            </select>
                            <p class="text-secondary pt-2">&nbsp;&nbsp;entries</p>
                        </div>
                        <div class="mt-3 ">
                            <input wire:model.live="search" type="text" class="form-control" placeholder="Search...">
                        </div>
                    </div>
                    <div class="table-responsive mx-3">
                        <table class="table table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                        <a wire:click="sortBy('id')" class="text-xs text-secondary text-uppercase">
                                            <span>No</span>

                                            <span>
                                                <i class="fas fa-sort-up cursor-pointer"></i>
                                            </span>
                                        </a>
                                    </th>
                                    <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                        <a wire:click="sortBy('id')" class="text-xs text-secondary text-uppercase">
                                            <span>ID</span>
                                        </a>
                                    </th>
                                    <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                        <a wire:click="sortBy('name')" class="text-xs text-secondary text-uppercase">
                                            <span>Name</span>

                                            <span>
                                                <i class="fas fa-sort cursor-pointer"></i>
                                            </span>
                                        </a>
                                    </th>
                                    <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                        <a class="text-xs text-secondary text-uppercase">
                                            <span>Services Name</span>
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

                                <tr>
                                    <td class="text-sm font-weight-normal align-middle border-bottom">
                                        1
                                    </td>
                                    <td class="text-sm font-weight-normal align-middle">
                                        PK00102
                                    </td>
                                    <td class="text-sm font-weight-normal align-middle">
                                        John Doe
                                    </td>
                                    <td class="text-sm font-weight-normal align-middle border-bottom">
                                        <span class="text-bold">Cuci Kering</span> &nbsp;
                                        <span class="badge badge-sm bg-gradient-success">10KG @60000</span>
                                    </td>
                                    <td class="text-sm font-weight-normal align-middle border-bottom">
                                        <span class="badge badge-sm bg-gradient-success">SELESAI</span>
                                    </td>
                                    <td class="text-sm font-weight-normal align-middle border-bottom">
                                        <div class="col">
                                            <button type="button"
                                                class="btn btn-sm btn-info p-1 px-2 text-center btn-link"
                                                data-bs-toggle="modal" data-bs-target="#lihatTransaksi">
                                                <i style="font-size: 15px" class="fa fa-magnifying-glass"
                                                    aria-hidden="true"></i>
                                            </button>

                                            <button type="button"
                                                class="btn btn-sm btn-warning p-1 px-2 text-center btn-link"
                                                data-bs-toggle="modal" data-bs-target="#editTransaksi">
                                                <i style="font-size: 15px" class="fa fa-pen-to-square"
                                                    aria-hidden="true"></i>
                                            </button>

                                            <button type="button"
                                                class="btn btn-sm btn-danger px-2 p-1 text-center btn-link"
                                                data-bs-toggle="modal" data-bs-target="#hapusTransaksi">
                                                <i style="font-size: 15px" class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </div>

                                    </td>
                                </tr>

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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit="store" class=''>
                    <div class="modal-body">
                        <div class="form-group">
                            <p class="bg-dark text-center text-white my-3 text-sm py-1 text-bold">
                                PELANGGAN
                            </p>
                        </div>

                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label for="exampleInputname">Nama Pelanggan</label>
                                <input wire:model.blur='name' type="name" class="form-control border border-2 p-2"
                                    id="exampleInputname" placeholder="Enter name">
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="exampleInputname">Nomor Telepon</label>
                                <input wire:model.blur='name' type="name" class="form-control border border-2 p-2"
                                    id="exampleInputname" placeholder="Enter name">
                            </div>
                        </div>

                        <div class="form-group">
                            <p class="bg-dark text-center text-white my-3 text-sm py-1 text-bold">
                                LAUNDRY
                            </p>
                        </div>

                        @for ($i = 0; $i < $countLaundryService; $i++)
                            <div class="row mt-1">
                                <div class="form-group col-12 {{ ($countLaundryService == 1) ? 'col-md-5' : 'col-md-6' }}">
                                    <label for="exampleInputname">Pilihan Service {{ $i }}</label>
                                    <input wire:model.blur='name' type="name"
                                        class="form-control border border-2 p-2" id="exampleInputname"
                                        placeholder="Enter name">
                                </div>
                                <div class="form-group col-9 {{ ($countLaundryService == 1) ? 'col-md-5' : 'col-md-6' }}">
                                    <label for="exampleInputname">Jumlah/Berat Laundry </label>
                                    <input wire:model.blur='name' type="name"
                                        class="form-control border border-2 p-2" id="exampleInputname"
                                        placeholder="Enter name">
                                </div>
                                <div class="form-group col-md-2 col-3 align-self-end">
                                    @if ($countLaundryService == 1)
                                        <button type="button"
                                            class="btn btn-sm btn-dark px-2 p-1 text-center btn-link"
                                            wire:click="changeCountLaundryService('add')">
                                            <i style="font-size: 15px" class="fa fa-plus" aria-hidden="true"></i>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endfor

                        @if ($countLaundryService > 1)
                            <div class="col mt-2">
                                <button type="button" class="btn btn-sm btn-danger px-2 p-1 text-center btn-link"
                                    wire:click="changeCountLaundryService('dec')">
                                    <i style="font-size: 15px" class="fa fa-trash" aria-hidden="true"></i>
                                    Hapus Service
                                </button>

                                <button type="button" class="btn btn-sm btn-dark px-2 p-1 text-center btn-link"
                                    wire:click="changeCountLaundryService('add')">
                                    <i style="font-size: 15px" class="fa fa-plus" aria-hidden="true"></i>
                                    Tambah Service
                                </button>
                            </div>
                        @endif

                        <div class="form-group">
                            <p class="bg-dark text-center text-white my-3 text-sm py-1 text-bold">
                                PEMBAYARAN
                            </p>
                        </div>

                        <div class="row mt-1">
                            <div class="form-group col-12 col-md-6">
                                <label for="exampleInputname">Jumlah Pembayaran</label>
                                <input wire:model.blur='name' type="name"
                                    class="form-control bg-success text-white text-bold border border-2 p-2"
                                    id="exampleInputname" placeholder="Rp. 000000" disabled value="Rp. 000">
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="exampleInputname">Status Pembayaran</label>
                                <select class="form-select border border-2 p-2" aria-label="Default select example"
                                    wire:model.blur='isPer'>
                                    <option selected disabled>--</option>
                                    <option value="1">Lunas</option>
                                    <option value="2">Belum Lunas</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            data-bs-target="#tambahTransaksi">Cancel</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Modal Lihat Transaksi-->
    <div class="modal fade" id="lihatTransaksi" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="lihatTransaksiLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="lihatTransaksiLabel">LIHAT</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit="store" class=''>
                    <div class="modal-body">
                        <div class="form-group">
                            <p class="bg-dark text-center text-white my-3 text-sm py-1 text-bold">
                                PELANGGAN
                            </p>
                        </div>

                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label for="exampleInputname">Nama Pelanggan</label>
                                <input wire:model.blur='name' type="name" class="form-control border border-2 p-2"
                                    id="exampleInputname" placeholder="Enter name" disabled>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="exampleInputname">Nomor Telepon</label>
                                <input wire:model.blur='name' type="name" class="form-control border border-2 p-2"
                                    id="exampleInputname" placeholder="Enter name" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <p class="bg-dark text-center text-white my-3 text-sm py-1 text-bold">
                                LAUNDRY
                            </p>
                        </div>

                        <div class="row mt-1">
                            <div class="form-group col-12 col-md-6">
                                <label for="exampleInputname">Pilihan Service</label>
                                <input wire:model.blur='name' type="name" class="form-control border border-2 p-2"
                                    id="exampleInputname" placeholder="Enter name" disabled>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="exampleInputname">Jumlah/Berat Laundry</label>
                                <input wire:model.blur='name' type="name" class="form-control border border-2 p-2"
                                    id="exampleInputname" placeholder="Enter name" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <p class="bg-dark text-center text-white my-3 text-sm py-1 text-bold">
                                PEMBAYARAN
                            </p>
                        </div>

                        <div class="row mt-1">
                            <div class="form-group col-12 col-md-6">
                                <label for="exampleInputname">Jumlah Pembayaran</label>
                                <input wire:model.blur='name' type="name"
                                    class="form-control bg-success text-white text-bold border border-2 p-2"
                                    id="exampleInputname" placeholder="Rp. 000000" disabled value="Rp. 000" disabled>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="exampleInputname">Status Pembayaran</label>
                                <select class="form-select border border-2 p-2" aria-label="Default select example"
                                    wire:model.blur='isPer' disabled>
                                    <option selected disabled>--</option>
                                    <option value="1">Lunas</option>
                                    <option value="2">Belum Lunas</option>
                                </select>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            data-bs-target="#lihatTransaksi">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Edit Transaksi-->
    <div class="modal fade" id="editTransaksi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="editTransaksiLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editTransaksiLabel">EDIT TRANSAKSI</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit="store" class=''>
                    <div class="modal-body">
                        <div class="form-group">
                            <p class="bg-dark text-center text-white my-3 text-sm py-1 text-bold">
                                PELANGGAN
                            </p>
                        </div>

                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label for="exampleInputname">Nama Pelanggan</label>
                                <input wire:model.blur='name' type="name" class="form-control border border-2 p-2"
                                    id="exampleInputname" placeholder="Enter name">
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="exampleInputname">Nomor Telepon</label>
                                <input wire:model.blur='name' type="name" class="form-control border border-2 p-2"
                                    id="exampleInputname" placeholder="Enter name">
                            </div>
                        </div>

                        <div class="form-group">
                            <p class="bg-dark text-center text-white my-3 text-sm py-1 text-bold">
                                LAUNDRY
                            </p>
                        </div>

                        <div class="row mt-1">
                            <div class="form-group col-12 col-md-5">
                                <label for="exampleInputname">Pilihan Service</label>
                                <input wire:model.blur='name' type="name" class="form-control border border-2 p-2"
                                    id="exampleInputname" placeholder="Enter name">
                            </div>
                            <div class="form-group col-9 col-md-5">
                                <label for="exampleInputname">Jumlah/Berat Laundry</label>
                                <input wire:model.blur='name' type="name" class="form-control border border-2 p-2"
                                    id="exampleInputname" placeholder="Enter name">
                            </div>
                            <div class="form-group col-md-2 col-3 align-self-end">
                                <button type="button" class="btn btn-sm btn-dark px-2 p-1 text-center btn-link">
                                    <i style="font-size: 15px" class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <p class="bg-dark text-center text-white my-3 text-sm py-1 text-bold">
                                PEMBAYARAN
                            </p>
                        </div>

                        <div class="row mt-1">
                            <div class="form-group col-12 col-md-6">
                                <label for="exampleInputname">Jumlah Pembayaran</label>
                                <input wire:model.blur='name' type="name"
                                    class="form-control bg-success text-white text-bold border border-2 p-2"
                                    id="exampleInputname" placeholder="Rp. 000000" disabled value="Rp. 000">
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="exampleInputname">Status Pembayaran</label>
                                <select class="form-select border border-2 p-2" aria-label="Default select example"
                                    wire:model.blur='isPer'>
                                    <option selected disabled>--</option>
                                    <option value="1">Lunas</option>
                                    <option value="2">Belum Lunas</option>
                                </select>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            data-bs-target="#editTransaksi">Cancel</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Hapus Transaksi-->
    <div class="modal fade" id="hapusTransaksi" data-bs-keyboard="false" tabindex="-1"
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
                            <span class="text-bold">PK00102 - John Doe</span>
                        </p>
                    </div>
                    <form wire:submit="store" class=''>
                        <div class="col">
                            <div class="col mt-3 text-center">
                                <button type="button" class="btn btn-danger btn-sm">
                                    <i style="font-size: 15px" class="fas fa-trash" aria-hidden="true"></i>
                                    HAPUS
                                </button>

                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"
                                    data-bs-target="#hapusTransaksi" aria-label="Close">
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
