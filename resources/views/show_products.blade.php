<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        #nav{
            display: flex;
            justify-content: center;
           
        }
        #nav > a:hover{
            color:grey;
        }
        td > a{
            font-size:15px;
            text-decoration:none;
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


    @if (\Session::has('success'))

        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin:auto;width:65%;">
        <strong>{!! \Session::get('success') !!}</strong> 
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close" style="float:right;border-radius:50%;">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>

    @endif

    @if (\Session::has('success_edit'))

        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin:auto;width:65%;">
        <strong>{!! \Session::get('success_edit') !!}</strong> 
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close" style="float:right;border-radius:50%;">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>

    @endif

     <div style="width:65%;margin:auto;margin-top:80px;">  
        <a href="{{route('add_product')}}" class="btn btn-primary" style="float:right;">Add New Product</a>
        <h2>Products</h2> 
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quntity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>
                        <a href="{{route('more_details',$product->id)}}">Show</a> | <a href="{{route('edit_product',$product->id)}}">Edit</a> | <a href="#" onclick="delete_product({{$product->id}})">Delete</a>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>

     </div>   
  

    <script type="text/javascript">
        function delete_product(id){
            Swal.fire({
                title: "Delete this product! Are You Sure?",
                showCancelButton: true,

                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                        $.ajax({
                        type : "POST",
                        url : "delete_product/" + id,
                        data :{ "_token": "{{ csrf_token() }}",
                                },
                        success : function(response){
                                    location.reload();
                                    }
                        });




                }
                });
        }
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</body>
</html>