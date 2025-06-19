

let products = {
    data: [
      {
        productName: "Carrot",
        category: "Vegetables",
        price: "49",
        image: "vigitables (1).jpeg",
      },
      {
        productName: "kiwi",
        category: "Fruits",
        price: "23",
        image: "Fruits (1).jpeg",
      },
      {
        productName: "cherry",
        category: "Fruits",
        price: "32",
        image: "Fruits (2).jpeg",
      },
      {
        productName: "banana",
        category: "Fruits",
        price: "63",
        image: "Fruits (6).jpeg",
      },
      {
        productName: "Tomato",
        category: "Vegetables",
        price: "49",
        image: "vigitables (2).jpeg",
      },
      {
        productName: "apple",
        category: "Fruits",
        price: "22",
        image: "Fruits (5).jpeg",
      },
      {
        productName: "Strawberry",
        category: "Fruits",
        price: "11",
        image: "Fruits (4).jpeg",
      },
      {
        productName: "grapes",
        category: "Fruits",
        price: "5",
        image: "Fruits (7).jpeg",
      },



      {
        productName: "juice",
        category: "Beverages",
        price: "52",
        image: "Beverages (1).jpeg",
      },
      {
        productName: "pepsi",
        category: "Beverages",
        price: "19",
        image: "Beverages (2).jpeg",
      },
      {
        productName: "coca cola",
        category: "Beverages",
        price: "199",
        image: "Beverages (3).jpeg",
      },





      {
     
        productName: "sausage",
        category: "Meat",
        price: "129",
        image: "sausage.jpeg",
      },

     
    ],
  };

  for (let i of products.data) {
    //Create Card
    let card = document.createElement("div");
    //Card should have category and should stay hidden initially
    card.classList.add("card", i.category, "hide");
    //image div
    let imgContainer = document.createElement("div");
    imgContainer.classList.add("image-container");
    //img tag
    let image = document.createElement("img");
    image.setAttribute("src", `images/${i.image}`);
   
    imgContainer.appendChild(image);
    card.appendChild(imgContainer);
    //container
    let container = document.createElement("div");
    container.classList.add("container");
    //product name
    let name = document.createElement("h5");
    name.classList.add("product-name");
    name.innerText = i.productName.toUpperCase();
    container.appendChild(name);

    //price
    let price = document.createElement("h6");
    price.innerText = "$" + i.price;
    container.appendChild(price);

    // search
    // في الفصل القادم يتم البحث باستخدام اللارافيل لكن مبدأيا مضظر أخاك لا بطل
    let showProduct = document.createElement("a");
    showProduct.innerText = "Show Product";
    showProduct.classList.add("show-product-orange");
    showProduct.setAttribute("href", `/product`); 
    container.appendChild(showProduct);

    card.appendChild(container);
    document.getElementById("products").appendChild(card);
  }

  //parameter passed from button (Parameter same as category)
  function filterProduct(value) {
    //Button class code
    let buttons = document.querySelectorAll(".button-value");
    buttons.forEach((button) => {
      //check if value equals innerText
      if (value.toUpperCase() == button.innerText.toUpperCase()) {
        button.classList.add("active");
      } else {
        button.classList.remove("active");
      }
    });

    //select all cards
    let elements = document.querySelectorAll(".card");
    //loop through all cards
    elements.forEach((element) => {
      //display all cards on 'all' button click
      if (value == "all") {
        element.classList.remove("hide");
      } else {
        //Check if element contains category class
        if (element.classList.contains(value)) {
          //display element based on category
          element.classList.remove("hide");
        } else {
          //hide other elements
          element.classList.add("hide");
        }
      }
    });
  }

  //Search button click
  document.getElementById("search").addEventListener("click", () => {
    filterProduct("all");

    //initializations
    let searchInput = document.getElementById("search-input").value;
    let elements = document.querySelectorAll(".product-name");
    let cards = document.querySelectorAll(".card");

    //loop through all elements
    elements.forEach((element, index) => {
      //check if text includes the search value
      if (element.innerText.includes(searchInput.toUpperCase())) {
        //display matching card
        cards[index].classList.remove("hide");
      } else {
        //hide others
        cards[index].classList.add("hide");
      }
    });
  });

  //Initially display all products
  window.onload = () => {
    filterProduct("all");
  };