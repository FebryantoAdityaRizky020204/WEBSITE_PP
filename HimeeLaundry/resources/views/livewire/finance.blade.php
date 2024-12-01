<div>
    <div class="container-fluid py-4">

        <div class="row mt-2">
            <div class="col-lg-8 col-sm-6 mt-sm-0 mt-4 mb-3">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            {{-- <h6 class="mb-0">Keuangan</h6> --}}
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="badge badge-md badge-dot me-4">
                                <i class="bg-primary text-primary">##</i>
                                <span class="text-dark text-xs">Pemasukan</span>
                            </span>
                            <span class="badge badge-md badge-dot me-4">
                                <i class="bg-dark text-dark">##</i>
                                <span class="text-dark text-xs">Pengeluaran</span>
                            </span>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart" wire:ignore>
                            <canvas id="chart-line" class="chart-canvas" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-xl-0 mb-4">
                <div class="col-12 mt-sm-2">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">savings</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Pemasukan</p>
                                <h4>@currency($Pemasukan->sum('pemasukan'))</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">shopping_cart_checkout</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Pengeluaran</p>
                                <h4 class="mb-0">@currency($Pengeluaran->sum('harga_pembelian'))</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">account_balance_wallet</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Saldo</p></p>
                                <h4 class="mb-0">@currency($Pemasukan->sum('pemasukan') - $Pengeluaran->sum('harga_pembelian'))</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                    </div>
                </div>
            </div>


            <div class="col-lg-7 col-md-6 col-12 mb-2">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header d-flex flex-row justify-content-between">
                        <h5 class="mb-0">PENGELUARAN</h5>

                        <button type="button" class="btn btn-sm bg-gradient-dark mt-0 mb-0 me-4" data-bs-toggle="modal"
                            data-bs-target="#tambahPengeluaran" id="buttonAddPengeluaran">
                            <i class="material-icons text-sm">add</i>
                            &nbsp;&nbsp;Add
                        </button>
                    </div>

                    {{-- ? Pengeluaran --}}
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
                                            Nama Barang
                                        </span>
                                    </th>
                                    <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                        <span class="text-xs text-secondary text-uppercase">
                                            Harga Pembelian
                                        </span>
                                    </th>
                                    <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                        <span class="text-xs text-secondary text-uppercase">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($Pengeluaran) != 0)
                                    @php
                                        $noPng = 1;
                                    @endphp
                                    @foreach ($Pengeluaran as $Png => $keluar)
                                        <tr>
                                            <td class="text-sm font-weight-normal align-middle border-bottom">
                                                {{ $noPng++ }}
                                            </td>
                                            <td class="text-sm text-bold align-middle text-capitalize">
                                                {{ $keluar->nama_barang }}
                                            </td>
                                            <td class="text-sm font-weight-normal align-middle text-capitalize">
                                                Rp. {{ $keluar->harga_pembelian }}
                                            </td>
                                            <td class="text-sm font-weight-normal align-middle border-bottom">
                                                <div class="col pt-2">
                                                    <button type="button"
                                                        class="btn btn-sm btn-warning p-1 px-2 text-center btn-link"
                                                        data-bs-toggle="modal" data-bs-target="#editPengeluaran"
                                                        wire:click="showEditPengeluaran({{ $keluar->id }})">
                                                        <i style="font-size: 15px" class="fa fa-pen-to-square"
                                                            aria-hidden="true"></i>
                                                    </button>

                                                    <button type="button"
                                                        class="btn btn-sm btn-danger px-2 p-1 text-center btn-link"
                                                        data-bs-toggle="modal" data-bs-target="#hapusPengeluaran"
                                                        wire:click="showDeletePengeluaran({{ $keluar->id }})">
                                                        <i style="font-size: 15px" class="fa fa-trash"
                                                            aria-hidden="true"></i>
                                                    </button>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">
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

            {{-- ? PEMASUKAN --}}

            <div class="col-lg-5 col-md-6 col-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header d-flex flex-row justify-content-between">
                        <h5 class="mb-0">PEMASUKAN</h5>
                    </div>
                    <div class="table-responsive mx-3">
                        <table class="table table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                        <span class="text-xs text-secondary text-uppercase">No</span>
                                    </th>
                                    <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                        <span class="text-xs text-secondary text-uppercase">ID Transaksi</span>
                                    </th>
                                    <th style="padding: 0.75rem 0.5rem" class="border-bottom border-dark">
                                        <span class="text-xs text-secondary text-uppercase">Pemasukan</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($Pemasukan) > 0)
                                    @php
                                        $noPms = 1;
                                    @endphp
                                    @foreach ($Pemasukan as $Pms => $masuk)
                                        <tr>
                                            <td class="text-sm font-weight-normal align-middle border-bottom">
                                                {{ $noPms++ }}
                                            </td>
                                            <td class="text-sm font-weight-normal align-middle">
                                                {{ $masuk->transaksi->id_transaksi }}
                                            </td>
                                            <td class="text-sm font-weight-normal align-middle">
                                                @currency($masuk->pemasukan)
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2">
                                            <span class="d-block text-center pt-2 text-bold text-small">
                                                DATA KOSONG</span>
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



    {{-- Modal Tambah Pengeluaran --}}
    <div wire:ignore.self class="modal fade" id="tambahPengeluaran" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahPengeluaranLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambahPengeluaranLabel">TAMBAH PENGELUARAN</h1>
                    <button type="button" class="btn-close btn-dark bg-dark" data-bs-dismiss="modal"
                        aria-label="Close" wire:click='resetInputs'></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addPengeluaran" class=''>

                        <div class="form-group col-12">
                            <label for="nama_barang">Nama Barang</label>
                            <input wire:model='nama_barang' type="string" class="form-control border border-2 p-2"
                                id="nama_barang" placeholder="Masukkan Nama Barang">
                            @error('nama_barang')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label for="harga_pembelian">Harga Pembelian</label>
                            <input wire:model='harga_pembelian' type="number"
                                class="form-control border border-2 p-2" id="harga_pembelian"
                                placeholder="Masukkan Harga Pembelian">
                            @error('harga_pembelian')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col">
                            <div class="col mt-3">
                                <button type="submit" class="btn btn-dark btn-sm">
                                    <i class="material-icons text-sm">add</i> Tambah Pengeluaran
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm my-1 btn-secondary" data-bs-dismiss="modal"
                        data-bs-target="#tambahPengeluaran" wire:click="resetInputs">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Edit Pengeluaran --}}
    <div wire:ignore.self class="modal fade" id="editPengeluaran" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="editPengeluaranLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editPengeluaranLabel">EDIT PENGELUARAN</h1>
                    <button type="button" class="btn-close btn-dark bg-dark" data-bs-dismiss="modal"
                        aria-label="Close" wire:click='resetInputs'></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="editPengeluaran" class=''>

                        <div class="form-group col-12">
                            <label for="nama_barang">Nama Barang</label>
                            <input wire:model='nama_barang' type="string" class="form-control border border-2 p-2"
                                id="nama_barang" placeholder="Masukkan Nama Barang">
                            @error('nama_barang')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label for="harga_pembelian">Harga Pembelian</label>
                            <input wire:model='harga_pembelian' type="number"
                                class="form-control border border-2 p-2" id="harga_pembelian"
                                placeholder="Masukkan Harga Pembelian">
                            @error('harga_pembelian')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col">
                            <div class="col mt-3">
                                <button type="submit" class="btn btn-warning btn-sm">
                                    <i style="font-size: 15px" class="fas fa-pen-to-square" aria-hidden="true"></i>
                                    Edit Pengeluaran
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm my-1 btn-secondary" data-bs-dismiss="modal"
                        data-bs-target="#editPengeluaran" wire:click="resetInputs">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Hapus Pengeluaran -->
    <div wire:ignore.self class="modal fade" id="hapusPengeluaran" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="hapusPengeluaranLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="col-12 text-center">
                        <i class="material-icons text-danger" style="font-size: 160px">
                            error_outline
                        </i>
    
                        <p class="text-sm">
                            Yakin Ingin Menghapus Pengeluaran<br />
                            <span class="text-bold"> {{ $nama_barang }} - {{ $harga_pembelian }}</span>
                        </p>
                    </div>
                    <form wire:submit="deletePengeluaran">
                        <div class="col">
                            <div class="col mt-3 text-center">
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i style="font-size: 15px" class="fas fa-trash" aria-hidden="true"></i>
                                    HAPUS
                                </button>
    
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"
                                    data-bs-target="#hapusPengeluaran" aria-label="Close" wire:click="resetInputs">
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
            $('#tambahPengeluaran').modal('hide');
            $('#editPengeluaran').modal('hide');
            $('#hapusPengeluaran').modal('hide');
        });
    </script>

    @if (session('do') === 'addPengeluaran')
        <script>
            $(document).ready(function() {
                $('#buttonAddPengeluaran').click();
            });
        </script>
    @endif
