<div>
    <div class="container-fluid py-4">

        <div class="row mt-2">
            <div class="col-lg-5 col-md-6 col-12 mb-2">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header d-flex flex-row justify-content-between">
                        <h5 class="mb-0">Categories</h5>

                        <button type="button" 
                        class="btn btn-sm bg-gradient-dark mt-0 mb-0 me-4" 
                        data-bs-toggle="modal" data-bs-target="#tambahKategori">
                            <i class="material-icons text-sm">add</i>
                            &nbsp;&nbsp;Add
                        </button>
                    </div>
                    {{-- <div class="col-12 text-end">
                        <a class="btn btn-sm bg-gradient-dark mt-0 mb-0 me-4"
                            href="https://material-dashboard-pro-laravel-livewire.creative-tim.com/laravel-examples/new-tag"><i
                                class="material-icons text-sm">add</i>&nbsp;&nbsp;Add Tag</a>
                    </div> --}}
                    {{-- <div class="d-flex flex-row justify-content-between mx-4">
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
                    </div> --}}
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
                                            <span>Category Name</span>

                                            <span>
                                                <i class="fas fa-sort cursor-pointer"></i>
                                            </span>
                                        </a>
                                    </th>
                                    {{-- <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                        <a class="text-xs text-secondary text-uppercase">
                                            <span>Services Name</span>
                                        </a>
                                    </th> --}}
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
                                            Pakaian
                                    </td>
                                    <td class="text-sm font-weight-normal align-middle border-bottom">
                                        <div class="col">
                                            <button type="button" class="btn btn-sm btn-warning p-1 px-2 text-center btn-link" 
                                                data-bs-toggle="modal" data-bs-target="#editKategori">
                                                <i style="font-size: 15px" class="fa fa-pen-to-square" aria-hidden="true"></i>
                                            </button>
                                            
                                            <button type="button" class="btn btn-sm btn-danger px-2 p-1 text-center btn-link"
                                                data-bs-toggle="modal" data-bs-target="#hapusKategori">
                                                <i style="font-size: 15px" class="fa fa-trash" aria-hidden="true"></i>
                                            </button>

                                            <button type="button" class="btn btn-sm btn-dark px-2 p-1 text-center btn-link"
                                                data-bs-toggle="modal" data-bs-target="#tambahService">
                                                <i style="font-size: 15px" class="fa fa-plus" aria-hidden="true"></i>
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


            <div class="col-lg-7 col-md-6 col-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header d-flex flex-row justify-content-between">
                        <h5 class="mb-0">Services</h5>
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
                                            <span>Category</span>
            
                                            <span>
                                                <i class="fas fa-sort cursor-pointer"></i>
                                            </span>
                                        </a>
                                    </th>
                                    <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                        <a wire:click="sortBy('name')" class="text-xs text-secondary text-uppercase">
                                            <span>Service Name</span>
                                    
                                            <span>
                                                <i class="fas fa-sort cursor-pointer"></i>
                                            </span>
                                        </a>
                                    </th>
                                    <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                        <a wire:click="sortBy('name')" class="text-xs text-secondary text-uppercase">
                                            <span>Price</span>
                                    
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
            
                                <tr>
                                    <td class="text-sm font-weight-normal align-middle border-bottom">
                                        1
                                    </td>
                                    <td class="text-sm font-weight-normal align-middle">
                                        Pakaian
                                    </td>
                                    <td class="text-sm font-weight-normal align-middle border-bottom">
                                        <span class="text-bold">Cuci Kering</span> &nbsp;
                                    </td>
                                    <td class="text-sm font-weight-normal align-middle border-bottom">
                                        6000/kg
                                    </td>
                                    <td class="text-sm font-weight-normal align-middle border-bottom">
                                        <div class="col">
                                            <button type="button" class="btn btn-sm btn-warning p-1 px-2 text-center btn-link"
                                                data-bs-toggle="modal" data-bs-target="#editService">
                                                <i style="font-size: 15px" class="fa fa-pen-to-square" aria-hidden="true"></i>
                                            </button>
            
                                            <button type="button" class="btn btn-sm btn-danger px-2 p-1 text-center btn-link"
                                                data-bs-toggle="modal" data-bs-target="#hapusService">
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


    
    <!-- Modal Tambah Kategori-->
    <div class="modal fade" id="tambahKategori" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="tambahKategoriLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambahKategoriLabel">TAMBAH KATEGORI</h1>
                    <button type="button" class="btn-close btn-dark bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="storeCategory()" class=''>
                    
                        <div class="form-group col-12">
                            <label for="exampleInputname">Nama Kategori</label>
                            <input wire:model.blur='category' type="category" class="form-control border border-2 p-2" id="exampleInputname"
                                placeholder="Enter Category">
                        </div>

                        <div class="col">
                            <div class="col mt-3">
                                <button type="button" class="btn btn-dark btn-sm">
                                    <i class="material-icons text-sm">add</i> Tambah Kategori
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm my-1 btn-secondary" 
                    data-bs-dismiss="modal" data-bs-target="#tambahKategori">Cancel</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Edit Kategori-->
    <div class="modal fade" id="editKategori" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="editKategoriLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editKategoriLabel">EDIT KATEGORI</h1>
                    <button type="button" class="btn-close btn-dark bg-dark" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit="store" class=''>
    
                        <div class="form-group col-12">
                            <label for="exampleInputname">Nama Kategori</label>
                            <input wire:model.blur='name' type="name" class="form-control border border-2 p-2"
                                id="exampleInputname" placeholder="Enter name">
                        </div>
    
                        <div class="col">
                            <div class="col mt-3">
                                <button type="button" class="btn btn-warning btn-sm">
                                    <i style="font-size: 15px" class="fas fa-pen-to-square" aria-hidden="true"></i> 
                                    Edit Kategori
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm my-1 btn-secondary" data-bs-dismiss="modal"
                        data-bs-target="#editKategori">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Service-->
    <div class="modal fade" id="tambahService" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="tambahServiceLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambahServiceLabel">TAMBAH SERVICE</h1>
                    <button type="button" class="btn-close btn-dark bg-dark" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit="store" class=''>
                        <div class="form-group col-12">
                            <label for="exampleInputname">Kategori</label>
                            <input wire:model.blur='isKategori' type="name" class="form-control border border-2 p-2" id="exampleInputname"
                                placeholder="Enter name" disabled>
                        </div>
    
                        <div class="form-group col-12">
                            <label for="exampleInputname">Nama Service</label>
                            <input wire:model.blur='name' type="name" class="form-control border border-2 p-2"
                                id="exampleInputname" placeholder="Enter name">
                        </div>
    
                        <div class="row col-12">
                            <div class="form-group col-9">
                                <label for="exampleInputname">Harga Service</label>
                                <input wire:model.blur='name' type="name" class="form-control border border-2 p-2" id="exampleInputname"
                                    placeholder="Enter name">
                            </div>
                            <div class="form-group col-3">
                                <label for="exampleInputname">Per</label>
                                <select class="form-select border border-2 p-2" aria-label="Default select example" wire:model.blur='isPer'>
                                    <option selected disabled>--</option>
                                    <option value="1">KG</option>
                                    <option value="2">Pcs</option>
                                    <option value="3">Pasang</option>
                                </select>
                            </div>
                        </div>

                        <div class="col">
                            <div class="col mt-3">
                                <button type="button" class="btn btn-dark btn-sm">
                                    <i class="material-icons text-sm">add</i> Tambah Service
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm my-1 btn-secondary" data-bs-dismiss="modal"
                        data-bs-target="#tambahService">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Service-->
    <div class="modal fade" id="editService" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="editServiceLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editServiceLabel">EDIT SERVICE</h1>
                    <button type="button" class="btn-close btn-dark bg-dark" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit="store" class=''>
                        <div class="form-group col-12">
                            <label for="exampleInputname">Kategori</label>
                            <input wire:model.blur='isKategori' type="name" class="form-control border border-2 p-2"
                                id="exampleInputname" placeholder="Enter name" disabled>
                        </div>
    
                        <div class="form-group col-12">
                            <label for="exampleInputname">Nama Service</label>
                            <input wire:model.blur='name' type="name" class="form-control border border-2 p-2"
                                id="exampleInputname" placeholder="Enter name">
                        </div>
    
                        <div class="row col-12">
                            <div class="form-group col-9">
                                <label for="exampleInputname">Harga Service</label>
                                <input wire:model.blur='name' type="name" class="form-control border border-2 p-2"
                                    id="exampleInputname" placeholder="Enter name">
                            </div>
                            <div class="form-group col-3">
                                <label for="exampleInputname">Per</label>
                                <select class="form-select border border-2 p-2" aria-label="Default select example"
                                    wire:model.blur='isPer'>
                                    <option selected disabled>--</option>
                                    <option value="1">KG</option>
                                    <option value="2">Pcs</option>
                                    <option value="3">Pasang</option>
                                </select>
                            </div>
                        </div>
    
                        <div class="col">
                            <div class="col mt-3">
                                <button type="button" class="btn btn-warning btn-sm">
                                    <i style="font-size: 15px" class="fas fa-pen-to-square" aria-hidden="true"></i> 
                                    Edit Service
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm my-1 btn-secondary" data-bs-dismiss="modal"
                        data-bs-target="#editService">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Hapus Kategori-->
    <div class="modal fade" id="hapusKategori" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusKategoriLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="col-12 text-center">
                        <i class="material-icons text-danger" style="font-size: 160px">
                            error_outline
                        </i>
    
                        <p class="text-sm">
                            Anda Yakin Ingin Menghapus Kategori<br />
                            <span class="text-bold">Pakaian</span>
                        </p>
                        <p class="text-sm text-white bg-danger p-1 rounded text-bold">
                            <small>Semua Service dengan kategori Pakaian akan dihapus</small>
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
                                    data-bs-target="#hapusKategori" aria-label="Close">
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


    <!-- Modal Hapus Service-->
    <div class="modal fade" id="hapusService" data-bs-keyboard="false" tabindex="-1"
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
                            <span class="text-bold">Cuci Kering</span>
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
                                    data-bs-target="#hapusService" aria-label="Close">
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