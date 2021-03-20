onLoadCartNumbers()

var landingPad = document.querySelector(".cart-items");

var textBox = document.querySelector("textarea");

var savedCart = localStorage.getItem("cart");

const cart = JSON.parse(savedCart)

const cartDataArray = cart.itemsInCart


function onLoadCartNumbers() {
  let productNumbers = localStorage.getItem("cartNumber");

  if (productNumbers) {
    document.getElementsByClassName("cart-counter")[0].textContent = productNumbers;
  }

}

// console.log(cartData[0].imgSrc);

function showItems() {
  //loop through array of cart items
  cartDataArray.map((dataNode) => {
    //set variable for name and img source
    let name = dataNode.name
    let image = dataNode.imgSrc

    //creat function for HTMLshell
    addToCheckout(name, image);
  })
}

function addToCheckout(name, image) {
  var container = document.createElement('div');

  var containerContent = `
    <div class="col-sm line">
      <img src="${image}" alt="${name}">
      <p>${name}</p>
      </div>
      `;
  container.innerHTML = containerContent
  // console.log(container.innerHTML);


  var landingPad = document.querySelector(".cart-items")
  landingPad.append(container);

  if (landingPad) {
    landingPad.append(container);
  }

}

showItems()


const submit = document.querySelector("#submit")




submit.addEventListener("click", () => {
  localStorage.clear();
});
