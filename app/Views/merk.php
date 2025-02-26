<?= $this->include('templates/header'); ?>
<?= $this->include('templates/sidebar'); ?>
<?= $this->include('templates/navbar'); ?>

<!-- content -->
<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Merk</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Data Master</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Merk</li>
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
                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahMerk">
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
                            <div class="d-flex justify-content-between align-items-center mb-3">
                            </div>
                            <div class="table-responsive">
                                <table id="merkTable" class="table table-hover">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Nama Merk</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($merk as $item): ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $item['id_merk'] ?></td>
                                                <td><?= $item['nama_merk'] ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#detailModal<?= $item['id_merk'] ?>" class="btn btn-sm btn-warning me-2">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </button>
                                                        <form action="<?= base_url('/deleteMerk'); ?>" method="post">
                                                            <input type="hidden" name="id_merk" value="<?= $item['id_merk']; ?>">
                                                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                                                        </form>
                                                    </div>
                                                </td>

                                                <!-- Modal update merk -->
                                                <div class="modal fade" id="detailModal<?= $item['id_merk'] ?>" aria-labelledby="detailModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="detailModalLabel">Edit Data Merk</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="<?= base_url('/updateMerk'); ?>" method="post">
                                                                <input type="hidden" class="form-control" id="id_merk" name="id_merk" value="<?= $item['id_merk'] ?>">
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Nama Merk</label>
                                                                        <input type="text" name="nama_merk" class="form-control" value="<?= $item['nama_merk'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" class="form-control" id="link_merk" name="link_merk" value="<?= $item['link_merk'] ?>">
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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


        <!-- Modal Tambah Data -->
        <div class="modal fade" id="modalTambahMerk" tabindex="-1" aria-labelledby="modalTambahMerkLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahMerkLabel">Tambah Data Merk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= base_url('/addMerk'); ?>" method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Nama Merk</label>
                                <input type="text" name="nama_merk" class="form-control" required>
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
                $('#merkTable').DataTable({
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
                $('#merkTable').DataTable();

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