<?php
include_once("header.php");
?>
<?php
$id=$_REQUEST['id'];
include("configlearn.php");
$quer="select * from gallery where id='$id'";
 $res=mysqli_query($conn,$quer);
if($data=mysqli_fetch_array($res)){
    $t=$data['title'];
    $i=$data['image'];
}
?>
 <section class="breadcrumb_area">
         <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">UPDATE GALLERY</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Update gallery</li>
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
                 <input type="hidden" name="oldimage" value="<?php echo $i;?>">
                 <input type="hidden" name="oldtitle" value="<?php echo $t;?>">
                <div class="col-md-4 mx-auto">
                  <div class="form-group">
                      <input type="text" class="form-control"   name="title" placeholder="enter title of image">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" type="file"  name="image" placeholder="Image">
                    </div>
                  </div>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" value="submit" class="btn button_hover" name="submit">Submit</button>
                </div>
             </form>
    </div>
</div>
<br>
<!-- </section> -->
<?php
    if(isset($_REQUEST["submit"])){

        if($_REQUEST['title']){
           $title=$_REQUEST["title"];
        }
       else{
        $title=$_REQUEST['oldtitle'];
       }
        $id=$_REQUEST["id"];
        if($_FILES['image']['name'])
        {
        $filename=$_FILES["image"]["name"];
        $filetmpname=$_FILES["image"]["tmp_name"];
        $newname=rand().$filename;
        move_uploaded_file($filetmpname,"gallery/".$newname);
        }
        else{
            $newname=$_REQUEST['oldimage'];
        }
        include("configlearn.php");
        $q="UPDATE `gallery` set `title`='$title', `image`='$newname' where id='$id'";
        $result=mysqli_query($conn,$q);
        if($result>0){
            echo "<script>window.location.assign('manage_gallery.php?msg=Record Updated')</script>";
        }
        else{
            echo"eroor";
            echo "<script>window.location.assign('manage_gallery.php?msg=Try Again')</script>";
        }

    }
?>
<?php require_once("footer.php"); ?>