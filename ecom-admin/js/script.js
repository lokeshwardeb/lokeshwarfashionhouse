// to active dark mode and light mode

let changeIcon = function (icon) {
  icon.classList.toggle('fa-cloud-moon');
  // document.body.classList.toggle("light-theme");

}



// this function is to add the active class functionality on the sidebar
// sidebar = document.querySelector(".das-sidebar").querySelectorAll("a");
// console.log(sidebar);

// sidebar.forEach(element => {
//     element.addEventListener("click", function() {
//         sidebar.forEach(ul=>ul.classList.remove("active"))

//         this.classList.add("active");
//         // this.id.add("home")

//     })
// });


function order() {
  let orders = document.getElementById("orders");
  // orders.addEventListener("click", function(e) {
  //     var or = e.target.value;
  //     console.log(or);
  // })
  // orders.style.display = "inline";
  orders.style.display = 'block !important;'

}

// console.log('the order section is the prodggram comptinve' + orders);



// loading functionality starts here
var loader = document.getElementById("preloader");
window.addEventListener("load", function () {
  // this is to add the loading animation and function
  loader.style.display = "none";
  // this is to check and display the sidebar item as big on little by localstorage
    // this is to check and display the sidebar item as big on little by localstorage
    let statusCheck = JSON.parse(localStorage.getItem('bigCloseStatus'));

    let bigCloseItem = document.getElementById('bigCloseItem');
    let bigCloseToggle = bigCloseItem.classList.toggle('no-disp');
  
    let bigCloseContains = bigCloseItem.classList.contains('no-disp');
    let bigLinkDivider = this.document.getElementById('bigLinkDivider');
  
    let smallCloseItem = document.getElementById('smallCloseItem');
  
    let closeBtn = document.getElementById('closedBtn');
  
    let mainSection = this.document.querySelector('main');
    if (statusCheck == 'closeActivated') {
      bigCloseItem.classList.add('no-disp');
      smallCloseItem.classList.remove('no-disp');
      closeBtn.innerText = 'Open';
      bigLinkDivider.classList.add('no-disp');
  
      mainSection.style.width = '100vw';
  
    }
    if (statusCheck == 'closeDeactivated') {
      bigCloseItem.classList.remove('no-disp');
      smallCloseItem.classList.add('no-disp');
      bigLinkDivider.classList.add('no-disp');
  
      closeBtn.innerText = 'Close';
      mainSection.style.width = '100vw';
  
  
    }
    if (this.localStorage.length == 0) {
      bigCloseItem.classList.remove('no-disp');
      smallCloseItem.classList.add('no-disp');
      bigLinkDivider.classList.add('no-disp');
  
      closeBtn.innerText = 'Close';
      mainSection.style.width = '100vw';
  
  
    }
  


  let orderStatusSelect = document.getElementById('orderStatus');
let orderStatusSelectValue = orderStatusSelect.value;
if(orderStatusSelectValue == 'cancelled'){
  console.log('order is cancelled');

  let orderCancelledReasonDiv = document.getElementById('orderCancelledReasonDiv');
  orderCancelledReasonDiv.classList.remove('no-disp');

  let theCancelledResonShowDiv = document.getElementById('theCancelledResonShowDiv');
  theCancelledResonShowDiv.classList.remove('no-disp')

}



  if (statusCheck == 'closeActivated') {
    smallCloseItem.classList.remove('no-disp')
    bigCloseItem.classList.add('no-disp');
    bigLinkDivider.classList.add('no-disp');
    closeBtn.innerText = 'Open';
    mainSection.style.width = '100vw';


  }
  if (statusCheck == 'closeDeactivated') {
    bigCloseItem.classList.remove('no-disp');
    smallCloseItem.classList.add('no-disp')
    bigLinkDivider.classList.add('no-disp')
    closeBtn.innerText = 'Close';


  }
})

// closing js function starts here

