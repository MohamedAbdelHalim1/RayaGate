<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raya-Gate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        #nav{
            display: flex;
            justify-content: center;
            
        }
        #nav > a:hover{
            color:grey;
        }
    </style>
</head>
<body>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid" id="nav">
                <a class="navbar-brand" href="{{route('view_all_products')}}">Products</a>
                <a class="navbar-brand" href="#">Categories</a> 
            </div>               
        </nav> <!--end of nav -->

        <div style="width:65%;margin:auto;margin-top:80px;">
            <h1>{{$product->name}}</h1><br>
            <h3><b>Description</b> : <i>"{{$product->description}}"</i></h3><br>
            <h3><b>Price</b> : <i>"{{$product->price}}"</i></h3><br>
            <h3><b>Quantity</b> : <i>"{{$product->quantity}}"</i></h3><br>
            <hr>
            <h3><b>Categories:</b></h3><ul>
                 @if(count($product->categories) == 0)
                 <i>"This Products Without Categories"</i>
                 @else
                @foreach($product->categories as $category)
                <li>{{$category->name}}</li>
                @endforeach
                @endif
            </ul>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>