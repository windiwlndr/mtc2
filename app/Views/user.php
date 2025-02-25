<?= $this->include('templates/header'); ?>
<?= $this->include('templates/sidebar'); ?>
<?= $this->include('templates/navbar'); ?>

<!-- content -->
<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data User</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data User
                            </li>
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
                            <!-- <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahData"><i class="fas fa-plus"></i> Tambah Data</button>, -->
                            <button type="button" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah Data</button>
                            <!-- modal add-->
                            <div class="modal fade" id="addModal" aria-labelledby="addModal" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addModal">User baru</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="<?= site_url('/createUser') ?>" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <!-- <input type="hidden" name="id_user"> -->
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="nama">Nama</label>
                                                            <input type="text" class="form-control" id="nama" name="nama">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="username">Username</label>
                                                            <input type="text" class="form-control" id="username" name="username">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input type="text" class="form-control" id="email" name="email">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="password">Password</label>
                                                            <input type="password" class="form-control" id="password" name="password">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="status">Status</label>
                                                            <select class="form-control" id="status" name="status">

                                                                <option value="aktif">Aktif</option>
                                                                <option value="nonaktif">Nonaktif</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="level">Level</label>
                                                            <select class="form-control" id="level" name="level">
                                                                <option value=""></option>
                                                                <option value="1">Manager</option>
                                                                <option value="2">Admin</option>
                                                                <option value="3">Kasir</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-12">
                                                    <label for="foto">Foto</label>
                                                    <input type="file" class="form-control mt-2" name="foto" id="fotoInput">
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
                            <!-- end modal add -->
                            <div class="btn-group">
                                <button class="btn btn-light"><i class="fas fa-chevron-down"></i></button>
                                <button class="btn btn-light"><i class="fas fa-sync-alt"></i></button>
                                <button class="btn btn-light"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <label>Show
                                        <select class="form-select d-inline w-auto">
                                            <option>10</option>
                                            <option>25</option>
                                            <option>50</option>
                                            <option>100</option>
                                        </select>
                                        entries
                                    </label>
                                </div>
                                <div>
                                    <input type="text" class="form-control w-auto" placeholder="Search...">
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Level</th>
                                            <th>Tgl Data</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($user as $admin) :
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $admin['nama']; ?></td>
                                                <td><?= $admin['username']; ?></td>
                                                <td><?= $admin['level']; ?></td>
                                                <td><?= $admin['created_at']; ?></td>
                                                <td><img src="<?= $admin['foto']; ?>" class="rounded-circle" alt="Foto" width="50" height="50"></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#detailModal<?= $admin['id_user']; ?>" class="btn btn-sm btn-warning me-2">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </button>
                                                        <form action="<?= site_url('/deleteUser'); ?>" method="post">
                                                            <input type="hidden" name="id_user" value="<?= $admin['id_user']; ?>">
                                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                                                        </form>
                                                    </div>

                                                    <!-- modal update-->
                                                    <div class="modal fade" id="detailModal<?= $admin['id_user']; ?>" aria-labelledby="detailModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="detailModalLabel">Detail Informasi</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <form action="<?= site_url('/updateUser') ?>" method="POST" enctype="multipart/form-data">
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="id_user" value="<?= $admin['id_user']; ?>">

                                                                        <div class="row">
                                                                            <div class="col-12 text-center">
                                                                                <img src="<?= $admin['foto']; ?>" class="rounded-circle" alt="Foto" width="100" height="100" id="previewFoto<?= $admin['id_user']; ?>">
                                                                                <input type="file" class="form-control mt-2" name="foto" id="fotoInput<?= $admin['id_user']; ?>">
                                                                            </div>

                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="nama">Nama</label>
                                                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $admin['nama'] ?>">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="username">Username</label>
                                                                                    <input type="text" class="form-control" id="username" name="username" value="<?= $admin['username'] ?>">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="level">Level</label>
                                                                                    <select class="form-control" id="level" name="level">
                                                                                        <option value="<?= $admin['level'] ?>"><?= match ($admin['level']) {
                                                                                                                                    '1' => 'manager',
                                                                                                                                    '2' => 'admin',
                                                                                                                                    default => 'kasir'
                                                                                                                                } ?> </option>
                                                                                        <option value="1" <?= $admin['level'] == 'manager' ? 'selected' : ''; ?>>Manager</option>
                                                                                        <option value="2" <?= $admin['level'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                                                                                        <option value="3" <?= $admin['level'] == 'kasir' ? 'selected' : ''; ?>>Kasir</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="status">Status</label>
                                                                                    <select class="form-control" id="status" name="status">
                                                                                        <option value="<?= $admin['status']; ?>" <?= ($admin['status'] == $admin['status']) ? 'selected' : ''; ?>>
                                                                                            <?= $admin['status']; ?>
                                                                                        </option>
                                                                                        <option value="aktif" <?= $admin['status'] == 'aktif' ? 'selected' : ''; ?>>Aktif</option>
                                                                                        <option value="nonaktif" <?= $admin['status'] == 'nonaktif' ? 'selected' : ''; ?>>Nonaktif</option>

                                                                                    </select>
                                                                                </div>
                                                                            </div>
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
                                                <?php endforeach; ?>
                                                </td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span>Showing 1 to 10 of 50 entries</span>
                                <nav>
                                    <ul class="pagination mb-0">
                                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <?= $this->include('templates/footer'); ?>
        <?php if (session()->getFlashdata('success')) : ?>
            <script>
                Swal.fire("Berhasil!", "<?= session()->getFlashdata('success'); ?>", "success");
            </script>
        <?php elseif (session()->getFlashdata('error')) : ?>
            <script>
                Swal.fire("Gagal!", "<?= session()->getFlashdata('error'); ?>", "error");
            </script>
        <?php endif; ?>