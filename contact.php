<?php
if(isset($_POST['phone'])){
$server="localhost";
$username="root";
$password="";
$con=mysqli_connect($server,$username,$password,"contact");
if(!$con){
    die("connection failed".mysqli_connect_error());

}
//echo "success";

$fname=$_POST['fname'];
$phone=$_POST['phone'];
$sql="INSERT INTO `contact`.`contact` (`fname`, `phone`) VALUES ('$fname', '$phone');";
if($con->query($sql) == true){
    //echo "success";
    //$insert=true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}

$con->close();
}
?>


<?php
$server="localhost";
$username="root";
$password="";
$con=mysqli_connect($server,$username,$password,"contact");



if(isset($_GET['del'])){

    $phone = $_GET['del'];

    //echo $phone;

    $delete_sql = "Delete from contact where phone = $phone";

    $del = mysqli_query($con, $delete_sql);

    if($del){
        echo "Data Deleted.";

        echo "<script>window.location.href = 'contact.php'</script>";
    }
}
$con->close();
?>













<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata&display=swap" rel="stylesheet">
    <title>CONTACT mANAGEMENT</title>
   
</head>
<body>
    <div class="container">
        <h2><u>CONTACT MANAGEMENT</u><h2>
        <form action="contact.php" method="POST">
            <input type="text" name="fname" id="fname" placeholder="name">
            <input type="tel" name="phone" id="phone" placeholder="phone"><br>
            <button class="btn">Save</button>
        </form>
    </div>

    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                  <?php
                  $server="localhost";
                  $username="root";
                  $password="";
                  $con=mysqli_connect($server,$username,$password,"contact");
                   // $fetch = ; //select all rows
                    $result = mysqli_query($con,"SELECT * FROM contact"); //make check a connection and query

                    $row = mysqli_num_rows($result); // check number of rows
                    if($row>0){
                        while($row = mysqli_fetch_array($result)){ //fetch all rows 
                            ?>
                    <tr>
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><button><a href="edit.php?editid=<?php echo  ($row['id']);?>"> Edit</a> </button></td>   
                        <td> <a href="contact.php?del=<?php echo ($row['phone']);?>" class="delete" title="Delete" data-toggle="tooltip" >Delete</i></a></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>