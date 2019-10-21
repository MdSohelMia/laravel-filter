@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-10">
                <form action="" method="get">
                    <input type="search" autocomplete="on" placeholder="searching" class="form-control">
                </form>
            </div>
            <div class="col-lg-2">
                <button type="submit" class="btn btn-info">Search</button>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">image</th>
                <th scope="col">price</th>
                <th scope="col">discount</th>
                <th scope="col">del_price</th>
                <th scope="col">sell_count</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $products as $key=>$product)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$product->title}}</td>
                <td>{{$product->category->name}}</td>
                <td>
                    <img src="{{$product->image}}" alt="" width="50" height="50">
                </td>
                <td>
                    {{$product->price}}
                </td>
                <td>
                    {{$product->discount}}
                </td>
                <td>{{$product->del_price}}</td>
                <td>{{$product->sell_count}}</td>
            </tr>
              @endforeach
            </tbody>
        </table>
    </div>

@endsection
