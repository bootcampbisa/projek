<?php 
if(isset($_POST['btnUpdate'])){
    $target_dir = "../images/upload/";
    $id_makanan = $_POST['id_makanan'];    
    $nama_makanan = $_POST['nama_makanan'];    
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    $makanan_find = $makanan->find($id_makanan);
    $nama_file = $makanan_find['foto'];

    $sukses_upload = true;

    if($_FILES["foto"] != null && $_FILES["foto"]["tmp_name"] != null){
        //cek dulu foto lama ada apa tidak, jika ada foto lama dihapus dulu
        if($makanan_find['foto'] != null){
            if (file_exists($target_dir . $makanan_find['foto'])) {
                unlink($target_dir . $makanan_find['foto']);//hapus file foto lama
            }
        }

        $original_file = $target_dir . basename($_FILES["foto"]["name"]);
        $imageFileType = strtolower(pathinfo($original_file,PATHINFO_EXTENSION));

        $nama_file = "makanan_".time().".".$imageFileType;
        $target_file = $target_dir . $nama_file;
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            // echo "The file ". $nama_file. " has been uploaded.";
        } else {
            $sukses_upload = false;
            // echo "Sorry, there was an error uploading your file.";
        }
    }

    if($sukses_upload){
        $foto = $nama_file;
        $update_makanan = $makanan->update($id_makanan, $nama_makanan, $foto, $deskripsi, $harga);
        if($update_makanan['status'] == 1){
            ?>
            <script>
                alert("<?php echo $update_makanan['message']; ?>");
                // window.location.reload();
            </script>
            <?php
            @header('Location:.');
        }else{
            ?>
            <script>
                alert("<?php echo $update_makanan['message']; ?>");
            </script>
            <?php
        }
    }else{
        ?>
        <script>
            alert("Gagal mengupload foto. pastikan file yang anda upload adalah file gambar.");
        </script>
        <?php
    }

}
?>
<div class="modal fade" id="modalUpdateMakanan" tabindex="-1" role="dialog" aria-labelledby="modalUpdateMakananTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalUpdateMakananTitle">Edit Makanan</h5>
        <button type="button" class="close btn btn-sm btn-default" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="." method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_makanan" id="id_makanan-update">
            <div class="form-group">
                <label for="nama_makanan-update" class="col-form-label">Nama Makanan :</label>
                <input type="text" name="nama_makanan" class="form-control" id="nama_makanan-update" required>
            </div>
            <div class="form-group">
                <label for="foto-update" class="col-form-label">Foto :</label>
                <input type="file" name="foto" class="form-control" id="foto-update" accept="image/*">
                <b>* Kosongkan jika tidak ingin merubah foto</b>
            </div>
            <div class="form-group">
                <label for="deskripsi-update" class="col-form-label">Deksripsi :</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi-update"></textarea>
            </div>
            <div class="form-group">
                <label for="harga-update" class="col-form-label">Harga :</label>
                <input type="number" name="harga" class="form-control" id="harga-update" required>
            </div>
            <br>
            <div class="form-group">
                <center>
                <button type="submit" name="btnUpdate" class="btn btn-primary">Simpan</button>
                </center>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>