<?php
require '../con.php';
require 'header.php';
$sql="select * from query_master order by added_on desc";
$result=mysqli_query($con,$sql);
if(isset($_GET['type'])&& $_GET['type']!='')
{
    $type=mysqli_real_escape_string($con,$_GET['type']);
    $id=mysqli_real_escape_string($con,$_GET['id']);
    if($type=='status')
    {   $operation=mysqli_real_escape_string($con,$_GET['operation']);
        $status_query="update query_master set status='$operation' where id='$id'";
        mysqli_query($con,$status_query);
    }
    if($type=='delete')
    {
        $delete_query="delete from query_master where id='$id'";
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
                           <h4 class="box-title">User Queries</h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th>ID</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Mobile No</th>
                                       <th>Subject</th>
                                       <th>Comment</th>
                                       <th>added_on</th>
                                       <th>Status</th>
                                       
                                       <th></th>
                                    </tr>
                                 </thead>
                                 <?php while($row=mysqli_fetch_assoc($result))
                                 {?>
                                 <tbody>
                                    <tr>
                                       <td class="id"><?php echo $row['id'] ?></td>
                                       <td> <?php echo $row['name'] ?> </td>
                                       <td> <?php echo $row['email'] ?></td>
                                       <td> <?php echo $row['mobile_no'] ?> </td>
                                       <td> <?php echo $row['subject'] ?> </td>
                                       <td> <?php echo $row['comment'] ?> </td>
                                       <td> <?php echo $row['added_on'] ?> </td>
                                       <td> <?php 
                                       if($row['status']==1)
                                       {
                                            echo "<a class='btn-danger p-1 rounded' href='?type=status&operation=0&id=".$row['id']."'>Activate</a>";
                                       } 
                                       else{?>
                                        <a class="btn-light p-1 rounded" href='#'>Resolve</a>
                                       
                                       
                                       
                                        </td>
                                       <td>
                                       <a class="btn-danger p-1 rounded" href="?type=delete&id=<?php echo $row['id'];?>" >Delete</a>
                                       
                                       
                                    </td>
                                       <?php } ?>
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