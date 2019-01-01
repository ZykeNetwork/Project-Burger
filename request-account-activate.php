<!--header-->
<?php require_once 'includes/header.php'; ?>

<!--navbar-->
<?php require_once 'includes/navbar.php'; ?>


<div class="container">


    <div class="row">

        <div class="col-md-6 mx-auto">
            <div class='card card-body  bg-light mt-5'>
                <h2>Activate Account Request</h2>
               

             <?php 
                
                    echo getMsg('msg'); 
                
                    
                    $err = getMsg('errors');
                  
               
                    $data = getMsg('form_data');
                ?>
               
                <form action="<?= URLROOT.'/process/request_activate_account.php' ?>" method='POST'>


                     <div class="form-group">
                        <label for='email'>Email: <sup>*</sup></label>
                        <input type='email' name="email" value="<?php echo($data['email']); ?>" class="form-control form-control-lg <?php echo(isset($err['email_err'])) ? 'is-invalid' : ''; ?>">
                         <span class="invalid-feedback"><?php echo($err['email_err']); ?></span>
                    </div>



                    <div class="row">

                        <div class='col'>

                            <input type='submit' name='request-activate-account' value='Send Reset Link' class='btn  btn-block color-set'>

                        </div>



                    </div>
                    <div class="row">
                        <div class='col'>

                            <a href="<?php echo(URLROOT); ?>/login.php" class="btn text-right  btn-block">Go Back to Login </a>

                        </div>

                    </div>


                </form>

            </div>
        </div>

    </div>


</div>





<!--footer-->
<?php require_once 'includes/footer.php'; ?>
