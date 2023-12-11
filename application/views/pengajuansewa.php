<div class="content">
    <div class="sub-title mb-4">
        <h3>Pengajuan Sewa</h3>
    </div>
       <div class="row justify-content-center">
           <div class="card mr-2 col-md-5">
                <div class="card-header">Sepeda Yang Akan disewa</div>
                <div class="card-body">
                    <img src="<?=base_url('public/img/sp1.png')?>" style="height:200px; 100px;" alt="">
                    <p>Sewa sepeda listrik keliling jogja <br>
                        Rp. 45.000
                    </p>
                
                </div>
                <div class="card-footer">
                </div>
           </div>
           <div class="card mr-2 col-md-5">
                <div class="card-header text-danger">Wajib Isi Kolom Ini</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputJam">Waktu Sewa:</label>
                        <input type="time" class="form-control" id="inputJam" name="inputJamMulai" value="00:03">
                    </div>
                    <div class="form-group">
                        <label for="inputJam">Waktu Kembali:</label>
                        <input type="time" class="form-control" id="inputJam" name="inputJamBerakhir" value="00:53">
                    </div>
                    <div class="form-group">
                        <label for="">Masukkan nama Anda</label>
                        <input type="text" class="form-control" name="nama" placeholder="nama">
                    </div>
                    <div class="form-group">
                        <label for="">Masukkan nama Penanggung Jawab</label>
                        <input type="text" class="form-control" name="nama_penanggung_jwb" placeholder="nama penanggung jawab">
                    </div>
                
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary w-100">SEWA</button>
                </div>
           </div>
          
       </div>
</div>