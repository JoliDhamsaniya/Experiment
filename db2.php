 <?php
$conn = mysqli_connect("localhost", "root", "", "wtsem6");

 if(isset($_POST['signup'])) 
    {
        $Fname = $_POST['fname'];
        $Lname = $_POST['lname'];
        $emailid = $_POST['emailid'];
        $Pwd   = $_POST['pwd'];
        $Cpwd    = $_POST['cpwd'];
        $query1  =  "INSERT INTO register(Fname,Lname,emailid,Pwd,Cpwd) VALUES('$Fname','$Lname','$emailid', '$Pwd', '$Cpwd')";
        $data1   =  mysqli_query($conn,$query1);
        if($data1)
        {
            header('Location:login.php');
        }
        else
        {
            echo "Error : Try again later";
        }
    }
    ?>

