<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/all.min-new.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row main">
            <div class="col-12">

<h2>Products ( {{$products_count}} )</h2>



            <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Type</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Stock</th>
      <th scope="col">SubDetails</th>
      <th scope="col">Expire</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
    <tr>
      <th scope="row">{{$product->id}}</th>
      <td>{{$product->name}}</td>
      <td>{{$product->type}}</td>
      <td>{{$product->price}}</td>
      <td>{{$product->quantity}}packs / {{$product->partial}}@if($product->type == 'tab')Stripes @elseif($product->type == 'amp')Ampoules @endif</td>
      <td>{{$product->stock}}</td>
      <td>{{$product->sub_count}}@if($product->type == 'tab')Stripes @elseif($product->type == 'amp')Ampoules @endif / {{$product->sub_price}}L.E</td>
      <td>{{$product->expiry_date}}</td>
      <td><a href="/EditProduct?id={{$product->id}}" style="--bg:orange;"><i class="fa-solid fa-edit"></i></a> <a href="/DeleteProduct?id={{$product->id}}" style="--bg:brown;"><i class="fa-solid fa-trash"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="/js/script.js"></script>
</body>
</html>