<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-penyewaan"><i class="glyphicon glyphicon-plus-sign"></i> Add Data</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
        <th>#</th>
		  <th>Tanggal_sewa</th>
      <th>Tanggal_kembali</th>
      <th>Harga_sewa</th>
        <th>Denda</th>
      <th>Jaminan</th>
          <th style="text-align: center;">Action</th>
        </tr>
      </thead>
      <tbody id="data-penyewaan">
      
      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_penyewaan; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataPenyewaann', 'Delete this data?', 'Yes, Delete this data'); ?>
<?php
  $data['judul'] = 'Penyewaan';
  $data['url'] = 'penyewaan/import';
  echo show_my_modal('modals/modal_import', 'import-penyewaan', $data);
?>