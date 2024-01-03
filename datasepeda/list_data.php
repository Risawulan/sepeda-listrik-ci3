<?php
$no = 1;
foreach ($dataDatasepeda as $datasepeda) {
?>
  <tr>
    <td><?php echo $no; ?></td>
    <!-- <td><?php echo $datasepeda->merk; ?></td>3 -->
    <td><?php echo $datasepeda->model; ?></td>
    <td><?php echo $datasepeda->harga; ?></td>
    <td><?php echo $datasepeda->stok; ?></td>
    <td>
    <!-- <?php
      $gambarPath = 'assets/img/' . $datasepeda->gambar;
      echo '<img src="' . $gambarPath . '" alt="Datasepeda Gambar" style="width: 230px; height: 230px;">';
      ?>  -->
    </td>
    
    <td class="text-center" style="min-width:230px;">
      <button class="btn btn-warning update-dataDatasepeda" data-id="<?php echo $datasepeda->sepeda_id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
      <button class="btn btn-danger konfirmasiHapus-datasepeda" data-id="<?php echo $datasepeda->sepeda_id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
    </td>
  </tr>
<?php
  $no++;
}
?>
