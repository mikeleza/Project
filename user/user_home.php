<?php 
    session_start();
    if (!isset($_SESSION['user_login'])) {
        header("location: ../index.php");
    }
  require_once '../connection.php';
 $id=$_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    <link href="../style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="user_home.php">CCMM.COM</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">HOME</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="blog.php?x&page">BOARD</a>
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
                <li><a class="dropdown-item" href="board_history.php?id=<?php echo $id; ?>&page" >Your Blog</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
              </ul>
            </li>
            </ul>
        </div>
      </div>
    </nav>
    <STYLE TYPE="TEXT/CSS">
      A:link {
      text-decoration:none;
      }
      A:visited {
      text-decoration:none;
      }</STYLE>
</head>
<body style="background-color:#E5E5E5;">


<div class="container">
<br>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../img/D.jpg" class="d-block w-100" height="500" alt="..."></a>
    </div>
    <div class="carousel-item">
      <img src="../img/b.jpg" class="d-block w-100" height="500" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../img/c.jpg" class="d-block w-100" height="500" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="card mt-5 ">
  <h5 class="card-header text-light text-center" style="background-color:#ED7E16;">รวมหัวข้อ กระดานสนทนา</h5>
  <div class="card-body">
  <table class="table">
            <thead>
              <tr class="fs-5 table-dark">
                <th scope="col" width="60%" class="text-center">ชื่อกระทู้</th>
                <th scope="col" width="5%" class="text-center">ตอบ</th>
                <th scope="col" width="5%" class="text-center">อ่าน</th>
                <th scope="col" width="10%" class="text-center">ผู้สร้าง</th>
              </tr>
            </thead>

            <tbody>
            <?php
            $per_page = 10;
            $res = $db->query('SELECT COUNT(*) FROM board');
            $num_rows = $res->fetchColumn();
            $total_page =ceil($num_rows/$per_page);
            $select_stmt = $db->prepare("SELECT * FROM board LEFT JOIN masterlogin ON board.u_id = masterlogin.ID Order By b_id DESC LIMIT 0,10");
            $select_stmt->execute(); 

            while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {              
            ?>
              <tr>
                <td><a href="blog.php?x=show&b_id=<?php echo $row['b_id']?>&cate=<?php echo$row['b_cate'];?>&page"><?php echo $row['b_title']?></td>
                <td class="text-center"><?php echo $row['b_reply']?></td>
                <td class="text-center"><?php echo $row['b_view']?></td>
                <td class="text-center"><?php echo $row['username']?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>

    
  </div>
</div>

<div class="row mt-5 mb-5">
  <div class="col-sm-4">
    <div class="card">
    <h5 class="card-header text-light text-center" style="background-color:#1AB967;">เทคนิคพิเศษ</h5>
      <div class="card-body">
      <table class="table">

            <tbody>
            <?php
            $per_page = 5;
            $res = $db->query('SELECT COUNT(*) FROM board');
            $num_rows = $res->fetchColumn();
            $total_page =ceil($num_rows/$per_page);

            $select_stmt = $db->prepare("SELECT * FROM board LEFT JOIN masterlogin ON board.u_id = masterlogin.ID WHERE board.b_cate='1' Order By b_id DESC LIMIT 0,5");
            $select_stmt->execute();
            while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {              
            ?>
              <tr>
                <td><a href="blog.php?x=show&b_id=<?php echo $row['b_id']?>&cate=<?php echo$row['b_cate'];?>&page"><?php echo $row['b_title']?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="card">
    <h5 class="card-header text-light text-center" style="background-color:#FF5733;">ทักษะที่ควรมี</h5>
      <div class="card-body">
      <table class="table">

            <tbody>
            <?php
            $per_page = 5;
            $res = $db->query('SELECT COUNT(*) FROM board');
            $num_rows = $res->fetchColumn();
            $total_page =ceil($num_rows/$per_page);
            $select_stmt = $db->prepare("SELECT * FROM board LEFT JOIN masterlogin ON board.u_id = masterlogin.ID WHERE board.b_cate='2' Order By b_id DESC LIMIT 0,5");
            $select_stmt->execute();

            while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {              
            ?>
              <tr>
                <td><a href="blog.php?x=show&b_id=<?php echo $row['b_id']?>&cate=<?php echo$row['b_cate'];?>&page"><?php echo $row['b_title']?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="card">
    <h5 class="card-header text-light text-center" style="background-color:#D971EE;">โปรแกรม Tools</h5>
      <div class="card-body">
      <table class="table">
            <tbody>
            <?php
            $per_page = 5;
            $res = $db->query('SELECT COUNT(*) FROM board');
            $num_rows = $res->fetchColumn();
            $total_page =ceil($num_rows/$per_page);
            $select_stmt = $db->prepare("SELECT * FROM board LEFT JOIN masterlogin ON board.u_id = masterlogin.ID WHERE board.b_cate='3' Order By b_id DESC LIMIT 0,5");
            $select_stmt->execute();

            while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {              
            ?>
              <tr>
                <td><a href="blog.php?x=show&b_id=<?php echo $row['b_id']?>&cate=<?php echo$row['b_cate'];?>&page"><?php echo $row['b_title']?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>
</div>

<center>
<div class="wrapper"> 
        <div class="title">Simple Online Chatbot</div>
           <div class="form">
              <div class="bot-inbox inbox">
                 <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="msg-header">
                <p>สวัสดี สอบถามปัญหาเกี่ยวกับอะไร </p>
                <p> 1.การเปิดเครื่อง(ฮาร์แวร์) |กด 1|</p> 
                <p> 2.เสียง |กด 2|</p>
                <p> 3.การบูต/การเปิดเครื่อง(ซอฟต์แวร์) |กด 3|</p> 
                <p> 4.เครื่องดับขณะใช้งาน |กด 4|</p>
                <p> 5.เครื่องช้า |กด 5|</p>
                <p> 6.เครื่องเกิดเออเร่อร์หลายอย่าง |กด 6|</p>
                <p> 7.เข้าอินเตอร์เน็ตไม่ได้ |กด 7|</p>
                <p> 8.ปัยหาอื่นๆ หรือบอทไม่สามารถแนะะนำวิธีแก้ไขปัญหาได้ |กด 8|</p>
        </div>
     </div> 
 </div> 
     <div class="typing-field">
         <div class="input-data">
             <input id="data" type="text" placeholder="Type something here.." required>
             <button id="send-btn">Send</button>
         </div>
     </div>
</div></center>

  


<footer>
  <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> CE223 CLESS</p>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function(){
        $("#send-btn").on("click", function(){
            $value = $("#data").val();
            $msg = '<div class= "user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';  
            $(".form").append($msg);
            $("#data").val('');
            
            // staet ajax code
            $.ajax({
                url: 'message.php',
                type: 'POST',
                data: 'text='+$value,
                success: function(result){
                    $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                    $(".form").append($replay);
                   // when chat goes down the scroll bar automatically comes to the bottom
                    $(".form").scrollTop($(".form")[0].scrollHeight);
            
                }
        });
      })
    });
    </script>


</body>
</html>