@endpush

@push('js')
    <script src="{{ asset('assets') }}/js/plugins/chartjs.min.js"></script>
    <script>
        let chart = null;
    
        document.addEventListener('DOMContentLoaded', () => {
            const initialFinanceSummary = @json($finance_summary);
            renderChart(initialFinanceSummary);
        });
    
        window.addEventListener('renderChart', event => {
            const financeSummary = @json($finance_summary);
            renderChart(financeSummary);
        });
    
        function renderChart(finance_summary) {
            if (chart) {
                chart.destroy();
            }
    
            const pengeluaran = Object.values(finance_summary).map(item => item.pengeluaran);
            const pemasukan = Object.values(finance_summary).map(item => item.pemasukan);
    
            const ctx1 = document.getElementById("chart-line").getContext("2d");
            
            // Initialize or update the chart object
            chart = new Chart(ctx1, {
                type: "line",
                data: {
                    labels: ["Sn", "Sl", "Rb", "Km", "Jm", "Sb", "Mg"],
                    datasets: [
                        {
                            label: "Pemasukan",
                            tension: 0,
                            pointRadius: 5,
                            pointBackgroundColor: "#e91e63",
                            pointBorderColor: "transparent",
                            borderColor: "#e91e63",
                            borderWidth: 4,
                            backgroundColor: "transparent",
                            fill: true,
                            data: pemasukan,
                            maxBarThickness: 6,
                        },
                        {
                            label: "Pengeluaran",
                            tension: 0,
                            borderWidth: 0,
                            pointRadius: 5,
                            pointBackgroundColor: "#3A416F",
                            pointBorderColor: "transparent",
                            borderColor: "#3A416F",
                            borderWidth: 4,
                            backgroundColor: "transparent",
                            fill: true,
                            data: pengeluaran,
                            maxBarThickness: 6,
                        },
                    ],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        },
                    },
                    interaction: {
                        intersect: false,
                        mode: "index",
                    },
                    scales: {
                        y: {
                            grid: {
                                drawBorder: false,
                                display: true,
                                drawOnChartArea: true,
                                drawTicks: false,
                                borderDash: [5, 5],
                                color: "#c1c4ce5c",
                            },
                            ticks: {
                                display: true,
                                padding: 10,
                                color: "#9ca2b7",
                                font: {
                                    size: 14,
                                    weight: 300,
                                    family: "Roboto",
                                    style: "normal",
                                    lineHeight: 2,
                                },
                            },
                        },
                        x: {
                            grid: {
                                drawBorder: false,
                                display: true,
                                drawOnChartArea: true,
                                drawTicks: true,
                                borderDash: [5, 5],
                                color: "#c1c4ce5c",
                            },
                            ticks: {
                                display: true,
                                color: "#9ca2b7",
                                padding: 10,
                                font: {
                                    size: 14,
                                    weight: 300,
                                    family: "Roboto",
                                    style: "normal",
                                    lineHeight: 2,
                                },
                            },
                        },
                    },
                },
            });
        }
    </script>
@endpush
