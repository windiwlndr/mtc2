<?= $this->include('templates/header'); ?>
<?= $this->include('templates/sidebar'); ?>
<?= $this->include('templates/navbar'); ?>

<!-- content -->
<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Detail Kartu Stok</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="<?= base_url('/kartu_stok'); ?>">Kartu Stok</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Kartu Stok</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-header d-flex justify-content-start align-items-center">
                            <!-- <button class="btn btn-success btn-sm d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modalTambahDetailKartuStok">
                                <i class="fas fa-plus me-1"></i> Tambah Data
                            </button> -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="detailKartuStokTable" class="table table-hover">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>No</th>
                                            <th> User</th>
                                            <th> Barang</th>
                                            <th>Stok Awal</th>
                                            <th>Stok Cek</th>
                                            <th>Validasi</th>
                                            <th>Stok Valid</th>
                                            <th>Harga Jual</th>
                                            <th>Validasi Harga</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        foreach ($detail_kartu_stok as $data): ?>
                                            <tr>
                                                <td><?= $no++?></td>
                                                <td><?= $data['nama_user']; ?></td>
                                                <td><?= $data['nama_barang']; ?></td>
                                                <td><?= $data['stok_awal']; ?></td>
                                                <td><?= $data['stok_cek']; ?></td>
                                                <td><?= $data['validasi']; ?></td>
                                                <td><?= $data['stok_valid']; ?></td>
                                                <td><?= number_format($data['harga_jual'], 2, ',', '.'); ?></td>
                                                <td><?= $data['validasi_harga']; ?></td>
                                                <td><?= $data['keterangan']; ?></td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['id_detail_kartu_stok'] ?>" class="btn btn-sm btn-warning d-flex align-items-center gap-1">
                                                            <i class="fas fa-edit"></i> <span>Edit</span>
                                                        </button>
                                                        <form action="<?= base_url('/detail_kartu_stok/delete'); ?>" method="post" onsubmit="return confirm('Hapus data ini?');">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="id_detail_kartu_stok" value="<?= esc($data['id_detail_kartu_stok']); ?>">
                                                            <button class="btn btn-sm btn-danger d-flex align-items-center gap-1">
                                                                <i class="fas fa-trash"></i> <span>Hapus</span>
                                                            </button>
                                                        </form>
                                                    </div>

                                                    <!-- Modal Edit Detail Kartu Stok -->
                                                    <div class="modal fade" id="editModal<?= $data['id_detail_kartu_stok'] ?>" aria-labelledby="editModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editModalLabel">Edit Detail Kartu Stok</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <form action="<?= base_url('/detail_kartu_stok/update'); ?>" method="post">
                                                                    <input type="hidden" class="form-control" id="id_detail_kartu_stok" name="id_detail_kartu_stok" value="<?= $data['id_detail_kartu_stok'] ?>">
                                                                    <!-- <form action="<?= base_url('/detail_kartu_stok/update/' . $data['id_detail_kartu_stok']); ?>" method="post">
                                                                    <input type="hidden" name="_method" value="PUT"> -->
                                                                    <div class="modal-body">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Stok Awal</label>
                                                                            <input type="number" name="stok_awal" class="form-control" value="<?= $data['stok_awal'] ?>" required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Stok Cek</label>
                                                                            <input type="number" name="stok_cek" class="form-control" value="<?= $data['stok_cek'] ?>" required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Validasi</label>
                                                                            <select name="validasi" class="form-control">
                                                                                <option value="Valid" <?= $data['validasi'] == 'Valid' ? 'selected' : '' ?>>Valid</option>
                                                                                <option value="Tidak Valid" <?= $data['validasi'] == 'Tidak Valid' ? 'selected' : '' ?>>Tidak Valid</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Stok Valid</label>
                                                                            <input type="number" name="stok_valid" class="form-control" value="<?= $data['stok_valid'] ?>" required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Harga Jual</label>
                                                                            <input type="text" name="harga_jual" class="form-control" value="<?= number_format($data['harga_jual'], 2, ',', '.') ?>" required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Validasi Harga</label>
                                                                            <select name="validasi_harga" class="form-control">
                                                                                <option value="Valid" <?= $data['validasi_harga'] == 'Valid' ? 'selected' : '' ?>>Valid</option>
                                                                                <option value="Tidak Valid" <?= $data['validasi_harga'] == 'Tidak Valid' ? 'selected' : '' ?>>Tidak Valid</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Keterangan</label>
                                                                            <textarea name="keterangan" class="form-control"><?= $data['keterangan'] ?></textarea>
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
            </div>
        </section>


        <!-- Modal Tambah Data Detail Kartu Stok -->
        <div class="modal fade" id="modalTambahDetailKartuStok" tabindex="-1" aria-labelledby="modalTambahDetailKartuStokLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahDetailKartuStokLabel">Tambah Data Detail Kartu Stok</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= base_url('/detailkartustok/add'); ?>" method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">ID User</label>
                                <input type="text" name="namauser" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">ID Barang</label>
                                <input type="text" name="id_barang" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Stok Awal</label>
                                <input type="number" name="stok_awal" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Stok Cek</label>
                                <input type="number" name="stok_cek" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Validasi</label>
                                <select name="validasi" class="form-control">
                                    <option value="Valid">Valid</option>
                                    <option value="Tidak Valid">Tidak Valid</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Stok Valid</label>
                                <input type="number" name="stok_valid" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Harga Jual</label>
                                <input type="number" step="0.01" name="harga_jual" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Validasi Harga</label>
                                <select name="validasi_harga" class="form-control">
                                    <option value="Valid">Valid</option>
                                    <option value="Tidak Valid">Tidak Valid</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Keterangan</label>
                                <textarea name="keterangan" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>8
        </div>



        <?= $this->include('templates/footer'); ?>

        <script>
            $(document).ready(function() {
                // Inisialisasi DataTable dengan opsi tambahan
                var table = $('#detailKartuStokTable').DataTable({
                    "dom": '<"d-flex justify-content-between align-items-center mb-3"l f>rt<"d-flex justify-content-between align-items-center mt-3"ip>',
                    "language": {
                        "lengthMenu": "Show _MENU_ entries",
                        "search": ""
                    }
                });

                // Modifikasi tampilan input pencarian dan dropdown jumlah data
                $('.dataTables_filter input').attr("placeholder", "Search...").addClass("form-control w-auto");
                $('.dataTables_length select').addClass("form-select d-inline w-auto");

                // Tombol untuk toggle card-body
                $('#collapseBtn').click(function() {
                    $('.card-body').toggle();
                    $(this).find('i').toggleClass('fa-chevron-down fa-chevron-up'); // Ubah ikon
                });

                // Tombol refresh untuk reload halaman
                $('#refreshBtn').click(function() {
                    location.reload();
                });

                // Tombol close untuk menyembunyikan card
                $('#closeBtn').click(function() {
                    $('.card').fadeOut(); // Animasi efek hilang
                });
            });
        </script>

        <script>
            document.querySelectorAll('.btn-pilih-kartu-stok').forEach(button => {
                button.addEventListener('click', function() {
                    let id = this.getAttribute('data-id'); // Pastikan tombol memiliki data-id
                    console.log("ID yang diklik:", id); // Debugging
                    document.getElementById("id_kartu_stok").value = id;
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