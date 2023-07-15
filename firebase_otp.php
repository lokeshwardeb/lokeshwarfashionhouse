<!DOCTYPE html>
<html>

<head>
    <title>Verify your mobile no || LOkeshwar fashion house</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- <link href="main.css" rel="stylesheet">

-->

    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>
    <div class="container">
    <h1 class="text-center mt-2 mb-4">Verify your mobile phone</h1>

    <form action="verification.php" class="" id="show_number">


        <!-- <h1>varified phone no is <?php

                                    // setcookie('verified_phone_no', '', time() - 3600);

                                    if (isset($_COOKIE['verified_phone_no'])) {
                                        echo $_COOKIE['verified_phone_no'];
                                    }



                                    ?> </h1> -->

        
        <div class="">
            <hr />
            <div class="container ">
                <label for="uname">Phone Number</label>
                <div class="d-flex">
                <div class="mt-3 me-2 fw-bold">+88</div>
                <input type="text" class="form-control mt-2" id="number" placeholder="Enter phone number" name="uname" required>
                </div>
                
            </div>
            <div id="recaptcha-container" class="container mt-4"></div>
            <button type="button" onclick="phoneAuth();" class="btn btn-primary mt-4">Send Otp</button>
        </div>
    </form>

    </div>
    

    <form class="mt-4 d-none" id="show_otp">
        <!-- <h1>Firebase Phone verification In PHP</h1> -->
        <div class="">
            <hr />
            <div class="container">
                <label for="verificationCode">Your otp</label>
                <input type="text" class="form-control mt-2" id="verificationCode" placeholder="Enter verification code">
                <button type="button" class="btn btn-primary mt-4" onclick="codeverify();">Verify code</button>

            </div>


    </form>


    <script src="https://www.gstatic.com/firebasejs/8.3.1/firebase.js"></script>


    <!-- <script >
  
  const firebaseConfig = {
    apiKey: "AIzaSyCkpVmN2OiYBcLFTdEkFkSK8YjZ2OhddbI",
    authDomain: "otp-authentication-b54ba.firebaseapp.com",
    projectId: "otp-authentication-b54ba",
    storageBucket: "otp-authentication-b54ba.appspot.com",
    messagingSenderId: "512017428834",
    appId: "1:512017428834:web:e4efdf72ff5d8c8c7abc3b",
    measurementId: "G-959BD0G7CN"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script> -->


    <script>
        // Your web app's Firebase configuration
        // const firebaseConfig = {
        //     apiKey: "AIzaSyCkpVmN2OiYBcLFTdEkFkSK8YjZ2OhddbI",
        //     authDomain: "otp-authentication-b54ba.firebaseapp.com",
        //     projectId: "otp-authentication-b54ba",
        //     storageBucket: "otp-authentication-b54ba.appspot.com",
        //     messagingSenderId: "512017428834",
        //     appId: "1:512017428834:web:e4efdf72ff5d8c8c7abc3b",
        //     measurementId: "G-959BD0G7CN"
        // };

        const firebaseConfig = {
    apiKey: "AIzaSyDElR5BY9g8hlecbIfN7IXcmUWXIbP5AWA",
    authDomain: "lokeshwar-fashion-house-3b15a.firebaseapp.com",
    projectId: "lokeshwar-fashion-house-3b15a",
    storageBucket: "lokeshwar-fashion-house-3b15a.appspot.com",
    messagingSenderId: "473579448547",
    appId: "1:473579448547:web:00e36356e768c3e013fdd6",
    measurementId: "G-CMCFS4HZ48"
  };


        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();
    </script>
    <!-- <script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
    appId: "1:99446038979:web:6876f093329352b3c71d76",
    apiKey: "AIzaSyDqoyvnqM44fvu4Gvlfc_Dj1Di2VztJxK4",
    authDomain: "phone-auth-76a5e.firebaseapp.com",
    projectId: "phone-auth-76a5e",
    storageBucket: "phone-auth-76a5e.appspot.com",
    messagingSenderId: "99446038979",
    measurementId: "G-CCJ2B0YHR3"
    };

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
     firebase.analytics();
</script> -->
    <script src="js/firebase.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>