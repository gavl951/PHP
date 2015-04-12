<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
           <link href="css/style.css" rel="stylesheet">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class = "z login">
            <center><h1 class="log-header2">REGISTER</h1></center>
		<div class="container"><div class="login">
        <form id="registerForm" 
              action="checkRegister.php" 
              method="POST" 
              onsubmit="return validateRegistration(this);">
            <table class="table table-condensed" border="0">
                <thead>
                    <tr>

                        <td>
                            <input type="text" placeholder="username" name="username" value="<?php
                                if (isset($_POST) && isset($_POST['username'])) {
                                    echo $_POST['username'];
                                }
                            ?>" />
                            <span id="usernameError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['username'])) {
                                    echo $errorMessage['username'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>

                        <td>
                            <input type="password" placeholder="password" name="password" value="" />
                            <span id="passwordError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['password'])) {
                                    echo $errorMessage['password'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>

                        <td>
                            <input type="password" name="password2" placeholder="confirm password" value="" />
                            <span id="password2Error" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['password2'])) {
                                    echo $errorMessage['password2'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="btn btn-default" type="submit" value="Register" name="register" />
                        </td>
                    </tr>
                </thead>
            </table></div></div></div></div>
            
            <div class="bgvid">
  	<video muted loop preload="true" autoplay="autoplay">
  	<source src="video1.mp4" type="video/mp4">
	</video>

        </form>
        <script type="text/javascript" src="js/register.js"></script>
    </body>
</html>
