<x-admin.layout>
    <div class="az-content az-content-dashboard">
        <div class="container">
          <div class="az-content-body">
                <a href="{{route('admin.users.create')}}">Create Products</a>
                <div class="table-responsive">
                <table class="table table-hover mg-b-0">
                    <tr>
                        <td>S.N.</td>
                        <td>Order No</td>
                        <td>Maker</td>
                        <td>Date</td>
                        <td>Status</td>
                        <td>Total Items</td>
                        <td>Total Price</td>
                        <td>Actions</td>
                    </tr>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$order->id}}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{date('M j, Y, g:i a',strtotime($order->created_at))}}</td>
                        <td>  {{$order->order_status }} </td>
                        <td>{{$order->orderItems->count()}}</td>
                        <td>{{ $order->total_price }}</td>  
                        <td>
                            <a href="{{route('admin.orders.show',$order->id)}}">Order Details</a>
                            <form method="POST" action="{{route('admin.orders.destroy',$order->id)}}"> 
                                @method('DELETE')
                                @csrf
                                <a href="#"onclick="event.preventDefault();
                                this.closest('form').submit();">Delete</a>
                            </form>
                        </td>
                    </tr>  
                    @endforeach
                </table>
                </div>
                <div class="mt-5 d-flex justify-center mx-auto">
                    {{ $orders->links('pagination::bootstrap-4') }}
                </div>
          </div>
        </div>
    </div>
</x-admin.layout>