@extends('product_layout')
@section('menu')
    @include('/Includes/menu')
@endsection
@section('content')
    <article>
        <h2>{{$product->product_name}}</h2>
        <p>{!!$product->product_desc!!}</p>
    </article>
    <a href="/">Go to home</a>
@endsection