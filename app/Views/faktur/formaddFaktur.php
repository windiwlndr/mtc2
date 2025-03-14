<?= $this->include('templates/header'); ?>
<?= $this->include('templates/sidebar'); ?>
<?= $this->include('templates/navbar'); ?>

<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Form Faktur Beli</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Faktur Pembelian</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Faktur Beli</li>
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
                            <h4>Form Input Barang Masuk</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= site_url('/submitBarangMasuk') ?>" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="id_faktur" class="form-label">ID Faktur</label>
                                            <input type="text" class="form-control" id="id_faktur" name="id_faktur" value="2025051504" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="supplier" class="form-label">Pilih Supplier</label>
                                            <select class="form-select" id="supplier" name="id_supplier">
                                                <option value="">Pilih Supplier</option>
                                                <?php foreach ($supplier as $s) : ?>
                                                    <option value="<?= $s['id_supplier']; ?>"><?= $s['nama_supplier']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="nama_admin_pembelian" class="form-label">Nama Admin</label>
                                            <input type="text" id="nama_admin_pembelian" name="nama_admin_pembelian" class="form-control" placeholder="Masukkan nama admin" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="tanggal" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="2025-01-01">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <input type="text" class="form-control" id="status" name="status" value="LUNAS" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="ket_jatuh_tempo" class="form-label">Keterangan Jatuh Tempo</label>
                                            <input type="text" class="form-control" id="ket_jatuh_tempo" name="ket_jatuh_tempo" placeholder="Masukkan keterangan jatuh tempo">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="jatuh_tempo" class="form-label">Tgl. Jatuh Tempo</label>
                                            <input type="date" class="form-control" id="jatuh_tempo" name="jatuh_tempo" value="2025-02-15">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="total_pembelian" class="form-label">Total Pembelian</label>
                                            <input type="number" class="form-control" id="total_pembelian" name="total_pembelian" value="300000" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="keterangan" class="form-label">Keterangan</label>
                                            <input class="form-control" id="keterangan" name="keterangan"></input>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?= $this->include('templates/footer'); ?>