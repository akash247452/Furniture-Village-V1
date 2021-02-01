<?php
require '../con.php';
require 'header.php';
$sql="select * from products order by name";
$result=mysqli_query($con,$sql);

if(isset($_GET['type']) && $_GET['type']!='')
{
    $type=mysqli_real_escape_string($con,$_GET['type']);
    $id=mysqli_real_escape_string($con,$_GET['id']);
    if($type=='status')
    {   $operation=mysqli_real_escape_string($con,$_GET['operation']);
        $status_query="update products set status='$operation' where id='$id'";
        mysqli_query($con,$status_query);
    }
    if($type=='delete')
    {   $reo=mysqli_query($con,"select * products from where id='$id'");
        $reo2=mysqli_fetch_assoc($reo);
        $reo3=$reo2['img'];
        $delete_query="delete from products where id='$id'";
        unlink("../pictures/products/$reo3");
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
                           <h4 class="box-title">Products</h4>
                           <h5 ><a class="btn-info rounded float-right p-2" href="manage_products.php">Add Products</a></h5>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th>ID</th>
                                       <th>Image</th>
                                       <th>Design</th>
                                       <th>Name</th>
                                       <th>Category</th>
                                       <th>M.R.P</th>
                                       <th>S.P.</th>
                                       <th>Dimensions</th>
                                       <th>Height</th>
                                       <th>Description</th>
                                       <th>Status</th>
                                       <th></th>
                                       <th></th>
                                    </tr>
                                 </thead>
                                 <?php while($row=mysqli_fetch_assoc($result))
                                 {?>
                                 <tbody>
                                    <tr>
                                       <td class="id"><?php echo $row['id']; ?></td>
                                       <td><img src="../pictures/products/<?php echo $row['img']; ?>"></td>
                                       <td> <?php echo $row['design']; ?> </td>
                                       <td> <?php echo $row['name']; ?> </td>
                                       <td> 
                                                <?php 
                                                    $categ_id=$row['category_id'];
                                                    $joint="select name from categories where id='$categ_id'";
                                                    $categ_name=mysqli_query($con,$joint);
                                                    $categ_name1=mysqli_fetch_assoc($categ_name);
                                                    echo $categ_name1['name'];
                                                ?>
                                            
                                        </td>
                                       <td> <?php echo $row['mrp']; ?></td>
                                       <td> <?php echo $row['sp']; ?></td>
                                       <td> <?php echo $row['dimensions']; ?></td>
                                       <td> <?php echo $row['height']; ?> </td>
                                       <td> <?php echo $row['short_desc'] ;?></td>
                                       <td> <?php 
                                       if($row['status']==1)
                                       { ?>
                                            <a class="btn-primary p-1 rounded" href="?type=status&operation=0&id=<?php echo $row['id']; ?>">Activate</a>
                                       <?php } 
                                       else{ ?>
                                             <a class="btn-danger p-1 rounded" href="?type=status&operation=1&id=<?php echo $row['id']; ?>">Deactivate</a>
                                      <?php }
                                       ?>
                                       </td>
                                       <td>
                                       <a class='btn-warning p-1 rounded' href='manage_products.php?id=<?php echo $row['id'] ?>' >Edit</a>
                                        </td>
                                       <td>
                                       <a class='btn-danger p-1 rounded' href='?type=delete&id=<?php echo $row['id'];?>' >Delete</a>
                                        </td>
                                       
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