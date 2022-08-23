<?php 
  include_once("header.php");
?>
 <?php
    //session check
    if($_SESSION["email"]){
     //store
     $email = $_SESSION["email"];
    }
    else{
     echo "<script>window.location.assign('login.php?msg=Unauthorised user')</script>";
    }
?>


 <section class="breadcrumb_area">  
 

            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Welcome Admin</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">admin page</li>
                    </ol>
                </div>
             
                </nav>
            </div>
        </section>
  <section class="contact_area section_gap">
     <!-- <div> -->
 <section>  

    <!-- </div>  -->
     <!-- <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hotel</a>
                                <ul class="dropdown-menu">
                            <li class="nav-item"><a class="nav-link" href="add_hotel.php">Add Hotel</a></li>
                            <li class="nav-item"><a class="nav-link" href="manage_hotel.php">Manage Hotel</a></li>
                              </ul>
                            </li> 
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Room</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="add_room.php">Add Room</a></li>
                                    <li class="nav-item"><a class="nav-link" href="manage_room.php">Manage Room</a></li>
                                </ul>
                            </li> 
                             <li class="nav-item"><a class="nav-link" href="view_enquiry.php">View Enquiry</a></li> -->
</section> 
<?php
    require_once("footer.php");
?>