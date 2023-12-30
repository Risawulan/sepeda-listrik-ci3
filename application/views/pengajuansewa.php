<div class="content">
    <div class="sub-title mb-4">
        <h3>Pengajuan Sewa</h3>
    </div>
    <div class="row justify-content-center">
        <div class="card mr-2 col-md-5">
            <div class="card-header">Sepeda Yang Akan Disewa</div>
            <div class="card-body">
                <?php if (!empty($sepeda)): ?>
                    <?php foreach ($sepeda as $data): ?>
                        <img src="<?= base_url('public/img/') . $data['foto']; ?>" style="height:200px; width:200px;" alt="<?= $data['nama_produk']; ?>">
                        <p>Sewa sepeda listrik keliling jogja <br>
                            Harga / jam  <?= $data['harga']; ?>
                        </p>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Data sepeda tidak ditemukan.</p>
                <?php endif; ?>
            </div>
            <div class="card-footer">
            </div>
        </div>
        <div class="card mr-2 col-md-5">
            <div class="card-header text-danger">Wajib Isi Kolom Ini</div>
            <div class="card-body">
                <?php if (!empty($sepeda)): ?>
                    <form action="<?= base_url('Home/simpan_pengajuan'); ?>" method="POST">
                        <div class="form-group">
                            <label for="nota">Nota</label>
                            <?php
                            $nota = 'NS' . substr(uniqid(), 7, 4);
                            ?>
                            <input type="text" class="form-control" name="nota" value="<?= $nota; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="inputJamMulai">Waktu Sewa:</label>
                            <input type="time" class="form-control" id="inputJamMulai" name="waktu_sewa" onchange="hitungTotalHarga()" value="00:00" required>
                        </div>
                        <div class="form-group">
                            <label for="inputJamBerakhir">Waktu Kembali:</label>
                            <input type="time" class="form-control" id="inputJamBerakhir" name="waktu_kembali" onchange="hitungTotalHarga()" value="00:00" required>
                        </div>
                        <div class="form-group">
                            <label for="total_harga">Total Harga</label>
                            <input type="text" class="form-control" name="total_harga" id="total_harga" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama">Masukkan nama Anda</label>
                            <input type="text" class="form-control" name="nama" placeholder="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_penanggung_jawab">Masukkan nama Penanggung Jawab</label>
                            <input type="text" class="form-control" name="nama_penanggung_jawab" placeholder="nama penanggung jawab" required>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary w-100" type="submit">SEWA</button>
                        </div>
                    </form>
                <?php else: ?>
                    <p>Data sepeda tidak ditemukan, silahkan pilih sepeda yang akan disewa.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
    function hitungTotalHarga() {
        var waktuMulai = document.getElementById('inputJamMulai').value;
        var waktuBerakhir = document.getElementById('inputJamBerakhir').value;
        var selisihJam = hitungSelisihJam(waktuMulai, waktuBerakhir);
        var hargaPerJam = <?= $data['harga']; ?>;
        var totalHarga = selisihJam * hargaPerJam;
        var formattedHarga = formatRupiah(totalHarga);
        document.getElementById('total_harga').value = formattedHarga;
    }

    function hitungSelisihJam(waktuMulai, waktuBerakhir) {
        var selisihMenit = (new Date("1970-01-01 " + waktuBerakhir) - new Date("1970-01-01 " + waktuMulai)) / 60000;
        var selisihJam = selisihMenit / 60;
        return selisihJam;
    }

    function formatRupiah(angka) {
        var reverse = angka.toString().split('').reverse().join('');
        var ribuan = reverse.match(/\d{1,3}/g);
        var formatted = ribuan.join('.').split('').reverse().join('');
        return 'Rp. ' + formatted;
    }
</script>
