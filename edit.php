
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>add product page</title>
  <link href="add product.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="header" id="mobile-nav" style="padding-left:35px;width: 100%;" >			
    <a href="Homepage.html"><img class="img" src="images/logo1.png" align="left" width="30" height="30"></a>
    <h1 style="width: 92%;color:white;" >Laptopzone<h1>
    </div><br>
    <center>
    <div class="container">
        <form action="db3.php" onsubmit="return validate(this);" method="POST" enctype="multipart/form-data">
        <table width="100%" cellpadding="10">
 
           <tr>
         <td><label for="fname">Enter Name</label><br></td>
<?php 

$conn = mysqli_connect("localhost", "root", "", "wtsem6");
 $id = $_GET['id'];
 $query = "select * from addproduct where id=".$id;
 $data1   =  mysqli_query($conn,$query);
 while ($row = mysqli_fetch_array($data1, MYSQLI_ASSOC)) {

?>
          <td><input type="text" id="fname" name="name" placeholder="Your name.. " pattern="[A-Za-Z]{3}" value="<?php echo $row['name'];?>" required><br></td></tr>
      
          <tr>
          <td><label  name="category">Enter category</label><br></td>
            <td>
            <select  name="category" id="laptop" >
              <option value="professinal laptop" <?php if($row['category'] === 'professinal laptop') echo "selected =selected";?>>Professoinal laptop</option>
              <option value="gaming laptop" <?php if($row['category'] === 'gaming laptop') echo "selected =selected";?>>gaming laptop</option>   
            </select></td></tr>
           <tr>
            <td><label for="desc" name="pdes">Enter Description</label></td>
            <td><textarea id="subject" name="des" placeholder="Write Your Query...." style="height:100px" required><?php echo $row['des'];?></textarea></td></tr>
          <tr>
            <td><label for="price" name="price">Enter Price</label></td>
            <td><input type="number" id="number" name="price" value="<?php echo $row['price'];?>"></td></tr>
          <tr>
            <td><label for="file" name="image">Upload product image</label></td>
            <td><input type="file" id="file" name="image"></td>
          </tr>
            <tr>
           <td>
         <center><input name="sub" type="submit" value="Submit"></center></td> 
        </form>
        <?php
    }
    ?>
    </center>
        </table>
      </div>
</body>
</html>