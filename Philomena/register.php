<?php
require_once "config.php";
 
$voornaam = $achternaam = $straat = $postcode = $woonplaats = $email = $wachtwoord = $bevestig_wachtwoord = "";
$voornaam_err = $achternaam_err = $straat_err = $postcode_err = $woonplaats_err = $email_err = $wachtwoord_err = $bevestig_wachtwoord_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["voornaam"]))){
        $voornaam_err = "Voor een voornaam in.";     
    } else{
        $voornaam = trim($_POST["voornaam"]);
    }
    
    if(empty(trim($_POST["achternaam"]))){
        $achternaam_err = "Voor een achternaam in.";     
    } else{
        $achternaam = trim($_POST["achternaam"]);
    }

    if(empty(trim($_POST["straat"]))){
        $straat_err = "Voor een straat in.";    
    } else{
        $straat = trim($_POST["straat"]);
    }

    if(empty(trim($_POST["postcode"]))){
        $postcode_err = "Voor een postcode in.";
    } elseif(strlen(trim($_POST["postcode"])) != 6){
        $postcode_err = "postcode moet uit 6 tekens bestaan.";    
    } else{
        $postcode = strtoupper(trim($_POST["postcode"]));
    }

    if(empty(trim($_POST["woonplaats"]))){
        $woonplaats_err = "Voor een woonplaats in.";     
    } else{
        $woonplaats = trim($_POST["woonplaats"]);
    }
 
    if(empty(trim($_POST["email"]))){
        $email_err = "Voor een email in.";
    } else{
        $sql = "SELECT id FROM klant WHERE email = :email";
        
        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            
            $param_email = trim($_POST["email"]);
            
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $email_err = "Deze e-mail zit al vast aan een account.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Er ging iets verkeert. Probeer later opnieuw.";
            }

            unset($stmt);
        }
    }
    
    if(empty(trim($_POST["wachtwoord"]))){
        $wachtwoord_err = "Voor een wachtwoord in.";     
    } elseif(strlen(trim($_POST["wachtwoord"])) < 6){
        $wachtwoord_err = "Een wachtwoord moet minimaal uit 6 tekens bestaan.";
    } else{
        $wachtwoord = trim($_POST["wachtwoord"]);
    }
    
    if(empty(trim($_POST["bevestig_wachtwoord"]))){
        $bevestig_wachtwoord_err = "Bevestig uw wachtwoord astublieft.";     
    } else{
        $bevestig_wachtwoord = trim($_POST["bevestig_wachtwoord"]);
        if(empty($wachtwoord_err) && ($wachtwoord != $bevestig_wachtwoord)){
            $bevestig_wachtwoord_err = "wachtwoord komt niet overeen.";
        }
    }
    
    if(empty($voornaam_err) && empty($achternaam_err) && empty($straat_err) && empty($postcode_err) && empty($woonplaats_err) && empty($email_err) && empty($wachtwoord_err) && empty($bevestig_wachtwoord_err)){
        
        $sql = "INSERT INTO klant (voornaam, achternaam, straat, postcode, woonplaats, email, wachtwoord) VALUES (:voornaam, :achternaam, :straat, :postcode, :woonplaats, :email, :wachtwoord)";
         
        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":voornaam", $param_voornaam, PDO::PARAM_STR);
            $stmt->bindParam(":achternaam", $param_achternaam, PDO::PARAM_STR);
            $stmt->bindParam(":straat", $param_straat, PDO::PARAM_STR);
            $stmt->bindParam(":postcode", $param_postcode, PDO::PARAM_STR);
            $stmt->bindParam(":woonplaats", $param_woonplaats, PDO::PARAM_STR);
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            $stmt->bindParam(":wachtwoord", $param_wachtwoord, PDO::PARAM_STR);

            $param_voornaam = $voornaam;
            $param_achternaam = $achternaam;
            $param_straat = $straat;
            $param_postcode = $postcode;
            $param_woonplaats = $woonplaats;
            $param_email = $email;
            $param_wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
            
            if($stmt->execute()){
                header("location: login.php");
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
     <title>Philomena Registratie</title>
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
 </head>
<body>
    <div id="login_screen">
        <h1>PHILOMENA</h1>
        <h2>Hair & Nails</h2>
        <div id="box">
            <h3>Registreren</h3>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div>
                    <input type="text" name="voornaam" placeholder="voornaam" <?php echo (!empty($voornaam_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $voornaam; ?>">
                    <span class="invalid-feedback"><?php echo $voornaam_err; ?></span>
                </div>
                <div>
                    <input type="text" name="achternaam" placeholder="achternaam" <?php echo (!empty($achternaam_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $achternaam; ?>">
                    <span class="invalid-feedback"><?php echo $achternaam_err; ?></span>
                </div>
                <div>
                    <input type="text" name="straat" placeholder="straat" <?php echo (!empty($straat_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $straat; ?>">
                    <span class="invalid-feedback"><?php echo $straat_err; ?></span>
                </div>
                <div>
                    <input type="text" name="postcode" placeholder="postcode" <?php echo (!empty($postcode_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $postcode; ?>">
                    <span class="invalid-feedback"><?php echo $postcode_err; ?></span>
                </div>
                <div>
                    <input type="text" name="woonplaats" placeholder="woonplaats" <?php echo (!empty($woonplaats_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $woonplaats; ?>">
                    <span class="invalid-feedback"><?php echo $woonplaats_err; ?></span>
                </div>
                <div>
                    <input type="email" name="email" placeholder="e-mail" <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                    <span class="invalid-feedback"><?php echo $email_err; ?></span>
                </div>    
                <div>
                    <input type="password" name="wachtwoord" placeholder="wachtwoord" <?php echo (!empty($wachtwoord_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $wachtwoord; ?>">
                    <span class="invalid-feedback"><?php echo $wachtwoord_err; ?></span>
                </div>
                <div>
                    <input type="password" name="bevestig_wachtwoord" placeholder="bevestig wachtwoord" <?php echo (!empty($bevestig_wachtwoord_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $bevestig_wachtwoord; ?>">
                    <span class="invalid-feedback"><?php echo $bevestig_wachtwoord_err; ?></span>
                </div>
                <div class="g-recaptcha" data-sitekey="your_site_key"></div>
                <div>
                    <input type="submit" value="Submit">
                </div>
                <p><a href="login.php">Terug</a></p>
            </form>
        </div>
    </div>    
</body>
</html>