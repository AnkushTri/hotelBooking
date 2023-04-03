<?php include_once("header.php"); ?>
<!--================Breadcrumb Area =================-->
<section class="breadcrumb_area">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
        <div class="page-cover text-center">
            <h2 class="page-cover-tittle"><?php echo $_REQUEST['hotel']; ?> Hotel</h2>
            <ol class="breadcrumb">
                <li><a href="hotel.php">Hotel</a></li>
                <li class="active">Rooms</li>
            </ol>
        </div>
    </div>
    </div>
</section>
<!--================Breadcrumb Area =================-->

<!--================ Accomodation Area  =================-->
<!-- <section class="accomodation_area section_gap"> -->
<br>
<div class="container">
    <div class="row mb_30">
        <?php
        $sno = 1;
        include("config.php");

        $q = "SELECT * from room where hotel='$_REQUEST[hotel]'";
        $result = mysqli_query($conn, $q);

        while ($data = mysqli_fetch_array($result)) {
            // print_r($data);
        ?>
            <div class="col-lg-4 col-sm-6">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img class="img-fluid" style="height:300px" src="gallery/<?php echo $data['images']; ?>" alt="">
                        <a href="book_now.php?hotel=<?php echo $data['hotel']; ?>&room=<?php echo $data['room_type']; ?>" class="btn theme_btn button_hover">Book Now</a>
                    </div>
                    <a href="#">
                        <h4 class="sec_h4"><?php echo $data['room_type']; ?></h4>
                    </a>
                    <h5>Rs.<?php echo $data['price']; ?></h5>
                    <div>
                     <p ><?php echo $data['description']; ?><p>
                    </div>

                </div>

            </div>
        <?php
            $sno++;
        }
        ?>
    </div>
</div>
<!-- </section> --> <br>
<!--================ Accomodation Area  =================-->
<?php include_once("footer.php"); ?>