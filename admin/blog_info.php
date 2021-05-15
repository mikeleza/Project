<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 mt-3">
          <div class="alert alert-light " role="alert">
           <p class="fs-1 text-dark" align="center">BOARD INFO</p> 
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
                <th scope="col" width="60%" class="text-center">ชื่อกระทู้</th>
                <th scope="col" width="10%" class="text-center">ตอบกลับ</th>
                <th scope="col" width="10%" class="text-center">ผู้สร้าง</th>
                <th scope="col" width="10%" class="text-center">ลบ</th>
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
            
            $num=0;
            $page_num=$page-1;
            if($page>=2){$num=($page_num*10);}

            if(isset($_POST['search'])){
              $search = $_POST['search'];
            $select_stmt = $db->prepare("SELECT * FROM board LEFT JOIN masterlogin ON board.u_id = masterlogin.ID WHERE board.b_title LIKE '%$search%' Order By b_id DESC LIMIT $start,10");
            $select_stmt->execute();}

            else if(!isset($_POST['search'])){
            $select_stmt = $db->prepare("SELECT * FROM board LEFT JOIN masterlogin ON board.u_id = masterlogin.ID Order By b_id DESC LIMIT $start,10");
            $select_stmt->execute(); }
            while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {  
            $num++;
            ?>
              <tr>
                <th class="text-center align-middle"><?php echo $num ?></th>
                <td class="align-middle"><a href="../user/blog.php?x=show&b_id=<?php echo $row['b_id']?>&cate=<?php echo$row['b_cate'];?>&page"><?php echo $row['b_title']?></td>
                <td class="text-center align-middle"><?php echo $row['b_reply']?></td>
                <td class="text-center align-middle"><?php echo $row['username']?></td>
                <td ><center><a href="?x=blog_info&delete_id=<?php echo $row['b_id']; ?>&page=<?php echo $page;?>" class="btn btn-danger btn-center">Delete</center></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>

          <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
            <li <?php if($page == 1) {echo 'class="page-item disabled"';}
                  else echo 'class="page-item"';?>>
              <a class="page-link" href="admin_home.php?x=blog_info&page=<?php echo $page-1; ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <?php for($i=1;$i<=$total_page;$i++){ ?>
            <li <?php if($page == $i) echo 'class="page-item active"' ;?>><a class="page-link" href="admin_home.php?x=blog_info&page=<?php echo($i); ?>"><?php echo $i;?></a></li>
              <?php } ?>

            <li <?php if($page >= $total_page) {echo 'class="page-item disabled"';}
                  else echo 'class="page-item"';?>>
              <a class="page-link" href="admin_home.php?x=blog_info&page=<?php echo $page+1; ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>

        </div>
      </div>
    </div>