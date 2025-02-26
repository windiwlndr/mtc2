                    <?= $this->include('templates/header'); ?>
                    <?= $this->include('templates/sidebar'); ?>
                    <?= $this->include('templates/navbar'); ?>

                    <!-- content-->
                    <div id="main-content">
                        <div class="page-heading">
                            <div class="page-title">
                                <div class="row">
                                    <div class="col-12 col-md-6 order-md-1 order-last">
                                        <h3>Data Supplier</h3>
                                    </div>
                                    <div class="col-12 col-md-6 order-md-2 order-first">
                                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="index.html">Data Master</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Data Supplier</li>
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

                                                <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahData">
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
                                                    <table id="supplierTable" class="table table-hover">
                                                        <thead class="table-primary">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>ID</th>
                                                                <th>Nama Supplier</th>
                                                                <th>Asal</th>
                                                                <th>No Tlp/HP</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 1;
                                                            foreach ($suppliers as $supplier): ?>
                                                                <tr>
                                                                    <td><?= $no++ ?></td>
                                                                    <td><?= $supplier['id_supplier'] ?></td>
                                                                    <td><?= $supplier['nama_supplier'] ?></td>
                                                                    <td><?= $supplier['alamat'] ?></td>
                                                                    <td><?= $supplier['no_telp'] ?></td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <button type="button" data-bs-toggle="modal" data-bs-target="#detailModal<?= $supplier['id_supplier'] ?>" class="btn btn-sm btn-warning me-2">
                                                                                <i class="fas fa-edit"></i> Edit
                                                                            </button>
                                                                            <form action="<?= base_url('/deleteSupplier'); ?>" method="post">
                                                                                <input type="hidden" name="id_supplier" value="<?= $supplier['id_supplier']; ?>">
                                                                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                                                                            </form>
                                                                        </div>
                                                                    </td>

                                                                    <!-- modal update-->
                                                                    <div class="modal fade" id="detailModal<?= $supplier['id_supplier']; ?>" aria-labelledby="detailModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="detailModalLabel">Detail Informasi</h5>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <form action="<?= site_url('/updateSupplier') ?>" method="POST">
                                                                                    <div class="modal-body">
                                                                                        <input type="hidden" name="id_supplier" value="<?= $supplier['id_supplier']; ?>">

                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label for="nama_supplier">Nama</label>
                                                                                                    <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" value="<?= $supplier['nama_supplier'] ?>">
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label for="alamat">Alamat</label>
                                                                                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $supplier['alamat'] ?>">
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label for="nama_pj">Nama Pj</label>
                                                                                                    <input type="text" class="form-control" id="nama_pj" name="nama_pj" value="<?= $supplier['nama_pj'] ?>">
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label for="no_telp">No Tlp</label>
                                                                                                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $supplier['no_telp'] ?>">
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label for="email">Email</label>
                                                                                                    <input type="text" class="form-control" id="email" name="email" value="<?= $supplier['email'] ?>">
                                                                                                </div>
                                                                                            </div>


                                                                                            <input type="hidden" class="form-control" id="link_supplier" name="link_supplier" value="<?= $supplier['link_supplier'] ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- end modal update -->
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
                            <div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="modalTambahDataLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTambahDataLabel">Tambah Data Supplier</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="<?= site_url('/addSupplier'); ?>" method="post">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label" for="nama_pj">Nama Penanggung Jawab</label>
                                                    <input type="text" class="form-control" name="nama_pj" id="nama_pj">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="nama_supplier">Nama CV/PT/UD</label>
                                                    <input type="text" class="form-control" name="nama_supplier" id="nama_supplier">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="alamat">Alamat</label>
                                                    <input type="text" class="form-control" name="alamat" id="alamat">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="email">Email</label>
                                                    <input type="text" class="form-control" name="email" id="email">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="no_telp">No Telp/HP</label>
                                                    <input type="text" class="form-control" name="no_telp" id="no_telp">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?= $this->include('templates/footer'); ?>

                        <script>
                            $(document).ready(function() {
                                $('#supplierTable').DataTable({
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
                                $('#supplierTable').DataTable();

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