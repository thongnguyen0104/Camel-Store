
function sumSingle() {
    var priceProducts = document.getElementsByClassName("cart-info__detail-price")
    var priceToatlProducts = document.getElementsByClassName("cart-info-price__single")
    var quantityProducts = document.getElementsByClassName("cart-info-quantity")
    total = 0
    for (let index = 0; index < priceProducts.length; index++) {
        quantity = quantityProducts[index].value
        total = parseInt(priceProducts[index].innerHTML) * quantity;
        var price = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        priceToatlProducts[index].innerHTML = price
        // console.log(price)
        quantityProducts[index].setAttribute("onchange", "sumSingle()")
        quantityProducts[index].setAttribute("onclick", "sum()")
    }
    
}

function sum() {
    var priceProducts = document.getElementsByClassName("cart-info__detail-price")
    var priceToatlProducts = document.getElementsByClassName("cart-info-price__single")
    var quantityProducts = document.getElementsByClassName("cart-info-quantity")
    total = 0

    for (let index = 0; index < priceProducts.length; index++) {
        quantity = quantityProducts[index].value 
        total = total + parseInt(priceProducts[index].innerHTML) * quantity;
    }
    console.log(total)
    var commas = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    document.getElementById("total").innerHTML = commas
}


function setAttri() {
    var priceProducts = document.getElementsByClassName("cart-info-price__single")
    
    for (let index = 0; index < priceProducts.length; index++) {
        var bien = parseInt(priceProducts[index].innerHTML);
        var price = bien.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        priceProducts[index].innerHTML = price
        // console.log(price)
    }
}

function setprice() {
    var priceProducts = document.getElementsByClassName("cart-info__detail-price")

    for (let index = 0; index < priceProducts.length; index++) {
        var bien = parseInt(priceProducts[index].innerHTML);
        var price = bien.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        priceProducts[index].innerHTML = price
        // console.log(price)
    }
}

sum()
setAttri()
sumSingle()
// setprice()