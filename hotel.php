<?php include_once("header.php"); ?>
<!--================Breadcrumb Area =================-->
<section class="breadcrumb_area">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
        <div class="page-cover text-center">
            <h2 class="page-cover-tittle">Hotel</h2>
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Hotel</li>
            </ol>
        </div>
    </div>
    </div>
</section>
<!--================Breadcrumb Area =================-->

<!--================ Latest Blog Area  =================-->
<!-- <section class="latest_blog_area section_gap"> --> <br>
    <div class="container">
        <div class="row mb_30">
            <?php
            $sno = 1;
            include("config.php");

            $q = "SELECT * from `hotel`";
            $result = mysqli_query($conn, $q);

            while ($data = mysqli_fetch_array($result)) {
                // print_r($data);
            ?>
                <div class="col-lg-4 col-md-6">
                    <div class="single-recent-blog-post">
                        <div class="thumb">
                            <img class="img-fluid" style="height:300px" src="gallery/<?php echo $data['image']; ?>" alt="post">
                        </div>
                        <div class="details">
                            <div class="tags">
                                <a href="rooms.php?hotel=<?php echo $data['hotel_name']; ?>" class="button_hover tag_btn"><?php echo $data['location']; ?></a>
                                <a href="rooms.php?hotel=<?php echo $data['hotel_name']; ?>" class="button_hover tag_btn"><?php echo $data['email']; ?></a>
                            </div>
                            <a href="rooms.php?hotel=<?php echo $data['hotel_name']; ?>">
                                <h4 class="sec_h4"><?php echo $data['hotel_name']; ?></h4>
                            </a>
                            <p><?php echo $data['description']; ?></p>
                            <h6 class="date title_color"><?php echo $data['address']; ?> <?php echo $data['city']; ?> <?php echo $data['contact']; ?></h6>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
<!-- </section> --> <br>
<!--================ Recent Area  =================-->
<?php include_once("footer.php"); ?>