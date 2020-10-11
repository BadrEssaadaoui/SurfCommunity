
<?php 
    session_start();
        if(!isset($_SESSION['signedin'])){
        header('location:signin.php');
    }
    include('conn.php');
    $_SESSION['profile']="true";
  
    include('index.php');
    unset($_SESSION['profile']);

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
    <div class="container">
    <?php
        if(isset($_SESSION['errorupload'])){
            echo "<div class='alert alert-danger alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert'>×</button>". $_SESSION['errorupload']."</div>";
           
          
          unset($_SESSION['errorupload']);
        }

    ?>
   
    <div class="row">
        
        <?php     
            $sql1="select * from surfers where id='".$_SESSION['id']."'";
            $result1=$conn->query($sql1);
            $row1=$result1->fetch_array();
            
            echo "<div class='col'><img src='profile\\$row1[7]' class='rounded-circle' alt='Cinque Terre' style='width:100px;height:100px;'></div>"
        ?>
       
        <div class="col"><h3><?=$_SESSION['username'];?></h3></div>
       
        <?="<h4> level: $row1[8]</h4>"; ?>
        <div class="col">
            <a href="action.php?signout" name="signout" class="btn btn-info">sign out</a>
        </div>
    </div><hr>  
        <!--    -->
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form action="action.php" method="post" enctype="multipart/form-data">
                
                    <input type="file"  id="customFileLang" name="file">
                    <input type="submit" value="apload" class="btn btn-info" name="aploadPic">
                    
                  
               
                </form>
            </div>
        </div>
        
<!-- -->
<div class="row">
       <?php
        $sql2="select * from uploads where id='".$_SESSION['id']."'";
        $result2=$conn->query($sql2);
      
            $count=0;
            while($row=$result2->fetch_array()){

              echo  "<div class='col-sm-3 mt-2 mb-2'>
              
                <img src='upload\\$row[1]' name='img' class='img-thumbnail' alt='Cinque Terre'>
             
                
                </div>";
                
                $count+=1;


                if($count%4==0){
                    echo  "</br>";
                }


            }
     
       ?>
</div>        
     
    <hr>
   
    
   
    </div>
 </div>
</body>
</html>