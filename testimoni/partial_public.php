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
            if($allTestimoni['total'] > 0){
                foreach ($allTestimoni['data'] as $row){
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card menu-card-light">
                                <div class="card-body">
                                    <img src="../images/149071.png" class="logo" alt="">
                                    <span class="text-green"><?php echo $row['nama']; ?></span>
                                    <p><?php echo $row['deskripsi'];?></p>
                                    <span class="small-info"><?php echo date("Y-m-d H:i:s", strtotime($row['waktu'])); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <?php
                }
            }else{
                ?>
                <div class="alert alert-info">Belum ada testimoni</div>
                <?php
            }
            ?>
        </div>
    </div>
</div>