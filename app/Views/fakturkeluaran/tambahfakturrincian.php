<?= $this->include('templates/header'); ?>
<?= $this->include('templates/sidebar'); ?>
<?= $this->include('templates/navbar'); ?>

<!-- content -->
<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-md-6">
                    <h3>Tambah Rincian Keluar</h3>
                </div>
                <div class="col-md-6">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Faktur Keluaran</a></li>
                            <li class="breadcrumb-item active">Tambah Rincian Keluar</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="card">

            <div class="card-body">
                <div class="mb-3">
                    <label for="search_barang" class="form-label fw-bold">ID Barang / Nama Barang:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="search_barang" placeholder="Masukkan ID Barang atau Nama Barang" list="barang-list">
                        <button class="btn btn-success" id="btn_cari">Cari</button>
                    </div>
                    <datalist id="barang-list"></datalist>
                </div>

                <div class="table-responsive">
                    <table id="table_barang" class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>ID Barang</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <h5>Data Barang Keluar</h5>
                        <form action="<?= base_url('rincian/simpan') ?>" method="post" id="form_barang_keluar">
                            <?= csrf_field() ?>
                            <div class="mb-3">
                                <label class="form-label">ID Barang</label>
                                <input type="text" name="id_barang" id="id_barang" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Barang</label>
                                <input type="text" id="nama_barang" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jumlah Keluar</label>
                                <input type="number" name="jumlah_keluar" id="jumlah_keluar" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Keterangan</label>
                                <select name="keterangan" id="keterangan" class="form-control">
                                    <option value="expired">Expired</option>
                                    <option value="rusak">Rusak</option>
                                    <option value="jual_ecer">Jual Ecer</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    </div>
                    <div class="col-md-6">
                        <h5>Tabel Data Barang Keluar</h5>
                        <div class="table-responsive">
                            <table id="fakturTable2" class="table table-hover">
                                <thead class="table-primary">
                                    <tr>
                                        <th>No</th>
                                        <th>ID Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        let dataBarang = [{
                id: "123",
                nama: "Barang 1",
                stok: 50
            },
            {
                id: "456",
                nama: "Barang 2",
                stok: 30
            }
        ];

        let datalist = $('#barang-list');
        dataBarang.forEach(b => {
            datalist.append(`<option value="${b.id} - ${b.nama}">`);
        });

        $('#btn_cari').on('click', function() {
            let inputVal = $('#search_barang').val().trim().toLowerCase();
            if (inputVal === "") return alert("Masukkan ID atau Nama Barang!");

            let foundBarang = dataBarang.find(b => b.id === inputVal || b.nama.toLowerCase() === inputVal);

            if (foundBarang) {
                $('#table_barang tbody').html(`
                    <tr>
                        <td>${foundBarang.id}</td>
                        <td>${foundBarang.nama}</td>
                        <td>${foundBarang.stok}</td>
                        <td><button class='btn btn-primary btn_pilih' data-id='${foundBarang.id}'>Pilih</button></td>
                    </tr>
                `);
            } else {
                $('#table_barang tbody').html('<tr><td colspan="4" class="text-center text-danger">Barang tidak ditemukan</td></tr>');
            }
        });

        $(document).on('click', '.btn_pilih', function() {
            let barangId = $(this).data('id');
            let barang = dataBarang.find(b => b.id === barangId);

            if (barang) {
                $('#id_rincian_keluar').val("RK" + new Date().getTime());
                $('#id_barang').val(barang.id);
                $('#nama_barang').val(barang.nama);
            }
        });

        $('#form_barang_keluar').on('submit', function(e) {
            e.preventDefault();
            alert("Data berhasil disimpan!");
            $('#form_barang_keluar')[0].reset();
        });
    });
</script>

<?= $this->include('templates/footer'); ?>