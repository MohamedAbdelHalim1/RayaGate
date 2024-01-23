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
                <a class="navbar-brand" href="#">Categories</a> 
            </div>               
        </nav> <!--end of nav -->

        <form class="form-horizontal" action="{{route('store')}}" method="post" style="width:65%;margin:auto;margin-top:80px;">
            @csrf
            <div class="form-group">
                <label class="control-label col-sm-2" for="name"><b>Name:</b><span style="color:red;">*</span></label>
                <div class="col-sm-10">
                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"  placeholder="Enter Name" name="name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="description"><b>Description:</b></label>
                <div class="col-sm-10">
                <input type="text" class="form-control"  placeholder="Enter Description" name="description" value="{{ old('description') }}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="price"><b>Price:</b><span style="color:red;">*</span></label>
                <div class="col-sm-10">
                <input type="number" step="any" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" id="price" placeholder="Enter Price" name="price">
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="quantity"><b>Quantity:</b><span style="color:red;">*</span></label>
                <div class="col-sm-10">
                <input type="number" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}" id="quantity" placeholder="Enter Quantity" name="quantity">
                @error('quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="category"><b>Categories:</b></label>
                <div class="col-sm-10">
                    @foreach($categories as $category)
                    <input type="checkbox"  name="category[]" value="{{$category->id}}">
                    <label>{{$category->name}}</label><br>
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