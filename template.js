onLoadCartNumbers();
var cartBtn = document.querySelectorAll('.add-cart')
//
//below is your forloop for event to happen on button click
var i;
for(i = 0; i < cartBtn.length; i++){
  var button = cartBtn[i]
  button.addEventListener('click', addToCartClicked)
  button.addEventListener('click', countCart)
}

function onLoadCartNumbers(){
  let productNumbers = localStorage.getItem("cartNumber");

  if(productNumbers){
    document.getElementsByClassName("cart-counter")[0].textContent = productNumbers;

  }
}

function countCart(){
  //create variable for retrieving date from localStorage
  let productNumbers = localStorage.getItem("cartNumber");

  //turn the stored data into a number
  productNumbers = parseInt(productNumbers);

  //if there is a value stored for productNumber- do the following
  if( productNumbers ){

    //add 0ne to whatever that value is
    localStorage.setItem("cartNumber", productNumbers + 1);
    //go to Html and change that classItems inner text to whatever
    //the value is for productNumber plus 1
    document.getElementsByClassName("cart-counter")[0].textContent = productNumbers + 1
  }else{
    //set the productNumber here
    localStorage.setItem("cartNumber", 1);
    //if there isnt already a value stored in local cartStorage
    //set the inner text of the basket num to 1
    document.getElementsByClassName("cart-counter")[0].textContent= 1

  }
// console.log(productNumbers);

}

//below we're about to capture all the elements we want to transfer from
//sales section to cart on click

function addToCartClicked(event){
  //below you've passed in the button event(essentially the button itself)
  var button = event.target
  //line below is you getting the shop itemname by working backwords through the dom tree from the button to its parent element
  var shopItem = button.parentElement.parentElement
  //once you've gotten to the parent, you work forward to get the item Name
  var title = shopItem.getElementsByClassName("glassFrame")[0].alt
  //with the line below youll be able to acess the img source of each button clicked
  var imageSrc = shopItem.getElementsByClassName("glassFrame")[0].src
//line below is a function youll build separately in order
//to paste items from shopping list into empty space in your cart
  addItemToCart(imageSrc, title)

  addImageToCheckout( imageSrc, title)

  //addNameToSubmit( title )
}

function addImageToCheckout(imageSrc, title){
  //create outer Div
 var container = document.createElement('div');
 //create div to go inside outer div
 var contentDiv = document.createElement('div')
 //create shell for content of inner div
 var containerContent =`
 <div class="col-sm line">
   <img src="${imageSrc}" alt="${title}">
   <p>${title}</p>
    <button type="button" class="remove-cart btn btn-outline-warning ">remove</button>
 </div>
 `
//put the shell into the inner div
contentDiv.innerHTML = containerContent;
//add the inner div to the outside
container.append(contentDiv);

 // localStorage function
  saveCheckoutImage(container);
}
function saveCheckoutImage(container){
  var savedImages = localStorage.getItem("checkoutImages")

  localStorage.setItem("checkoutImages", container.innerHTML)
  console.log(savedImages);
}

//here you'll create the instructions for how to add items to cart amd
//youll also create brand new divs out of thin air
function addItemToCart(imageSrc, title){
  //create new html div element
  var cartRow = document.createElement('div')
  //create another html div to store actual data within
  var cartItems = document.createElement('div')
  //add a class to the cart item div
  cartItems.classList.add("cart-items")
  //create a HTML template for how the data is gonna be stored
  var cartRowContents = `
  <div class="col-sm line">
    <img src="${imageSrc}" alt="Fránz">
    <p>${title}</p>
  </div>`

  cartRow.innerHTML = cartRowContents
  cartItems.append(cartRow)

  // console.log(cartItems);

   cartStorage(cartItems)
}

// local storage function
function cartStorage(cartItems){
  window.localStorage.setItem('savedCart', cartItems.innerHTML)
  cartItems == window.localStorage.getItem('savedCart')

   console.log(cartItems);
}