function closeFun() {
  // set the element of the big sidebars close item
  let bigCloseItem = document.getElementById('bigCloseItem');
  
  // this is to toogle big and small sidebars
  let bigCloseToggle = bigCloseItem.classList.toggle('no-disp');

  // this is to check if the big or small sidebars contains
  let bigCloseContains = bigCloseItem.classList.contains('no-disp');

  let smallCloseItem = document.getElementById('smallCloseItem');

  let closeBtn = document.getElementById('closedBtn');



  // if contains then add on localstorage 
  if (bigCloseContains) {
    // add on localstorage
    let storaged = localStorage.setItem('bigCloseStatus', JSON.stringify('closeActivated'));

    // parse the localstorage as json parse
    let statusCheck = JSON.parse(localStorage.getItem('bigCloseStatus'));
    console.log('the status is ' + statusCheck);
    if (statusCheck == 'closeActivated') {
      bigCloseItem.classList.add('no-disp');
      smallCloseItem.classList.remove('no-disp');
      closeBtn.innerText = 'Open';

    }
    if (statusCheck == 'closeDeactivated') {
      bigCloseItem.classList.remove('no-disp');
      smallCloseItem.classList.add('no-disp');
      closeBtn.innerText = 'Close';

    }
  } else {

    // add on localstorage
    let storaged = localStorage.setItem('bigCloseStatus', JSON.stringify('closeDeactivated'));

    // parse the localstorage as json parse
    let statusCheck = JSON.parse(localStorage.getItem('bigCloseStatus'));
    console.log('the status is ' + statusCheck);

    if (statusCheck == 'closeActivated') {
      bigCloseItem.classList.add('no-disp');
      smallCloseItem.classList.remove('no-disp');
      closeBtn.innerText = 'Open';

    }
    if (statusCheck == 'closeDeactivated') {
      bigCloseItem.classList.remove('no-disp');
      smallCloseItem.classList.add('no-disp');
      closeBtn.innerText = 'Close';

    }
    
  }













  // let close = document.getElementById("closedFun");
  // let closingItem = document.getElementById("closeItem");


  // let tog = closingItem.classList.toggle('no-disp');
  // let togContains = closingItem.classList.contains('no-disp');

  // if (togContains == true) {
  //   let mainSection = document.querySelector('main');
  //   mainSection.style.width = '100vw';
  //   console.log(mainSection)
  // } else {
  //   console.log('toogle not contains sorry');
  // }


  // console.log(tog)



  // let littleLink = document.getElementById("littleLink");
  // let littleTogContains = littleLink.classList.contains('no-disp');
  // // littleLink.classList.toggle('no-disp');
  // if (littleTogContains == true) {
  //   let bigLinkDivider = document.getElementById("bigLinkDivider");
  //   bigLinkDivider.style.display = 'none';
  //   localStorage.setItem('closedStatus', JSON.stringify(true));
  // } else {
  //   localStorage.setItem('closedStatus', JSON.stringify(false));
  // }

  // let status = JSON.parse(localStorage.getItem('closedStatus'));

  // if (status == true) {
  //   let littleLink = document.getElementById("littleLink");
  //   littleLink.classList.remove('no-disp');
  //   closingItem.classList.add('no-disp');
  //   console.log('close status is true')

  // }
  // else if (status == false) {
  //   littleLink.classList.add('no-disp');
  //   closingItem.classList.remove('no-disp')
  // }
  // else {
  //   console.log('status not run')
  // }




}

function productEdit() {
  let productEdit = document.getElementById("productEdit");


  productEdit.classList.toggle('no-disp');




}


function onChangeisCancelled(){
  let orderStatusSelect = document.getElementById('orderStatus');
  let orderStatusSelectValue = orderStatusSelect.value;
  if(orderStatusSelectValue == 'cancelled'){
    console.log('order is cancelled');
  
    let orderCancelledReasonDiv = document.getElementById('orderCancelledReasonDiv');
    orderCancelledReasonDiv.classList.toggle('no-disp');
  
    let theCancelledResonShowDiv = document.getElementById('theCancelledResonShowDiv');
    theCancelledResonShowDiv.classList.remove('no-disp')
  
  }
  else{
    let orderCancelledReasonDiv = document.getElementById('orderCancelledReasonDiv');

    orderCancelledReasonDiv.classList.add('no-disp');

    let resonInput = document.getElementById('resonInput');
   let resonInputValue = resonInput.classList.value;
   

  }
}
function littleLink() {
  let littleLink = document.getElementById("closeItem");
  littleLink.classList.toggle('no-disp');

}

function setFeaturedProduct(){
  let featuredInput = document.getElementById('featuredInput');
  let featuredCheckedStatus = featuredInput.checked;
  if(featuredCheckedStatus){
    document.getElementById('featuredSpan').innerText = 'Added as featured product';
  }else{
    document.getElementById('featuredSpan').innerText = 'Add as featured product';

  }
}
let featuredInput = document.getElementById('featuredInput');

