
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata&display=swap" rel="stylesheet">
    <title>Contact Management</title>
</head>
<body>
    <div class="container">
        <h2><u>CONTACT MANAGEMENT</u><h2>
        <form method="POST">
        <?php
$server="localhost";
$username="root";
$password="";
$con=mysqli_connect($server,$username,$password,"contact");
if(!$con){
    die("connection failed".mysqli_connect_error());

}
$editid = $_GET['editid'];
if (isset($_POST['update'])){
    
    $fname = $_POST['fname'];
    $phone = $_POST['phone'];

    // echo $fname;
    // echo $contact;

    $update_query = "UPDATE contact SET fname='$fname',phone='$phone' WHERE id=$editid ";
    if (mysqli_query($con, $update_query)) {
        echo "<script>window.location.href = 'contact.php'</script>";
      } 
      else {
        echo "Error updating record: " . mysqli_error($con);
      }
$con->close();
    
}


            
              $fetch_query = "Select * from contact where id=$editid";

              $res = mysqli_query($con,$fetch_query );
  
              // print_r($res);
  
  
              while($row = mysqli_fetch_array($res)){
                  // print_r(mysqli_num_rows($res));
  
                  // echo "Run";
  
         ?>
              <input type="text" name="fname" value="<?php echo  $row['fname'] ;?>" />
              <input type="tel" name="phone" value="<?php echo  $row['phone'] ;?>" /> <br />
  
              
             <?php 
             }
              ?>
            <!--<input type="text" name="name" id="name" placeholder="name">
            <input type="tel" name="phone" id="phone" placeholder="phone"><br>-->
            <button class="btn" name="update" type="update">Update</button>
        </form>
    </div>
   
    
</body>
</html>