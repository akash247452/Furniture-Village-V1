<?php
require '../con.php';
require 'header.php';
$sql="select * from review order by preference";
$result=mysqli_query($con,$sql);
if(isset($_GET['type'])&& $_GET['type']!='')
{
    $type=mysqli_real_escape_string($con,$_GET['type']);
    $id=mysqli_real_escape_string($con,$_GET['id']);
    if($type=='status')
    {   $operation=mysqli_real_escape_string($con,$_GET['operation']);
        $status_query="update review set preference='$operation' where id='$id'";
        mysqli_query($con,$status_query);
    }
    if($type=='delete')
    {
        $delete_query="delete from review where id='$id'";
        mysqli_query($con,$delete_query);
    }
}
?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Reviews</h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th>ID</th>
                                       <th>User Name</th>
                                       <th>Review</th>
                                       <th>Comment</th>
                                       <th>Star</th>
                                       <th>Status</th>
                                       <th></th>
                                       <th></th>
                                    </tr>
                                 </thead>
                                 <?php while($row=mysqli_fetch_assoc($result))
                                 {?>
                                 <tbody>
                                    <tr>
                                       <td class="id"><?php echo $row['id'] ?></td>
                                       <td> <?php echo $row['user_name'] ?></td>
                                       <td class="id"><?php echo $row['review'] ?></td>
                                       <td class="id"><?php echo $row['comment'] ?></td>
                                       <td class="id"><?php echo $row['star'] ?></td>
                                       <td> <?php 
                                       if($row['preference']==1)
                                       {
                                            echo "<a class='btn-primary p-1 rounded' href='?type=status&operation=0&id=".$row['id']."'>Activate</a>";
                                       } 
                                       else{
                                        echo "<a class='btn-danger p-1 rounded' href='?type=status&operation=1&id=".$row['id']."'>Deactivate</a>";
                                       }
                                       ?>
                                       </td>
                                       <td>
                                       <a class="btn-danger p-1 rounded" href="?type=delete&id=<?php echo $row['id'];?>" >Delete</a>
                                    </td>
                                    </tr>
                                    
                                 </tbody>
                                 <?php }?>
                              </table>
                           </div>
                        </div>
                        
                     </div>
                     
                  </div>
               </div>
            </div>
		  </div>
         <?php
         require 'footer.php';
         ?>