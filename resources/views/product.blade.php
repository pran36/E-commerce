@extends('layout')
@section('header')
    <h1>This is a header</h1>
@endsection
@section('content')
<h1>Products</h1>
        @foreach($products as $product)
            <article>
                <h2><a href="/product/{{ $product->id}}">{{$product['product_name']}}</a></h2>
                <p>{!!$product["product_desc"]!!}</p>
            </article>
        @endforeach
    
@endsection