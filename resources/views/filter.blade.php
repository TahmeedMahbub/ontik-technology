<!DOCTYPE html>
<html lang="en">
<head>
    <title>Filter Product</title>
</head>
<body>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Filter Product</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('filter.submit') }}">
                        @csrf

                        <table>
                            <tr style="height: 45px;">
                                <td><b>Title:</b></td>
                                <td>
                                    <input type="text" name="title" id="title" placeholder="Search Product by Title" style="width: 570px;">
                                </td>
                            </tr>
                            
                            <tr style="height: 45px;">
                                <td><b>Category:&emsp;</b></td>
                                <td>
                                <select name="category" id="category" placeholder="Enter Product Category" style="width: 200px;">
                                    <option value="0">Select a Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                                    
                                    &emsp;&emsp;&emsp;&emsp;

                                    <b>Subcategory:&emsp;</b>
                                    <select name="subcategory" id="subcategory" placeholder="Enter Product Subcategory" style="width: 200px;">
                                        <option value="0">Select a Subcategory</option>
                                        @foreach($subcategories as $subcategory)
                                            <option value="{{$subcategory->id}}">{{$subcategory->title}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            
                            <!-- <tr style="height: 45px;">
                                <td>Subcategory:&emsp;</td>
                                <td>
                                    <select name="subcategory" id="subcategory" placeholder="Enter Product Subcategory" style="width: 300px;">
                                        <option value="0">Select a Subcategory</option>
                                        @foreach($subcategories as $subcategory)
                                            <option value="{{$subcategory->id}}">{{$subcategory->title}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr> -->
                            
                            <tr style="height: 75px;">
                                <td><b>Price:</b></td>
                                <td>
                                    <input type="number" name="min_price" id="min_price" step=".01" placeholder="Minimum Price" style="width: 260px;">
                                        &emsp;<b>—</b>&emsp;
                                    <input type="number" name="max_price" id="max_price" step=".01" placeholder="Maximum Price" style="width: 260px;">
                                </td>
                            </tr>                          
                            
                        </table>


                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input type="submit" value="Filter Product" class="btn btn-primary">
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