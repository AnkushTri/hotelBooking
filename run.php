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

<option value="" disabled selected> Select hotel</option>
<?php
include("config.php");
$q = "select * from hotel";
$res = mysqli_query($conn, $q);
while ($data = mysqli_fetch_array($res)) {
    // echo "<option value='$data[id]'>".$data['hotel_name']."</option>";
    echo "<option value='$data[hotel_name]'>" . $data['hotel_name'] . "</option>";
}
?>


<?php include_once("footer.php"); ?>