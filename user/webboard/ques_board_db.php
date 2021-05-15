<?php
    require_once '../../connection.php';
    session_start();

        if (isset($_POST['btn_success'])) {
            $title = $_POST['text_main'];
            $datail = $_POST['text_detail'];
            $id = $_SESSION['user_id'];
            $cate=$_GET['cate'];
            $x=$_GET['x'];


            if(empty($title AND $datail)){
                $errorMsg[] = "โปรดใส่ข้อมูล";}
                

                else if ($title OR $datail){
                 try{

                    $insert_stmt = $db->prepare("INSERT INTO board(u_id, b_title, b_detail, b_date, b_cate) VALUES (:uu_id, :ub_title, :ub_detail, NOW(), :ucate)");
                    $insert_stmt->bindParam(":uu_id", $id);
                    $insert_stmt->bindParam(":ub_title", $title);
                    $insert_stmt->bindParam(":ub_detail", $datail);
                    $insert_stmt->bindParam(":ucate", $cate);


                        if ($insert_stmt->execute()) {
                            header("location: ../blog.php?x=".$x."&cate=".$cate."&page");}
                        else {echo("<meta http-equiv='refresh' content='0'>");}
                        
                
                    }catch(PDOException $e) {
                        $e->getMessage();
                    }
            
        }else {
            echo("<meta http-equiv='refresh' content='0'>");
        }
    }
?>