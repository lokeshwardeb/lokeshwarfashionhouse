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