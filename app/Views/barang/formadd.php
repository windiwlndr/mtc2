<form action="<?= site_url('/createBarang') ?>" method="POST" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="barcode">Kode Barang</label>
                    <input autofocus type="text" class="form-control" id="barcode" name="barcode" placeholder="Kosongkan jika tidak ada barcode">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="harga_beli">Harga Beli/Kulak</label>
                    <input type="text" class="form-control" id="harga_beli" name="harga_beli">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="harga_jual_normal">Harga Jual Normal</label>
                    <input type="text" class="form-control" id="harga_jual_normal" name="harga_jual_normal">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="harga_jual_member">Harga Jual Member</label>
                    <input type="text" class="form-control" id="harga_jual_member" name="harga_jual_member" placeholder="0">
                    <p class="text-info">*tidak berlaku kelipatan grosir</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="harga_jual_lv1">Harga Jual Grosir LV.1</label>
                    <input type="text" class="form-control" id="harga_jual_lv1" name="harga_jual_lv1" placeholder="0">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="min_jual_lv1">Min Jual Grosir LV.1</label>
                    <input type="text" class="form-control" id="min_jual_lv1" name="min_jual_lv1" placeholder="0">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="harga_jual_lv2">Harga Jual Grosir LV.2</label>
                    <input type="text" class="form-control" id="harga_jual_lv2" name="harga_jual_lv2" placeholder="0">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="min_jual_lv2">Min Jual Grosir LV.2</label>
                    <input type="text" class="form-control" id="min_jual_lv2" name="min_jual_lv2" placeholder="0">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="harga_jual_lv3">Harga Jual Grosir LV.3</label>
                    <input type="text" class="form-control" id="harga_jual_lv3" name="harga_jual_lv3" placeholder="0">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="min_jual_lv3">Min Jual Grosir LV.3</label>
                    <input type="text" class="form-control" id="min_jual_lv3" name="min_jual_lv3" placeholder="0">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="harga_jual_lv4">Harga Jual Grosir LV.4</label>
                    <input type="text" class="form-control" id="harga_jual_lv4" name="harga_jual_lv4" placeholder="0">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="min_jual_lv4">Min Jual Grosir LV.4</label>
                    <input type="text" class="form-control" id="min_jual_lv4" name="min_jual_lv4" placeholder="0">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="diskon_jual">Diskon Penjualan %</label>
                    <input type="text" class="form-control" id="diskon_jual" name="diskon_jual" placeholder="0">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="id_satuan">Pilih Satuan Jual</label>
                    <select class="form-control" id="id_satuan" name="id_satuan">
                        <?php foreach ($satuan as $s) : ?>
                            <option value="<?= $s['id_satuan']; ?>"><?= $s['nama_satuan']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="id_kategori">Pilih Kategori Barang</label>
                    <select class="form-control" id="id_kategori" name="id_kategori">
                        <?php foreach ($kategori as $k) : ?>
                            <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="id_merk">Pilih Merk Barang</label>
                    <select class="form-control" id="id_merk" name="id_merk">
                        <?php foreach ($merk as $m) : ?>
                            <option value="<?= $m['id_merk']; ?>"><?= $m['nama_merk']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="rak_barang">Rak Barang</label>
                    <input type="text" class="form-control" id="rak_barang" name="rak_barang" placeholder="0">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="tab_rak">Tab Rak</label>
                    <input type="text" class="form-control" id="tab_rak" name="tab_rak" placeholder="0">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="text" class="form-control" id="stok" name="stok" placeholder="0">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="expired_barang">Expired Barang</label>
                    <input type="date" class="form-control" id="expired_barang" name="expired_barang" placeholder="0">
                </div>
            </div>

            <div class="col-12">
                <label for="foto">Foto</label>
                <input type="file" class="form-control mt-2" name="foto" id="fotoInput">
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
    </div>
</form>