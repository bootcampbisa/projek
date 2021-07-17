<?php 
if(isset($_POST['btnDelete'])){
    $target_dir = "../images/upload/";
    $id_makanan = $_POST['id_makanan'];

    $makanan_find = $makanan->find($id_makanan);
    if($makanan_find['foto'] != null){
        if (file_exists($target_dir . $makanan_find['foto'])) {
            unlink($target_dir . $makanan_find['foto']);//hapus file foto lama
        }
    }
    $delete_makanan = $makanan->delete($id_makanan);
    if($delete_makanan['status'] == 1){
        ?>
        <script>
            alert("<?php echo $delete_makanan['message']; ?>");
            // window.location.reload();
        </script>
        <?php
        @header('Location:.');
    }else{
        ?>
        <script>
            alert("<?php echo $delete_makanan['message']; ?>");
        </script>
        <?php
    }

}
?>
<div class="modal fade" id="modaldeleteMakanan" tabindex="-1" role="dialog" aria-labelledby="modaldeleteMakananTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modaldeleteMakananTitle">Hapus Makanan</h5>
        <button type="button" class="close btn btn-sm btn-default" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="." method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_makanan" id="id_makanan-delete">
            Apakah anda yakin ingin menghapus makanan <b id="nama_makanan-delete"></b> ?
            <br>
            <div class="form-group">
                <center>
                <button type="button" class="close btn btn-sm btn-default">Batal</button>
                <button type="submit" name="btnDelete" class="btn btn-danger">Hapus</button>
                </center>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>