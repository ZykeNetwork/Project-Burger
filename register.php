<!--header-->
<?php require_once 'includes/header.php'; ?>

<!--navbar-->
<?php require_once 'includes/navbar.php'; ?>

    <div class="container">


        <div class="row">

            <div class="col-md-6 mx-auto">
    
                <div class='card card-body  bg-light mt-2 mb-5'>
                    <h2>Register</h2>
                    <p>Please fill in credentials to Sign Up.</p>
                <?php 
           
                    echo getMsg('msg'); 
                
                    
                    $err = getMsg('errors');
                  
                  
                    $data = getMsg('form_data');
                ?>
                 
                <form action="<?php echo(URLROOT) ?>/process/register.php" method='POST'>

                    <div class="form-group">
                        <label for='name'>Name: <sup>*</sup></label>
                        <input type='name' name="name" value="<?php echo($data['name']); ?>" class="form-control form-control-lg <?php echo(isset($err['name_err'])) ? 'is-invalid' : ''; ?>">
                        <span class="invalid-feedback"><?php echo($err['name_err']); ?></span>
                    </div>

                    <div class="form-group">
                        <label for='username'>Username: <sup>*</sup></label>
                        <input type='text' name="username" value="<?php echo($data['username']); ?>" class="form-control form-control-lg <?php echo(isset($err['username_err'])) ? 'is-invalid' : ''; ?>">
                         <span class="invalid-feedback"><?php echo($err['username_err']); ?></span>
                    </div>


                    <div class="form-group">
                        <label for='email'>Email: <sup>*</sup></label>
                        <input type='email' name="email" value="<?php echo($data['email']); ?>" class="form-control form-control-lg <?php echo(isset($err['email_err'])) ? 'is-invalid' : ''; ?>">
                         <span class="invalid-feedback"><?php echo($err['email_err']); ?></span>
                    </div>

                    <div class="form-group">
                        <label for='url'>Your Website URL: <sup>*</sup></label>
                        <input type='text' name="website" value="<?php echo($data['website']); ?>" class="form-control form-control-lg <?php echo(isset($err['website_err'])) ? 'is-invalid' : ''; ?>">
                         <span class="invalid-feedback"><?php echo($err['website_err']); ?></span>
                    </div>
                   
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

                            <input type='submit' name='register' value='Register' class='btn  btn-block color-set'>

                        </div>

                    </div>
                    
                    <div class="row">
                        <div class='col'>

                            <a href="<?php echo(URLROOT); ?>/login.php" class="btn  btn-block">Have account? Login</a>

                        </div>
                    </div>


                </form>

                </div>
            </div>

        </div>


    </div>


<!--footer-->
<?php require_once 'includes/footer.php'; ?>
