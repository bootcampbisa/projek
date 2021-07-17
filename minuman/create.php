<?php 
if(isset($_POST['btnCreate'])){
    $target_dir = "../images/upload/";
    $nama_minuman = $_POST['nama_minuman'];    
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    $nama_file = "";
    $sukses_upload = true;

    if($_FILES["foto"] != null && $_FILES["foto"]["tmp_name"] != null){
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
        $create_minuman = $minuman->create($nama_minuman, $foto, $deskripsi, $harga);
        if($create_minuman['status'] == 1){
            ?>
            <script>
                alert("<?php echo $create_minuman['message']; ?>");
                // window.location.reload();
            </script>
            <?php
            @header('Location:.');
        }else{
            ?>
            <script>
                alert("<?php echo $create_minuman['message']; ?>");
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
<div class="modal fade" id="modalCreateMinuman" tabindex="-1" role="dialog" aria-labelledby="modalCreateMinumanTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCreateMinumanTitle">Tambah Minuman</h5>
        <button type="button" class="close btn btn-sm btn-default" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="." method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_minuman-create" class="col-form-label">Nama Minuman :</label>
                <input type="text" name="nama_minuman" class="form-control" id="nama_minuman-create" required>
            </div>
            <div class="form-group">
                <label for="foto-create" class="col-form-label">Foto :</label>
                <input type="file" name="foto" class="form-control" id="foto-create" accept="image/*">
            </div>
            <div class="form-group">
                <label for="deskripsi-create" class="col-form-label">Deksripsi :</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi-create"></textarea>
            </div>
            <div class="form-group">
                <label for="harga-create" class="col-form-label">Harga :</label>
                <input type="number" name="harga" class="form-control" id="harga-create" required>
            </div>
            <br>
            <div class="form-group">
                <center>
                <button type="submit" name="btnCreate" class="btn btn-primary">Simpan</button>
                </center>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>