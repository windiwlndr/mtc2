<?= $this->include('templates/header'); ?>
<?= $this->include('templates/sidebar'); ?>
<?= $this->include('templates/navbar'); ?>

<?php
$db = db_connect();
$query = "SELECT tb_barang.*, tb_satuan.nama_satuan, tb_kategori.nama_kategori 
          FROM tb_barang
          JOIN tb_satuan ON tb_barang.id_satuan = tb_satuan.id_satuan
          JOIN tb_kategori ON tb_barang.id_kategori = tb_kategori.id_kategori";
$barang = $db->query($query)->getResultArray();
?>

<!-- content -->
<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Barang</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Data Master</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Barang</li>
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
                            <div>
                                <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahBarang">
                                    <i class="fas fa-plus"></i> Tambah Data
                                </button>
                                <button class="btn btn-primary btn-sm">
                                    <i class="fas fa-print"></i> Cetak Barang + Info Modal
                                </button>
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-file-pdf"></i> Cetak ke PDF
                                </button>
                                <button class="btn btn-warning btn-sm">
                                    <i class="fas fa-file-excel"></i> Import Excel
                                </button>
                                <button class="btn btn-secondary btn-sm">
                                    <i class="fas fa-list"></i> Full Data
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="barangTable" class="table table-hover">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>No</th>
                                            <th>ID Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Satuan Jual</th>
                                            <th>Kategori</th>
                                            <th>Stok Real</th>
                                            <th>H. Jual Beli</th>
                                            <th>H. Jual Ecer</th>
                                            <th>H. Jual Member</th>
                                            <th>H. Grosir</th>
                                            <th>Rak</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($barang as $b) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $b['id_barang']; ?></td>
                                                <td><?= $b['nama_barang']; ?></td>
                                                <td><?= $b['nama_satuan']; ?></td>
                                                <td><?= $b['nama_kategori']; ?></td>
                                                <td><?= $b['stok']; ?></td>
                                                <td><?= number_format($b['harga_beli'], 2, ',', '.'); ?></td>
                                                <td><?= number_format($b['harga_jual_normal'], 2, ',', '.'); ?></td>
                                                <td><?= number_format($b['harga_jual_member'], 2, ',', '.'); ?></td>
                                                <td><?= number_format($b['harga_jual_lv1'], 2, ',', '.'); ?></td>
                                                <td><?= $b['rak_barang']; ?></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-light dropdown-toggle" type="button" id="aksiDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Aksi
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="aksiDropdown">
                                                            <li><a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Edit</a></li>
                                                            <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash"></i> Hapus</a></li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li><a class="dropdown-item" href="#"><i class="fas fa-file-image"></i> PNG</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="fas fa-align-justify"></i> 2 baris</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="fas fa-align-justify"></i> 4 baris</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="fas fa-file-alt"></i> A4</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="fas fa-tag"></i> Label</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="fas fa-barcode"></i> Barcode</a></li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li><a class="dropdown-item" href="#"><i class="fas fa-search"></i> Detail</a></li>
                                                        </ul>
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
                $('#barangTable').DataTable({
                    "paging": true,
                    "pageLength": 10, // Menampilkan 10 data per halaman
                    "searching": true, // Hanya search yang aktif
                    "info": false, // Menghilangkan info jumlah data
                    "lengthChange": false, // Menghilangkan dropdown pilihan jumlah data per halaman
                    "dom": '<"mb-2"f>rt<"d-flex justify-content-center mt-2"p>', // Hanya Search & Pagination
                    "language": {
                        "search": "Cari:",
                        "paginate": {
                            "next": "→",
                            "previous": "←"
                        }
                    }
                });
            });
        </script>