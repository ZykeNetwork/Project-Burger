   <nav class="navbar navbar-expand-md navbar-dark mb-3 navbar-custom">

        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo(URLROOT); ?>">Home</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">

                   <?php if(isUserLoggedIn()){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo(URLROOT); ?>/profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo(URLROOT); ?>/logout.php">Logout</a>
                    </li>
                    <?php } else{ ?>
                   <li class="nav-item ">
                        <a class="nav-link" href="<?php echo(URLROOT); ?>/register.php">Register </a>
                    </li>
                
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo(URLROOT); ?>/login.php">Login</a>
                    </li>

    
<?php } ?>
                    
                  

                </ul>

            </div>
        </div>
    </nav>
