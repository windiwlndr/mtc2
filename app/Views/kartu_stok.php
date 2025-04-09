<?= $this->include('templates/header'); ?>
<?= $this->include('templates/sidebar'); ?>
<?= $this->include('templates/navbar'); ?>

<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h3>Data Kartu Stok</h3>
                </div>
                <div class="col-12 col-md-6">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Data Master</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kartu Stok</li>
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
                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahKartuStok">
                                <i class="fas fa-plus"></i> Tambah Data
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="kartuStokTable" class="table table-hover">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>No</th>
                                            <!-- <th>ID Kartu Stok</th> -->
                                            <th>ID User</th>
                                            <th>Tanggal</th>
                                            <th>Catatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($kartu_stok as $item): ?>
                                            <tr>
                                                <td><?= $no++ ?></td>                                                
                                                <td><?= $item['nama_user'] ?></td>
                                                <td><?= $item['tgl_kartu'] ?></td>
                                                <td><?= $item['catatan'] ?></td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <!-- Tombol Tambah Data -->
                                                        <button type="button" class="btn btn-success btn-sm"
                                                            onclick="window.location.href='<?= site_url('/detail_kartu_stok/tambah?id_kartu_stok=' . ($item['id_kartu_stok'] ?? '')) ?>'">
                                                            <i class="fas fa-plus"></i>
                                                        </button>

                                                        <!-- Tombol Detail stok -->
                                                        <button type="button" class="btn btn-warning btn-sm" onclick="window.location.href='<?= site_url('/detail_kartu_stok/detail?id_kartu_stok=' . ($item['id_kartu_stok'] ?? '')) ?>'">                                                        
                                                            <i class="fas fa-search"></i>
                                                        </button>

                                                        <!-- Tombol Edit -->
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#editModal<?= $item['id_kartu_stok'] ?>" class="btn btn-sm btn-warning">
                                                            <i class="fas fa-edit"></i>
                                                        </button>

                                                        <!-- Tombol Hapus -->
                                                        <form action="<?= base_url('/kartu_stok/delete'); ?>" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                            <input type="hidden" name="id_kartu_stok" value="<?= $item['id_kartu_stok']; ?>">
                                                            <button type="submit" class="btn btn-sm btn-danger">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>

                                            </tr>

                                            <!-- Modal Update Kartu Stok -->
                                            <div class="modal fade" id="editModal<?= $item['id_kartu_stok'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $item['id_kartu_stok'] ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel<?= $item['id_kartu_stok'] ?>">Edit Data Kartu Stok</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="<?= base_url('/kartu_stok/update'); ?>" method="post">
                                                            <input type="hidden" class="form-control" id="id_kartu_stok" name="id_kartu_stok" value="<?= $item['id_kartu_stok'] ?>">
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label">ID User</label>
                                                                    <input type="text" name="id_user" class="form-control" value="<?= $item['id_user'] ?>" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Tanggal</label>
                                                                    <input type="date" name="tgl_kartu" class="form-control" value="<?= $item['tgl_kartu'] ?>" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Catatan</label>
                                                                    <textarea name="catatan" class="form-control"><?= $item['catatan'] ?></textarea>
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
        <div class="modal fade" id="modalTambahKartuStok" tabindex="-1" aria-labelledby="modalTambahKartuStokLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahKartuStokLabel">Tambah Kartu Stok</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= base_url('/kartu_stok/add'); ?>" method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">ID User</label>
                                <select name="id_user" id="id_user" class="form-select" required>
                                    <option value="">Pilih User</option>
                                    <?php foreach ($user as $u) : ?>
                                        <option value="<?= $u->id_user ?>"><?= $u->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal</label>
                                <input type="date" name="tgl_kartu" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Catatan</label>
                                <textarea name="catatan" class="form-control"></textarea>
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
                $('#kartuStokTable').DataTable({
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
                $('#kartuStokTable').DataTable();

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