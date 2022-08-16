<?php include_once("header.php"); ?>
 <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">MANAGE GALLERY</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Manage gallery</li>
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
           <table class="tabel table-hover table-striped container">
            <tr class="thead-dark">
                <th>#</th>
                <th>Title</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            $sno=1;
            include("configlearn.php");

            $q="SELECT * from `gallery`";
            $result=mysqli_query($conn,$q);

            while($data=mysqli_fetch_array($result)){
                // print_r($data['image']);
            ?>
            <tr>
                <td><?php echo $sno; ?></td>
                <td><?php echo $data['title'];?></td>
                <td><img src="gallery/<?php echo $data['image'];?>" alt="" width="120px" height="150px"></td>
                <td>
                   <a href="update_gallery.php?id=<?php echo $data['id'];?>"> <i class="fa fa-edit fa-2x text-success"></i></a> 
                </td>
                <td>
                   <a href="delete_gallery.php?id=<?php echo $data['id'];?>"><i class="fa fa-trash fa-2x text-danger"></i></a> 
                </td>
            </tr>
            <?php
            $sno++;
            }
            ?>
        </table>         
    </div>
</div>

<br>
<!-- </section> -->
<?php
    if(isset($_REQUEST["submit"])){
        $title=$_REQUEST["title"];
        $filename=$_FILES["image"]["name"];
        $filetmpname=$_FILES["image"]["tmp_name"];
        $newname=rand().$filename;
          move_uploaded_file($filetmpname,"gallery/".$newname);
        include("configlearn.php");
        $q="INSERT INTO `gallery`(`title`,`image`) VALUE ('$title','$newname')";
        $result=mysqli_query($conn,$q);
        if($result>0){
            echo "<script>window.location.assign('add_gallery.php?msg=Record Inserted')</script>";
        }
        else{
            echo"eroor";
            echo "<script>window.location.assign('add_gallery.php?msg=Try Again')</script>";
        }

    }
?>
<?php require_once("footer.php"); ?>