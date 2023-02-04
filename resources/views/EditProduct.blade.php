<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/all.min-new.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row form_product">
            <div class="col-12">
               <form action="/EditProduct" method="post" name="editProduct">
                @csrf
                <h2>Edit Product</h2>
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
                <input type="text" name="Name" placeholder="Name" value="{{$product->name}}" required>
                <select name="Type" id="TypeSelector" onchange="typeChanged(this)" required>
                    @if($product->type == 'syr')
                    <option value="syr">syr</option>
                    <option value="amp">amp</option>
                    <option value="tab">tab</option>
                    <option value="type">type</option>
                    @elseif($product->type == 'amp')
                    <option value="amp">amp</option>
                    <option value="syr">syr</option>
                    <option value="tab">tab</option>
                    <option value="type">type</option>
                    @elseif($product->type == 'tab')
                    <option value="tab">tab</option>
                    <option value="syr">syr</option>
                    <option value="amp">amp</option>
                    <option value="type">type</option>
                    @endif
                    
                </select>
                <input type="text" name="Sub_Count" id="subCount" value="{{$product->sub_count}}" placeholder="">
                <input type="text" name="Sub_Price" id="subPrice" value="{{$product->sub_price}}" placeholder="">
                <input type="text" name="Price" placeholder="Price" value="{{$product->price}}" required>
                <input type="text" name="Stock" placeholder="Stock" value="{{$product->stock}}" required>
                <input type="text" name="Quantity" placeholder="Quantity" value="{{$product->quantity}}" required>
                <input type="text" name="Partial" placeholder="Partial Count" required>
                <input type="text" name="Expiry_Date" placeholder="Expiry Date" value="{{$product->expiry_date}}" required>
                <input type="hidden" name="Id" value="{{$product->id}}">
                <button onclick="submitCheck()">Edit Product</button>
               </form>
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="/js/script.js"></script>
<script>
    $(function(){
        if({{$product->type}} == 'type' || {{$product->type}} != 'syr'){
document.getElementById("subCount").style.display = 'none';
    document.getElementById("subPrice").style.display = 'none';
        }

    });



    function typeChanged(element){
        if(element.value == 'tab'){
            document.getElementById("subCount").style.display = 'block';
            document.getElementById("subCount").setAttribute("placeholder","Strip Count");
            document.getElementById("subCount").setAttribute("required","required");
    document.getElementById("subPrice").style.display = 'block';
    document.getElementById("subPrice").setAttribute("placeholder","Strip Price");
    document.getElementById("subPrice").setAttribute("required","required");
        }else if(element.value == 'amp'){
            document.getElementById("subCount").style.display = 'block';
            document.getElementById("subCount").setAttribute("placeholder","Ampoule Count");
            document.getElementById("subCount").setAttribute("required","required");
    document.getElementById("subPrice").style.display = 'block';
    document.getElementById("subPrice").setAttribute("placeholder","Ampoule Price");
    document.getElementById("subPrice").setAttribute("required","required");
        }else if(element.value == 'syr' || element.value == 'type'){
            document.getElementById("subCount").style.display = 'none';
            document.getElementById("subCount").removeAttribute("required");
    document.getElementById("subPrice").style.display = 'none';
    document.getElementById("subPrice").removeAttribute("required");
        }
    };
    


// function submitCheck(){
// if(document.getElementById("TypeSelector").value == 'type'){
//     event.preventDefault();
// }else{
//     editProduct.submit();
// }
// };









</script>
</body>
</html>