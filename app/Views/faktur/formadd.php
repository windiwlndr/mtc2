<form action="<?= site_url('/createFaktur') ?>" method="POST">
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="no_faktur">No. Faktur</label>
                    <input type="text" class="form-control" id="no_faktur" name="no_faktur" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="tanggal_faktur">Tanggal Faktur</label>
                    <input type="date" class="form-control" id="tanggal_faktur" name="tanggal_faktur" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="supplier">Supplier</label>
                    <select class="form-control" id="supplier" name="supplier" required>
                        <?php foreach ($supplier as $s) : ?>
                            <option value="<?= $s['id_supplier']; ?>"><?= $s['nama_supplier']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="total_harga">Total Harga</label>
                    <input type="text" class="form-control" id="total_harga" name="total_harga" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="diskon">Diskon (%)</label>
                    <input type="text" class="form-control" id="diskon" name="diskon" placeholder="0">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="ppn">PPN (%)</label>
                    <input type="text" class="form-control" id="ppn" name="ppn" placeholder="0">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="metode_bayar">Metode Pembayaran</label>
                    <select class="form-control" id="metode_bayar" name="metode_bayar" required>
                        <option value="Tunai">Tunai</option>
                        <option value="Transfer">Transfer</option>
                        <option value="Kredit">Kredit</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="jatuh_tempo">Jatuh Tempo</label>
                    <input type="date" class="form-control" id="jatuh_tempo" name="jatuh_tempo">
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="catatan">Catatan</label>
                    <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
    </div>
</form>
