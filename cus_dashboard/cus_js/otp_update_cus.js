window.onload = function() {
    render();
};

function render() {
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
    recaptchaVerifier.render();
}

function phoneAuth() {
    //get the number
    var get_number = document.getElementById('number').value;
    var country_code = '+88';
    var number = country_code + get_number;
    var show_number = document.getElementById('show_number');
    var show_otp = document.getElementById('show_otp');
    // alert(number);
    //it takes two parameter first one is number and second one is recaptcha
    firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {
        //s is in lowercase
        window.confirmationResult = confirmationResult;
        coderesult = confirmationResult;
        console.log(coderesult);
        alert("Message sent");
        show_otp.classList.remove('d-none');
        show_number.classList.add('d-none');
    }).catch(function(error) {
        alert(error.message);
    });
}

function codeverify() {
    var code = document.getElementById('verificationCode').value;
    var phone_no = document.getElementById('number').value;

    coderesult.confirm(code).then(function(result) {
        alert("Mobile number has been verified successfully ");
        var user = result.user;
        console.log(user); 
        document.cookie = "verified_cus_update_phone_no=" + phone_no

        window.location.href="cus_profile.php";

    }).catch(function(error) {
        alert(error.message);
    });
}