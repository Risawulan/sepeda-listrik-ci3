<div class="content">
    <div class="sub-title mb-4">
        <h3>Pilih Sepeda Listrik Yang Kalian Inginkan</h3>
    </div>
    <div class="row justify-content-center">
        <?php foreach ($sepeda as $data): ?>
            <div class="card mr-2 col-md-3">
                <div class="card-header"><?= $data['nama_produk']; ?></div>
                <div class="card-body">
                    <?php
                    $imagePath = base_url('public/img/') . $data['foto'];
                    ?>
                    <img src="<?= $imagePath; ?>" style="height:200px; width:100%;" alt="<?= $data['nama_produk']; ?>">
                    <p>Sewa sepeda listrik keliling jogja <br>
                        <?= $data['harga']; ?>
                    </p>
                </div>
                <div class="card-footer">
                    <?php if ($this->session->userdata('username')): ?>
                        <a href="<?= base_url('home/sewa/' . $data['id']); ?>" class="btn btn-primary w-100">PILIH</a>
                    <?php else: ?>
                        <button class="btn btn-primary w-100" onclick="showLoginAlert()">PILIH</button>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    function showLoginAlert() {
        alert("Silakan login terlebih dahulu.");
    }
</script>
