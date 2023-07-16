<?php
$conn = mysqli_connect("localhost", "root", "", "wtsem6");
if(mysqli_connect_errno()){
  echo "failed to connect :" ;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>prodcut management (admin side)</title>
 <link rel="stylesheet" href="prodcut management.css">
<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<!-- <script nonce="a8c7a81f-b800-438a-9484-14fe6833a7a9">(function(w,d){!function(bv,bw,bx,by){bv[bx]=bv[bx]||{};bv[bx].executed=[];bv.zaraz={deferred:[],listeners:[]};bv.zaraz.q=[];bv.zaraz._f=function(bz){return function(){var bA=Array.prototype.slice.call(arguments);bv.zaraz.q.push({m:bz,a:bA})}};for(const bB of["track","set","debug"])bv.zaraz[bB]=bv.zaraz._f(bB);bv.zaraz.init=()=>{var bC=bw.getElementsByTagName(by)[0],bD=bw.createElement(by),bE=bw.getElementsByTagName("title")[0];bE&&(bv[bx].t=bw.getElementsByTagName("title")[0].text);bv[bx].x=Math.random();bv[bx].w=bv.screen.width;bv[bx].h=bv.screen.height;bv[bx].j=bv.innerHeight;bv[bx].e=bv.innerWidth;bv[bx].l=bv.location.href;bv[bx].r=bw.referrer;bv[bx].k=bv.screen.colorDepth;bv[bx].n=bw.characterSet;bv[bx].o=(new Date).getTimezoneOffset();if(bv.dataLayer)for(const bI of Object.entries(Object.entries(dataLayer).reduce(((bJ,bK)=>({...bJ[1],...bK[1]})))))zaraz.set(bI[0],bI[1],{scope:"page"});bv[bx].q=[];for(;bv.zaraz.q.length;){const bL=bv.zaraz.q.shift();bv[bx].q.push(bL)}bD.defer=!0;for(const bM of[localStorage,sessionStorage])Object.keys(bM||{}).filter((bO=>bO.startsWith("_zaraz_"))).forEach((bN=>{try{bv[bx]["z_"+bN.slice(7)]=JSON.parse(bM.getItem(bN))}catch{bv[bx]["z_"+bN.slice(7)]=bM.getItem(bN)}}));bD.referrerPolicy="origin";bD.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(bv[bx])));bC.parentNode.insertBefore(bD,bC)};["complete","interactive"].includes(bw.readyState)?zaraz.init():bv.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script></head> -->
</head>
<body>
  <div class="header" id="mobile-nav" style="padding-left:35px;width: 100%;" >			
    <a href="Homepage.html"><img class="img" src="images/logo1.png" align=left width=30 height=30></a>
    <h1 style="width: 92%;color:white">Laptopzone<h1>
    <input type="text" placeholder="Search.." name="search" style="width:200px;font-size: 20px;margin-left: 50px;">
     <i class="fa fa-search" style="font-size: 23px;height: 25px;background-color:white"></i></button>
    <i class="fa fa-shopping-cart" style="font-size: 24px;margin-inline:20px;color:white"></i>
    <i class="fa fa-user" style="font-size:20px;color:white"></i>
    </div>
 
        <nav>
            <ul>
              <li>
              <a href="#">Product</a>
              <span></span><span></span><span></span><span></span><span></span><span></span>
              </li></ul></a>
        </nav>
        
        <div class="dropdown">
        <button class="dropbtn">Select Category</button>
        <div class="dropdown-content">
        <a href="#">Profesional laptop</a>
         <a href="#">Gaming laptop</a>
         <a href="#">student laptop</a>
        </div>
        </div><br><br><br>

        <table style="width: 100%">
        <th>Image</th>
        <th>Name</th>
        <th>category</th>
        <th >Description</th>
        <th>price</th>
        <th>Action</th>

        <tbody id="tablebody"> 
        <?php
        $sql = "SELECT * FROM addproduct";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
        <td class="img1"><img src="upload/<?php
        echo $row['image'];  ?>
        " style="width: 400px;"></td>
        <td > <?php
        echo $row['name'];  ?></td>
        <td> <?php
        echo $row['category'];?></td>
        <td> 
        <?php
        echo $row['des'];?>
        </td>
        <td> <?php
        echo $row['price'];  ?></td>
        <td>
          <a href="edit.php?id=<?php echo $row["id"]?>">Edit</a><br />
          <a href="delete.php?id=<?php echo $row["id"]?>&delete=1">Delete</a>
          </td>
       
        </tr>
     <?php }
    }
    ?>
            </tbody>
          </table> 
</body>
</html>