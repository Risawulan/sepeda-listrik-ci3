<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<div class="content d-flex justify-content-center">
    <div class="card mr-2 col-md-6 my-4">
        <div class="card-header">Detail Transaksi</div>
        <div class="card-body">
            <?php if (!empty($detail_nota)): ?>
                <p>Nota: <?= $detail_nota['nota']; ?></p>
                <p>Nama Peminjam: <?= $detail_nota['nama']; ?></p>
                <p>Nama Penanggung Jawab: <?= $detail_nota['nama_penanggung_jawab']; ?></p>
                <p>Waktu Sewa: <?= $detail_nota['waktu_sewa']; ?></p>
                <p>Waktu Kembali: <?= $detail_nota['waktu_kembali']; ?></p>
                <p>Total Harga: <?= $detail_nota['total_harga']; ?></p>
             
            <?php else: ?>
                <p>Data nota tidak ditemukan.</p>
            <?php endif; ?>
        </div>
        <div class="card-footer">
        <i>Silahlan tunjukkan bukti transaksi ini saat pengambilan dan lakukan pembayaran di tempat</i><br>
            <a href="<?= base_url('Home/tipe'); ?>" class="btn btn-primary">Kembali</a>
           
        </div>
    </div>
</div>
