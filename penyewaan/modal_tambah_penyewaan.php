<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Add Pembayaran</h3>

  <form id="form-tambah-pembayaran" method="POST">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="tanggal_sewa" name="Tanggal_sewa" aria-describedby="sizing-addon2">
    </div>
	<div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="tanggal_kembali" name="Tanggal_kembali" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="harga_sewa" name="Harga_sewa" aria-describedby="sizing-addon2">
    </div>	<div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="denda" name="Denda" aria-describedby="sizing-addon2">
    </div>
    <!-- <div class="form-group">
    <label for="id_user">Nama User</label>
      </span>
     
      <select class="form-control" name="id_user">
        <?php foreach ($dataUser as $data ) {
          ?>
        <option value="<?=$data->id_user?>"><?= $data->nama_user;?></option>
      <?php } ?>
        
      </select> 
    </div> -->
    <!-- <div class="form-group">
    <label for="id_dokter">Nama Dokter</label>
      </span>
      
      <select class="form-control" name="id_dokter">
        <?php foreach ($dataDokter as $data ) {
          ?>
        <option value="<?=$data->id_dokter?>"><?= $data->nama_dokter;?></option>
      <?php } ?>
        
      </select> 

    </div> -->
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="jaminan" name="Jaminan" aria-describedby="sizing-addon2">
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Add Data</button>
      </div>
    </div>
  </form>
</div>