<div>
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">savings</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Pendapatan</p>
                            <h4 class="mb-0">@currency($pemasukan)</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Pelanggan</p>
                            <h4 class="mb-0">{{ $pelanggan }}</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">shopping_cart_checkout</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Pengeluaran</p>
                            <h4 class="mb-0">@currency($pengeluaran)</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-8 col-md-6 col-12 mt-4 mb-4">
                <div class="card z-index-2 ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <div class="chart" wire:ignore>
                                <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pb-1">
                        <h6 class="mb-0 ">Transaksi Mingguan</h6>
                        <p class="text-sm ">{{ date('Y-m-d', strtotime($startOfWeek)) }} <span class="text-bold">s.d</span> {{ date('Y-m-d', strtotime($endOfWeek)) }}</p>
                        <hr class="dark horizontal">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mt-4 mb-4">
                <div class="card z-index-2 ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div
                            class="bg-gradient-primary shadow-primary border-radius-lg py-1 pe-1 text-center text-white text-bold">
                            OPTIONS
                        </div>
                    </div>
                    <div class="card-body pb-1">
                        <div class="col pb-2">
                            <button type="button" class="btn btn-sm col-12 bg-gradient-dark mt-0 mb-2 me-4"
                                wire:click='buatTransaksi'>
                                <i class="material-icons text-sm">add</i>
                                &nbsp;&nbsp; Buat Transaksi
                            </button>

                            <button type="button" class="btn btn-sm col-12 bg-gradient-danger mt-0 mb-2 me-4"
                                wire:click='tambahPengeluaran'>
                                <i class="material-icons text-sm">add</i>
                                &nbsp;&nbsp; Tambah Pengeluaran
                            </button>

                            <button type="button" class="btn btn-sm col-12 bg-gradient-info mt-0 mb-0 me-4"
                                data-bs-toggle="modal" data-bs-target="#cariTransaksi">
                                <i style="font-size: 15px" class="fa fa-magnifying-glass" aria-hidden="true"></i>
                                &nbsp;&nbsp; Cari Transaksi
                            </button>

                            <div class="col-12">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Cari Transaksi Laundry-->
    <div wire:ignore.self class="modal fade" id="cariTransaksi" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="cariTransaksiLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cariTransaksiLabel">CARI TRANSAKSI LAUNDRY</h1>
                    <button type="button" class="btn-close btn-dark bg-dark" data-bs-dismiss="modal" aria-label="Close"
                        wire:click='resetInputs'></button>
                </div>
                <div class="modal-body">
                    <form class=''>
                        <div class="form-group col-12">
                            <label for="search">ID TRANSAKSI</label>
                            <input wire:model.live='search' type="string" 
                                class="form-control text-uppercase border border-2 p-2"
                                id="search" placeholder="Masukkan ID Transaksi" 
                                autocomplete="off">
                        </div>
                    </form>

                    <div class="col-12 mt-3">
                        @if ($find_transaksi == null)
                        <span class="d-block text-sm text-bold p-2 text-center">DATA TIDAK DITEMUKAN</span>
                        @else
                            <div class="col-12">
                                <span class="d-block text-sm text-bold p-2 text-center">DATA DITEMUKAN</span>
                                <div class="row mt-1">
                                    <div class="col-4 text-center mt-1">
                                        <span class="text-bold text-capitalize">
                                            {{ $find_transaksi->pelanggan->nama_pelanggan }}
                                        </span>
                                    </div>
                                    <div class="col-4 text-center mt-1 border-start border-secondary">
                                        <span class="text-bold">
                                            {{ $find_transaksi->pelanggan->nomor_telepon }}
                                        </span>
                                    </div>
                                    <div class="col-4 text-center border-start border-secondary mt-1">
                                        <button type="button" class="btn btn-sm bg-gradient-info mt-0 mb-0 me-4"
                                            wire:click="detailTransaksi('{{ $find_transaksi->id_transaksi }}')"">
                                            DETAIL
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm my-1 btn-secondary" data-bs-dismiss="modal"
                        data-bs-target="#cariTransaksi" wire:click="resetInputs">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script src="{{ asset('assets') }}/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx = document.getElementById("chart-bars").getContext("2d");

        function renderChart(){

            let jumlahPerHari = @json($transaksiPerHari);
            let transaksiArray = Object.values(jumlahPerHari);
            new Chart(ctx, {
                type: "bar",
                data: {
                    labels: ["Sn", "Sl", "Rb", "Km", "Jm", "Sb", "Mg"],
                    datasets: [{
                        label: "Transaksi",
                        tension: 0.4,
                        borderWidth: 0,
                        borderRadius: 4,
                        borderSkipped: false,
                        backgroundColor: "rgba(255, 255, 255, .8)",
                        data: transaksiArray,
                        maxBarThickness: 6
                    }, ],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    scales: {
                        y: {
                            grid: {
                                drawBorder: false,
                                display: true,
                                drawOnChartArea: true,
                                drawTicks: false,
                                borderDash: [5, 5],
                                color: 'rgba(255, 255, 255, .2)'
                            },
                            ticks: {
                                suggestedMin: 0,
                                suggestedMax: 500,
                                beginAtZero: true,
                                padding: 10,
                                font: {
                                    size: 14,
                                    weight: 300,
                                    family: "Roboto",
                                    style: 'normal',
                                    lineHeight: 2
                                },
                                color: "#fff"
                            },
                        },
                        x: {
                            grid: {
                                drawBorder: false,
                                display: true,
                                drawOnChartArea: true,
                                drawTicks: false,
                                borderDash: [5, 5],
                                color: 'rgba(255, 255, 255, .2)'
                            },
                            ticks: {
                                display: true,
                                color: '#f8f9fa',
                                padding: 10,
                                font: {
                                    size: 14,
                                    weight: 300,
                                    family: "Roboto",
                                    style: 'normal',
                                    lineHeight: 2
                                },
                            }
                        },
                    },
                },
            });
        }

        renderChart();
    </script>
@endpush
