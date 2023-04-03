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
                    <h2 class="page-cover-tittle">Manage Hotel</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Manage Hotel</li>
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
          <h1 class="text-center">TABLE</h1>
          <table class="table table-warning table-borderless table-hover table-striped">
            <tr class="thead-dark ">
                <th>#</th>
                <th>HotelName</th>
                <th>Description</th>
                <th>Email</th>
                <th>Password</th>
                <th>Image</th>
                <th>Location</th>
                <th>Address</th>
                <th>City</th>                
                <th>Contact</th>                
                <th>Edit</th>                
                <th>Delete</th>                
            </tr>
            <?php
            $sno=1;
            include("config.php");

            $q="SELECT * from `hotel`";
            $result=mysqli_query($conn,$q);

            while($data=mysqli_fetch_array($result)){
                // print_r($data);
            ?>
           <tr>
                <td><?php echo $sno; ?></td>
                <td><?php echo $data['hotel_name'];?></td>
                <td><?php echo $data['description'];?></td>
                <td><?php echo $data['email'];?></td>
                <td><?php echo $data['password'];?></td>
                
                <td><img src="gallery/<?php echo $data['image'];?>" alt="" width="120px" height="150px"></td>
                <td><?php echo $data['location'];?></td>
                <td><?php echo $data['address'];?></td>
                <td><?php echo $data['city'];?></td>
                <td><?php echo $data['contact'];?></td>
                <td>
                   <a href="update_hotel.php?id=<?php echo $data['id'];?>"> <i class="fa fa-edit fa-2x text-success"></i></a> 
                </td>
                <td>
                   <a href="delete_hotel.php?id=<?php echo $data['id'];?>"><i class="fa fa-trash fa-2x text-danger"></i></a> 
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
<?php
    if(isset($_REQUEST["submit"])){
       $hotel_name=$_REQUEST["hotel_name"];
       $description=$_REQUEST["description"];
       $email=$_REQUEST["email"];
       $password=$_REQUEST["password"];
       $filename=$_FILES["image"]["name"];
       $filetmpname=$_FILES["image"]["tmp_name"];
       $newname=rand().$filename;
       move_uploaded_file($filetmpname,"gallery/".$newname);
       $location=$_REQUEST["location"];
       $address=$_REQUEST["address"];
       $city=$_REQUEST["city"];
       $contact=$_REQUEST["contact"];

        include("config.php");
      echo  $q="INSERT INTO `hotel`(`hotel_name`,`description`,`email`,`password`,`image`,`location`,`address`,`city`,`contact`) VALUE ('$hotel_name','$description','$email','$password','$newname','$location','$address','$city','$contact')";
        $result=mysqli_query($conn,$q);
        if($result>0){
            echo "<script>window.location.assign('add_hotel.php?msg=Record Inserted')</script>";
        }
        else{
            echo"eroor";
            echo "<script>window.location.assign('add_hotel.php?msg=Try Again')</script>";
        }

    }
?>
<?php require_once("footer.php"); ?>