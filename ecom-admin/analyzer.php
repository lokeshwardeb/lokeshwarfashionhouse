<?php 
include "inc/conn.php";
$active_class = 'analyzer';
include "inc/_header.php";
if(!isset($_SESSION['username'])){
  echo '
  <script>
  window.location.href = "login.php";
  </script>
  ';
  header("location: index.php");
  die('<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error !</strong> You should login so that you can access the page .
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>') ;

  // exit;

}
elseif(isset($_SESSION['username'])){
  
  
include "inc/_navbar.php";

?>


<div class="container full-width title_bar mt-4">
<?php

include "inc/_title_bar.php";



?>

<?php 
  
  $search_class = 'analyzer';
  
  include "inc/_search.php"; 
  include("inc/functions.php");

  include("inc/_theme.php");

  
  $active_class = 'analyzer';




  require_once "../get_users_info/UserInformation.php";
//   echo UserInfo::get_ip();
//   echo UserInfo::get_os();
//   echo UserInfo::get_browser();
//   echo UserInfo::get_device();
           
    // echo $_COOKIE['visit_lokfahou'];
    echo '
    
    
    ';

    $sql_unique = "SELECT * FROM `analyzer_unique_users`";
    $result_unique = mysqli_query($conn, $sql_unique);
 $total_unique_users = mysqli_num_rows($result_unique);
            
            // $sql = "SELECT * FROM `orders` ORDER BY `orders`.`id` DESC";
            $sql = "SELECT * FROM `analyzer`";
            $result = mysqli_query($conn, $sql);
         $total_users = mysqli_num_rows($result);
         
         echo '<a href = "unique_analyzer.php"><button class="btn btn-outline-dark m-4 p-2">See unique user details</button> </a>';

echo '<div class="bg-primary text-light m-4 p-2">Total user (by ip address): '.$total_users.'</div>';
echo '<div class="bg-primary text-light m-4 p-2">Total unique user (by cookie): '.$total_unique_users.'</div>';
// echo date("Y-n-j", strtotime("first day of previous month")) . '<br>';
// echo date("Y-n-j", strtotime("last day of previous month")) . '<br>';
// echo date("Y-m-d H:i:s",strtotime("-1 month"));

            if (mysqli_num_rows($result) > 0) {
              echo '<table class="table  custom-default-box-bg-color  ">
              <thead>
                <tr>
                  <th scope="col">SL.No</th>
                  <th scope="col">User Ip Address</th>
                  <th scope="col">User Os</th>
                  <th scope="col">User Browser</th>
                  <th scope="col">User Device</th>
                  <th scope="col">User First Reached datetime(by ip address)</th>
                </tr>
              </thead>
              <tbody>';
              $no = 1;
              while ($row = mysqli_fetch_assoc($result)) {
                echo  '<tr class="hover-table">
                <th scope="row">'.$no++ . '</th>
                <td><b>'.$row['user_ip_address'].'</b></td>
                <td>'. $row['user_os'].'</td>
                <td>'.$row['user_browser'].'</td>
                <td>'.$row['user_device'].'</td>
                <td>'.$row['datetime'].'</td>
             
';


  echo '
        <td><a href="orders_details.php?id='.$row['id'].'"><button type="submit" class="btn btn-dark">Order Details</button></a></td>
              </tr>';
              }
            }
            else{
              echo '<div class = "custom-default-box-bg-color pt-4 mt-4 fs-4" style="height:200px !important;">
              Sorry ! the searching result with "'.$search.'" are not found ..
              
              </div>';
            }
  
  
  
  
  
  ?>


<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Total Users on the analyzer', 'Total Unique Users on Unique analyzer'],
      //  ["kk",  900, 600] ,
      //  ["kk",  900, 600] ,
      //  ["kk",  "500", "600"] ,

       <?php

     

// $sql_analyzer = "SELECT * FROM `analyzer`";

// $result_analyzer = mysqli_query($conn, $sql_analyzer);

// $count_user_analyzer = mysqli_num_rows($result_analyzer);


// $on = 8;
// $os = 45;



// echo "[""]"
// echo '["2008", 4445454,'. $count_user_analyzer .','. $count_user_analyzer .'],';
// echo '["2009", '. $count_user_analyzer .','. $count_user_analyzer .','. $count_user_analyzer .'],';
// echo '["2010", '. $count_user_analyzer .','. $count_user_analyzer .','. $count_user_analyzer .'],';
// echo '["2012", '. $count_user_analyzer .','. $count_user_analyzer .','. $count_user_analyzer .'],';
// echo '["2014", 5],';

// if($result_analyzer){
//   // if(mysqli_num_rows($result_analyzer) > 0){

//   // }






  
// }


function get_count_sql($table_name){
  include "inc/conn.php";

  
$sql_analyzer = "SELECT * FROM `$table_name`";

$result_analyzer = mysqli_query($conn, $sql_analyzer);

$count_user_analyzer = mysqli_num_rows($result_analyzer);

return $count_user_analyzer;


 }
 $sql_analyzer = "SELECT * FROM `analyzer`";

 $result_analyzer = mysqli_query($conn, $sql_analyzer);
 
 $count_user_analyzer = mysqli_num_rows($result_analyzer);


 $sql_analyzer = "SELECT * FROM `analyzer_unique_users`";

 $result_analyzer = mysqli_query($conn, $sql_analyzer);
 
 $count_unique_user_analyzer = mysqli_num_rows($result_analyzer);


 echo " ['Total user',  ".$count_user_analyzer .", ".$count_unique_user_analyzer."] ";




// $count_d = get_count_sql("analyzer");
// $count_d_au_u = get_count_sql("analyzer_unique_users");
// echo "count is" . $count_d;

// echo '["2009", '. 6 .','. 5 .']';





        ?>

         

       
         
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>
</html>



</div>








<?php 
include "inc/_footer.php";

          }

?>