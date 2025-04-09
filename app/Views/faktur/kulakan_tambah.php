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
                        <input type="text" id="search_barang" class="form-control" placeholder="Cari barang berdasarkan nama atau barcode" autofocus>
                        <button class="btn btn-success" id="btn_cari">Cari</button>
                    </div>
                    <datalist id="barang-list"></datalist>
                </div>

                <div class="row mt-4">
                    <div class="col-md-5">
                        <h5>Data Pembelian Barang</h5>
                        <form id="form_barang" action="<?= base_url('kulakan/simpan') ?>" method="post">
                            <div class="mb-3">
                                <label class="form-label">ID Barang</label>
                                <input type="text" id="id_barang" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kode Barang</label>
                                <input type="text" id="kode_barang" class="form-control" readonly>
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

</script>
<script>
    let barangDipilih = null;

    $('#search_barang').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "<?= base_url('barang/search') ?>",
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        select: function(event, ui) {
            barangDipilih = ui.item;
            $('#id_barang').val(ui.item.id);
            $('#kode_barang').val(ui.item.barcode);
            $('#nama_barang').val(ui.item.nama_barang);
            $('#harga_kulak').val(ui.item.harga_beli);
            $('#harga_jual').val(ui.item.harga_jual_normal);
            $('#harga_level_1').val(ui.item.harga_jual_lv1);
            $('#harga_level_2').val(ui.item.harga_jual_lv2);
            $('#expired').val(ui.item.expired_barang);
        },
        minLength: 2
    });


    // Tambahkan ke tabel kulakan
    $('#form_barang').on('submit', function(e) {
        e.preventDefault();
        // console.log(ui.item);

        let no = $('#fakturTable2 tbody tr').length + 1;
        let jumlah = $('#jumlah_kulakan').val();
        if (!barangDipilih || jumlah == "") {
            alert("Pilih barang dan isi jumlah terlebih dahulu");
            return;
        }

        $('#fakturTable2 tbody').append(`
            <tr>
                <td>${no}</td>
                <td>${barangDipilih.barcode}</td>
                <td>${barangDipilih.nama_barang}</td>
                <td>${jumlah}</td>
                <td>${$('#expired').val()}</td>
                <td><button class="btn btn-danger btn-sm btn-hapus">Hapus</button></td>
            </tr>
        `);

        $('#form_barang')[0].reset();
        barangDipilih = null;
    });

    // Hapus baris dari tabel kulakan
    $(document).on('click', '.btn-hapus', function() {
        $(this).closest('tr').remove();
    });
</script>


</div>

<?= $this->include('templates/footer'); ?>