<?php 

    require_once "../connection.php";

    session_start();
    $username = $_SESSION['user_login'];

    if (isset($_POST['btn_success'])) {
        try{

        $id= $_SESSION['user_id'];
        $select_stmt = $db->prepare('SELECT * FROM masterlogin WHERE ID=:id');
        $select_stmt->bindParam(":id", $id);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);



        $github = $_POST['txt_github'];
        $twit = $_POST['txt_twitter'];
        $instagram = $_POST['txt_instagram'];
        $facebook = $_POST['txt_facebook'];   
        $name = $_POST['txt_firstname'];
        $surname = $_POST['txt_lastname'];
        $nickname = $_POST['txt_nickname'];
        $email = $_POST['txt_email'];  
        $sex = $_POST['txt_sex'];     
        $phone = $_POST['txt_phone'];
        $address = $_POST['txt_address'];
        
        $image_file = $_FILES['text_file']['name'];
        $type = $_FILES['text_file']['type'];
        $size = $_FILES['text_file']['size'];
        $temp = $_FILES['text_file']['tmp_name'];
        $path =  "img/".$image_file;
        $directory = "img/";

        if ($image_file) {
            if($type == "image/jpg" || $type == "image/jpeg" || $type == "image/png" || $type == "image/gif" ){
                if(!file_exists($path)){
                    if($size < 5000000){
                        unlink($directory.$row['image']);
                        move_uploaded_file($temp, 'img/'.$image_file);
                    } else {
                        $errorMsg = "Your file to large plases uploard 5MB size";
                    }
                } else {
                    $errorMsg = "file already exists ... Check img folder";
                }
            } else {
                $errorMsg = "Upload JPG, JPEG, PNG, GIF olny";
            }
        } else {
            $image_file = $row['image'];
        } if (!isset($errorMsg)){
            $stmt = $db->prepare("UPDATE masterlogin SET image =:image WHERE ID = :id ");
            $stmt->bindParam(":image", $image_file);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        }

   
            
                    $sql = "UPDATE masterlogin SET Github=:ugithub, Twitter=:utwit, Instagram=:uinstagram, Facebook=:ufacebook, firstname=:uname, lastname=:usurname, nickname=:unickname, email=:uemail, sex=:usex, phone=:uphone, address=:uaddress WHERE username=:uusername ";
                    $update_stmt = $db->prepare($sql);
                    $update_stmt->bindparam(':ugithub', $github);
                    $update_stmt->bindparam(':utwit', $twit);
                    $update_stmt->bindparam(':uinstagram', $instagram);
                    $update_stmt->bindparam(':ufacebook', $facebook);
                    $update_stmt->bindparam(':uname', $name);
                    $update_stmt->bindparam(':usurname', $surname);
                    $update_stmt->bindparam(':unickname', $nickname);
                    $update_stmt->bindparam(':uemail', $email);
                    $update_stmt->bindparam(':usex', $sex);
                    $update_stmt->bindparam(':uphone', $phone);
                    $update_stmt->bindparam(':uaddress', $address);
                    $update_stmt->bindparam(':uusername', $_SESSION['user_login']);
  

                    if ($update_stmt->execute()) {
                        header("location: account.php");}
                    else {header("location: ac_setting.php");}
                    
             
                }catch(PDOException $e) {
                    $e->getMessage();
                }
        
   }else {
        header("location: account.php");
    }


?>