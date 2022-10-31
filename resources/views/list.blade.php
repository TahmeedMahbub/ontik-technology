<!DOCTYPE html>
<html lang="en">
<head>
    <title>Products</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"/>
</head>
<body>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Product List</div>

                <div class="card-body">
                    <table class="table table-striped table-hover" id="allProducts">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Subcategory</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>            
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr id="pid{{$product->id}}">
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <?php
                                        if($product->thumbnail != NULL)
                                            {echo '<img src="product thumbnail/'.$product->thumbnail.'" alt="" height="30px">';}
                                        else
                                            {echo '<img src="product thumbnail/ontik.png" alt="" height="30px">';}
                                    ?>
                                </td>
                                <td>{{$product->title}}</td>
                                <td>{{$product->subcategory->title}}</td>
                                <td>{{$product->subcategory->category->title}}</td>
                                <td>{{$product->price}}</td>
                                <td>
                                <?php
                                    if($product->description != NULL)
                                        {echo strip_tags($product->description);}
                                    else
                                        {echo "Description Unavailable!";}
                                ?>
                                </td>
                                <td><a href="javascript:void(0)" onclick="deleteProduct({{$product->id}})" class="btn btn-danger">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#allProducts').DataTable();
    } );
</script>
<script>
    function deleteProduct(id)
    {
        if(confirm("Are you sure to delete this product?"))
        {
            $.ajax({
                url:'/delete/'+id,
                type: 'DELETE',
                data:{
                    _token : $("input[name=_token]").val()
                },
                success: function(response)
                {
                    $("#pid"+id).remove();
                }
            })
        }
    }
</script>
</body>
</html>