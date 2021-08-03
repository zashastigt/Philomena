<?php
session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
require_once "config.php";
 
$email = $wachtwoord = "";
$email_err = $wachtwoord_err = $login_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["email"]))){
        $email_err = "Voor een e-mail in.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    if(empty(trim($_POST["wachtwoord"]))){
        $wachtwoord_err = "Voor een wachtwoord in.";
    } else{
        $wachtwoord = trim($_POST["wachtwoord"]);
    }
    
    if(empty($email_err) && empty($wachtwoord_err)){
        $sql = "SELECT id, email, wachtwoord FROM klant WHERE email = :email";
        
        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            
            $param_email = trim($_POST["email"]);
            
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $email = $row["email"];
                        $hashed_wachtwoord = $row["wachtwoord"];
                        if(password_verify($wachtwoord, $hashed_wachtwoord)){
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;                            
                            
                            header("location: index.php");
                        } else{
                            $login_err = "Ongeldig email of password.";
                            echo "<br>$wachtwoord";
                            echo "<br>$hashed_wachtwoord";
                            echo "<br>$email";
                        }
                    }
                } else{
                    $login_err = "Ongeldig email of password.";
                }
            } else{
                echo "Oops! Er ging iets verkeert. Probeer later opnieuw.";
            }

            unset($stmt);
        }
    }
    
    unset($pdo);
}
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Philomena Login</title>  
</head>
<body>
    <div id="login_screen">
    <h1>PHILOMENA</h1>
    <h2>Hair & Nails</h2>
        <div id="box">
            <h3>Inloggen</h3>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">           
                    <div>
                        <input type="text" name="email" placeholder="e-mail" <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?> value="<?php echo $email; ?>">
                        <span class="invalid-feedback"><?php echo $email_err; ?></span>
                    </div>    
                    <div>
                        <input type="password" name="wachtwoord" placeholder="wachtwoord" <?php echo (!empty($wachtwoord_err)) ? 'is-invalid' : ''; ?>>
                        <span class="invalid-feedback"><?php echo $wachtwoord_err; ?></span>
                    </div>

                <div>
                    <input type="submit" value="Inloggen">
                </div>
                <?php 
                if(!empty($login_err)){
                    echo '<div class="alert alert-danger">' . $login_err . '</div>';
                }        
                ?>
                <p><a href="register.php">Registreren</a></p>
            </form>
        </div>
    </div>
</body>
</html>