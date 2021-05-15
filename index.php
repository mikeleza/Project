<?php 

    session_start();

    if (isset($_SESSION['admin_login'])) {
        header("location: admin/admin_home.php");
    }

    if (isset($_SESSION['user_login'])) {
        header("location: user/user_home.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style> .container {max-width: 950px;} </style>
</head>
<body>

    <div class="container" >
        <h1 class="mt-5 " align="center">Login Page</h1>
        <hr>

        <?php if(isset($_SESSION['success'])) : ?>
            <div class="alert alert-success">
                <h3>
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <?php if(isset($_SESSION['error'])) : ?>
            <div class="alert alert-danger">
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <form action="login_db.php" method="post" class="form-horizontal my-5">
        
        <label for="username" class="col-sm-3 control-label">ชื่อผู้ใช้</label>
        <div class="col-sm-12">
            <input type="text" name="txt_username" class="form-control" required placeholder="ใส่ ชื่อผู้ใช้">
        </div>
        
        <label for="password" class="col-sm-3 control-label">รหัสผ่าน</label>
        <div class="col-sm-12">
            <input type="password" name="txt_password" class="form-control" required placeholder="ใส่ รหัสผ่าน">
        </div>

        <div class="form-group">
            <div class="col-sm-12 mt-3">
                <input type="submit" name="btn_login" class="btn btn-success" style="width: 100%;" value="เข้าสู่ระบบ">
            </div>
        </div>

        <div class="form-group text-center">
            <div class="col-sm-12 mt-3">
                ต้องการสมัครสมาชิก ?
                <p><a href="register.php">คลิกที่นี้</a></p>
            </div>
        </div>

        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        
</body>
</html>