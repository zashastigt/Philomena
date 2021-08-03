<?php 

    require_once "config.php";

    $reservation_date = $reservation_time = $status = $klantID = $behandelingID = $confirmed = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Validate name
        $input_name = trim($_POST["name"]);

            $name = $input_name;
        
        
        // Validate address
        $input_address = trim($_POST["address"]);

            $address = $input_address;
        
        
        // Validate salary
        $input_salary = trim($_POST["salary"]);
        if(empty($input_salary)){
            $salary_err = "Please enter the salary amount.";     
        } elseif(!ctype_digit($input_salary)){
            $salary_err = "Please enter a positive integer value.";
        } else{
            $salary = $input_salary;
        }
        
        // Check input errors before inserting in database
        if(empty($name_err) && empty($address_err) && empty($salary_err)){
            // Prepare an insert statement
            $sql = "INSERT INTO afspraak (reservation_date, reservation_time, status, klantID, behandelingID, confirm) VALUES (:reservation_date, :reservation_time, :status, :klantID, :behandelingID, :confirm)";
     
            if($stmt = $pdo->prepare($sql)){
                // Bind variables to the prepared statement as parameters
                $stmt->bindParam(":reservation_date", $param_reservation_date);
                $stmt->bindParam(":reservation_time", $param_reservation_time);
                $stmt->bindParam(":status", $param_status);
                $stmt->bindParam(":klantID", $param_klantID);
                $stmt->bindParam(":behandelingID", $param_behandelingID);
                $stmt->bindParam(":confirm", $param_confirm);
                
                // Set parameters
                $param_reservation_date = $reservation_date;
                $param_reservation_time = $reservation_time;
                $param_status = $status;
                $param_klantID = $klantID;
                $param_behandelingID = $behandelingID;
                $param_confirm = $confirmed;
                
                // Attempt to execute the prepared statement
                if($stmt->execute()){
                    // Records created successfully. Redirect to landing page
                    header("location: index.php");
                    exit();
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
             
            // Close statement
            unset($stmt);
        }
        
        // Close connection
        unset($pdo);
    }

?>