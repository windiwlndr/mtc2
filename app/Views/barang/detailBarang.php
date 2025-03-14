<div class="modal-body">
    <ul class="list-group">
        <li class="list-group-item"><strong>ID Barang:</strong> <?= esc($b['id_barang']); ?></li>
        <li class="list-group-item"><strong>Nama Barang:</strong> <?= esc($b['nama_barang']); ?></li>
        <li class="list-group-item"><strong>Satuan Jual:</strong> <?= esc($b['nama_satuan']); ?></li>
        <li class="list-group-item"><strong>Kategori:</strong> <?= esc($b['nama_kategori']); ?></li>
        <li class="list-group-item"><strong>Stok:</strong> <?= esc($b['stok']); ?></li>
        <li class="list-group-item"><strong>Harga Beli:</strong> Rp<?= number_format($b['harga_beli'], 2, ',', '.'); ?></li>
        <li class="list-group-item"><strong>Harga Jual Normal:</strong> Rp<?= number_format($b['harga_jual_normal'], 2, ',', '.'); ?></li>
        <li class="list-group-item"><strong>Harga Jual Member:</strong> Rp<?= number_format($b['harga_jual_member'], 2, ',', '.'); ?></li>
        <li class="list-group-item"><strong>Harga Grosir:</strong> Rp<?= number_format($b['harga_jual_lv1'], 2, ',', '.'); ?></li>
        <li class="list-group-item"><strong>Diskon:</strong> <?= esc($b['diskon_jual']); ?>%</li>
        <li class="list-group-item"><strong>Rak:</strong> <?= esc($b['rak_barang']); ?></li>
    </ul>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
</div>