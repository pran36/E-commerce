<x-admin.layout>
    <div class="az-content az-content-dashboard">
        <div class="container">
          <div class="az-content-body">
                <a href="{{route('admin.products.create')}}">Create Products</a>
                <div class="table-responsive">
                <table class="table table-hover mg-b-0">
                    <tr>
                        <td>S.N</td>
                        <td>Products</td>
                        <td>Description</td>
                        <td>Price</td>
                        <td>Action</td>
                    </tr>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>{{substr($product->product_desc,0,50)}}</td>
                        <td>{{$product->price}}</td>
                        <td>
                            <a href="{{route('admin.products.edit',$product->id)}}">Edit</a>
                            <form method="POST" action="{{route('admin.products.destroy',$product->id)}}"> 
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
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>
          </div>
        </div>
    </div>
</x-admin.layout>