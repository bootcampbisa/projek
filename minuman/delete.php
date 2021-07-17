<?php 
if(isset($_POST['btnDelete'])){
    $target_dir = "../images/upload/";
    $id_minuman = $_POST['id_minuman'];

    $minuman_find = $minuman->find($id_minuman);
    if($minuman_find['foto'] != null){
        if (file_exists($target_dir . $minuman_find['foto'])) {
            unlink($target_dir . $minuman_find['foto']);//hapus file foto lama
        }
    }
    $delete_minuman = $minuman->delete($id_minuman);
    if($delete_minuman['status'] == 1){
        ?>
        <script>
            alert("<?php echo $delete_minuman['message']; ?>");
            // window.location.reload();
        </script>
        <?php
        @header('Location:.');
    }else{
        ?>
        <script>
            alert("<?php echo $delete_minuman['message']; ?>");
        </script>
        <?php
    }

}
?>
<div class="modal fade" id="modaldeleteminuman" tabindex="-1" role="dialog" aria-labelledby="modaldeleteminumanTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modaldeleteminumanTitle">Hapus Minuman</h5>
        <button type="button" class="close btn btn-sm btn-default" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="." method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_minuman" id="id_minuman-delete">
            Apakah anda yakin ingin menghapus minuman <b id="nama_minuman-delete"></b> ?
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