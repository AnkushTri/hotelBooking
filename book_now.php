<?php include_once("header.php");
if (!isset($_SESSION['user_email'])) {
    echo "<script>window.location.assign('user_login.php?msg=Unauthorised Access')</script>";
}
?>
<!--================Breadcrumb Area =================-->
<section class="breadcrumb_area">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
        <div class="page-cover text-center">
            <h2 class="page-cover-tittle"><?php echo $_REQUEST['hotel']; ?> Hotel</h2>
            <ol class="breadcrumb">
                <li><a href="rooms.php">Room</a></li>
                <li class="active">Booking</li>
            </ol>
        </div>
    </div>
    </div>
</section>
<!--================Breadcrumb Area =================-->

<!--================ Accomodation Area  =================-->
<section class="accomodation_area section_gap">
    <div class="container">
        <div class="row mb_30">
            <div class="col-lg-6 col-sm-6 mx-auto">
                <form action="#" method="post">
                    <input type="hidden" name="user" value="<?php echo $_SESSION['user_email']; ?>">
                    <input type="hidden" name="hotel" value="<?php echo $_REQUEST['hotel']; ?>">
                    <input type="hidden" name="room" value="<?php echo $_REQUEST['room']; ?>">
                    <div class="form-group">
                        <label for="">Booking From <small>(Start Date)</small></label>
                        <input type="date" name="from_booking_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Booking To <small>(End Date)</small></label>
                        <input type="date" name="to_booking_date" class="form-control">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Book Now</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!--================ Accomodation Area  =================-->
<?php
if (isset($_REQUEST["submit"])) {
    $hotel = $_REQUEST["hotel"];
    $user = $_REQUEST["user"];
    $room = $_REQUEST["room"];
    $from_booking_date = $_REQUEST["from_booking_date"];
    $to_booking_date = $_REQUEST["to_booking_date"];

    include("config.php");
    $q = "INSERT INTO `booking`(`user`, `hotel`, `room`, `from_booking_date`, `to_booking_date`) VALUES ('$user','$hotel','$room','$from_booking_date','$to_booking_date')";
    $result = mysqli_query($conn, $q);
    if ($result > 0) {
        echo "<script>window.location.assign('booking.php?msg=Booking Reserved')</script>";
    } else {
        // echo"eroor";
        echo mysqli_error($conn);
        die();

        echo "<script>window.location.assign('booking.php?msg=Try Again')</script>";
    }
}
?>
<?php include_once("footer.php"); ?>