<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/all.min-new.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row form_product align-items-start py-md-5">
            <div class="col-12 flex-column">
               <form action="/AddProduct" method="post" name="addProduct">
                @csrf
                <div>
                 <input id="search" type="text" name="Search" placeholder="Search Product Here..." onkeyup="keyUp(this)"> 
                 <i class="fa-solid fa-search"></i>  
                 <div class="autocom-box">
                    @foreach($products as $product)
                    <li class="text-capitalize">
                   {{$product->name}} | {{$product->type}} | {{$product->quantity}}packs / {{$product->partial}}@if($product->type == 'tab')Stripes @elseif($product->type == 'amp')Ampoules @endif
                    </li>
                    @endforeach
                 </div>
                </div>
                
                @if ($errors->any())
    <div class="error alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(!empty(Session::get("Error")))
                    <div class="error alert alert-danger">{{Session::get("Error")}}</div>
                    @endif
                <!-- <input type="text" name="Name" placeholder="Name" required>
                <select name="Type" id="TypeSelector" onchange="typeChanged(this)" required>
                    <option value="type">type</option>
                    <option value="syr">syr</option>
                    <option value="amp">amp</option>
                    <option value="tab">tab</option>
                </select>
                <input type="text" name="Sub_Count" id="subCount" placeholder="">
                <input type="text" name="Sub_Price" id="subPrice" placeholder="">
                <input type="text" name="Price" placeholder="Price" required>
                <input type="text" name="Stock" placeholder="Stock" required>
                <input type="text" name="Quantity" placeholder="Quantity" required>
                <input type="text" name="Partial" placeholder="Partial Count" required>
                <input type="text" name="Expiry_Date" placeholder="Expiry Date" required>
                <button onclick="submitCheck()">Add Product</button> -->
               </form>



<div class="order_container">
    <ul id="cartItems"></ul>
</div>







            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="/js/script.js"></script>
<script>





let suggestions = [
<?php foreach($products as $product){ ?>
    "<?=$product->name?> | <?=$product->type?> | <?=$product->quantity?>packs / <?=$product->partial?><?php if($product->type == 'tab'){?>Stripes <?php }elseif($product->type == 'amp'){?>Ampoules <?php }?> (<?=$product->id?>) ",
    <?php };?>
];
let suggs = [
<?php foreach($products as $product){ ?>
    "<?=$product->name?>",
    <?php };?>
];






</script>
<script>




axios.get("http://localhost:8000/api/cartItems")
.then((response) => {cartItems(response.data);})

function cartItems(data){
    const cartItems = data;
    const cartItemsDiv = document.querySelector("#cartItems");
    cartItemsDiv.innerHTML = '';
    for($i = 0;$i<cartItems.length;$i++){
      if(cartItems[$i].type == 'tab'){
        cartItemsDiv.innerHTML += '<li><div><h4>'+ cartItems[$i].name +' | '+ cartItems[$i].price +' L.E</h4><h6>'+cartItems[$i].type+'</h6></div><section><a href="#!" onclick="incQuantity('+ cartItems[$i].id +')"><i class="fa-solid fa-caret-up"></i></a><span>'+ cartItems[$i].quantity +'</span><a href="#!" onclick="decQuantity('+ cartItems[$i].id +')"><i class="fa-solid fa-caret-down"></i></a></section>'+ '<select name="Type" onchange="typeChanged('+ cartItems[$i].id +',this)" id="selectType'+ cartItems[$i].id +'"><option value="Type" id="Type'+ cartItems[$i].id +'">Type</option><option value="Pack" id="Pack'+ cartItems[$i].id +'" onclick="typeChanged('+ cartItems[$i].id +',Pack)">Pack</option><option value="Strip" id="Strip'+ cartItems[$i].id +'" onclick="typeChanged('+ cartItems[$i].id +',Strip)">Strip</option></select>' +'<h2>'+ cartItems[$i].total_price  +'L.E</h2><a href="#!" onclick="removeItem('+ cartItems[$i].id +')"><i class="fa-solid fa-times"></i></a></li>';  
      }else if(cartItems[$i].type == 'amp'){
        cartItemsDiv.innerHTML += '<li><div><h4>'+ cartItems[$i].name +' | '+ cartItems[$i].price +' L.E</h4><h6>'+cartItems[$i].type+'</h6></div><section><a href="#!" onclick="incQuantity('+ cartItems[$i].id +')"><i class="fa-solid fa-caret-up"></i></a><span>'+ cartItems[$i].quantity +'</span><a href="#!" onclick="decQuantity('+ cartItems[$i].id +')"><i class="fa-solid fa-caret-down"></i></a></section>'+'<select name="Type" onchange="typeChanged('+ cartItems[$i].id +',this)" id="selectType'+ cartItems[$i].id +'"><option value="Type" id="Type'+ cartItems[$i].id +'">Type</option><option value="Pack" id="Pack'+ cartItems[$i].id +'" onclick="typeChanged('+ cartItems[$i].id +',Pack)">Pack</option><option value="Amp" id="Amp'+ cartItems[$i].id +'" onclick="typeChanged('+ cartItems[$i].id +',Amp)">Amp</option></select>' +'<h2>'+ cartItems[$i].total_price +' L.E</h2><a href="#!" onclick="removeItem('+ cartItems[$i].id +')"><i class="fa-solid fa-times"></i></a></li>';  
      }



      if(cartItems[$i].sub_type != 'Type'){
        document.getElementById(cartItems[$i].sub_type + cartItems[$i].id).setAttribute('selected','selected');
      }



    }
    
    }


</script>











<!-- <script>
  const { createApp } = Vue
  createApp({
    delimiters: ['${', '}$'],
    data() {
      return {
        products: '',
      }
      
    },methods:{

        addToCart(element){
            console.log(element)
        }

        // axios.post("http://localhost:8000/api/CartItems_ProductsPricesApi",{user_id : '{{ Auth::id() }}'})
        // .then((response) => {this.productsTotalPrice = response.data})


    }
    
    ,mounted(){
        // axios.get("http://localhost:8000/api/Products_GetApi")
        // .then((response) => {this.products = response.data} )

         
    }
    
    

  }).mount('#app')
  
</script> -->
</body>
</html>