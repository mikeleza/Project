<?php 

    require_once "connection.php";

    session_start();

    if (isset($_POST['btn_register'])) {
        $username = $_POST['txt_username'];
        $email = $_POST['txt_email'];
        $password = $_POST['txt_password'];        
        $role = 'user';

        $image_file = $_FILES['text_file']['name'];
        $type = $_FILES['text_file']['type'];
        $size = $_FILES['text_file']['size'];
        $temp = $_FILES['text_file']['tmp_name'];
        $path = "user/img/" . $image_file;
        if($image_file){
        if($type == "image/jpg" || $type == "image/jpeg" || $type == "image/png" || $type == "image/gif" ){
            if($size < 5000000){
                move_uploaded_file($temp, 'user/img/'.$image_file);
            } else { $errorMsg = "Your file too large then 5 MB"; 
                echo $errorMsg;}
        } else {$errorMsg= "Upload JPG, JPEG, PNG, GIF Only";
        echo $errorMsg;}}else { $image_file = $row['image']; }

        if (empty($username)) {
            $errorMsg[] = "Please enter username";
        } else if (empty($email)) {
            $errorMsg[] = "Please enter email";
        } else if (empty($password)) {
            $errorMsg[] = "Please enter password";  
        } else {
            try {
                $select_stmt = $db->prepare("SELECT username, email FROM masterlogin WHERE username = :uname OR email = :uemail");
                $select_stmt->bindParam(":uname", $username);
                $select_stmt->bindParam(":uemail", $email);
                $select_stmt->execute();
                $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

                if ($row['username'] == $username) {                    
                    $errorMsg[] = "";                    
                    header("location: register.php");
                } else if ($row['email'] == $email) {                   
                    $errorMsg[] = "";                    
                    header("location: register.php");
                } else if (!isset($errorMsg)) {
                    $insert_stmt = $db->prepare("INSERT INTO masterlogin(username, email, password, role, image) VALUES (:uname, :uemail, :upassword, :urole, :image)");
                    $insert_stmt->bindParam(":uname", $username);
                    $insert_stmt->bindParam(":uemail", $email);
                    $insert_stmt->bindParam(":upassword", $password);
                    $insert_stmt->bindParam(":urole", $role);
                    $insert_stmt->bindParam(":image", $image_file);

                    if ($insert_stmt->execute()) {
                        $_SESSION['success'] = "Register Successfully...";
                        header("location: index.php");
                    }
                }
            } catch(PDOException $e) {
                $e->getMessage();
            }
        }
    }


?>