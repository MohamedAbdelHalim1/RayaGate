<!DOCTYPE html>
<html lang="en">
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
                <a class="navbar-brand" href="{{route('view_all_categories')}}">Categories</a> 
            </div>               
        </nav> <!--end of nav -->

        <form class="form-horizontal" action="{{route('upload_category',$category->id)}}" method="post" style="width:65%;margin:auto;margin-top:80px;">
            @csrf
            <div class="form-group">
                <label class="control-label col-sm-2" for="name"><b>Name:</b><span style="color:red;">*</span></label>
                <div class="col-sm-10">
                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $category->name }}"  placeholder="Enter Name" name="name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>
 

            <div class="form-group">
                <label class="control-label col-sm-2" for="category"><b>Products:</b></label>
                <div class="col-sm-10">
                    @foreach($products as $product)                       
                        <input type="checkbox"  name="product[]" value="{{$product->id}}" @if(in_array($product->id, $checked)) checked @endif  >
                        <label>{{$product->name}}</label><br>
                    @endforeach
                </div>
            </div>
          
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10 mt-2">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        
</body>
</html>