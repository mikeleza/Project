<style>.container {max-width: 1200px;}</style>
<?php  $b_id = $_GET['b_id']; 
       $page = $_GET['page'];?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<form action="blog.php?x=show&b_id=<?php echo $b_id?>&Action=save&page=<?php echo $page; ?>" method="post" enctype="multipart/form-data" class="form-horizontal my-5">
      <div class="container">
        <div class="col-12 col-sm-12 mt-4">  
        <?php
              $select_stmt = $db->prepare("SELECT * FROM board LEFT JOIN masterlogin ON board.u_id = masterlogin.ID WHERE board.b_id='$b_id' Order By b_id DESC");
              $select_stmt->execute(); 
              $row = $select_stmt->fetch(PDO::FETCH_ASSOC);    
              $view = $row['b_view'];
              $view++;
              if($page<=1){
            ?>
        <div class="card">
          <h3 class="card-header text-light text-center" style="background-color:#262627;"><?php echo $row['b_title']; ?></h3>
          <div class="card-body">            
              <h5 class="fs-5"><?php echo str_replace(chr(13),"<br>",$row['b_detail'])?></h5>
              <hr>
              <h6 class="text-end">โดย <?php echo $row['username']?> เมื่อ <?php echo $row['b_date']?></h6>
          </div>
        </div> <?php } ?>
          
          <?php
          $per_page = 10;
          if($page==""){$page=1;}
          $res = $db->query("SELECT COUNT(*) FROM reply WHERE bm_id='$b_id'");
          $num_rows = $res->fetchColumn();
          $up_reply = $num_rows;
          
          $stmt = $db->prepare("UPDATE board SET b_reply='$up_reply', b_view='$view' WHERE b_id='$b_id'");
          $stmt->execute();
          
          $total_page =ceil($num_rows/$per_page);
          $start = ($page-1)*$per_page;

              
              $select_stmt = $db->prepare("SELECT * FROM reply LEFT JOIN masterlogin ON reply.u_id = masterlogin.ID WHERE reply.bm_id='$b_id' Order By br_id ASC LIMIT $start,10");
              $select_stmt->execute(); 
              $num=0;
              $page_num=$page-1;
              if($page>=2){$num=($page_num*10);}
              while($rowReply = $select_stmt->fetch(PDO::FETCH_ASSOC)){ 
                $num++;   
            ?>
            
          <table class="table table-light mt-3">
          
            <tbody>
            <tr><td class="fs-6">ความคิดเห็นที่ <?php echo $num;?></td></tr>
              <tr>
                <td class="fs-5"><?php echo str_replace(chr(13),"<br>",$rowReply['br_detail'])?></td>
              </tr>
              <tr><td class="text-end">โดย <?php echo $rowReply['username']?> เมื่อ <?php echo $rowReply['br_date']?></td></tr>
            </tbody>
          </table>
                <?php } ?>
                <?php if($num_rows>10){?>
                <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
            <li <?php if($page == 1) {echo 'class="page-item disabled"';}
                  else echo 'class="page-item"';?>>
              <a class="page-link" href="blog.php?x=show&b_id=<?php echo $b_id?>&page=<?php echo $page-1; ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <?php for($i=1;$i<=$total_page;$i++){ ?>
            <li <?php if($page == $i) echo 'class="page-item active"' ;?>><a class="page-link" href="blog.php?x=show&b_id=<?php echo $b_id?>&page=<?php echo($i); ?>"><?php echo $i;?></a></li>
              <?php } ?>

            <li <?php if($page >= $total_page) {echo 'class="page-item disabled"';}
                  else echo 'class="page-item"';?>>
              <a class="page-link" href="blog.php?x=show&b_id=<?php echo $b_id?>&page=<?php echo $page+1; ?>" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav><?php }?>

          <table class="table table-light mt-3">
            <thead>
              <tr class="fs-5 table-dark">
                <th scope="col" width="100%" class="text-center"><label for="br_detail">ตอบกระทู้</label></th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td class="fs-5">
                <div class="form-group">
                 <div class="form-floating">
                 <textarea class="form-control" name="br_detail" id="br_detail" style="height: 100px"></textarea>
                </div>
              </div>    
              </td>
              </tr>
              <tr>
              <td>
               <div class="form-group">
              <input type="submit" class="btn btn-success" name="btn-reply" value="ยืนยัน">
              <input type="reset" class="btn btn-danger" name="btn-reset" value="เคลียร์">
              </div>
              </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      </form>
