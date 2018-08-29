<?php
           
            include './includes/connect.php';

        session_start();

        if(isset($_SESSION['email']))
        {
            redirect('index.php');
        }

        if(isset($_POST['submit']))
        {
            $email = mysqli_escape_string($db,$_POST['email']);
            $password = mysqli_escape_string($db, $_POST['password']);
    
            $query  = mysqli_query($db, "SELECT * FROM admins WHERE email = '".$email."' AND `password` = md5('".$password."') ");
            
            if (mysqli_num_rows($query))
            {
                while($row = mysqli_fetch_array($query, MYSQLI_BOTH))
                {
                    $email = $row['email'];
                    $_SESSION['email'] = $email;
                    redirect("index.php");
                }  
                
            }
            else 
            {
                $error = "Email sau parola introduse gresit";
            }
        }
        
    
        $title = "Ceva";
?>

<!DOCTYPE html>
<html>
<head>
    <?php 
         include './includes/header.php';
    ?>
</head>
<body>

        <form method="post" action="admin_login.php">
            <div class="form-group col-3 offset-4 text-center">
                        <h1 class="alert alert-danger">
                            <?php 
                                if(isset($error))
                                    echo $error;
                            ?>
                        </h1>
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                       
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        
                        <button name="submit" type="submit" class="btn btn-primary ">Log In</button>
                
            </div>
        </form>
</body>
</html>
