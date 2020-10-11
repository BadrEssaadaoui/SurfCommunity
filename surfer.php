<?php 

require 'index.php';
require 'conn.php';

if(isset($_GET['showprofile'])){
$id=$_GET['showprofile'];
    $sql="select * from surfers where id='".$id."'";
            $result=$conn->query($sql);
            $row=$result->fetch_array();
            if($result->num_rows==0){
                header('location:community.php');
            }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user profile</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body >
    <div class='container'>
    <?php
        echo "<div class='row mb-2'>
            <div class='col'>
                <img src='profile\\$row[7]' alt='' class='rounded-circle' width='100px' height='100px'>
            </div>
            <div class='col border'>
                <div class='row'>
                    <div class='col h4'>F-name : $row[1] </div>
                </div>
                <div class='row'>
                    <div class='col h4'>L-name : $row[2] </div>
                </div>
            </div>
            <div class='col border'>
                <div class='row'>
                    <div class='col h6'>$row[8]</div>
                </div>";
            if($row[4]!=null){
              echo " <div class='row'>
                        <div class='col h6'>phone:$row[4]</div>
                    </div>";
            }
            if($row[9]==true){
                echo "<div class='row'>
                        <div class='col h6'>
                        <i class='fa fa-star' aria-hidden='true' style='color:#FFD700;'></i> admin <i class='fa fa-star' aria-hidden='true' style='color:#FFD700;'></i>
                        </div>
                     </div>";
            }
               
           echo " </div>
        </div><hr>";
        ?>
        <?php 
            $req="select * from uploads where id=$row[0]";
            $res=$conn->query($req);
            $count=0;
        
        ?>
        <?php
           echo " <div class='row'>";
            while($row=$res->fetch_array()){
                echo "<div class='col-sm-4 mb-2 mt-3'>
                        <img src='upload/$row[1]' alt='www' class='img-thumbnail'>
                    </div>";

                    $count+=1;


                if($count%3==0){
                    echo  "</br>";
                }
            }
       
            echo "</div>";
        //     <div class='col-sm-4'>
        //         <img src='upload/DSC_0507.JPG' alt='' class='img-thumbnail'>
        //     </div>
        //     <div class='col-sm-4'>
        //         <img src='upload/DSC_0257.JPG' alt='' class='img-thumbnail'> 
        //     </div>
        
    ?>
    </div>
</body>
</html>


<!--   -->
<?php
}
// require_once('conn.php');
// $id=$_SESSION['id'];
// echo $id;
// $iid=intval($_GET['iid']);


// $query="select * from likes where iid=$iid and id=$id";
// $result=$conn->query($query);
//         if($result->num_rows==1){
//             $sql="delete from likes where iid=$iid and id=$id";
//             $conn->query($sql);
//         }else if($result->num_rows==0){
//             $sql="insert into likes(iid,id) values($iid,$id)";
//             $conn->query($sql);
//         }
// $row=$result->num_rows;

// echo $row;

// if(isset($_GET['showprofile'])){
// $id=$_GET['showprofile'];
//     $sql="select * from surfers where id='".$id."'";
//             $result=$conn->query($sql);
//             $row=$result->fetch_array();
//             include('index.php');
//   ;
// }else{
//     echo "water please";
// } -->