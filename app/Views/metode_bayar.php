<?= $this->include('templates/header'); ?>
<?= $this->include('templates/sidebar'); ?>
<?= $this->include('templates/navbar'); ?>

<!-- content -->
<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Metode Pembayaran</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Data Master</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Metode Pembayaran</li>
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
                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahMetode">
                                <i class="fas fa-plus"></i> Tambah Metode Pembayaran
                            </button>
                            <!-- Modal Tambah Metode Pembayaran -->
                            <div class="modal fade" id="modalTambahMetode" tabindex="-1" aria-labelledby="modalTambahMetodeLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTambahMetodeLabel">Tambah Metode Pembayaran</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="<?= base_url('/metode_bayar/add'); ?>" method="post">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Metode Pembayaran</label>
                                                    <input type="text" name="metode_bayar" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
                                <table id="metodeTable" class="table table-hover">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($metode_bayar as $item): ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $item['id_metode_bayar'] ?></td>
                                                <td><?= $item['metode_bayar'] ?></td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="form-button-action">
                                                                <button type="button" data-bs-toggle="modal" data-bs-target="#modaleditMetode<?= $item['id_metode_bayar']; ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i>Edit</button>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-button-action">
                                                                <form action="<?= site_url('/metode_bayar/delete'); ?>" method="post">
                                                                    <input type="hidden" name="id_metode_bayar" value="<?= $item['id_metode_bayar']; ?>">
                                                                    <button type="submit" class="btn btn-sm btn-danger" ><i class="fas fa-trash"></i>Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="modaleditMetode<?= $item['id_metode_bayar']; ?>" aria-labelledby="modaleditMetodeLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modaleditMetodeLabel">Edit Metode Pembayaran</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <form action="<?= base_url('metode_bayar/update'); ?>" method="post">
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="id_metode_bayar" value="<?= $item['id_metode_bayar']; ?>">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Metode Pembayaran</label>
                                                                            <input type="text" name="metode_bayar" class="form-control" value="<?= $item['metode_bayar']; ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
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
                $('#metodeTable').DataTable({
                    "dom": '<"d-flex justify-content-between align-items-center mb-3"l f>rt<"d-flex justify-content-between align-items-center mt-3"ip>',
                    "language": {
                        "lengthMenu": "Show _MENU_ entries",
                        "search": ""
                    }
                });

                // Tambahkan placeholder ke search input
                $('.dataTables_filter input').attr("placeholder", "Search...").addClass("form-control w-auto");

                // Tambahkan class ke dropdown entries
                $('.dataTables_length select').addClass("form-select d-inline w-auto");

                // Fungsi untuk tombol collapse
                $('#collapseBtn').click(function() {
                    $('.card-body').toggle();
                    $(this).find('i').toggleClass('fa-chevron-down fa-chevron-up');
                });

                // Fungsi untuk tombol refresh
                $('#refreshBtn').click(function() {
                    location.reload();
                });

                // Fungsi untuk tombol close
                $('#closeBtn').click(function() {
                    $('.card').fadeOut();
                });
            });
        </script>
        <?php if (session()->getFlashdata('success')) : ?>
            <script>
                Swal.fire("Berhasil!", "<?= session()->getFlashdata('success'); ?>", "success");
            </script>
        <?php elseif (session()->getFlashdata('error')) : ?>
            <script>
                Swal.fire("Gagal!", "<?= session()->getFlashdata('error'); ?>", "error");
            </script>
        <?php endif; ?>