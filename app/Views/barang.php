<?= $this->include('templates/header'); ?>
<?= $this->include('templates/sidebar'); ?>
<?= $this->include('templates/navbar'); ?>

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
                                <!-- modal add-->
                                <div class="modal fade" id="modalTambahBarang" aria-labelledby="modalTambahBarang" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTambahBarang">User baru</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <?= $this->include('barang/formadd'); ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- end modal add -->
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
                                        foreach ($barang as $b) :
                                            //dd($b);
                                        ?>
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
                                                            <li><button type="button" data-bs-toggle="modal" data-bs-target="#editModal<?= $b['id_barang']; ?>" class="dropdown-item"><i class="fas fa-edit"></i> Edit</button></li>
                                                            <li>
                                                                <form action="<?= site_url('/deleteBarang'); ?>" method="post">
                                                                    <input type="hidden" name="id_barang" value="<?= $b['id_barang']; ?>">
                                                                    <button type="submit" class="dropdown-item text-danger"><i class="fas fa-trash"></i>Hapus</button>
                                                                </form>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li><a class="dropdown-item" href="#"><i class="fas fa-file-image"></i> PNG</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="fas fa-align-justify"></i> 2 baris</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="fas fa-align-justify"></i> 4 baris</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="fas fa-file-alt"></i> A4</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="fas fa-tag"></i> Label</a></li>
                                                            <li>
                                                                <!-- <a class="dropdown-item" href="#"><i class="fas fa-barcode"></i> Barcode</a> -->
                                                                <button type="button" data-bs-toggle="modal" data-bs-target="#barcodeModal<?= $b['id_barang']; ?>" class="dropdown-item"><i class="fas fa-barcode"></i> barcode</button>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li>
                                                                <button type="button" data-bs-toggle="modal" data-bs-target="#detailModal<?= $b['id_barang']; ?>" class="dropdown-item"><i class="fas fa-search"></i> Detail</button>
                                                                <!-- <a class="dropdown-item" href="#"><i class="fas fa-search"></i> Detail</a> -->
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- modal edit-->
                                                    <div class="modal fade" id="editModal<?= $b['id_barang']; ?>" aria-labelledby="editModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editModalLabel">Ubah Data Barang</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <?= view('barang/formUpdate', ['b' => $b]); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end modal edit -->
                                                    <!-- modal detail-->
                                                    <div class="modal fade" id="detailModal<?= $b['id_barang']; ?>" aria-labelledby="detailModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="detailModalLabel">Detail Barang</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <?= view('barang/detail', ['b' => $b]); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end modal detail -->
                                                    <!-- modal barcode -->
                                                    <div class="modal fade" id="barcodeModal<?= $b['id_barang']; ?>" aria-labelledby="detailModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="detailModalLabel">Barcode Barang <?= $b['nama_barang']; ?></h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <?= view('barang/barcode', ['b' => $b]); ?>
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
            $('#modalTambahBarang').on('shown.bs.modal', function() {
                $('#barcode').focus();
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