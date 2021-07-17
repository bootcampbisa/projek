<?php
    if(isset($_POST['btnLogin'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $login = $user->login($email,$password);
        if($login['status'] == 1){
            ?>
            <script type="text/javascript">
                alert("<?php echo $login['message']; ?>")
            </script>
            <?php
            @header('Location:.');
        }else{
            ?>
            <script type="text/javascript">
                alert("<?php echo $login['message']; ?>")
            </script>
            <?php
        }
    }
?>
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLoginTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLoginTitle">Login</h5>
        <button type="button" class="close btn btn-sm btn-default" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="." method="post">
            <div class="form-group">
                <label for="email-login" class="col-form-label">E-mail:</label>
                <input type="email" name="email" class="form-control" id="email-login">
            </div>
            <div class="form-group">
                <label for="password-login" class="col-form-label">Password:</label>
                <input type="password" name="password" class="form-control" id="password-login">
            </div>
            <br>
            <div class="form-group">
                <center>
                <button type="submit" name="btnLogin" class="btn btn-primary">Login</button>
                </center>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>