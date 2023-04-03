<?php
include_once("header.php");
//session check
if ($_SESSION["email"]) {
    //store
    $email = $_SESSION["email"];
} else {
    echo "<script>window.location.assign('login.php?msg=Unauthorised user')</script>";
}
?>
<section class="breadcrumb_area">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
        <div class="page-cover text-center">
            <h2 class="page-cover-tittle">VIEW USER</M>
            </h2>
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">View User</li>
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
                if (isset($_REQUEST["msg"])) {
                    echo " <div class='alert alert-info'>" . $_REQUEST["msg"] . "</div>";
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
                            <th>Name</th>
                            <!-- <th>Description</th> -->
                            <th>Email</th>
                            <th>Password</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Pin Code</th>
                            <!-- <th>Edit</th>                
                <th>Delete</th>                 -->
                        </tr>
                        <?php
                        $sno = 1;
                        include("config.php");

                        $q = "SELECT * from `user`";
                        $result = mysqli_query($conn, $q);

                        while ($data = mysqli_fetch_array($result)) {
                            // print_r($data);
                        ?>
                            <tr>
                                <td><?php echo $sno; ?></td>
                                <td><?php echo $data['name']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td><?php echo $data['password']; ?></td>
                                <td><?php echo $data['contact']; ?></td>
                                <td><?php echo $data['address']; ?></td>
                                <td><?php echo $data['city']; ?></td>
                                <td><?php echo $data['pincode']; ?></td>

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
if (isset($_REQUEST["submit"])) {
    $user_name = $_REQUEST["user_name"];
    //    $description=$_REQUEST["description"];
    $user_email = $_REQUEST["user_email"];
    $pwd = $_REQUEST["pwd"];
    $contact = $_REQUEST["contact"];
    $address = $_REQUEST["address"];
    $city = $_REQUEST["city"];
    $pincode = $_REQUEST["pincode"];
    include("config.php");
    $q = "INSERT INTO `user`(`user_name`,`user_email`,`password`,`contact`,`address`,`city`,`pincode`) VALUE ('$user_name','$user_email','$pwd','$contact','$address','$city','$pincode')";
    $result = mysqli_query($conn, $q);
    if ($result > 0) {
        echo "<script>window.location.assign('view_user.php')</script>";
    } else {
        // echo"eroor";
        echo "<script>window.location.assign('view_user.php?msg=Try Again')</script>";
    }
}
?>
<?php require_once("footer.php"); ?>