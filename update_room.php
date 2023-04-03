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
<?php
$id=$_REQUEST['id'];
include("config.php");
$quer="select * from `room` where id='$id'";
 $res=mysqli_query($conn,$quer);
if($data=mysqli_fetch_array($res)){
   $hotel= $data['hotel'];
   $room_type= $data['room_type'];
   $quantity= $data['quantity'];
   $price= $data['price'];
   $image=$data['images'];
  $description= $data['description'];
}
?>
 <section class="breadcrumb_area">
         <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">UPDATE ROOm</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Update Room</li>
                    </ol>
                </div>
         </div>
</section>
<br>
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
             <form class="row contact_form" id="contactForm" enctype="multipart/form-data" method="post"  >
                <input type="hidden" name="id" value="<?php echo $id;?>">
                 <input type="hidden" name="oldimage" value="<?php echo $image;?>">
               <!-- </div>  -->
             <!-- <form class="row contact_form" enctype="multipart/form-data" method="post" id="contactForm" > -->
                <div class="col-md-6" >
                  <div class="form-group ">
                      <select class="contactus form-control" placeholder="hotel" name="hotel" onchange="hit(this.value)"> 
                            <option value="" disabled selected> Select hotel</option>
                            <?php
                                include("config.php");
                                $q = "select * from hotel";
                                $res = mysqli_query($conn,$q);
                                while($data = mysqli_fetch_array($res))
                                {
                                    // echo "<option value='$data[id]'>".$data['hotel_name']."</option>";
                                    if($hotel == $data['hotel_name'])
                                    {
                                        echo "<option value='$data[hotel_name]' selected>".$data['hotel_name']."</option>";
                                    }
                                    else{
                                        echo "<option value='$data[hotel_name]'>".$data['hotel_name']."</option>";
                                    }
                                }
                            ?>
                           </select> 
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"  name="room_type" placeholder="Room Type" value="<?php echo $room_type; ?>">
                    </div>
                </div>

                 <div class="col-md-6" >
                    <div class="form-group">
                     <textarea class="form-control" name="description" rows="0"  placeholder="Description"><?php echo $description ?></textarea>
                    </div>
                 </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input type="number" class="form-control"  name="quantity" placeholder="Quantity" value="<?php echo $quantity; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="number" class="form-control"  name="price" placeholder="price" value="<?php echo $price; ?>">
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="form-group">
                        <input type="file" class="form-control"  name="images" placeholder="Image" value="<?php echo $image; ?>">
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" value="submit" class="btn btn_hover" name="submit">Submit</button>
                </div>
             </form>   
             <!-- </div> -->
    </div>
</div>
<br>
<!-- </section> -->
<?php
    if(isset($_REQUEST["submit"])){
        $hotel=$_REQUEST["hotel"];
        $room_type=$_REQUEST["room_type"];
        $quantity=$_REQUEST["quantity"];
        $price=$_REQUEST["price"];
        $id=$_REQUEST["id"];
        $description=$_REQUEST["description"];
        if($_FILES['images']['name'])
        {
            $filename=$_FILES["images"]["name"];
            $filetmpname=$_FILES["images"]["tmp_name"];
            $newname=rand().$filename;
            move_uploaded_file($filetmpname,"gallery/".$newname);
        }
        else{
            $newname=$_REQUEST['oldimage'];
        }
        
        include("config.php");
        $q = "UPDATE `room` set `hotel`='$hotel', `room_type`='$room_type', `quantity`='$quantity',`description`='$description',`images`='$newname' WHERE id='$id'";
        $result=mysqli_query($conn,$q);
        if($result>0){
            echo "<script>window.location.assign('manage_room.php?msg=Record Inserted')</script>";
        }
        else{
            echo "eroor";
            echo "<script>window.location.assign('manage_room.php?msg=Try Again')</script>";
        }

    }
?>
<?php
    require_once("footer.php");

?>