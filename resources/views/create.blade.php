<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"/>
    
</head>
<body>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Product</div>

                <div class="card-body">
                    <form method="POST" action="{{route('create.submit')}}" enctype="multipart/form-data" id="createForm">
                        @csrf

                        <table id="productTable">
                            <tr>
                                <td>Title:<p style="color:red; display:inline;">*</p><br></td>
                                <td>
                                    <input type="text" name="title" id="title" placeholder="Enter Product Title" value="{{old('title')}}" style="width: 260px;">
                                    @error('title')
                                            <strong style="color:red; display:inline;">{{ $message }}</strong>
                                    @enderror
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Subcategory:<p style="color:red; display:inline;">*</p>&emsp;<br></td>
                                <td>
                                <select name="subcategory" id="subcategory" placeholder="Enter Product Subcategory" style="width: 260px;">
                                    <option value="0">Select a Subcategory</option>
                                    @foreach($subcategories as $subcategory)
                                        <option value="{{$subcategory->id}}" {{ ( $subcategory->id == old('subcategory')) ? 'selected' : '' }}>{{$subcategory->title}}</option>
                                    @endforeach
                                </select>
                                @error('subcategory')
                                    <strong style="color:red; display:inline;">{{ $message }}</strong>
                                @enderror
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Price:<p style="color:red; display:inline;">*</p><br></td>
                                <td>
                                    <input type="number" name="price" id="price" step=".01" placeholder="Enter Product Price" value="{{old('price')}}" style="width: 260px;">
                                    @error('price')
                                        <strong style="color:red; display:inline;">{{ $message }}</strong>
                                    @enderror
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Thumbnail:<br></td>
                                <td>
                                <input type="file" name="thumbnail" id="thumbnail" value="{{old('thumbnail')}}" style="width: 260px;">
                                @error('thumbnail')
                                    <strong style="color:red; display:inline;">{{ $message }}</strong>
                                @enderror
                                </td>
                            </tr>
                            
                            <tr>
                                <td colspan="2">Description:</td>
                            </tr>


                        </table>

                        <textarea name="description" id="description" placeholder="Enter Product Details (Optional)">{{old('description')}}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror


                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input type="submit" value="Create Product" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.tiny.cloud/1/zz7fjgduzxsf3ohadltp0cn55euvnkrjhblr1etxzxm1os71/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#description'
    });
</script>
<script>

</script>
<!-- <script>
    $("createForm").submit(function(e){
        e.preventDefault();

        let title = $("#title").val();
        let subcategory = $("#subcategory").val();
        let price = $("#price").val();
        let thumbnail = $("#thumbnail").val();
        let description = $("#description").val();
        let _token = $("input[name=_token").val();

        $.ajax({
            url: "{{ route('create.submit') }}",
            type:"POST",
            data:{
                title:title,
                subcategory:subcategory,
                price:price,
                thumbnail:thumbnail,
                description:description,
                _token:_token
            },
            success:function(response)
            {
                if(response)
                {
                    alert('Product added successfully!');
                    // $("#productTable ")
                }
            }
        });
    });
    
</script> -->
</body>
</html>