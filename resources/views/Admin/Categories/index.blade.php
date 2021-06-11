<x-admin.layout>
    <div class="az-content az-content-dashboard">
        <div class="container">
          <div class="az-content-body">
                <a href="/admin/categories/create">Create Category</a>
                <div class="table-responsive">
                    <h1>Categories List</h1>
                <table class="table table-hover mg-b-0">
                    <tr>
                        <td>S.N</td>
                        <td>Products</td>
                        <td>Description</td>
                        <td>Action</td>
                    </tr>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->category_name}}</td>
                        <td>{{substr($category->category_desc,0,50)}}</td>
                        <td>
                            <a href="{{route('admin.categories.edit',$category->id)}}">Edit</a>
                            <form method="POST" action="{{route('admin.categories.destroy',$category->id)}}"> 
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
                    {{ $categories->links('pagination::bootstrap-4') }}
                </div>
          </div>
        </div>
    </div>
</x-admin.layout>