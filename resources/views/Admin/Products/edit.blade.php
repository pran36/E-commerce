<x-admin.layout>
    <div class="az-content az-content-dashboard">
        <div class="container">
          <div class="az-content-body">
              {{-- @can('update-product', $products) --}}
                <form action="{{route('admin.products.update',$products->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    Product Name: <input type="text" name="product_name" class="form-control" value="{{$products->product_name}}"><br>
                    Product Description : <textarea name="product_desc" id="" cols="30" rows="10" class="form-control">{{$products->product_desc}}</textarea><br>
                    Price: <input type="text" name="price" class="form-control" value="{{$products->price}}"><br>
                    Category: 
                    {{-- <x-forms.select name="category_id" id="" class="form-control">
                        <option value="0">Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </x-forms.select> --}}
                        <select name="category_id" id="" id="dropdownMenuButton" class="btn btn-secondary dropdown-toggle">
                            <option value="0" class="dropdown-item">Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" class="dropdown-item" {{$category->id == $products->category_id ? "selected":'' }}>{{$category->category_name}}</option>
                            @endforeach
                        </select><br><br>
                        <input type="submit" name="submit" value="Update" class="btn btn-gray-700 btn-block">
                </form>
              {{-- @endcan --}}
          </div>
        </div>
    </div>
</x-admin.layout>