<?php 
if(isset($_SESSION['cus_username'])){


?>


<header>
    <div class="row mt-2 mb-5 container-fluid border-bottom border-dark">
        <div class="col-7">
        <ul class="nav ">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Lattest</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">My offers</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Track my order</a>
  </li>
  <li class="nav-item">
    <a class="nav-link ">Support</a>
  </li>
  <li class="nav-item float-end">
    <a class="nav-link ">Profile</a>
    <!-- <span class="float-end">Log</span> -->
    <!-- loggedin as  -->
  </li>
  <li class="nav-item float-end">
    <a class="nav-link " href="logout.php">Logout</a>
  
  </li>

</ul>
        </div>
        <div class="col-5">
<span class="float-end me-4 mt-2"> <img src="ecom-admin/uploaded_img/cus_photo_upload/<?php echo $_SESSION['cus_photo'] ?>" alt="" srcset=""width="24" height="24" class="rounded-circle "> <?php echo $_SESSION['cus_username'] ?></span>

        </div>
    </div>

</header>
<?php 
}
else{
    
}
?>