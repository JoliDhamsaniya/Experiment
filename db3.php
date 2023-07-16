<?php
$conn = mysqli_connect("localhost", "root", "", "wtsem6");
if(isset($_POST['sub'])){
         $location="upload/";
        $pname = $_POST['name'];
        $category = $_POST['category'];
        $pdes = $_POST['des'];
        $Price  = $_POST['price'];
        $file1=$_FILES['image']['name'];
        $file_tmp1=$_FILES['image']['tmp_name'];
        $data=[];
        $data=[$file1];
        $images =implode('',$data);
        $query1  = "INSERT INTO addproduct(name,category,des,Price,image) VALUES('$pname','$category','$pdes','$Price','$images')";
        $data1   =  mysqli_query($conn,$query1);
        //print_r($data1);
        if($data1){
            move_uploaded_file($file_tmp1,$location.$file1);
            header('Location:product.php');
         }
         else
         {
             echo "Error : Try again later";
         }
}
?>