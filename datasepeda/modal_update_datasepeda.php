<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Datasepeda</h3>

  <form id="form-update-datasepeda" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="sepeda_id" value="<?php echo $dataDatasepeda->sepeda_id; ?>">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Merk" name="merk" aria-describedby="sizing-addon2" value="<?php echo $dataDatasepeda->merk; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Model" name="model" aria-describedby="sizing-addon2" value="<?php echo $dataDatasepeda->model; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Harga" name="harga" aria-describedby="sizing-addon2" value="<?php echo $dataDatasepeda->harga; ?>">
    </div>
    
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Stok" name="stok" aria-describedby="sizing-addon2" value="<?php echo $dataDatasepeda->stok; ?>">
    </div>

    <div class="form-group">
      <div class="col-md-12">
        <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>


<script>
  $('#form-update-datasepeda').submit(function(e) {
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
      method: 'POST',
      url: '<?php echo base_url('datasepeda/prosesUpdate'); ?>',
      data: formData,
      processData: false,
      contentType: false,
      success: function(data) {
        var out = jQuery.parseJSON(data);

        viewDatasepeda();
        if (out.status == 'form') {
          $('.form-msg').html(out.msg);
          effect_msg_form();
        } else {
          document.getElementById("form-update-datasepeda").reset();
          $('#update-datasepeda').modal('hide');
          $('.msg').html(out.msg);
          effect_msg();
        }
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
      }
    });
  });
</script>