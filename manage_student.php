<?php include_once("header.php"); ?>
 <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Manage Student</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Manage Student</li>
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
                <th>StudentName</th>
                <th>Course</th>
                <th>RollNo.</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            $sno=1;
            include("configlearn.php");

            $q="SELECT * from `student`";
            $result=mysqli_query($conn,$q);

            while($data=mysqli_fetch_array($result)){
                // print_r($data['student_name']);
            ?>
            <tr>
                <td><?php echo $sno; ?></td>
                <td><?php echo $data['student_name'];?></td>
                <td><?php echo $data['course']; ?></td>
                <td><?php echo $data['rollno']; ?></td>
                <td><i class="fa fa-edit fa-2x text-success"></i></td>
                <td><i class="fa fa-trash fa-2x text-danger"></i></td>
            </tr>
            <?php
            $sno++;
            }
            ?>
        </table>
             
    </div>
</div>
<br>
<?php
    if(isset($_REQUEST["submit"])){
       $student_name=$_REQUEST["student_name"];
       $course=$_REQUEST["course"];
       $rollno=$_REQUEST["rollno"];

        include("configlearn.php");
        $q="INSERT INTO `student`(`student_name`,`course`,`rollno`) VALUE ('$student_name','$course','$rollno')";
        $result=mysqli_query($conn,$q);
        if($result>0){
            echo "<script>window.location.assign('add_student.php?msg=Record Inserted')</script>";
        }
        else{
            echo"eroor";
            echo "<script>window.location.assign('add_student.php?msg=Try Again')</script>";
        }

    }
?>

<?php require_once("footer.php"); ?>