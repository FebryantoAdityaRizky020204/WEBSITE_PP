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

                        {{-- <a class="btn btn-sm bg-gradient-dark mt-0 mb-0 me-4"
                            href="https://material-dashboard-pro-laravel-livewire.creative-tim.com/laravel-examples/new-tag"><i
                                class="material-icons text-sm">add</i>&nbsp;&nbsp;Add Categories</a> --}}
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
                                    {{-- <td class="text-sm font-weight-normal align-middle border-bottom">
                                        <ul class="p-1">
                                            <li class="pb-1">
                                                <span class="text-bold">Cuci Kering</span> &nbsp;
                                                <span class="badge badge-sm bg-gradient-success">@6000/kg</span>
                                            </li>
                                            <li>
                                                <span class="text-bold">Cuci Basah</span> &nbsp;
                                                <span class="badge badge-sm bg-gradient-success">@7000/kg</span>
                                            </li>
                                        </ul>
                                    </td> --}}
                                    <td class="text-sm font-weight-normal align-middle border-bottom">
                                        <div class="col">
                                            <button type="button" class="btn btn-sm btn-warning p-1 px-2 text-center btn-link" data-bs-toggle="modal"
                                                data-bs-target="#editKategori">
                                                <i style="font-size: 15px" class="fa fa-pen-to-square" aria-hidden="true"></i>
                                            </button>
                                            
                                            <button type="button" class="btn btn-sm btn-danger px-2 p-1 text-center btn-link">
                                                <i style="font-size: 15px" class="fa fa-trash" aria-hidden="true"></i>
                                            </button>

                                            <button type="button" class="btn btn-sm btn-dark px-2 p-1 text-center btn-link">
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
            
                        {{-- <button type="button" class="btn btn-sm bg-gradient-dark mt-0 mb-0 me-4" data-bs-toggle="modal"
                            data-bs-target="#tambahKategori">
                            <i class="material-icons text-sm">add</i>
                            &nbsp;&nbsp;Add Categories
                        </button> --}}
            
                        {{-- <a class="btn btn-sm bg-gradient-dark mt-0 mb-0 me-4"
                            href="https://material-dashboard-pro-laravel-livewire.creative-tim.com/laravel-examples/new-tag"><i
                                class="material-icons text-sm">add</i>&nbsp;&nbsp;Add Categories</a> --}}
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
                                        <span class="text-bold">Cuci Kering</span> &nbsp;
                                    </td>
                                    <td class="text-sm font-weight-normal align-middle border-bottom">
                                        <span class="badge badge-sm bg-gradient-success">@6000/kg</span>
                                    </td>
                                    <td class="text-sm font-weight-normal align-middle border-bottom">
                                        <div class="col">
                                            <button type="button" class="btn btn-sm btn-warning p-1 px-2 text-center btn-link"
                                                data-bs-toggle="modal" data-bs-target="#editKategori">
                                                <i style="font-size: 15px" class="fa fa-pen-to-square" aria-hidden="true"></i>
                                            </button>
            
                                            <button type="button" class="btn btn-sm btn-danger px-2 p-1 text-center btn-link">
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambahKategoriLabel">TAMBAH KATEGORI</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit="store" class=''>
                    
                        <div class="form-group col-12">
                            <label for="exampleInputname">Nama Kategori</label>
                            <input wire:model.blur='name' type="name" class="form-control border border-2 p-2" id="exampleInputname"
                                placeholder="Enter name">
                        </div>

                        <div class="form-group">
                            <p class="bg-dark text-center text-white my-3 text-sm py-1 text-bold">
                                SERVICES
                            </p>
                        </div>

                        <div class="col">
                            
                            <div class="col border border-3 rounded  p-2 mb-2" id="service-form-card">
                                <div class="row align-items-center">
                                    <div class="form-group col-12 col-md-5">
                                        <label for="exampleInputname">Nama Layanan</label>
                                        <input wire:model.blur='name' type="name" class="form-control border border-2 p-2" id="exampleInputname"
                                            placeholder="Enter name">
                                    </div>
                                    <div class="form-group col-12 col-md-5">
                                        <label for="exampleInputname">Harga Layanan</label>
                                        <input wire:model.blur='name' type="name" class="form-control border border-2 p-2" id="exampleInputname"
                                            placeholder="Enter name">
                                    </div>
                                    <div class="form-group col-md-2 col-12">
                                        <button type="button" class="btn btn-danger btn-sm mt-md-5 mt-2">
                                            <i class="material-icons text-sm">delete</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="col mt-2">
                                <button type="button" class="btn btn-dark btn-sm">
                                    <i class="material-icons text-sm">add</i> Tambah Service
                                </button>
                            </div>

                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-target="#tambahKategori">Cancel</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Kategori-->
    <div class="modal fade" id="editKategori" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="editKategoriLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editKategoriLabel">EDIT KATEGORI</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit="store" class=''>
    
                        <div class="form-group col-12">
                            <label for="exampleInputname">Nama Kategori</label>
                            <input wire:model.blur='name' type="name" class="form-control border border-2 p-2"
                                id="exampleInputname" placeholder="Enter name">
                        </div>
    
                        <div class="form-group">
                            <p class="bg-dark text-center text-white my-3 text-sm py-1 text-bold">
                                SERVICES
                            </p>
                        </div>
    
                        <div class="col">
                            <div class="col border border-3 rounded  p-2 mb-2" id="service-form-card">
                                <div class="row align-items-center">
                                    <div class="form-group col-12 col-md-5">
                                        <label for="exampleInputname">Nama Layanan</label>
                                        <input wire:model.blur='name' type="name" class="form-control border border-2 p-2" id="exampleInputname"
                                            placeholder="Enter name">
                                    </div>
                                    <div class="form-group col-12 col-md-5">
                                        <label for="exampleInputname">Harga Layanan</label>
                                        <input wire:model.blur='name' type="name" class="form-control border border-2 p-2" id="exampleInputname"
                                            placeholder="Enter name">
                                    </div>
                                    <div class="form-group col-md-2 col-12">
                                        <button type="button" class="btn btn-danger btn-sm mt-md-5 mt-2">
                                            <i class="material-icons text-sm">delete</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col mt-2">
                                <button type="button" class="btn btn-dark btn-sm">
                                    <i class="material-icons text-sm">add</i> Tambah Service
                                </button>
                            </div>
    
                        </div>
    
    
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>