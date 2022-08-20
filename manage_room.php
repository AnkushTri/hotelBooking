<?php
   include_once("header.php");
   //session check
   if($_SESSION["email"])
   {
    //store
    $email = $_SESSION["email"];
   }
   else{
    echo "<script>window.location.assign('login.php?msg=Unauthorised user')</script>";
   }
?>
 <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">MANAGE ROOM</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Manage Room</li>
                    </ol>
                </div>
            </div>
        </section>
        <br>
 <!-- <section class="contact_area section_gap"> -->
<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
             <?php
             if(isset($_REQUEST["msg"])){
                echo " <div class='alert alert-info'>".$_REQUEST["msg"]."</div>";
                }
             ?>
            </div>
        </div> 
     <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 table-responsive">
          <!-- <h1 class="text-center">TABLE</h1> -->
          <table class="table table-warning table-borderless table-hover table-striped">
            <tr class="thead-dark ">
                <th>#</th>
                <th>Hotel</th>
                <th>Room Type</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Description</th>               
                <th>Edit</th>                
                <th>Delete</th>                
            </tr>
            <?php
            $sno=1;
            include("config.php");

            $q="SELECT * from `rooms`";
            $result=mysqli_query($conn,$q);

            while($data=mysqli_fetch_array($result)){
                // print_r($data);
            ?>
           <tr>
                <td><?php echo $sno; ?></td>
                <td><?php echo $data['hotel'];?></td>
                <td><?php echo $data['room_type'];?></td>
                <td><?php echo $data['quantity'];?></td>
                
                <td><img src="gallery/<?php echo $data['image'];?>" alt="" width="120px" height="150px"></td>
                <td><?php echo $data['description'];?></td>
                <td>
                   <a href="update_room.php?id=<?php echo $data['id'];?>"> <i class="fa fa-edit fa-2x text-success"></i></a> 
                </td>
                <td>
                   <a href="delete_room.php?id=<?php echo $data['id'];?>"><i class="fa fa-trash fa-2x text-danger"></i></a> 
                </td>
            </tr>
            <?php
            $sno++;
            }
            ?>
        </table>
        </div>
      </div>  
     </div>    
    </div>
</div>
<br>
<?php require_once("footer.php"); ?>