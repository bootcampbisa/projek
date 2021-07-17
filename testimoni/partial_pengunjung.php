<?php 
if(isset($_POST['btnCreate'])){
    $deskripsi = $_POST['deskripsi'];

    $create_testimoni = $testimoni->create($_SESSION['user_id'], $deskripsi);
    if($create_testimoni['status'] == 1){
        ?>
        <script>
            // window.location.reload();
        </script>
        <?php
        @header('Location:.');
    }else{
        ?>
        <script>
        </script>
        <?php
    }
}

if(isset($_POST['btnUpdate'])){
    $deskripsi = $_POST['deskripsi'];
    $id_testimoni = $_POST['id_testimoni'];

    $update_testimoni = $testimoni->update($id_testimoni, $_SESSION['user_id'], $deskripsi);
    if($update_testimoni['status'] == 1){
        ?>
        <script>
            // window.location.reload();
        </script>
        <?php
        @header('Location:.');
    }else{
        ?>
        <script>
        </script>
        <?php
    }
}

if(isset($_POST['btnDeleteSubmit'])){
    $id_testimoni = $_POST['id_testimoni'];

    $delete_testimoni = $testimoni->delete($id_testimoni, $_SESSION['user_id']);
    if($delete_testimoni['status'] == 1){
        ?>
        <script>
            // window.location.reload();
        </script>
        <?php
        @header('Location:.');
    }else{
        ?>
        <script>
        </script>
        <?php
    }
}
?>
<div class="modal fade" id="modaldeletetestimoni" tabindex="-1" role="dialog" aria-labelledby="modaldeletetestimoniTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modaldeletetestimoniTitle">Hapus Testimoni</h5>
        <button type="button" class="close btn btn-sm btn-default" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="." method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_testimoni" id="id_testimoni-delete">
            Apakah anda yakin ingin menghapus testimoni ini ?
            <br>
            <div class="form-group">
                <center>
                <button type="button" class="close btn btn-sm btn-default">Batal</button>
                <button type="submit" name="btnDeleteSubmit" class="btn btn-danger">Hapus</button>
                </center>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 fade-in">
            <center>
                <img src="../images/logo.png" class="img-menu2" alt=""><br><br>
                <h1 class="text-green">Testimoni</h1>
            </center>
            <br>
            <?php 
            $allTestimoni = $testimoni->getAll();
            $i = 0;
            foreach ($allTestimoni['data'] as $row){
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card menu-card-light">
                            <div class="card-body">
                                <form action="." method="post">
                                    <input type="hidden" name="id_testimoni" value="<?php echo $row['id_testimoni'];?>">
                                    <img src="../images/149071.png" class="logo" alt="">
                                    <span class="text-green"><?php echo $row['nama']; ?></span>
                                    <p id="deskripsiTampil<?php echo $i; ?>"><?php echo $row['deskripsi'];?></p>
                                    <textarea name="deskripsi" class="form-control" id="deskripsi-edit<?php echo $i; ?>" style="display:none"><?php echo $row['deskripsi']; ?></textarea>
                                    <span class="small-info"><?php echo date("Y-m-d H:i:s", strtotime($row['waktu'])); ?></span>
                                    <?php 
                                    if($_SESSION['user_id'] == $row['id_user']){
                                        ?>
                                        <button type="button" name="btnEdit" id="btnEdit<?php echo $i;?>" class="btn btn-primary" style="float:left;">Edit</button>
                                        <button type="button" name="btnDelete" id="btnDelete<?php echo $i;?>" class="btn btn-danger" style="float:left;margin-left:10px;" data-toggle="modal" data-target="#modaldeletetestimoni" data-id_testimoni="<?php echo $row['id_testimoni']; ?>">Hapus</button>
                                        <button type="submit" name="btnUpdate" id="btnUpdate<?php echo $i;?>" class="btn btn-primary" style="display:none;float:left;margin-top:20px;">Simpan</button>
                                        <button type="button" name="btnBatal" id="btnBatal<?php echo $i;?>" class="btn btn-danger" style="display:none;float:left;margin-top:20px;margin-left:10px;">Batal</button>
                                        <?php
                                    }
                                    ?>
                                    <script>
                                        $(document).ready(function(){
                                            $('#btnEdit<?php echo $i;?>').click(function(){
                                                $('#deskripsiTampil<?php echo $i; ?>').css('display','none');
                                                $('#deskripsi-edit<?php echo $i; ?>').css('display','block');
                                                $('#btnEdit<?php echo $i;?>').css('display','none');
                                                $('#btnDelete<?php echo $i;?>').css('display','none');
                                                $('#btnUpdate<?php echo $i;?>').css('display','block');
                                                $('#btnBatal<?php echo $i;?>').css('display','block');
                                            });
                                            $('#btnBatal<?php echo $i;?>').click(function(){
                                                $('#deskripsiTampil<?php echo $i; ?>').css('display','block');
                                                $('#deskripsi-edit<?php echo $i; ?>').text("<?php echo $row['deskripsi'] ?>");
                                                $('#deskripsi-edit<?php echo $i; ?>').css('display','none');
                                                $('#btnEdit<?php echo $i;?>').css('display','block');
                                                $('#btnDelete<?php echo $i;?>').css('display','block');
                                                $('#btnUpdate<?php echo $i;?>').css('display','none');
                                                $('#btnBatal<?php echo $i;?>').css('display','none');
                                            });
                                            $('#modaldeletetestimoni').on('show.bs.modal', function (event) {
                                                var button = $(event.relatedTarget) // Button that triggered the modal
                                                var id_testimoni = button.data('id_testimoni') // Extract info from data-* attributes
                                                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                                                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                                            //   var modal = $(this)
                                            //   modal.find('.modal-title').text('New message to ' + recipient)
                                            //   modal.find('.modal-body input').val(recipient)
                                                $('#id_testimoni-delete').val(id_testimoni)
                                            });
                                        });
                                    </script>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <?php
                $i++;
            }
            ?>
            <hr>
            <form action="." method="post">
                <div class="row">
                    <div class="col-md-2">
                        <img src="../images/149071.png" class="logo" alt="">
                        <p> <?php echo $_SESSION['user_nama']; ?></p>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="deskripsi-create" class="col-form-label">Tulis testimoni di sini :</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsi-create"></textarea>
                        </div>
                        <br>
                    </div>
                    <div class="col-md-2">
                    <br><br>
                        <div class="form-group">
                            <button type="submit" name="btnCreate" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>