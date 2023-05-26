<?php
include "inc/conn.php";
$active_class = "help";
include "inc/_header.php";
include "inc/_navbar.php";


?>

<style>
    .ques {
        cursor: pointer;
        transition: all 800ms;

    }

    .ques:hover {
        background-color: #ececec;
        /* transform: ease 5000ms; */
        transition: all 800ms;
    }

    .ans {
        transition: ease-in 1000ms !important;

    }
</style>

<div class="container ques page mt-4 p-3 border-5 border-start border-primary">
    Need help ? reach out with our <a href="mailto:<?php echo $website_contract_email ?>">customer support</a>
</div>


<div class="container ques page mt-4 p-3 border-5 border-start border-primary" id="ord_prod_ques" onclick="show_ans('ord_prod_ques', 'ord_prod_ans')">
    How can I order an product ?



</div>


<div class="container ans page mt-4 p-3  border-5 border-start border-dark d-none" id="ord_prod_ans">
    Select the product(s) which you want to buy and place the order.
</div>

<div class="container ques page mt-4 p-3 border-5 border-start border-primary" id="retu_prod_ques" onclick="show_ans('retu_prod_ques', 'retu_prod_ans')">
    How can I return an product ?
</div>

<div class="container d-none page mt-4 p-3 border-5 border-start border-dark" id="retu_prod_ans">
    You can only return the product only if your delivered product qualities is not good or if your delivered product has some error. If this requirements fulfiled than you have to mail on our support mail. Remember that you have to provide the order no and the ordered phone no and you have to be prove your eligibility for returning product(s). If you cannot proof your eligibility for returning the product(s) then you cannot return your product. If you can proof your eligibility for returning the product(s) then you can return your product. In this case your have contract on our email and proof your eligibility. After that we will reply you and we will sent you our returning address. And you have to return your product on that address. Remember you have to provide your retuning charge and the courier charge for returning the product . For more details read out our <a href="">returning polices</a>. <br>

    NOTE: ALL OF THE DISITIONS OF <?php echo $website_name ?> IS FINAL AND THE LAST DISION.

</div>


<div class="container ques page mt-4 mb-4 p-3 border-5 border-start border-primary" id="cancel_ord_prod_ques" onclick="show_ans('cancel_ord_prod_ques', 'cancel_ord_prod_ans')">
    How can I cancel order ?
</div>
<div class="container d-none page mt-4 mb-5 p-3 border-5 border-start border-dark" id="cancel_ord_prod_ans">
    To cancel your order follow the procedure given bellow .<div class="text-warning bg-dark p-2 m-4">Go to my orders -> select the order you want to cancel and click on order details -> click on cancel the order -> write the reason for canceling your order -> click on request for cancel the order</div>  NOTE THAT YOU CANNOT SUBMIT THE ORDER CANCELATION REQUEST IF WE HAVE HANDED THE ORDER TO OUR COURIER AND IF THE ORDER SHIPPING PROCESS HAS BEEN STARTED.
</div>

<script>
    function show_ans(parent_id_name, ans_id_name) {

        // var main_parent =document.getElementById(parent_id_name);
        // var show_ans_id =document.getElementById(ans_id_name);
        var main_parent = document.getElementById(parent_id_name);
        var show_ans_id = document.getElementById(ans_id_name);

        main_parent.style.cursor = "pointer";
        show_ans_id.classList.toggle("d-none");
        // show_ans_id.style.transition = "opacity display 5000ms, display 5000ms";





    }
</script>

<script src=""></script>

<?php

include "inc/_footer.php";


?>