let featuredCheckedStatus = featuredInput.checked;

if(featuredCheckedStatus){
  document.getElementById('featuredSpan').innerText = 'Added as featured product';
}else{
  document.getElementById('featuredSpan').innerText = 'Add as featured product';

}

function add_promo_code(){
  let promoInput = document.getElementById('promoInput');
  let promoInputCheckedStatus = promoInput.checked;
  if(promoInputCheckedStatus){
    document.getElementById('promoSpan').innerText = 'Promo code activated (automatically)';
  }else{
    document.getElementById('promoSpan').innerText = 'Active promo code on this product (automatically) ';

  }
}
let promoInput = document.getElementById('promoInput');

let promoInputCheckedStatus = promoInput.checked;

if(promoInputCheckedStatus){
  document.getElementById('promoSpan').innerText = 'Promo code activated (automatically)';
}else{
  document.getElementById('promoSpan').innerText = 'Active promo code on this product (automatically) ';

}

  let featuredProductStatusId = document.getElementById("featuredProductStatusId");
  let featuredInnertext = featuredProductStatusId.innerText;
  if(featuredInnertext == 'Product Featured Status: Featured Product'){
    featuredProductStatusId.classList.remove('no-disp');

  }
  if(featuredInnertext == 'Product Featured Status: Not Featured Product'){
    featuredProductStatusId.classList.add('no-disp');

  }



  function add_custom_promo_code(){
    let cusPromoCodeInput = document.getElementById('cusPromoCodeInput');
    let cusPromoInputCheckedStatus = cusPromoCodeInput.checked;
    if(cusPromoInputCheckedStatus){
      document.getElementById('cuspromoSpan').innerText = 'Custom Promo code activated';
    let cuspromoBoxInput =   document.getElementById('cuspromoBoxInput');
    cuspromoBoxInput.classList.remove('no-disp');
    }else{
      document.getElementById('cuspromoSpan').innerText = 'Activate custom promo code';
      let cuspromoBoxInput =   document.getElementById('cuspromoBoxInput');
      cuspromoBoxInput.classList.add('no-disp');

  
    }
  }
  let cusPromoCodeInput = document.getElementById('cusPromoCodeInput');
  
  let cusPromoInputCheckedStatus = cusPromoCodeInput.checked;
  
  if(cusPromoInputCheckedStatus){
    document.getElementById('cuspromoSpan').innerText = 'Custom Promo code activated';
    let cuspromoBoxInput =   document.getElementById('cuspromoBoxInput');
    cuspromoBoxInput.classList.remove('no-disp');
  }else{
    document.getElementById('cuspromoSpan').innerText = 'Activate custom promo code';
    let cuspromoBoxInput =   document.getElementById('cuspromoBoxInput');
    cuspromoBoxInput.classList.add('no-disp');
  
  }
  
  // let courierChecked = document.getElementById("courierChecked");

  let courierCheckedStatus = document.getElementById("courierChecked").checked

  let courierHandingDesc = document.getElementById("courierHandingDesc");

  if(courierCheckedStatus){
    courierHandingDesc.classList.remove('no-disp');

  }else{
    courierHandingDesc.classList.add('no-disp');
  }



// password show and hide functionality

function pass_show() {

  let show_pass = document.getElementById("show_pass");
  let hide_pass = document.getElementById("hide_pass");

  let pass_inp = document.getElementById("pass_inp");


  if (show_pass.classList.contains("no-disp")) {
    hide_pass.classList.add("no-disp");
    show_pass.classList.remove("no-disp")
    if (pass_inp.type == "password") {
      pass_inp.type = "text"
    } else {
      pass_inp.type = "password";

    }
  } else {
    hide_pass.classList.remove("no-disp");
    show_pass.classList.add("no-disp")
    // hide_pass.classList.toggle("no-disp");
    // hide_pass.classList.ad("no-disp");
    // pass_inp.type = "text";

    if (pass_inp.type == "password") {
      pass_inp.type = "text"
    } else {
      pass_inp.type = "password";

    }

  }

  // if(hide_pass.classList.contains("no-disp")){
  //   hide_pass.classList.remove("no-disp");
  //     show_pass.classList.add("no-disp")
  //     // hide_pass.classList.toggle("no-disp");
  //     // hide_pass.classList.ad("no-disp");
  //     pass_inp.type = "text";
  // }




}