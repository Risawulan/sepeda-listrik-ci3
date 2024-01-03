<?php
  $no = 1;
  foreach ($dataPenyewaann as $penyewaan) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $penyewaan->tanggal_sewa; ?></td>
	  <td><?php echo $penyewaan->tanggal_kembali; ?></td>
    <td><?php echo $penyewaan->harga_sewa; ?></td>
    <td><?php echo $penyewaan->denda; ?></td>
    <td><?php echo $penyewaan->jaminan; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataPenyewaan" data-id="<?php echo $penyewaan->Pembayaran_id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-penyewaan" data-id="<?php echo $penyewaan->Pembayaran_id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i>  Delete</button>          
      </td>
    </tr>
    <?php
    $no++;
  }
?>