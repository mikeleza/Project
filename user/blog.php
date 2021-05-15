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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
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

<?php 
if(isset($_GET['x'])){
if($_GET["x"]=="")  include ("board_main.php");
if($_GET["x"]=="show") include ("show.php");
if($_GET["x"]=="board_skill") include ("webboard/board_skill.php");
if($_GET["x"]=="board_tech") include ("webboard/board_tech.php");
if($_GET["x"]=="board_tool") include ("webboard/board_tool.php");
if($_GET["x"]=="board_history") include ("board_history.php");}

?>
<?php
if(isset($_POST['btn-reply'])){
    $b_id=$_GET['b_id'];
    $br_detail=$_POST['br_detail'];
    if(empty($br_detail)){
      $errorMsg[] = "Please enter username";
    }
    else if ($br_detail){
    if($_GET["Action"] == "save"){
    try{
    $insert_stmt = $db->prepare("INSERT INTO reply(bm_id, u_id, br_detail, br_date) VALUES (:ub_id, :uid, :ubr_detail, NOW())");
    $insert_stmt->bindParam(":ub_id", $b_id);
    $insert_stmt->bindParam(":uid", $id);
    $insert_stmt->bindParam(":ubr_detail", $br_detail);
    if($insert_stmt->execute()){
      echo("<meta http-equiv='refresh' content='0'>");
      } 
      else{
      echo "insert failed";
      }
    }catch(PDOException $e) {
      $e->getMessage();
  }
  }
}
}
    
?>

<footer>
  <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> CE223 CLESS</p>
</footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="../main.js"></script>
    

</body>
</html>