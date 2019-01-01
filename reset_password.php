<!--header-->
<?php require_once 'includes/header.php'; ?>

<!--navbar-->
<?php require_once 'includes/navbar.php'; ?>


<div class="container">


    <div class="row">

        <div class="col-md-6 mx-auto">
            <div class='card card-body  bg-light mt-2 mb-5'>
                <h2>Reset your Password</h2>
                <p>Please fill in credentials to Reset Password.</p>
                
                 <?php 
                
                 if(!isset($_SESSION['reset_code'])){
                    setMsg('msg_notify', 'You can not access this page', 'warning');
                    redirect('login.php');
                    exit();
                }

                
                    
                
                   
                    $err = getMsg('errors');
                  
                    
                    $data = getMsg('form_data');
                ?>
                
                <form action="<?php echo(URLROOT) ?>/process/reset_password.php" method='POST'>

                    <div class="form-group">
                        <label for='password'>Password: <sup>*</sup></label>
                        <input type='password' name="password" value="<?php echo($data['password']); ?>" class="form-control form-control-lg <?php echo(isset($err['password_err'])) ? 'is-invalid' : ''; ?>">
                         <span class="invalid-feedback"><?php echo($err['password_err']); ?></span>
                    </div>
                  

                    <div class="form-group">
                        <label for='confirm_password'>Confirm Password: <sup>*</sup></label>
                        <input type='password' name="confirm_password" value="<?php echo($data['confirm_password']); ?>" class="form-control form-control-lg <?php echo(isset($err['confirm_password_err'])) ? 'is-invalid' : ''; ?>">
                        <span class="invalid-feedback"><?php echo($err['confirm_password_err']); ?></span>
                    </div>

                    <div class="row">

                        <div class='col'>

                            <input type='submit' name='reset_password' value='Reset Password' class='btn  btn-block color-set'>

                        </div>



                    </div>



                </form>

            </div>
        </div>

    </div>


</div>




<!--footer-->
<?php require_once 'includes/footer.php'; ?>
