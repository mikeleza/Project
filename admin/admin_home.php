<?php 
    session_start();

    if (!isset($_SESSION['admin_login'])) {
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
    <title>

        Dashboard

    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link href="../style.css" rel="stylesheet">

    <STYLE TYPE="TEXT/CSS">
      A:link {
      text-decoration:none;
      }
      A:visited {
      text-decoration:none;
      }</STYLE>

      
    <style>
    
    #chart-container {
        width: 100%;
        height: auto;
    }
</style>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="admin_home.php?x=dashboard">CCMM.COM</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="admin_home.php?x=dashboard">DASHBOARD</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../user/blog.php?x&page">BOARD</a>
            </li>
          </ul>
         
          <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['admin_login']; ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="admin_home.php?x=dashboard">Dashboard</a></li>
                <li><a class="dropdown-item" href="admin_home.php?x=user_info&page">User info</a></li>
                <li><a class="dropdown-item" href="admin_home.php?x=blog_info&page">Board info</a></li>
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
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

<?php
        $num_board = $db->query("SELECT COUNT(*) FROM board");
        $for_board = $num_board->fetchColumn();
        $num_reply = $db->query("SELECT COUNT(*) FROM reply");
        $for_reply = $num_reply->fetchColumn();
        $num_user = $db->query("SELECT COUNT(*) FROM masterlogin WHERE role='user'");
        $for_user = $num_user->fetchColumn();

        $insert_stmt = $db->prepare("UPDATE chart SET value=:board WHERE ID='1'");
        $insert_stmt->bindParam(":board", $for_board);
        $insert_stmt->execute();

        $stmt = $db->prepare("UPDATE chart SET value=:reply WHERE ID='2'");
        $stmt->bindParam(":reply", $for_reply);
        $stmt->execute();

        $update = $db->prepare("UPDATE chart SET value=:member WHERE ID='3'");
        $update->bindParam(":member", $for_user);
        $update->execute();


?>

<?php
if(isset($_GET['delete_id'])){
    $de_id = $_GET['delete_id'];

    $select_stmt = $db->prepare('SELECT * FROM board LEFT JOIN reply ON board.b_id = reply.bm_id WHERE board.b_id = :id');
    $select_stmt->bindParam(":id", $de_id);
    $select_stmt->execute();
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

    if(empty($row['bm_id'])){
        try{
            $delete_stmt = $db->prepare("DELETE FROM board WHERE b_id = :id");
            $delete_stmt->bindParam(":id", $de_id);
            if($delete_stmt->execute()){

          header("location: admin_home.php?x=blog_info&page");

          } else {
          echo "Delete failed";}

          } catch(PDOException $e) {
          $e->getMessage();
      }
    } 
    if(($row['bm_id'])){
        try{
            $delete_stmt = $db->prepare("DELETE FROM board WHERE b_id = :id");
            $delete_stmt->bindParam(":id", $de_id);
            $stmt = $db->prepare("DELETE FROM reply WHERE bm_id = :id");
            $stmt->bindParam(":id", $de_id);
            $stmt->execute();
            if($delete_stmt->execute()){

          header("location: admin_home.php?x=blog_info&page");

          } else {
          echo "Delete failed";}

          } catch(PDOException $e) {
          $e->getMessage();
      }
    } 


}
?>

<?php
if(isset($_GET['deleteuser_id'])){
    $de_id = $_GET['deleteuser_id'];

    $select_stmt = $db->prepare('SELECT * FROM masterlogin WHERE ID = :id');
    $select_stmt->bindParam(":id", $de_id);
    $select_stmt->execute();
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

    if($row['username']){
        try{
            $delete_stmt = $db->prepare("DELETE FROM masterlogin WHERE ID = :id");
            $delete_stmt->bindParam(":id", $de_id);
            if($delete_stmt->execute()){

          header("location: admin_home.php?x=user_info&page");

          } else {
          echo "Delete failed";}

          } catch(PDOException $e) {
          $e->getMessage();
      }
    } 
}
?>

<?php
    if(isset($_GET['x'])){
    $x = $_GET['x'];
    if($x == "dashboard") include ('dashboard_db.php');
    if($x == "blog_info") include ('blog_info.php');
    if($x == "user_info") include ('user_info.php');

}
    if(isset($_GET['page'])){
    $page = $_GET['page'];
    if($page=='') $page="1";
}
?>

<footer>
  <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> CE223 CLESS</p>
</footer>

<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js"></script>
    <script src="../scrollup.js"></script>

    <script>
        $(document).ready(function() {
            showGraph();
        });
        function showGraph(){
            {
                $.post("data.php", function(data) {
                    console.log(data);
                    let name = ['โพส','ตอบกลับ','สมาชิก'];
                    let score = [];
                    for (let i in data) {
                        score.push(data[i].value);
                    }

                    let chartdata = {
                        labels: name,
                        datasets: [{
                                label: ['Dashboard'],
                          
                                backgroundColor: [
                                  'orange',
                                  'red',
                                  'blue'
                                ],
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: score
                        }]
                    };
                    let graphTarget = $('#graphCanvas');
                    let barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata                  
                    })
                })
            }
        }
    </script>
    

</body>
</html>