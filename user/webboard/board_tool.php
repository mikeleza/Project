<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 mt-3">
          <div class="alert alert-light" role="alert">
           <p class="fs-1 text-dark" align="center">กระดานสนทนา เครื่องมือ</p> 
          </div>
        </div>
      </div>

      <div class="container">
      <div class="row">
      <div class="col-6 col-sm-3 text-center">
      <div class="card">
            <div class="card-body" style="background-color:#1AB967;">
            <a href="blog.php?x=board_tech&cate=1&page" ><h3 class="text-light">รวมเทคนิคพิเศษ </h3></a>
          </div>
          </div>
        </div>
        <div class="col-6 col-sm-3 text-center">
          <div class="card">
            <div class="card-body"style="background-color:#FF5733;">
          <a href="blog.php?x=board_skill&cate=2&page" ><h3 class="text-light">ทักษะที่ควรมี</h3></a>
          </div>
          </div>
        </div>
        <div class="col-6 col-sm-3 text-center">
          <div class="card">
            <div class="card-body" style="background-color:#D971EE;">
          <a href="blog.php?x=board_tool&cate=3&page" ><h3 class="text-light">โปรแกรม Tools</h3></a>
          </div>
          </div>
        </div>
        <div class="col-6 col-sm-3 text-center">
          <div class="card">
            <div class="card-body" style="background-color:#ED7E16;">
          <a href="blog.php?x=&page" ><h3 class="text-light">รวมกระทู้ </h3></a>
          </div>
          </div>
        </div>
        </div>
        </div>

        <div class="row">
        <div class="col-12 col-sm-12 mt-3">
        <div class="btn-group" style="width: 5rem;">
          <a href="webboard/ques_board.php?x=board_tool&cate=3" class="btn btn-info">ตั้งกระทู้</a>
        </div>
        </div>
        </div>

        <div class="col-12 col-sm-12 mt-2">
          <table class="table  table-light ">
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
            $cate = $_GET['cate'];
            if($page==""){$page=1;}
            $res = $db->query("SELECT COUNT(*) FROM board WHERE b_cate='$cate'");
            $num_rows = $res->fetchColumn();
            $total_page =ceil($num_rows/$per_page);
            $start = ($page-1)*$per_page;


            $select_stmt = $db->prepare("SELECT * FROM board LEFT JOIN masterlogin ON board.u_id = masterlogin.ID WHERE board.b_cate='$cate' Order By b_id DESC LIMIT $start,10");
            $select_stmt->execute(); 
            while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {              
            ?>
              <tr>
                <th class="text-center"><?php echo $row['b_date']?></th>
                <td ><a href="blog.php?x=show&b_id=<?php echo $row['b_id']?>&cate=<?php echo $cate;?>&page"><?php echo $row['b_title']?></td>
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
              <a class="page-link" href="blog.php?x=board_tool&cate=3&page=<?php echo $page-1; ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <?php for($i=1;$i<=$total_page;$i++){ ?>
            <li <?php if($page == $i) echo 'class="page-item active"' ;?>><a class="page-link" href="blog.php?x=board_tool&cate=3&page=<?php echo($i); ?>"><?php echo $i;?></a></li>
              <?php } ?>

            <li <?php if($page >= $total_page) {echo 'class="page-item disabled"';}
                  else echo 'class="page-item"';?>>
              <a class="page-link" href="blog.php?x=board_tool&cate=3&page=<?php echo $page+1; ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
        </div>
      </div>
    </div>