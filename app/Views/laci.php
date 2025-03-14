<?= $this->include('templates/header'); ?>
<?= $this->include('templates/sidebar'); ?>
<?= $this->include('templates/navbar'); ?>

<!-- content -->
<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Laci Keuangan</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Laci Keuangan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="container">
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahLaci">
                                <i class="fas fa-plus"></i> Tambah Data
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
                            <table id="laciTable" class="table table-hover">
                                <thead class="table-primary">
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Waktu Login</th>
                                        <th>Shift</th>
                                        <th>Uang Modal</th>
                                        <th>Uang Setor</th>
                                        <th>Tujuan Setor</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($laci as $item) : ?>
                                        <tr>
                                            <td><?= $item['id_laci'] ?></td>
                                            <td><?= $item['id_user'] ?></td>
                                            <td><?= $item['waktu_login'] ?></td>
                                            <td><?= $item['shift'] ?></td>
                                            <td><?= number_format($item['uang_modal'], 2, ',', '.') ?></td>
                                            <td><?= number_format($item['uang_setor'], 2, ',', '.') ?></td>
                                            <td><?= $item['tujuan_setor'] ?></td>
                                            <td>
                                                <div class="d-flex">
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#detailModal<?= $item['id_laci'] ?>" class="btn btn-sm btn-warning me-2">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                    <form action="<?= base_url('/kategori/delete'); ?>" method="post">
                                                        <input type="hidden" name="id_laci" value="<?= $item['id_laci']; ?>">
                                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                                                    </form>
                                                </div>

                                                <!-- Modal update laci -->
                                                <div class="modal fade" id="detailModal<?= $item['id_laci'] ?>" aria-labelledby="detailModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="detailModalLabel">Edit Data Laci</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <form action="<?= base_url('/laci/update'); ?>" method="post">
                                                                <input type="hidden" name="id_laci" value="<?= $item['id_laci'] ?>">
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Shift</label>
                                                                        <input type="text" name="shift" class="form-control" value="<?= $item['shift'] ?>" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Uang Modal</label>
                                                                        <input type="number" name="uang_modal" class="form-control" value="<?= $item['uang_modal'] ?>" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Uang Setor</label>
                                                                        <input type="number" name="uang_setor" class="form-control" value="<?= $item['uang_setor'] ?>" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Tujuan Setor</label>
                                                                        <input type="text" name="tujuan_setor" class="form-control" value="<?= $item['tujuan_setor'] ?>" required>
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


                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal Tambah Data Laci -->
        <div class="modal fade" id="modalTambahLaci" tabindex="-1" aria-labelledby="modalTambahLaciLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahLaciLabel">Tambah Data Laci</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= base_url('/laci/update/' . $item['id_laci']); ?>" method="post">

                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">User</label>
                                <input type="text" name="id_user" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Shift</label>
                                <input type="text" name="shift" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Uang Modal</label>
                                <input type="number" name="uang_modal" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Uang Setor</label>
                                <input type="number" name="uang_setor" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tujuan Setor</label>
                                <input type="text" name="tujuan_setor" class="form-control" required>
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
    </div>


    <?= $this->include('templates/footer'); ?>

    <script>
        $(document).ready(function() {
            $('#laciTable').DataTable({
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
        });

        $(document).ready(function() {
            $('#laciTable').DataTable();

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