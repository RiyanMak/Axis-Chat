<?php 
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn,$_POST['fname']);
    $lname = mysqli_real_escape_string($conn,$_POST['lname']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

            //$sql = mysqli_query($conn, "SELECT email FROM");
        }else{
            echo "$email - This is not a valid email! "

        }



    }else{
        echo "All input field are required! ";
    }
    
?>