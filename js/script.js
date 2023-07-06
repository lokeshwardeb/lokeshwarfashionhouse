var increButton = document.getElementsByClassName('inc');
              var decrementButton = document.getElementsByClassName('dec');
              for (let i = 0; i < increButton.length; i++) {
                  var button = increButton[i];
             
                  button.addEventListener('click', function(event){
      
                      var buttonClicked = event.target;
                      var input = buttonClicked.parentElement.children[2];
                      // console.log(input);
                      var inputValue = input.value;
                      // console.log(inputValue);
                      
                      if(inputValue == ''){
                        var newValue = parseInt('0')+1;
                        input.value = newValue;
                          
                      }
                      else if(inputValue < 10){
                        var newValue = parseInt(inputValue)+1;
                        console.log(newValue);
                     var finalValue = input.value = Math.abs(newValue);

                      }
                      else if(inputValue >= 10){
                        input.value = 10;
                      }
                  
                      else if(inputValue == 10){
                        input.value = 10;
                        // input.setattribute("disabled");

                      }
                  

                     
                      // else{
                      //   alert('this is a alert for the zero');
                      // }
                      
                      //   if(inputValue<0){
                      //   var newValue = parseInt(inputValue);
                      //   console.log(newValue);
                      //   input.value = 0;
                      // }
                    
                      // }
                      // if(inputValue<0){
                      //   var newValue = parseInt(inputValue);
                      //   console.log(newValue);
                      //   input.value = 0;
                      // }
                    
                  })
                  
              }
              // decrement
              for (let i = 0; i < decrementButton.length; i++) {
                  var button = decrementButton[i];
                  button.addEventListener('click', function(event){
      
                      var buttonClicked = event.target;
                      var input = buttonClicked.parentElement.children[2];
                      // console.log(input);
                      var inputValue = input.value;
                      // console.log(inputValue);
                      var newValue = parseInt(inputValue) - 1;
                      console.log(newValue);
                      input.value = newValue

                      var finalValue = input.value = Math.abs(newValue);
  

                      if(finalValue < 0){
                        input.value = 1;
                          
                      }
                      else if(finalValue == 0){
                        input.value = 1;
                      }
                      else if(finalValue == -1){
                        input.value = 1;
                      }
                      else if(inputValue >= 10){
                        input.value = 10-1;
                      }
                  
                      else if(inputValue == 10){
                        input.value = 10-1;
                      }
                  })
                  
              }







              // let productInformation = document.querySelector(".product-info");
              // let allInfo = productInformation.innerHTML

              // console.log(allInfo)


              function cart() {
               let productName = document.getElementsByName("product-name");
              let productValues =  productName.values;

            for (let i = 0; i < productName.length; i++) {
                // const element = array[i];
                let productnum = productName[i];
               console.log(productnum)
              }

              let productInfo = document.querySelector(".product-info");
              let productPrice = document.getElementsByName("product-price");

              // console.log("inner text is", productInfo.innerHTML)
              
            for (let i = 0; i < productPrice.length; i++) {
                // const element = array[i];
                let productPricenum = productPrice[i];
               console.log(productPricenum)
              }



              // let productInfo = document.querySelector(".product-info");
              let productQty = document.getElementsByName("qty");

              // console.log("inner text is", productInfo.innerHTML)
              
            for (let i = 0; i < productQty.length; i++) {
                // const element = array[i];
                addEventListene
                r("click", (e)={
                  
                })
                let productQtyenum = productQty[i];
               console.log(productQtyenum)
              }
              

              //  console.log(productName[0]);
              //  console.log(productValues);

              }

              function showPromoCode(){

                let showPromoCodeSection =  document.getElementById("showPromoCode");

                showPromoCodeSection.classList.remove("d-none");
              }

              var loader = document.getElementById("preloader");
              var processing = document.getElementById("processing");
              window.addEventListener("load", function () {
                // this is to add the loading animation and function
                // processing.style.display = "none";
                loader.style.display = "none";
              })

              // product cart multiplecation functionalities

              // function multi(product_price, SITE_URL){
              //   let cart_input_qty = document.getElementById("cart_input_qty");

              //   let qty_value = cart_input_qty.value;

              //   let SITE_URLS = SITE_URL;

              //   let price  = product_price;
              //   let qty = qty_value;

              //   if(qty_value == null){
              //     qty = 1;
              //   }

              //   if(qty > 10){
              //     qty = 10;
              //   }
              //   if(qty < 1){
              //     qty = 1;
              //   }

              //   let total_price = price * qty;

                


              //   // if(total_price >= 50){
              //   //   total_price = 20;
              //   //   cart_input_qty.value = 10;
              //   // }

              //   document.getElementById("cart_total_price").innerHTML = total_price;

              // //   let url = SITE_URLS .concat("index.php?pro_qty=") .concat(qty);

              // // the cookies declaration

              // // document.cookie = `product_qty = ${qty}`;
              // location.reload();

              // // document.cookie = `product_`;

              // // window.localStorage.setItem("product_qty", qty);
               
              // // //  window.location.href = SITE_URL +  "cart.php?pro_qty=" + qty;
              // //  window.location.href = url;
              // }


              // product qty cart main functionalities

              var gt = 0;
              var iprice =document.getElementsByClassName("iprice");
              var iqty =document.getElementsByClassName("iqty");
              var itotal =document.getElementsByClassName("itotal")
              var gTotal =document.getElementById("gTotal");
              
              
              function subTotal(){
                gt = 0;
                for (let i = 0; i < iprice.length; i++) {
                // const element = array[i];
              itotal[i].innerText = (iprice[i].value) * (iqty[i].value);
              gt = gt + (iprice[i].value) * (iqty[i].value);
                
              }
              
              gTotal.innerText = gt;
              
              }
              subTotal();
              
              



              // product disp cus zoom functionalities

              var lences = document.getElementById("lences")
              var disp_main_img = document.getElementById("disp_main_img");
              var hover_box = document.getElementById("hover_box");
              var product_info_main = document.getElementById("product_info_main");
              var product_qty_main = document.getElementById("product_qty_main");
          
              
              disp_main_img.addEventListener("mouseenter", function(){
                  hover_box.style.display = "block";
                  lences.style.display = "block";
                  product_info_main.style.display = "none";
                  product_qty_main.style.display = "none";
          
              });
          
              disp_main_img.addEventListener("mouseleave", function(){
                  hover_box.style.display = "none";
                  lences.style.display = "none";
                  product_info_main.style.display = "block";
                  product_qty_main.style.display = "block";
              })
              
          
              disp_main_img.addEventListener("mousemove", function (e) {
                  var x = e.clientX - e.target.offsetLeft;
                  var y = e.clientY - e.target.offsetTop;
                 var xx = lences.style.left = x + 750+ 'px';
                 var xx1 = lences.style.left = x + 750;
                var yy =   lences.style.top = y + 250+ 'px';
                var yy1 =   lences.style.top = y + 250;
          
          
                console.log(y)
                
              //   if(x > 40  && x < 500){
              //     hover_box.style.display = "block";
              //   }
                
              //   if(x < 40  && x > 500){
              //     // hover_box.setAttribute("style", "display:none !important");
              //     hover_box.setAttribute("style", `display:none !important;`);
                  
              //     hover_box.style.display = "none";
              //     // lences.style.display = "none";
              //     // hover_box = "none";
                  
              //   }
          
              if(y < -80){
                  lences.style.width = "150px";
                  yy = lences.style.left = "800px";
          
              }
          
                if(x < 40){
                  lences.style.width = "150px";
                  xx = lences.style.left = "800px";
          
          
                }
          
                if(x > 500){
                  lences.style.width = "150px";
                  xx = lences.style.left = "1250px";
          
          
                }
          
                if(x > 340){
                  lences.style.width = "150px";
                  xx = lences.style.left = "1250px";
          
          
                }else{
                  lences.style.width = "300px";
          
                }
          
              //   if(xx < '1200px'){
              //     lences.style.width = "300px";
              //     // xx = lences.style.left = "1250px";
              //    var xx = lences.style.left = x + 750+ 'px';
          
          
              //   }
              //   else if(xx > '1200px'){
              //     xx = lences.style.left = "1250px";
              //     lences.style.width = "150px";
              //   }else{
              //     var xx = lences.style.left = "800px";
              //     lences.style.width = "300px";
          
              //   }
          
          
          
                
              //   hover_box.setAttribute("style", `background-position: ${(x-(500 /2 /6)+14) * -6}px ${(y - (500 / 2 /6)+ 44) * -6 }px !important; background-repeat: no-repeat !important; display:block !important;`)
                hover_box.setAttribute("style", `background-position: ${(x-(500 /2 /6)+14) * -6}px ${(y - (500 / 2 /6)+ 44) * -6 }px !important; background-repeat: no-repeat !important; display:block !important;`)
                  // hover_box.style.backgroundPosition = (x-(500 /2 /6)+250) * -6 +'px' + (y - (500 / 2 /6)+ 250) * -6 +'px';
                  // hover_box.style.backgroundPosition = (xx)+'px' + ' ' + (xx)+'px';
                  // hover_box.style.backgroundPositionX = xx;
                  // hover_box.style.backgroundPositionY = yy;
          
                  // hover_box.style.backgroundPosition = x + ' px !important' + ' ' + y + 'px';
                  // hover_box.style.backgroundPosition = xx1 +'px ' + yy1 + 'px !important; ';
              //    hover_box.style.backgroundPosition =  x + 750+ 'px' + ' ' + y + 250 + 'px';
                  hover_box.style.backgroundPosition = x + 750 + "px"+ " " + y + 250 + "px ;";
              })




              function qty_inp_id() {
                var qty_inp_id = document.getElementById();
  var val_qty_inp = qty_inp_id.value;
  console.log(val_qty_inp)
  
  
  
              }