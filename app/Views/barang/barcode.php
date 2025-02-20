<?php
$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
$barcode = $generator->getBarcode($b['barcode'], $generator::TYPE_CODE_128);
?>
<div class="row">
    <div class="col-12"><?= $barcode ?></div>
    <div class="col-12"><?= $b['barcode']; ?></div>
</div>

