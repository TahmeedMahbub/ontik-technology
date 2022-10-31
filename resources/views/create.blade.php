<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Product</title>
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
                    <form method="POST" action="{{ route('create.submit') }}" enctype="multipart/form-data">
                        @csrf

                        <table>
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


<script src="https://cdn.tiny.cloud/1/zz7fjgduzxsf3ohadltp0cn55euvnkrjhblr1etxzxm1os71/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#description'
    });
</script>
</body>
</html>