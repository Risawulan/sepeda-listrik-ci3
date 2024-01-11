<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Penyewaan</h3>

  <form id="form-update-penyewaan" method="POST" >
    <input type="hidden" name="Penyewaan_id" value="<?php echo $dataPenyewaan->Penyewaan_id; ?>">
	<div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="tanggal_sewa" name="Tanggal_sewa" aria-describedby="sizing-addon2" value="<?php echo $dataPenyewaan->Tanggal_sewa; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="tanggal_kembali" name="Tanggal_kembali" aria-describedby="sizing-addon2" value="<?php echo $dataPenyewaan->Tanggal_kembali; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="harga_sewa" name="Harga_sewa" aria-describedby="sizing-addon2" value="<?php echo $dataPenyewaan->Harga_sewa; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="denda" name="Denda" aria-describedby="sizing-addon2" value="<?php echo $dataPenyewaan->Denda; ?>">
    </div>
    <!-- <div class="form-group">
      <label for="Id_user">Nama User</label>
      <select class="form-control" name="id_user">
        <?php foreach ($dataUser as $data): ?>
          <option value="<?= $data->id_user ?>" <?php if ($data->id_user === $dataLaporan->id_user) echo "selected" ?>><?= $data->nama_user; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label for="Id_dokter">Nama Dokter</label>
      <select class="form-control" name="id_dokter">
        <?php foreach ($dataDokter as $data): ?>
          <option value="<?= $data->id_dokter ?>" <?php if ($data->id_dokter === $dataLaporan->id_dokter) echo "selected" ?>><?= $data->nama_dokter; ?></option>
        <?php endforeach; ?>
      </select> -->
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="jaminan" name="Jaminan" aria-describedby="sizing-addon2" value="<?php echo $dataPenyewaan->Jaminan; ?>">
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>