<?= $this->include('templates/header'); ?>
<?= $this->include('templates/sidebar'); ?>
<?= $this->include('templates/navbar'); ?>

<!-- content -->
<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Detail Barang</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Data Master</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Detail Barang</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="container mt-4">
            <div class="card shadow">
                <div class="card-body">
                    <!-- Alert Error -->
                    <?php if (session()->getFlashdata('errors')) : ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('detail_kartu_stok/save') ?>" method="post">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="id_kartu_stok" class="form-label">ID Kartu Stok</label>
                                <input type="text" name="id_kartu_stok" id="id_kartu_stok" class="form-control"
                                    value="<?= esc($id_kartu_stok ?? ''); ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="id_user" class="form-label">User</label>
                                <select name="id_user" id="id_user" class="form-select" required>
                                    <option value="">Pilih User</option>
                                    <?php foreach ($user as $u) : ?>
                                        <option value="<?= $u->id_user ?>"><?= $u->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="id_barang" class="form-label">Barang</label>
                                <select name="id_barang" id="id_barang" class="form-select" required>
                                    <option value="">Pilih Barang</option>
                                    <?php foreach ($barang as $b) : ?>
                                        <option value="<?= $b->id_barang ?>"><?= $b->nama_barang ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="stok_awal" class="form-label">Stok Awal</label>
                                <input type="number" name="stok_awal" id="stok_awal" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="stok_cek" class="form-label">Stok Cek</label>
                                <input type="number" name="stok_cek" id="stok_cek" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="validasi" class="form-label">Validasi</label>
                                <select name="validasi" id="validasi" class="form-select">
                                    <option value="valid">Valid</option>
                                    <option value="kurang">Kurang</option>
                                    <option value="tambah">Tambah</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="stok_valid" class="form-label">Stok Valid</label>
                                <input type="number" name="stok_valid" id="stok_valid" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="harga_jual" class="form-label">Harga Jual</label>
                                <input type="text" name="harga_jual" id="harga_jual" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="validasi_harga" class="form-label">Validasi Harga</label>
                                <select name="validasi_harga" id="validasi_harga" class="form-select">
                                    <option value="tetap">Tetap</option>
                                    <option value="perubahan">Perubahan</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= base_url('detail_kartu_stok') ?>" class="btn btn-secondary">Batal</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
    </div>
</div>
</section>
</div>
</div>

<?= $this->include('templates/footer'); ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Ambil id_kartu_stok dari URL
        const params = new URLSearchParams(window.location.search);
        const idKartuStok = params.get("id_kartu_stok");

        if (idKartuStok) {
            document.getElementById("id_kartu_stok").value = idKartuStok;
        }
    });
</script>