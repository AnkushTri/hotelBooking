<?php
include_once("header.php");
//session check
if ($_SESSION["user_email"]) {
    //store
    $user_email = $_SESSION["user_email"];
} else {
    echo "<script>window.location.assign('user_login.php?msg=Unauthorised user')</script>";
}
?>
<section class="breadcrumb_area">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
        <div class="page-cover text-center">
            <h2 class="page-cover-tittle">VIEW Booking</M>
            </h2>
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">View Booking</li>
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
                            <th>User</th>
                            <th>Hotel</th>
                            <th>Room</th>
                            <th>Booking Date</th>
                            <th>Status</th>
                        </tr>
                        <?php
                        $sno = 1;
                        include("config.php");

                        $q = "SELECT * from `booking` where user='$_SESSION[user_email]'";
                        $result = mysqli_query($conn, $q);

                        while ($data = mysqli_fetch_array($result)) {
                            // print_r($data);
                        ?>
                            <tr>
                                <td><?php echo $sno; ?></td>
                                <td><?php echo $data['user']; ?></td>
                                <td><?php echo $data['hotel']; ?></td>
                                <td><?php echo $data['room']; ?></td>
                                <td><?php echo $data['from_booking_date'] . " - " . $data['to_booking_date']; ?></td>
                                <td><?php echo $data['booking_status']; ?></td>
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
<?php require_once("footer.php"); ?>