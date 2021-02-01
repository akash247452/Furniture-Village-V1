<?php
require '../con.php';
require 'header.php';
$sql="select * from categories order by name";
$result=mysqli_query($con,$sql);
if(isset($_GET['type'])&& $_GET['type']!='')
{
    $type=mysqli_real_escape_string($con,$_GET['type']);
    $id=mysqli_real_escape_string($con,$_GET['id']);
    if($type=='status')
    {   $operation=mysqli_real_escape_string($con,$_GET['operation']);
        $status_query="update categories set status='$operation' where id='$id'";
        mysqli_query($con,$status_query);
    }
    if($type=='delete')
    {
        $delete_query="delete from categories where id='$id'";
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
                           <h4 class="box-title">Categories</h4>
                           <h5 ><a class="btn-info rounded float-right p-2" href="manage_categories.php">Add Categories</a></h5>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th>ID</th>
                                       <th>Name</th>
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
                                       <td> <?php echo $row['name'] ?></td>
                                       <td> <?php 
                                       if($row['status']==1)
                                       {
                                            echo "<a class='btn-primary p-1 rounded' href='?type=status&operation=0&id=".$row['id']."'>Activate</a>";
                                       } 
                                       else{
                                        echo "<a class='btn-danger p-1 rounded' href='?type=status&operation=1&id=".$row['id']."'>Deactivate</a>";
                                       }
                                       ?>
                                       </td>

                                       <td>
                                       <a class="btn-warning p-1 rounded" href="manage_categories.php?id=<?php echo $row['id'] ?>&name=<?php echo $row['name'] ?>" >Edit</a>
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