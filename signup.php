<?php 
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn,$_POST['fname']);
    $lname = mysqli_real_escape_string($conn,$_POST['lname']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}' ");
            if(mysqli_num_rows($sql) > 0){
                echo "$email - already exist!";
            }else{
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];

                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);

                    $extensions = ['png' , 'jpeg', 'jpg'];
                    if(in_array($img_ext,$extensions) === true){
                        $time = time();
                        new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name, "images/".$new_img_name)){
                            $status = "Active Now";
                            $random_id = rand(time(), 10000000);

                            $sql2 = mysqli_query($conn,"INSERT INTO users (unique_id,fname,lname,email,password,img,status)
                                                VALUES ({$random_id}, '{}')");
                        }

                    }else{
                        echo "Please select an Image File - jpeg, jpg, png";
                    }
                }else{
                    echo "Please select an Image File!";
                }
            }
        }else{
            echo "$email - This is not a valid email! "

        }



    }else{
        echo "All input field are required! ";
    }
    
?>