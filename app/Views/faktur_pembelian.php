<?= $this->include('templates/header'); ?>
<?= $this->include('templates/sidebar'); ?>
<?= $this->include('templates/navbar'); ?>

<!-- content -->
<div id="main-content">
<div class="page-heading">
<div class="page-title">
            <div class="row">
                <!-- Breadcrumb (Kanan) -->
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Faktur Pembelian</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Faktur</li>
                        </ol>
                    </nav>
                </div>

                <!-- Data Faktur (Kiri) -->
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Faktur</h3>
                    <h6 class="text-muted">
                        DATA FAKTUR YANG MASUK TAHUN <span id="tahun">2025</span> |
                        TAGIHAN BELUM TERBAYAR = Rp. <span id="tagihan">0</span>
                    </h6>
                </div>
            </div>
        </div>


        <div class="row mt-3">
            <div class="col-md-2">
                <label for="bulan" class="form-label">Pilih Bulan</label>
                <select class="form-select form-select-sm" id="bulan"></select>

                <script>
                    const bulanList = [
                        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                    ];

                    const bulanSelect = document.getElementById("bulan");

                    bulanList.forEach((bulan, index) => {
                        const option = document.createElement("option");
                        option.value = index + 1; // 1 - 12
                        option.textContent = bulan;
                        bulanSelect.appendChild(option);
                    });
                </script>

            </div>
            <div class="col-md-2">
                <label for="tahun" class="form-label">Pilih Tahun</label>
                <input type="number" class="form-control form-control-sm" id="tahun" value="2025">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button class="btn btn-primary btn-sm">Tampilkan</button>
            </div>
        </div>



        <section class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahFaktur">
                                    <i class="fas fa-plus"></i> New Tambah Faktur
                                </button>
                                <button class="btn btn-warning btn-sm text-white" data-bs-toggle="modal" data-bs-target="#modalTambahFaktur">
                                    <i class="fas fa-plus"></i> Tambah Faktur Versi Lama
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="fakturTable" class="table table-hover">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>No</th>
                                            <th>ID Faktur</th>
                                            <th>Datetime</th>
                                            <th>Supplier</th>
                                            <th>Tanggal Jatuh Tempo</th>
                                            <th>Biaya Pengeluaran</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($faktur as $f) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $f['id_faktur_beli']; ?></td>
                                                <td><?= $f['tanggal_faktur']; ?></td>
                                                <td><?= $f['nama_supplier']; ?></td>
                                                <td><?= $f['tgl_jatuh_tempo'] ?? '-'; ?></td>
                                                <td><?= number_format($f['total_pembelian'], 2, ',', '.'); ?></td>
                                                <td><?= $f['status']; ?></td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="form-check d-flex align-items-center gap-1">
                                                            <input type="checkbox" class="form-check-input" id="lunasCheckbox">
                                                            <label for="lunasCheckbox" class="form-check-label">Lunas</label>
                                                        </div>
                                                        <button type="button" class="btn btn-success btn-sm">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-warning btn-sm">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        

        <?= $this->include('templates/footer'); ?>

        <script>
            $(document).ready(function() {
                var table = $('#fakturTable').DataTable({
                    "paging": true,
                    "pageLength": 10,
                    "searching": true,
                    "info": true,
                    "lengthChange": true,
                    "dom": '<"d-flex justify-content-between align-items-center mb-2"<"d-flex"l><"d-flex"f>>rt<"d-flex justify-content-center mt-2"p>',
                    "language": {
                        "lengthMenu": "Show _MENU_ entries",
                        "search": ""
                    },
                    "initComplete": function() {
                        $('.dataTables_length select').addClass("form-select d-inline w-auto");
                    },
                    "drawCallback": function() {
                        $('.dataTables_filter input').attr("placeholder", "Search...").addClass("form-control w-auto");
                    }
                });
            });
        </script>