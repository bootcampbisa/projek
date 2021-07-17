<?php
    if(isset($_POST['btnRegister'])){
        $email = $_POST['email'];
        $nama = $_POST['nama'];
        $password = $_POST['password'];
        $register = $user->register($email,$nama,$password);
        if($register['status'] == 1){
            ?>
            <script type="text/javascript">
                alert("<?php echo $register['message']; ?>")
            </script>
            <?php
            @header('Location:.');
        }else{
            ?>
            <script type="text/javascript">
                alert("<?php echo $register['message']; ?>")
            </script>
            <?php
        }
    }
?>
<div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="modalRegisterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalRegisterTitle">Register</h5>
        <button type="button" class="close btn btn-sm btn-default" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="." method="post">
            <div class="form-group">
                <label for="email-register" class="col-form-label">E-mail:</label>
                <input type="email" name="email" class="form-control" id="email-register">
            </div>
            <div class="form-group">
                <label for="nama-register" class="col-form-label">Nama:</label>
                <input type="text" name="nama" class="form-control" id="nama-register">
            </div>
            <div class="form-group">
                <label for="password-register" class="col-form-label">Password:</label>
                <input type="password" name="password" class="form-control" id="password-register">
            </div>
            <br>
            <div class="form-group">
                <center>
                <button type="submit" name="btnRegister" class="btn btn-primary">Register</button>
                </center>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>