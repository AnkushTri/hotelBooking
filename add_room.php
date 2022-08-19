<!-- <section class="contact_area section_gap"> -->
    <?php include_once("header.php"); ?>
 <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">ADD ROOM</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Add Room</li>
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
             <form class="row contact_form" enctype="multipart/form-data" method="post" id="contactForm" >
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
                                     echo "<option value='$data[id]'>".$data['hotel_name']."</option>";
                                }
                            ?>
                           </select> 
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"  name="room_type" placeholder="Room Type">
                    </div>
                </div>

                 <div class="col-md-6" >
                    <div class="form-group">
                     <textarea class="form-control" name="description" rows="0"  placeholder="Description"></textarea>
                    </div>
                 </div>

               

                <div class="col-md-6">
                    <div class="form-group">
                        <input type="number" class="form-control"  name="quantity" placeholder="Quantity">
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="form-group">
                        <input type="file" class="form-control"  name="image" placeholder="Image">
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" value="submit" class="btn btn_hover" name="submit">Submit</button>
                </div>
             </form>
    </div>
</div>
<br>
<!-- </section> -->
<?php
    if(isset($_REQUEST["submit"])){
       $hotel=$_REQUEST["hotel"];
       $room_type=$_REQUEST["room_type"];
       $quantity=$_REQUEST["quantity"];
       $description=$_REQUEST["description"];
       $filename=$_FILES["image"]["name"];
       $filetmpname=$_FILES["image"]["tmp_name"];
       $newname=rand().$filename;
       move_uploaded_file($filetmpname,"gallery/".$newname);
        include("config.php");
        $q="INSERT INTO `rooms`(`hotel`,`room_type`,`quantity`,`image`,`description`) VALUE ('$hotel','$room_type','$quantity','$newname','$description')";
        $result=mysqli_query($conn,$q);
        if($result>0){
            echo "<script>window.location.assign('add_room.php?msg=Record Inserted')</script>";
        }
        else{
            echo"eroor";
            echo "<script>window.location.assign('add_room.php?msg=Try Again')</script>";
        }

    }
?>
<?php require_once("footer.php"); ?>