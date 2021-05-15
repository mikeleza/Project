<?php 
    session_start();
    $id=$_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>About</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link href="../style.css" rel="stylesheet">

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
              <a class="nav-link" href="blog.php?x&page">BOARD</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page"  href="abot.php">ABOUT</a>
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
    </nav>
    
</head>
<body style="background-color:#E5E5E5;">

<div class="container">
<div class="card mt-3" style="width: 100%;">
  <img src="../img/ece-main.jpg" class="card-img-top">
  <div class="card-body" >
  <h1 class="text-center"> เกี่ยวกับเว็บไซต์ </h1>
  <h4 class="text-start px-auto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เว็บไซต์ CCMM.COM ของเรานั้นเป็นเว็บไซต์เกี่ยวกับการแก้ปัญหาคอมพิวเตอร์ของคนที่ไม่มีความรู้ โดยเว็บไซต์นี้ก็จะเป็นตัวช่วยสำหรับช่างมือใหม่ที่ต้องการหาความรู้เกี่ยวกับคอมพิวเตอร์ และถ้าเกิดช่างหาความรู้หรือปัญหาที่ต้องการไม่ได้ทางตัวเว็บก็มีการตั้งกระทู้เอาไว้สอบถามเพื่อให้คนที่มีความรู้เข้ามาตอบ
โดยเว็บของเราจะมีหมวดหมู่หลักๆคือ ช่างมือใหม่ เทคนิคพิเศษที่ควรมี ทักษะพิเศษ โดยเว็บนี้จะรวมเอาทุกอย่างเกี่ยวกับความรู้ของคนที่อยากจะเป็นช่างหรือแก้ปัญหาของตนเอง
</h4>


  
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
    </html>

</body>
</html>