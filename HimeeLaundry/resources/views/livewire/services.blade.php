<div>
    <div class="container-fluid py-4">

        <div class="row mt-2">
            <div class="col-lg-5 col-md-6 col-12 mb-2">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header d-flex flex-row justify-content-between">
                        <h5 class="mb-0">Jenis Laundry</h5>

                        <button type="button" class="btn btn-sm bg-gradient-dark mt-0 mb-0 me-4" data-bs-toggle="modal"
                            data-bs-target="#tambahKategori">
                            <i class="material-icons text-sm">add</i>
                            &nbsp;&nbsp;Add
                        </button>
                    </div>

                    {{-- ? CATEGORY --}}
                    <div class="table-responsive mx-3">
                        <table class="table table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                        <span class="text-xs text-secondary text-uppercase">
                                            No
                                        </span>
                                    </th>
                                    <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                        <span class="text-xs text-secondary text-uppercase">
                                            Jenis Laundry
                                        </span>
                                    </th>
                                    <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                        <span class="text-xs text-secondary text-uppercase">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($JenisLaundry) != 0)
                                    @php
                                        $noJL = 1;
                                    @endphp
                                    @foreach ($JenisLaundry as $JL => $jenis)
                                        <tr>
                                            <td class="text-sm font-weight-normal align-middle border-bottom">
                                                {{ $noJL++ }}
                                            </td>
                                            <td class="text-sm font-weight-normal align-middle text-capitalize">
                                                {{ $jenis->jenis_laundry }}
                                            </td>
                                            <td class="text-sm font-weight-normal align-middle border-bottom">
                                                <div class="col pt-2">
                                                    <button type="button"
                                                        class="btn btn-sm btn-warning p-1 px-2 text-center btn-link"
                                                        data-bs-toggle="modal" data-bs-target="#editKategori"
                                                        wire:click="showEditLaundryCategory({{ $jenis->id }})">
                                                        <i style="font-size: 15px" class="fa fa-pen-to-square"
                                                            aria-hidden="true"></i>
                                                    </button>

                                                    <button type="button"
                                                        class="btn btn-sm btn-danger px-2 p-1 text-center btn-link"
                                                        data-bs-toggle="modal" data-bs-target="#hapusKategori"
                                                        wire:click="showDeleteLaundryCategory({{ $jenis->id }})">
                                                        <i style="font-size: 15px" class="fa fa-trash"
                                                            aria-hidden="true"></i>
                                                    </button>

                                                    <button type="button"
                                                        class="btn btn-sm btn-dark px-2 p-1 text-center btn-link"
                                                        data-bs-toggle="modal" data-bs-target="#tambahService"
                                                        wire:click="showAddService({{ $jenis->id }})">
                                                        <i style="font-size: 15px" class="fa fa-plus"
                                                            aria-hidden="true"></i>
                                                    </button>
                                                </div>

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
                    <div id="datatable-bottom">
                        <div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- ? SERVICES --}}

            <div class="col-lg-7 col-md-6 col-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header d-flex flex-row justify-content-between">
                        <h5 class="mb-0">Layanan Laundry</h5>

                        <a class="btn btn-sm bg-gradient-dark mt-0 mb-0 me-4" href="{{ route('admin-check') }}">
                            &nbsp;&nbsp;CHECK
                        </a>
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
                                        <a wire:click="sortBy('name')" class="text-xs text-secondary text-uppercase">
                                            <span>Jenis</span>

                                            <span>
                                                <i class="fas fa-sort cursor-pointer"></i>
                                            </span>
                                        </a>
                                    </th>
                                    <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                        <a wire:click="sortBy('name')" class="text-xs text-secondary text-uppercase">
                                            <span>Layanan Laundry</span>

                                            <span>
                                                <i class="fas fa-sort cursor-pointer"></i>
                                            </span>
                                        </a>
                                    </th>
                                    <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                        <a wire:click="sortBy('name')" class="text-xs text-secondary text-uppercase">
                                            <span>Harga</span>

                                            <span>
                                                <i class="fas fa-sort cursor-pointer"></i>
                                            </span>
                                        </a>
                                    </th>
                                    <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                        <span class="text-xs text-secondary text-uppercase">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($LayananLaundry) > 0)
                                    @php
                                        $noLL = 1;
                                    @endphp
                                    @foreach ($LayananLaundry as $LL => $layanan)
                                        <tr>
                                            <td class="text-sm font-weight-normal align-middle border-bottom">
                                                {{ $noLL++ }}
                                            </td>
                                            <td class="text-sm font-weight-normal align-middle">
                                                 {{ $layanan->jenisLaundry->jenis_laundry }}
                                            </td>
                                            <td class="text-sm font-weight-normal align-middle border-bottom">
                                                <span class="text-bold text-wrap">
                                                    {{ $layanan->nama_layanan }}
                                                </span> &nbsp;
                                            </td>
                                            <td class="text-sm font-weight-normal align-middle border-bottom">
                                                {{ $layanan->harga_layanan }}/{{ $layanan->satuan_barang }}
                                            </td>
                                            <td class="text-sm font-weight-normal align-middle border-bottom">
                                                <div class="col">
                                                    <button type="button"
                                                        class="btn btn-sm btn-warning p-1 px-2 text-center btn-link"
                                                        data-bs-toggle="modal" data-bs-target="#editService"
                                                        wire:click="showEditService({{ $layanan->id }})">
                                                        <i style="font-size: 15px" class="fa fa-pen-to-square"
                                                            aria-hidden="true"></i>
                                                    </button>

                                                    <button type="button"
                                                        class="btn btn-sm btn-danger px-2 p-1 text-center btn-link"
                                                        data-bs-toggle="modal" data-bs-target="#hapusService"
                                                        wire:click="showDeleteService({{ $layanan->id }})">
                                                        <i style="font-size: 15px" class="fa fa-trash"
                                                            aria-hidden="true"></i>
                                                    </button>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">
                                            <span class="d-block text-center pt-2 text-bold text-small">DATA
                                                KOSONG</span>
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



    <!-- Modal Tambah Jenis Laundry-->
    <div wire:ignore.self class="modal fade" id="tambahKategori" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="tambahKategoriLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambahKategoriLabel">TAMBAH JENIS LAUNDRY</h1>
                    <button type="button" class="btn-close btn-dark bg-dark" data-bs-dismiss="modal"
                        aria-label="Close" wire:click='resetInputs'></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addLaundryCategory" class=''>

                        <div class="form-group col-12">
                            <label for="jenis_laundry">Jenis Laundry</label>
                            <input wire:model='jenis_laundry' type="string" class="form-control border border-2 p-2"
                                id="jenis_laundry" placeholder="Masukkan Jenis Laundry">
                            @error('jenis_laundry')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col">
                            <div class="col mt-3">
                                <button type="submit" class="btn btn-dark btn-sm">
                                    <i class="material-icons text-sm">add</i> Tambah Jenis Laundry
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm my-1 btn-secondary" data-bs-dismiss="modal"
                        data-bs-target="#tambahKategori" wire:click="resetInputs">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Jenis Laundry-->
    <div wire:ignore.self class="modal fade" id="editKategori" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="editKategoriLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editKategoriLabel">EDIT JENIS LAUNDRY</h1>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="editLaundryCategory" class=''>

                        <div class="form-group col-12">
                            <label for="jenis_laundry">Jenis Laundry</label>
                            <input wire:model='jenis_laundry' type="string" class="form-control border border-2 p-2"
                                id="jenis_laundry" placeholder="Masukkan Jenis Laundry" autocomplete="off">
                            @error('jenis_laundry')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col">
                            <div class="col mt-3">
                                <button type="submit" class="btn btn-warning btn-sm">
                                    <i style="font-size: 15px" class="fas fa-pen-to-square" aria-hidden="true"></i>
                                    Edit Kategori
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm my-1 btn-secondary" data-bs-dismiss="modal"
                        data-bs-target="#editKategori" wire:click="resetInputs">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Hapus Jenis Laundry-->
    <div wire:ignore.self class="modal fade" id="hapusKategori" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="hapusKategoriLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="col-12 text-center">
                        <i class="material-icons text-danger" style="font-size: 160px">
                            error_outline
                        </i>

                        <p class="text-sm">
                            Yakin Ingin Menghapus Jenis Laundry<br />
                            <span class="text-bold"> {{ $jenis_laundry }} </span>
                        </p>
                        <p class="text-sm text-white bg-danger p-1 rounded text-bold">
                            <small>Semua Layanan dengan kategori ini akan dihapus</small>
                        </p>
                    </div>
                    <form wire:submit="deleteLaundryCategory">
                        <div class="col">
                            <div class="col mt-3 text-center">
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i style="font-size: 15px" class="fas fa-trash" aria-hidden="true"></i>
                                    HAPUS
                                </button>

                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"
                                    data-bs-target="#hapusKategori" aria-label="Close" wire:click="resetInputs">
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

    <!-- Modal Tambah Service-->
    <div wire:ignore.self class="modal fade" id="tambahService" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="tambahServiceLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambahServiceLabel">TAMBAH LAYANAN LAUNDRY</h1>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addService" class=''>
                        <div class="form-group col-12">
                            <label for="id_jenis_laundry">Jenis Laundry</label>
                            <input type="string" wire:model='jenis_laundry'
                                class="form-control border border-2 p-2 text-capitalize" id="id_jenis_laundry"
                                placeholder="Enter name" disabled>
                            @error('jenis_laundry')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label for="nama_service">Nama Layanan</label>
                            <input wire:model='nama_layanan' type="string" class="form-control border border-2 p-2"
                                id="nama_service" placeholder="Enter name" autocomplete="off">
                            @error('nama_layanan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row col-12">
                            <div class="form-group col-9">
                                <label for="harga_service">Harga Layanan</label>
                                <input wire:model='harga_layanan' type="number"
                                    class="form-control border border-2 p-2" id="harga_service"
                                    placeholder="Enter price" autocomplete="off">
                                @error('harga_layanan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-3">
                                <label for="exampleInputname">Per</label>
                                <select class="form-select border border-2 p-2" aria-label="Default select example"
                                    wire:model='satuan_barang'>
                                    <option>PILIH</option>
                                    <option value="KG">KG</option>
                                    <option value="Pcs">Pcs</option>
                                    <option value="Pasang">Pasang</option>
                                </select>
                                @error('satuan_barang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <div class="col mt-3">
                                <button type="submit" class="btn btn-dark btn-sm">
                                    <i class="material-icons text-sm">add</i> Tambah Service
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm my-1 btn-secondary" data-bs-dismiss="modal"
                        data-bs-target="#tambahService" wire:click="resetInputs">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Service-->
    <div wire:ignore.self class="modal fade" id="editService" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="editServiceLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editServiceLabel">EDIT LAYANAN LAUNDRY</h1>
                    <button type="button" class="btn-close btn-dark bg-dark" data-bs-dismiss="modal"
                        aria-label="Close" wire:click="resetInputs"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="editService" class=''>
                        <div class="form-group col-12">
                            <label for="jenis_layanan">Jenis Layanan</label>
                            <input wire:model='s_nama_jenis_layanan' type="numeric"
                                class="form-control border border-2 p-2" id="jenis_layanan" placeholder="Enter name"
                                disabled>
                            @error('jenis_layanan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label for="nama_layanan">Nama Layanan</label>
                            <input wire:model='nama_layanan' type="name" class="form-control border border-2 p-2"
                                id="nama_layanan" placeholder="Enter nama layanan" autocomplete="off">
                            @error('nama_laundry')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="row col-12">
                            <div class="form-group col-9">
                                <label for="exampleInputname">Harga Layanan</label>
                                <input wire:model='harga_layanan' type="name"
                                    class="form-control border border-2 p-2" id="exampleInputname"
                                    placeholder="Enter name" autocomplete="off">
                                @error('jenis_laundry')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-3">
                                <label for="satuan_barang">Per</label>
                                <select class="form-select border border-2 p-2" aria-label="Default select example"
                                    name='satuan_barang' id="satuan_barang">
                                    <option {{ $satuan_barang == 'KG' ? 'selected' : '' }} value="KG">KG
                                    </option>
                                    <option {{ $satuan_barang == 'Pcs' ? 'selected' : '' }} value="Pcs">Pcs
                                    </option>
                                    <option {{ $satuan_barang == 'Pasang' ? 'selected' : '' }} value="Pasang">Pasang
                                    </option>
                                </select>
                                @error('satuan_barang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <div class="col mt-3">
                                <button type="submit" class="btn btn-warning btn-sm">
                                    <i style="font-size: 15px" class="fas fa-pen-to-square" aria-hidden="true"></i>
                                    Edit Service
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm my-1 btn-secondary" data-bs-dismiss="modal"
                        data-bs-target="#editService" wire:click="resetInputs">Cancel</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal Hapus Service-->
    <div wire:ignore.self class="modal fade" id="hapusService" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="hapusServiceLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="col-12 text-center">
                        <i class="material-icons text-danger" style="font-size: 160px">
                            error_outline
                        </i>

                        <p class="text-sm">
                            Anda Yakin Ingin Menghapus Service <br />
                            <span class="text-uppercase text-bold">{{ $nama_layanan }}</span>
                        </p>
                    </div>
                    <form wire:submit="deleteService" class=''>
                        <div class="col">
                            <div class="col mt-3 text-center">
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i style="font-size: 15px" class="fas fa-trash" aria-hidden="true"></i>
                                    HAPUS
                                </button>

                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"
                                    data-bs-target="#hapusService" aria-label="Close">
                                    <i style="font-size: 15px" class="fas fa-xmark" wire:click="resetInputs"></i>
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
            $('#tambahKategori').modal('hide');
            $('#editKategori').modal('hide');
            $('#hapusKategori').modal('hide');
            $('#tambahService').modal('hide');
            $('#editService').modal('hide');
            $('#hapusService').modal('hide');
        });
    </script>
@endpush
