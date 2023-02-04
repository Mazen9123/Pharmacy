




const searchWrapper = document.querySelector(".form_product");
const inputBox = searchWrapper.querySelector("#search");
const suggBox = searchWrapper.querySelector(".autocom-box");


function keyUp(e){
    let userData = e.value;
    let emptyArray = [];
    if(userData){
        emptyArray = suggestions.filter(
            (data)=>{
return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            }
        );
        nameArray = suggs.filter(
            (name)=>{
return name.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
            }
        );
        emptyArray = emptyArray.map((data)=>{
         return data = '<li id="' + nameArray + '">'+  data +'</li>';
         data.classList.add("list_li");
        });
        console.log(emptyArray);
        searchWrapper.classList.add("active");
        showSuggestions(emptyArray);
         let allList = suggBox.querySelectorAll('li');
    for (let i = 0; i < allList.length; i++){
        allList[i].setAttribute("onclick" , "select(this)");
    }
    }else{
        searchWrapper.classList.remove("active");
    }
    
   
}
		

function select(element){
    let selectUserData = element.textContent;
    inputBox.value = '';
    searchWrapper.classList.remove("active");
    addToCart(selectUserData);
}



function showSuggestions(list){
    let listData = '';
    if(!list.length){
userValue = inputBox.value;
listData = '<li>' +  userValue + '</li>';

    }else{
listData = list.join('');
    }
    suggBox.innerHTML = listData;
}





function addToCart(productName){
axios.post("http://localhost:8000/api/addToCart",{name:productName})
.then((response) => {cartItems(response.data)})
}




function typeChanged(productId,select){
    axios.post("http://localhost:8000/api/changeType",{id:productId,sub_type:select.value})
    .then((response) => {cartItems(response.data)})
}
function removeItem(productId){
    axios.post("http://localhost:8000/api/removeItem",{id:productId})
    .then((response) => {cartItems(response.data)})
}

function incQuantity(productId){
    axios.post("http://localhost:8000/api/incQuantity",{id:productId})
    .then((response) => {cartItems(response.data)})
}

function decQuantity(productId){
    axios.post("http://localhost:8000/api/decQuantity",{id:productId})
    .then((response) => {cartItems(response.data)})
}









