<?= $this->include('templates/header'); ?>
<?= $this->include('templates/sidebar'); ?>
<?= $this->include('templates/navbar'); ?>


<!-- content -->
<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-md-6">
                    <h3>Detail Faktur</h3>
                </div>
                <div class="col-md-6">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Faktur Pembelian</a></li>
                            <li class="breadcrumb-item active">Detail Faktur</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Tambah Barang Kulakan</h3>
            </div>
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
                    <div class="col-md-5">
                        <h5>Data Pembelian Barang</h5>
                        <form id="form_barang">
                            <div class="mb-3">
                                <label class="form-label">ID Barang</label>
                                <input type="text" id="id_barang" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Barang</label>
                                <input type="text" id="nama_barang" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Harga Kulakan</label>
                                <input type="number" id="harga_kulak" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Harga Jual</label>
                                <input type="number" id="harga_jual" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Harga Level 1</label>
                                <input type="number" id="harga_level_1" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Harga Level 2</label>
                                <input type="number" id="harga_level_2" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jumlah Kulakan</label>
                                <input type="number" id="jumlah_kulakan" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Expired</label>
                                <input type="date" id="expired" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">ID User</label>
                                <input type="text" id="id_user" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                    <div class="col-md-7">
                        <h5>Tabel Data Pembelian Barang</h5>
                        <div class="table-responsive">
                            <table id="fakturTable2" class="table table-hover">
                                <thead class="table-primary">
                                    <tr>
                                        <th>No</th>
                                        <th>Barcode</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Expired</th>
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
            let dataBarang = [
                { id: "123", nama: "Barang 1", stok: 50 },
                { id: "456", nama: "Barang 2", stok: 30 }
            ];

            // Isi datalist dengan format ID - Nama Barang
            let datalist = $('#barang-list');
            dataBarang.forEach(b => {
                datalist.append(`<option value="${b.id} - ${b.nama}">`);
            });

            // Event untuk tombol "Cari"
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

            // Event untuk memilih barang dari tabel
            $(document).on('click', '.btn_pilih', function() {
                let barangId = $(this).data('id');
                let barang = dataBarang.find(b => b.id === barangId);

                if (barang) {
                    $('#id_barang').val(barang.id);
                    $('#nama_barang').val(barang.nama);
                }
            });

            // Event untuk submit form
            $('#form_barang').on('submit', function(e) {
                e.preventDefault();
                alert("Data berhasil disimpan!");
                $('#form_barang')[0].reset();
            });
        });
    </script>
</div>

<?= $this->include('templates/footer'); ?>          