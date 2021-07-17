<?php 
include 'create.php'; 
include 'update.php';
include 'delete.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 fade-in">
            <center>
                <img src="../images/logo.png" class="img-menu2" alt=""><br><br>
                <h1 class="text-green">Minuman</h1>
            </center>
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalCreateMinuman">Tambah</button>
            <br><br>
            <div class="table-responsive">
                <?php 
                $i = 1;
                $minuman_all = $minuman->getAll();
                ?>
                <table class="table table-light table-bordered table-striped" id="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($minuman_all['data'] as $row){
                            ?>
                            <tr>
                                <td><?php echo $i."."; ?></td>
                                <td><img src="../images/upload/<?php echo $row['foto']; ?>" class="img-menu2"></td>
                                <td><?php echo $row['nama_minuman']; ?></td>
                                <td><?php echo $row['deskripsi']; ?></td>
                                <td>Rp. <?php echo number_format($row['harga'], 0, ",", "."); ?></td>
                                <td>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalUpdateMinuman" data-id_minuman="<?php echo $row['id_minuman']; ?>" data-nama_minuman="<?php echo $row['nama_minuman']; ?>" data-deskripsi="<?php echo $row['deskripsi']; ?>" data-harga="<?php echo $row['harga']; ?>">edit</button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#modaldeleteminuman" data-id_minuman="<?php echo $row['id_minuman']; ?>" data-nama_minuman="<?php echo $row['nama_minuman']; ?>">hapus</button>
                                </td>
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $('#modalUpdateMinuman').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id_minuman = button.data('id_minuman') // Extract info from data-* attributes
        var nama_minuman = button.data('nama_minuman') // Extract info from data-* attributes
        var deskripsi = button.data('deskripsi') // Extract info from data-* attributes
        var harga = button.data('harga') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    //   var modal = $(this)
    //   modal.find('.modal-title').text('New message to ' + recipient)
    //   modal.find('.modal-body input').val(recipient)
        $('#id_minuman-update').val(id_minuman)
        $('#nama_minuman-update').val(nama_minuman)
        $('#deskripsi-update').text(deskripsi)
        $('#harga-update').val(harga)
    });

    $('#modaldeleteMinuman').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id_minuman = button.data('id_minuman') // Extract info from data-* attributes
        var nama_minuman = button.data('nama_minuman') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    //   var modal = $(this)
    //   modal.find('.modal-title').text('New message to ' + recipient)
    //   modal.find('.modal-body input').val(recipient)
        $('#id_minuman-delete').val(id_minuman)
        $('#nama_minuman-delete').text(nama_minuman)
    });
});
</script>