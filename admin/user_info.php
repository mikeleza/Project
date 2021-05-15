<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 mt-3">
          <div class="alert alert-light" role="alert">
           <p class="fs-1" align="center">USER INFO</p> 
          </div>
        </div>
      </div>
      <form action="" method="post" id="form" enctype="multipart/form-data">
        <div class="row">
          <div class="col-9"></div>
      <div class="col-2">
        <input type="text" name="search" class="form-control" placeholder="Search">
      </div>
      <div class="col">
      <input type="submit" class="btn btn-success" name="btn-search" value="Search" >
      </div>
    </div>
    </form>
        <div class="col-12 col-sm-12 mt-2">
          <table class="table table-light table-bordered">
            <thead>
              <tr class="fs-5 table-dark">
                <th scope="col" width="10%" class="text-center">ลำดับที่</th>
                <th scope="col" width="10%" class="text-center">รูปโปรไฟล์</th>
                <th scope="col" width="10%" class="text-center">ชื่อผู้ใช้งาน</th>
                <th scope="col" width="30%" >ชื่อ</th>
                <th scope="col" width="30%" >สกุล</th>
                <th scope="col" width="10%" class="text-center">ลบ</th>
              </tr>
            </thead>

            <tbody>
            <?php
            $role = "user";
            $page = $_GET['page'];
            $per_page = 10;
            if($page==""){$page=1;}
            $res = $db->query('SELECT COUNT(*) FROM masterlogin');
            $num_rows = $res->fetchColumn();
            $total_page =ceil($num_rows/$per_page);
            $start = ($page-1)*$per_page;
            
            $num=0;
            $page_num=$page-1;
            if($page>=2){$num=($page_num*10);}

            if(isset($_POST['search'])){
              $search = $_POST['search'];
              $select_stmt = $db->prepare("SELECT * FROM masterlogin WHERE role=:role AND username LIKE '%$search%' LIMIT $start,10");
              $select_stmt->bindParam(":role", $role);
              $select_stmt->execute(); }

            else if(!isset($_POST['search'])){
            $select_stmt = $db->prepare("SELECT * FROM masterlogin WHERE role=:role LIMIT $start,10");
            $select_stmt->bindParam(":role", $role);
            $select_stmt->execute(); }

            while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {  
            $num++;
            ?>
              <tr>
                <th class="text-center align-middle"><?php echo $num ?></th>
                <td class="text-center"><img src="../user/img/<?php echo $row['image']; ?>" alt="" class="rounded-circle" width="70" height="70"></td>
                <td class="align-middle text-center"><?php echo $row['username']?></td>
                <td class="align-middle"><?php echo $row['firstname'];?></td>
                <td class="align-middle"><?php echo $row['lastname'];?></td>
                <td ><center><a href="?x=user_info&deleteuser_id=<?php echo $row['ID']; ?>&page=<?php echo $page;?>" class="btn btn-danger btn-center">Delete</center></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>

          <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
            <li <?php if($page == 1) {echo 'class="page-item disabled"';}
                  else echo 'class="page-item"';?>>
              <a class="page-link" href="admin_home.php?x=user_info&page=<?php echo $page-1; ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <?php for($i=1;$i<=$total_page;$i++){ ?>
            <li <?php if($page == $i) echo 'class="page-item active"' ;?>><a class="page-link" href="admin_home.php?x=user_info&page=<?php echo($i); ?>"><?php echo $i;?></a></li>
              <?php } ?>

            <li <?php if($page >= $total_page) {echo 'class="page-item disabled"';}
                  else echo 'class="page-item"';?>>
              <a class="page-link" href="admin_home.php?x=user_info&page=<?php echo $page+1; ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>

        </div>
      </div>
    </div>