<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
       <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.0"></script>
</head>

<body style="overflow-x: hidden;">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand/logo -->
    <a class="navbar-brand col-sm-8" href="index.php">
        <h4 style="font-family:Comic Sans MS,Cursive">Surf community </h4>
    </a>
    </nav>
   
    <div class="container align-middle">
    <?php
        session_start();
        if(isset($_SESSION['error'])){
           // echo $_SESSION['error'];
           echo     "<div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                       <center> <strong>".$_SESSION['error']."</strong></center>
                    </div>";
           
          
            unset($_SESSION['error']);
        }
       
    ?>
        
    </div>
    <div class="row h-100">
        <form action="action.php" id='form' class="was-validated container" enctype="multipart/form-data" method="post" style="margin:5px auto;border:1px solid black;background-color:#add8e6;padding:20px 20px 40px 20px;width:50%;position:relative;"> 
        
        <h2 class="h1" style="text-align:center;">Create account</h2> 
                <div id="inTest">
                <div class="alert alert-primary" role="alert">
                        If you want to enable the create button,please check if:
                        <ul>
                            <li>the gmail length bigger than 12 and include @gmail.com</li>
                            <li>the password length bigger than 7</li>
                            
                        </ul>
                </div>  
                </div>
                <div class="form-group">
                <div><label for="name" >First name:</label></div>
                <input type="text" class="form-control" id="name" placeholder="Enter First name"  name="fn" required>
               
            </div>
            <div class="form-group">
                <div><label for="ln">last name:</label></div>
                <input type="text" class="form-control" id="ln" placeholder="Enter last name"   name="ln" required>
               
            </div>
            <div class="form-group">
                <label for="email">email:</label>
                <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" required v-model="gmail" @change="funcgmail">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required v-model="newPassword">
                    <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="button" id="basic-addon2" onclick="showPassword()">Show</button>
                    </div>
                </div>
                
            </div>
            <button type="submit" class="btn btn-primary" name="submit" href="" style="position:absolute;left:10px;bottom:10px;"    v-bind:disabled="(gmail.includes('@gmail.com') && gmail.length>=12 && newPassword.length>=7) ?  false : true ">Create</button>
            <a href="signin.php" style="position:absolute;right:10px">I have already an account</a>
        </form>
    </div>
</body>
<script>

var vue=new Vue({
    el:'#form',
    data:{
        gmail:'',
        disable:true,
        newPassword:'',
    },
    methods:{
        
        funcgmail:()=>{
            if((vue.gmail.length<12)){
                alert("<12 ");
            }
            if(!(vue.gmail.includes('@gmail.com'))){
                    alert("there is no \"@gmail.com\"")
            }
        }
    }
})

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
