<?= $this->include('templates/header'); ?>
<?= $this->include('templates/sidebar'); ?>
<?= $this->include('templates/navbar'); ?>

<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data History</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Data Master</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data History</li>
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
                            <!-- <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahKartuStok">
                                <i class="fas fa-plus"></i> Tambah Data
                            </button> -->
    
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="historyTable" class="table table-hover">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>ID User</th>
                                            <th>ID Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Stok Awal</th>
                                            <th>Stok Akhir</th>
                                            <th>Keterangan</th>
                                            <!-- <th>Aksi</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($history as $item): ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $item['tanggal_history'] ?></td>
                                                <td><?= $item['nama_user'] ?></td>
                                                <td><?= $item['barcode'] ?></td>
                                                <td>
                                                    <?php
                                                    $index = array_search($item['id_barang'], array_column($barang, 'id_barang'));
                                                    echo $index !== false ? $barang[$index]['nama_barang'] : '';
                                                    ?>
                                                </td>

                                                <td><?= $item['jumlah'] ?></td>
                                                <td><?= $item['stok_awal'] ?></td>
                                                <td><?= $item['stok_akhir'] ?></td>
                                                <td><?= $item['keterangan'] ?></td>
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
                $('#historyTable').DataTable({
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
                $('#historyTable').DataTable();

                
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