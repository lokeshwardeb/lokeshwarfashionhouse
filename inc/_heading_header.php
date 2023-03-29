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
    <a class="nav-link" href="#" data-bs-toggle="modal"
                data-bs-target="#trackMyOrderModal" value=" Track my order">    
               Track my order
              </a>
  </li>
  <li class="nav-item">
    <a class="nav-link ">Support</a>
  </li>
  <li class="nav-item float-end">
    <a class="nav-link " href="cus_profile.php">Profile</a>
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

    <div class="modal fade" id="trackMyOrderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Track orders </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <?php 
         $search_class = 'orders';
         ?>
        <form class="d-flex" role="search" action="./cus_disp_search_exe.php" method="get ">
        <input class="form-control me-2" type="search" placeholder="# Please Give the order no" aria-label="Search" name="search_text">
        <input class="form-control me-2 visually-hidden" type="search" placeholder="Search" aria-label="Search" name="search_class" value="<?php echo $search_class ?>">
       
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>


        </div>
        <div class="modal-footer">
      
        </div>
      </div>
    </div>
  </div>

</header>
<?php 
}
else{
    
}
?>