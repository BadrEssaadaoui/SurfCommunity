<?php 
    session_start();
    
        if(!isset($_SESSION['signedin'])){
            header('location:signin.php');
        }else{
    $_SESSION['settings']="true";
    include('index.php');
    unset($_SESSION['settings']);
    require 'conn.php';
    $id=$_SESSION['id'];
    $sql="select * from surfers where id=$id";
    $result=$conn->query($sql);
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
</head>
<body style="overflow-x:hidden;">
            <div id="container">
    <h1 class="text-center">Update your information</h1>
    <form action="action.php" id='form1' class="was-validated container p-2" enctype="multipart/form-data" method="post" style="position:relative;background-color:#add8e6; border:1px solid black;margin:30px;">
            <div class="form-group">
            <?php if($row=$result->fetch_array()){ ?>
                <label for="name">First name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter First name" name="name" value="<?=$row['firstname']; ?>" required>
                
            <div class="form-group">
                <label for="ln">last name:</label>
                <input type="text" class="form-control" id="ln" placeholder="Enter last name" name="lstname" value="<?=$row['lastname'];?>" required>
                
            </div>
            <div class="form-group">
                <label for="age">age:</label>
                <input type="number" class="form-control" id="age" placeholder="Enter age" name="age" value="<?=$row['age'];?>" required>
            </div>
            <div class="form-group">
                <label for="phone">phone:</label>
                <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone" value="<?=$row[4];?>">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" value="<?=$row['password'];?>" v-model='pass' required>
                    <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="button" id="basic-addon2" onclick="showPassword()">Show</button>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <label for="image">profile image:</label>
                <input type="file" class="custom-file" id="image"  name="image" value="<?=$row[7];?>" >
            </div>
            <div class="form-group" style="margin-bottom:15px;">
                <label for="level">level of Surfing:</label>
                <select name="level" value="<?=$row[8];?>" id="">
                
                  <?php   if($row[8]=="beginner"){
                       
                           echo "<option value='beginner' selected>beginner</option>
                            <option value='intermediate'>intermediate</option>
                            <option value='advanced'>advanced</option>";
                            
                     }else if($row[8]=="intermediate"){
                            echo "<option value='beginner'>beginner</option>
                            <option value='intermediate' selected>intermediate</option>
                            <option value='advanced'>advanced</option>";
                            
                    }else{
                     
                            echo "<option value='beginner'>beginner</option>
                            <option value='intermediate'>intermediate</option>
                            <option value='advanced' selected>advanced</option>";
                    }
                
                
                ?>
                   
                    
               </select>
         
            </div>
            <div style="position:absolute;left:40%; bottom:20px;margin-top:15px;height:20px;width:200px;">
            <button type="submit" class="btn btn-primary" name="update" href="signin.php" v-bind:disabled="(pass.length>=7)?false:true" >update</button>
            </div>
            <?php }} ?>
        </form>
        </div>
</body>
<script>
 vue1=new Vue({
    el:'#form1',
    data:{
        pass:'<?=$row['password'];?>'
    }
});

</script>
<script>

function showPassword(){
        var x = document.getElementById("pwd");
        var y = document.getElementById("basic-addon2");
        if (x.type === "password") {
            x.type = "text";
            y.textContent="Hide";
        } else {
            x.type = "password";
            y.textContent="Show";
        }
    }

</script>
</html>
