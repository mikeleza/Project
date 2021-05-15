<?php 
    session_start();
    require_once '../connection.php';
    $id=$_SESSION['user_id'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Blog</title>

    <STYLE TYPE="TEXT/CSS">
      A:link {
      text-decoration:none;
      }
      A:visited {
      text-decoration:none;
      }</STYLE>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link href="../style.css" rel="stylesheet">
      <?php if(isset($_SESSION['user_login'])){?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="user_home.php">CCMM.COM</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link " href="user_home.php">HOME</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link active" aria-current="page"  href="blog.php?x&page">BOARD</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="abot.php">ABOUT</a>
            </li>
          </ul>
                
              <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['user_login']; ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="account.php">Account Settings</a></li>
                <li><a class="dropdown-item" href="board_history.php?id=<?php echo $id; ?>&page">Your Blog</a></li>
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
        <a class="navbar-brand" href="../admin/admin_home.php?x=dashboard">CCMM.COM</a>
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
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
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

    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 mt-3">
          <div class="alert alert-light" role="alert">
           <p class="fs-1 text-dark" align="center">ประวัติหัวข้อสนทนา</p> 
          </div>
        </div>
      </div>

      <div class="container">

        

        <div class="col-12 col-sm-12 mt-2">
          <table class="table table-light">
            <thead>
              <tr class="fs-5 table-dark">
                <th scope="col" width="15%" class="text-center">วันที่สร้าง</th>
                <th scope="col" width="60%" class="text-center">ชื่อกระทู้</th>
                <th scope="col" width="5%" class="text-center">ตอบ</th>
                <th scope="col" width="5%" class="text-center">อ่าน</th>
                <th scope="col" width="10%" class="text-center">ผู้สร้าง</th>
              </tr>
            </thead>

            <tbody>
            <?php
            $page = $_GET['page'];
            $per_page = 10;
            if($page==""){$page=1;}
            $res = $db->query('SELECT COUNT(*) FROM board');
            $num_rows = $res->fetchColumn();
            $total_page =ceil($num_rows/$per_page);
            $start = ($page-1)*$per_page;


            $select_stmt = $db->prepare("SELECT * FROM board LEFT JOIN masterlogin ON board.u_id = masterlogin.ID WHERE u_id='$id' Order By b_id DESC LIMIT $start,10");
            $select_stmt->execute(); 
            while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {              
            ?>
              <tr>
                <th class="text-center"><?php echo $row['b_date']?></th>
                <td><a href="blog.php?x=show&b_id=<?php echo $row['b_id']?>&cate=<?php echo$row['b_cate'];?>&page"><?php echo $row['b_title']?></td>
                <td class="text-center"><?php echo $row['b_reply']?></td>
                <td class="text-center"><?php echo $row['b_view']?></td>
                <td class="text-center"><?php echo $row['username']?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>

          <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
            <li <?php if($page == 1) {echo 'class="page-item disabled"';}
                  else echo 'class="page-item"';?>>
              <a class="page-link" href="blog.php?x&page=<?php echo $page-1; ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <?php for($i=1;$i<=$total_page;$i++){ ?>
            <li <?php if($page == $i) echo 'class="page-item active"' ;?>><a class="page-link" href="blog.php?x&page=<?php echo($i); ?>"><?php echo $i;?></a></li>
              <?php } ?>

            <li <?php if($page >= $total_page) {echo 'class="page-item disabled"';}
                  else echo 'class="page-item"';?>>
              <a class="page-link" href="blog.php?x&page=<?php echo $page+1; ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>

        </div>
      </div>
    </div>
    <footer>
  <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> CE223 CLESS</p>
</footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="../scrollup.js"></script>

</body>
</html>