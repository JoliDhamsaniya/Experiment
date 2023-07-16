<?php
$conn = mysqli_connect("localhost", "root", "", "wtsem6");
if(isset($_POST['signin'])) 
    {
        $email1  = $_POST['emailid'];
        $passw    = $_POST['pwd'];
        $query2  =  "SELECT * FROM register WHERE emailid = '$email1' and pwd = '$passw'";
        $data2   =  mysqli_query($conn,$query2);
        $row = mysqli_fetch_array($data2,MYSQLI_ASSOC);
        $count = mysqli_num_rows($data2);
        if($count == 1)
        {
            session_start();
            $_SESSION['login_user'] = $email1;
            echo "<script>
            alert('Welcome To TechCartShop');
            window.location='homepage(2).html';
            </script>";
             header('Location:homepage(2).html');
        }
        else
        {
            echo "<script>
            alert('Your Email Id/Password is Incorrect');
            window.location='login.php';
            </script>";
        }
    }
    ?>
