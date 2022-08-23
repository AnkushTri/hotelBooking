<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <form class="row contact_form" enctype="multipart/form-data" method="post" id="contactForm" >
                <div class="col-md-6" >
                  <div class="form-group ">
                      <select class="contactus form-control" placeholder="hotel" name="hotel" onchange="hit(this.value)"> 
                            <option value="" disabled selected>Select hotel</option>
                            <?php
                                include("config.php");
                                $q = "select * from hotel";
                                $res = mysqli_query($conn,$q);
                                while($data = mysqli_fetch_array($res))
                                {
                                    // echo "<option value='$data[id]'>".$data['hotel_name']."</option>";
                                     echo "<option value='$data[hotel_name]'>".$data['hotel_name']."</option>";
                                }
                            ?>
                           </select> 
                    </div>
                 </div>
 </form>
</body>
</html>