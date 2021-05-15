<?php 
    session_start();
    require_once 'connection.php';
    $cate=$_GET['cate'];
    $x=$_GET['x'];
    $id=$_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Create Ques Board</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link href="../../style.css" rel="stylesheet">

    <?php if(isset($_SESSION['user_login'])){?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="../user_home.php">CCMM.COM</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link " href="../user_home.php">HOME</a>
            </li>
          
            <li class="nav-item">
              <a class="nav-link active" aria-current="page"  href="../blog.php?x&page">BOARD</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../abot.php">ABOUT</a>
            </li>
          </ul>
                <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
              <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['user_login']; ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="account.php">Account Settings</a></li>
                <li><a class="dropdown-item" href="../board_history.php?id=<?php echo $id; ?>&page">Your Blog</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
              </ul>
              </li>
            </ul>
        
            
        </div>
      </div>
    </nav><?php }?>
    <?php if(isset($_SESSION['admin_login'])){?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="admin_home.php">CCMM.COM</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link " href="../admin/admin_home.php?x=dashboard">DASHBOARD</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="blog.php?x&page">BOARD</a>
            </li>
          </ul>
          
          <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['admin_login']; ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../admin/admin_home.php?x=dashboard">Dashboard</a></li>
                <li><a class="dropdown-item" href="../admin/admin_home.php?x=user_info&page">User info</a></li>
                <li><a class="dropdown-item" href="../admin/admin_home.php?x=blog_info&page">Board info</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
              </ul>
            </li>
            </ul>
        </div>
      </div>
    </nav><?php }?>
    
</head>
<body style="background-color:#E5E5E5;">

<form action="ques_board_db.php?x=<?php echo $x; ?>&cate=<?php echo $cate; ?>" method="post" class="form-horizontal my-5">
<div class="container">
<div class="col-12 col-sm-12 mt-5">
          <table class="table">
            <thead>
              <tr class="table-dark">
                <th width="10%"></th>
                <th>
                <p class="fw-normal fs-2 mx-auto" style="width: 270px;">ตั้งกระทู้</p></th>
              </tr>
            </thead>
            <tbody>
              <tr class="table-secondary">
                <td class="text-center fs-5">ชื่อกระทู้</td>
                <td>
                <div class="form-group">
                <input type="text" name="text_main" class="form-control">
                </div>
                </td>
              </tr>
              <tr class="table-secondary">
              <td class="text-center fs-5">ข้อความ</td>
              <td>
              <div class="form-group">
              <div class="form-floating">
                <textarea class="form-control" name="text_detail" style="height: 100px"></textarea>
                </div>
              </div>
            </td>
              </tr>
              <tr>
              <td></td>
              <td>
              <div class="form-group">
                <input type="submit" name="btn_success" class="btn btn-success" value="ยืนยัน">
                <a href="../blog.php?x&page"><input type="button" name="btn-danger" class="btn btn-danger" value="ยกเลิก"></a>
              </div>
              </td>
              </tr>
              
            </tbody>
          </table>
</div>
</div>
</form>

<footer>
  <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> CE223 CLESS</p>
</footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
 

</body>
</html>