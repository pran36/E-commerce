<x-admin.layout>
    <div class="az-content az-content-dashboard">
        <div class="container">
            <div class="az-content-body">
                <h2>All Order Items For {{Auth::user()->name}}</h2>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered mg-b-0">
                        <tr>
                            <td>S.N.</td>
                            <td>Product Name</td>
                            <td>Order No</td>
                            <td>From</td>
                            @if (Auth::user()->role == 'admin')
                                <td>To</td>
                            @endif
                            <td>Date</td>
                            <td>Status</td>
                            <td>Unit Price</td>
                            <td>Quantity</td>
                            <td>Total Price</td>
                            {{-- @if(Auth::user()->role == 'admin') --}}
                            <td>Actions</td>
                            {{-- @endif --}}
                        </tr>
                        @foreach ($order_products as $order_product)
                        <tr> 
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$order_product->product->product_name}}</td>
                            <td>{{$order_product->order->id}}</td>
                            <td>{{ $order_product->order->user->name }}</td>
                            @if (Auth::user()->role == 'admin')
                            <td>{{ $order_product->product->user->name }}</td>
                            @endif
                            <td>{{date('M j, Y, g:i a',strtotime($order_product->created_at))}}</td>
                            <td>  {{$order_product->order->order_status }} </td>
                            <td>{{$order_product->product_price}}</td>
                            <td>{{$order_product->quantity}}</td>
                            <td>{{ $order_product->total }}</td>     
                            {{-- @if(Auth::user()->role=='admin') --}}
                            <td>   
                            {{-- To show product details --}}
                            <a href="{{route('admin.orders.show',$order_product->order->id)}}" class="btn btn-info btn-block">  
                                Show Order Details
                                <span><i class="typcn typcn-edit"></i></span>
                            </a>
                            </td>
                            {{-- @endif --}}
                            {{-- to delete using ajax request --}}
                                    {{-- <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <button id="deleteOrder" data-id="{{ $order->id }}" class="btn btn-danger btn-block mt-2" onclick="deleteOrder({{ $order->id }})">Delete
                                    <span><i class="typcn typcn-trash"></i></span
                                    </button>
                                </td> --}}
                        </tr>
                            @endforeach
                    </table>
                    <div class="mt-4">
                        {{$order_items->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>    
</x-admin.layout>