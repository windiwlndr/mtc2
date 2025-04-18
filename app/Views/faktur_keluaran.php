<?= $this->include('templates/header'); ?>
<?= $this->include('templates/sidebar'); ?>
<?= $this->include('templates/navbar'); ?>

<!-- Content -->
<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Faktur Keluaran</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Data Transaksi</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Faktur Keluaran</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahFaktur">
                                <i class="fas fa-plus"></i> Tambah Faktur
                            </button>
                            <div>
                                <button id="collapseBtn" class="btn btn-outline-secondary btn-sm me-2">
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <button id="refreshBtn" class="btn btn-outline-secondary btn-sm me-2">
                                    <i class="fas fa-sync-alt"></i>
                                </button>
                                <button id="closeBtn" class="btn btn-outline-secondary btn-sm">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="fakturKeluaranTable" class="table table-hover">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>ID Faktur</th>
                                            <th>Tanggal</th>
                                            <th>ID User</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($faktur as $item) : ?>
                                            <tr>
                                                <td><?= esc($item['id_faktur_keluaran']); ?></td>
                                                <td><?= esc($item['tgl_faktur_keluaran']); ?></td>
                                                <td><?= esc($item['id_user']); ?></td>
                                                <td><?= esc($item['status_faktur']); ?></td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <button type="button" class="btn btn-success btn-sm" onclick="window.location.href='<?= base_url('/rincian/tambah') ?>'">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalDetailFakturKeluaran<?= $item['id_faktur_keluaran']; ?>">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>

                                                    <!-- modal detail -->
                                                    <div class="modal fade" id="modalDetailFakturKeluaran<?= $item['id_faktur_keluaran']; ?>" aria-labelledby="modalDetailFakturKeluaranLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modalDetailFakturKeluaranLabel">Detail Faktur Keluaran</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <?= view('detailfakturkeluaran', ['item' => $item]); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end modal detail -->
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

        <!-- Modal Tambah Faktur Keluaran -->
        <div class="modal fade" id="modalTambahFaktur" tabindex="-1" aria-labelledby="modalTambahFakturLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahFakturLabel">Tambah Faktur Keluaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= base_url('/fakturkeluaran/add'); ?>" method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Faktur</label>
                                <input type="date" name="tgl_faktur_keluaran" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">ID User</label>
                                <input type="text" name="id_user" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status Faktur</label>
                                <select name="status_faktur" class="form-select" required>
                                    <option value="pending">Pending</option>
                                    <option value="approved">Approved</option>
                                    <option value="rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <?= $this->include('templates/footer'); ?>

        <script>
            $(document).ready(function() {
                var table = $('#fakturKeluaranTable').DataTable({
                    "dom": '<"d-flex justify-content-between align-items-center mb-3"l f>rt<"d-flex justify-content-between align-items-center mt-3"ip>',
                    "language": {
                        "lengthMenu": "Tampilkan _MENU_ entri",
                        "search": ""
                    }
                });

                // Tambahkan placeholder ke search input
                $('.dataTables_filter input').attr("placeholder", "Cari...").addClass("form-control w-auto");

                // Tambahkan class ke dropdown entries
                $('.dataTables_length select').addClass("form-select d-inline w-auto");

                // Fungsi untuk tombol collapse
                $('#collapseBtn').click(function() {
                    $('.card-body').toggle();
                    $(this).find('i').toggleClass('fa-chevron-down fa-chevron-up'); // Ubah ikon
                });

                // Fungsi untuk tombol refresh
                $('#refreshBtn').click(function() {
                    location.reload();
                });

                // Fungsi untuk tombol close
                $('#closeBtn').click(function() {
                    $('.card').fadeOut(); // Animasi sembunyikan card
                });

                <?php if (session()->getFlashdata('success')) : ?>
                    Swal.fire("Berhasil!", "<?= esc(session()->getFlashdata('success')); ?>", "success");
                <?php elseif (session()->getFlashdata('error')) : ?>
                    Swal.fire("Gagal!", "<?= esc(session()->getFlashdata('error')); ?>", "error");
                <?php endif; ?>
            });
        </script>