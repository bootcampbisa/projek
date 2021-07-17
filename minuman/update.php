<?php 
if(isset($_POST['btnUpdate'])){
    $target_dir = "../images/upload/";
    $id_minuman = $_POST['id_minuman'];    
    $nama_minuman = $_POST['nama_minuman'];    
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    $minuman_find = $minuman->find($id_minuman);
    $nama_file = $minuman_find['foto'];

    $sukses_upload = true;

    if($_FILES["foto"] != null && $_FILES["foto"]["tmp_name"] != null){
        //cek dulu foto lama ada apa tidak, jika ada foto lama dihapus dulu
        if($minuman_find['foto'] != null){
            if (file_exists($target_dir . $minuman_find['foto'])) {
                unlink($target_dir . $minuman_find['foto']);//hapus file foto lama
            }
        }

        $original_file = $target_dir . basename($_FILES["foto"]["name"]);
        $imageFileType = strtolower(pathinfo($original_file,PATHINFO_EXTENSION));

        $nama_file = "minuman_".time().".".$imageFileType;
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
        $update_minuman = $minuman->update($id_minuman, $nama_minuman, $foto, $deskripsi, $harga);
        if($update_minuman['status'] == 1){
            ?>
            <script>
                alert("<?php echo $update_minuman['message']; ?>");
                // window.location.reload();
            </script>
            <?php
            @header('Location:.');
        }else{
            ?>
            <script>
                alert("<?php echo $update_minuman['message']; ?>");
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
<div class="modal fade" id="modalUpdateMinuman" tabindex="-1" role="dialog" aria-labelledby="modalUpdateMinumanTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalUpdateMinumanTitle">Edit Minuman</h5>
        <button type="button" class="close btn btn-sm btn-default" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="." method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_minuman" id="id_minuman-update">
            <div class="form-group">
                <label for="nama_minuman-update" class="col-form-label">Nama Minuman :</label>
                <input type="text" name="nama_minuman" class="form-control" id="nama_minuman-update" required>
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