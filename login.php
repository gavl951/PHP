<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Login</title>

   <link href="css/style.css" rel="stylesheet">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

		<?php
        if (!isset($username)) {
            $username = '';
        }
        ?>

            

		<div class = "z login">
                    <center><h1 class="log-header">LOGIN</h1></center>
                    
		<div class="container"><div class="login">
        <form  action="checkLogin.php" method="POST">
            <table class="table table-condensed" border="0">
                <thead>
                    <tr>
               
                        <td>
                            <input type="text"
                                   name="username" placeholder="username"
                                   value="<?php echo $username; ?>" />
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
                            <input type="password" name="password" value="" placeholder="password"/>
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
                           <input value="Login" type="submit" name="login"/> 
                            <input class="btn btn-default" type="button"
                                   value="Register"
                                   name="register"
                                   onclick="document.location.href = 'register.php'"
                                   />
                        </td>
                    </tr>
                </thead>
            </table>
        </form></div>
   </div> </div>


<div class="bgvid">
  	<video muted loop preload="true" autoplay="autoplay">
  	<source src="video1.mp4" type="video/mp4">
	</video>

</body>

</html>