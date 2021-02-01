<?php
require '../con.php';
require 'header.php';
$sql="select * from user_profiles order by addedon desc";
$result=mysqli_query($con,$sql);
if(isset($_GET['type'])&& $_GET['type']!='')
{
    $type=mysqli_real_escape_string($con,$_GET['type']);
    $id=mysqli_real_escape_string($con,$_GET['id']);
    if($type=='status')
    {   $operation=mysqli_real_escape_string($con,$_GET['operation']);
        $status_query="update user_profiles set status='$operation' where id='$id'";
        mysqli_query($con,$status_query);
    }
    if($type=='delete')
    {
        $delete_query="delete from user_profiles where id='$id'";
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
                           <h4 class="box-title">User Profiles</h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th>ID</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>dob</th>
                                       <th>address</th>
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
                                       <td> <?php echo $row['dob'] ?> </td>
                                       <td> <?php echo $row['address'] ?> </td>
                                       <td> <?php echo $row['addedon'] ?> </td>
                                       <td> <?php 
                                       if($row['status']==1)
                                       {
                                            echo "<a class='btn-success p-1 rounded' href='?type=status&operation=0&id=".$row['id']."'>Activate</a>";
                                       } 
                                       else{
                                       echo "<a class='btn-danger p-1 rounded' href='?type=status&operation=1&id=".$row['id']."'>Blocked</a>";
                                       ?>
                                        </td>
                                       <?php } ?>
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