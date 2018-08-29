<?php
            include './includes/header.php';

        session_start();

        if(isset($_POST['submit']))
        {
            $username = mysqli_escape_string($db, $_POST['username']);
            $email = mysqli_escape_string($db,$_POST['email']);
            $password = mysqli_escape_string($db, $_POST['password']);
           
            $query  = mysqli_query($db, "SELECT id FROM admins WHERE email = '".$email."' AND username = '".$username."' AND password = '".$password."' ");
        
            
            if (mysqli_num_rows($query))
            {
                while($row = mysqli_fetch_array($query, MYSQLI_BOTH))
                {
                    $_SESSION['username'] = $username;
                    redirect("index.php");
                }  
                
            }
        }
        
    

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login Page</title>
</head>
<body>

        <form method="post" action="admin_login.php">
            <div class="form-group col-3 offset-4 text-center">
      
                        <label for="exampleInputUsername">Username</label>
                        <input name="username" type="email" class="form-control" id="exampleInputUsername" aria-describedby="emailHelp" placeholder="Enter email">                 
                         
    
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                       
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        
                        <button name="submit" type="submit" class="btn btn-primary ">Log In</button>
                
            </div>
        </form>
</body>
</html>
