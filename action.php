
<?php
    include('conn.php');
    session_start();
    //login2 TO insert user
    if(isset($_POST['submit'])){
        $firstname=$_POST['fn'];
        $lastname=$_POST['ln'];
        $mail=$_POST['email'];
        $password=$_POST['pswd'];
        $image='user.png';
       $query="select * from surfers where gmail='".$mail."'";
       $result=$conn->query($query);
       if($result->num_rows==1){
         $_SESSION['error']="user Already exist in database";
        header('location:login2.php');
       
        
       }else if($result->num_rows==0){
            //$upload="profile/".$image;
            $query="insert into surfers(firstname,lastname,gmail,password,pic_profile,level) values(?,?,?,?,?,?)";
            $stmt=$conn->prepare($query);
            $stmt->bind_param("ssssss",$firstname,$lastname,$mail,$password,$image,$level='beginner');
            $stmt->execute();
        // move_uploaded_file($_FILES['image']['tmp_name'],$upload);
            header('location:signin.php');
        }
    }

    if(isset($_POST['sign'])){
        $_SESSION['signedin']="true";
        $mail=$_POST['email2'];
        $password=$_POST['pswd2'];
    
       $rq="select *from surfers where gmail=?";
       $stmt0=$conn->prepare($rq);
       $stmt0->bind_param("s",$mail);
       $stmt0->execute();
       $result = $stmt0->get_result();
       $num0=$result->num_rows;
       if($num0==0){
        $_SESSION['error']="the gmail is not correct !";
        header('location:signin.php');
       }else if($num0==1){
           
            $row=$result->fetch_array();

            if($password==$row[6]){
                
                $_SESSION['firstname']=$row['firstname'];
                $_SESSION['lastname']=$row['lastname'];
                $_SESSION['id']=$row['id'];


                $_SESSION['username']=$row['firstname']."<br>".$row['lastname'];
                    
                    header('location:profile.php');
                }else{
                    $_SESSION['error']="the password is not correct!";
                    header('location:signin.php');
            }
       }


      
    }

    //sign out
    if(isset($_GET['signout'])){
        session_destroy();
        unset($_SESSION['signedin']);
        header('location:signin.php');
    }
    //page settings
    if(isset($_POST['update'])){
        $imgval;
       if($_FILES['image']['name']==""){
           $qu="select * from surfers where id=".$_SESSION['id'];
           $re=$conn->query($qu);
           $ro=$re->fetch_array();
           $imgval=$ro[7];
           $sql="update surfers set firstname='".$_POST['name']."',lastname='".$_POST['lstname']."',age='".$_POST['age']."',phone='".$_POST['phone']."',password='".$_POST['pswd']."',pic_profile='".$imgval."',level='".$_POST['level']."' where id=".$_SESSION['id'];
           $conn->query($sql);
           $_SESSION['username']=$_POST['name']."<br>".$_POST['lstname'];
           header('location:profile.php');
       }else{
        $sql="update surfers set firstname='".$_POST['name']."',lastname='".$_POST['lstname']."',age='".$_POST['age']."',phone='".$_POST['phone']."',password='".$_POST['pswd']."',pic_profile='".$_FILES['image']['name']."',level='".$_POST['level']."' where id=".$_SESSION['id'];
        $conn->query($sql);
        $_SESSION['username']=$_POST['name']."<br>".$_POST['lstname'];
        copy($_FILES['image']['tmp_name'],"profile/".$_FILES['image']['name']);//send image to profile folder
        header('location:profile.php');
       }
        
        
       
    }
   
    //page profile
    //button add picture
       if(isset($_POST['aploadPic'])){
        
           $imageName=$_FILES['file']['name'];
           $imageType=$_FILES['file']['type'];
           $imageTempName=$_FILES['file']['tmp_name'];
           echo $imageType;
           $likes=0;
           if($imageType=="image/png" || $imageType=="image/jpg" || $imageType=="image/jpeg"){
                echo "0";
                $sql="INSERT INTO `uploads`(`image`, `id`) values('".$imageName."','".$_SESSION['id']."')";
                $conn->query($sql);
                echo "1";
                copy($imageTempName,"upload/".$imageName);
                echo "2";
                header('location:profile.php');
           }else{
                $_SESSION['errorupload']="we don't accept $imageType format! please choose image with format png,jpg or jpeg";
                header('location:profile.php');
           }
       }

       //commentaire

    //    if(isset($_POST['postcomment'])){
    //        try{
    //        $comment=$_POST['comment'];
    //        $iid=$_POST['iid'];
    //        $id=$_SESSION['id'];
    //         echo $comment;
    //         echo $iid;
    //         echo $id;
    //         $stmt=$conn->prepare("INSERT INTO `comments`(iid,id,commentaire,datecomment) values(?,?,?,now())");
            
    //         $stmt->bind_param("iis",$iid ,$id,$comment);
            
    //         $stmt->execute();
    //         $stmt->close();
    //         header('location:community.php');
    //         }catch(Exception $e){
    //             echo "error: ".$e;
    //         }
    //  }

     //add like
     //each image may have one like from each user 
    //  if(isset($_POST['like'])){
    //     $iid=$_POST['iid'];
    //     $id=$_SESSION['id'];
    //     echo "badr";
    //     $query="select * from likes where iid=$iid and id=$id";
    //     $result=$conn->query($query);
    //     if($result->num_rows==1){
    //         $sql="delete from likes where iid=$iid and id=$id";
    //         $conn->query($sql);
    //     }else if($result->num_rows==0){
    //         $sql="insert into likes(iid,id) values($iid,$id)";
    //         $conn->query($sql);
    //     }
    //     $_SESSION['iid']=$iid;
    //     header('location:community.php');
    // }else{
    //     echo $_POST['iid'];
    // }
    
   
?>