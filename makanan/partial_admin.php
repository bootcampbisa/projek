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
                <h1 class="text-green">Makanan</h1>
            </center>
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalCreateMakanan">Tambah</button>
            <br><br>
            <div class="table-responsive">
                <?php 
                $i = 1;
                $makanan_all = $makanan->getAll();
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
                        foreach ($makanan_all['data'] as $row){
                            ?>
                            <tr>
                                <td><?php echo $i."."; ?></td>
                                <td><img src="../images/upload/<?php echo $row['foto']; ?>" class="img-menu2"></td>
                                <td><?php echo $row['nama_makanan']; ?></td>
                                <td><?php echo $row['deskripsi']; ?></td>
                                <td>Rp. <?php echo number_format($row['harga'], 0, ",", "."); ?></td>
                                <td>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalUpdateMakanan" data-id_makanan="<?php echo $row['id_makanan']; ?>" data-nama_makanan="<?php echo $row['nama_makanan']; ?>" data-deskripsi="<?php echo $row['deskripsi']; ?>" data-harga="<?php echo $row['harga']; ?>">edit</button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#modaldeleteMakanan" data-id_makanan="<?php echo $row['id_makanan']; ?>" data-nama_makanan="<?php echo $row['nama_makanan']; ?>">hapus</button>
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
    $('#modalUpdateMakanan').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id_makanan = button.data('id_makanan') // Extract info from data-* attributes
        var nama_makanan = button.data('nama_makanan') // Extract info from data-* attributes
        var deskripsi = button.data('deskripsi') // Extract info from data-* attributes
        var harga = button.data('harga') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    //   var modal = $(this)
    //   modal.find('.modal-title').text('New message to ' + recipient)
    //   modal.find('.modal-body input').val(recipient)
        $('#id_makanan-update').val(id_makanan)
        $('#nama_makanan-update').val(nama_makanan)
        $('#deskripsi-update').text(deskripsi)
        $('#harga-update').val(harga)
    });

    $('#modaldeleteMakanan').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id_makanan = button.data('id_makanan') // Extract info from data-* attributes
        var nama_makanan = button.data('nama_makanan') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    //   var modal = $(this)
    //   modal.find('.modal-title').text('New message to ' + recipient)
    //   modal.find('.modal-body input').val(recipient)
        $('#id_makanan-delete').val(id_makanan)
        $('#nama_makanan-delete').text(nama_makanan)
    });
});
</script>