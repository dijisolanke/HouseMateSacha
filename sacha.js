onLoadCartNumbers()
//DECLARE ALL CONSTANT VARIABLES
const addTocartBtns = document.querySelectorAll(".add-cart");

const btns = Array.from(addTocartBtns);

var itemsInCart = document.querySelector(".cart-counter ").textContent


const cart = {
  noOfItemsInCart: 0,
  itemsInCart: []
};

btns.map((btn) => {
  btn.addEventListener("click", function () {
    //line below goes through the html and finds the closest parent to "blu"
    const parent = btn.closest(".blu");
    //we then work forward from parent element
    const itemName = parent.querySelector("img").alt;
    const imgSrc = parent.querySelector("img").src;

    addItemToCart(itemName, imgSrc);
  });

   btn.addEventListener('click', countCart)

});

function addItemToCart(name, imgSrc){
  cart.noOfItemsInCart += 1;
  //add new item into itemCartArray within cart obj
  const item = {
    name: name,
    imgSrc: imgSrc
  };
  cart.itemsInCart.push(item);


  localStorage.setItem("cart", JSON.stringify(cart))
  // console.log(`${item.name} has been added to the cart.`);


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
}

function onLoadCartNumbers(){
  let productNumbers = localStorage.getItem("cartNumber");

  if(productNumbers){
    document.getElementsByClassName("cart-counter")[0].textContent = productNumbers;
  }
}
