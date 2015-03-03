<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <title></title>
    </head>
    <body>
        
        <?php
        if (!isset($username)) {
            $username = '';
        }
        ?>
        <div class="container">
        <form  action="checkLogin.php" method="POST">
            <table class="table table-condensed" border="1">
                <thead>
                    <tr>
                        <td>Username</td>
                        <td>
                            &nbsp;&nbsp;&nbsp;<input type="text"
                                   name="username"
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
                        <td>Password</td>
                        <td>
                            &nbsp;&nbsp;&nbsp;<input type="password" name="password" value="" />
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
                        <td></td>
                        <td>
                           &nbsp;&nbsp; <input class="btn btn-success" type="submit" value="Login" name="login" />
                            <input class="btn btn-default" type="button"
                                   value="Register"
                                   name="register"
                                   onclick="document.location.href = 'register.php'"
                                   />
                            <input class="btn btn-default" type="button" value="Forgot Password" name="forgot" />
                        </td>
                    </tr>
                </thead>
            </table>
        </div>
        </form>
    </body>
</html>
