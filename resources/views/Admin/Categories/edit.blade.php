<x-admin.layout>
    <div class="az-content az-content-dashboard">
        <div class="container">
          <div class="az-content-body">
              @if ($errors->any())
                {{-- @dd($errors -> all()) --}}
                <div class='alert alert-danger'>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
                <form action="{{route('admin.categories.update',$category->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    Category Name: <input type="text" name="category_name" class="form-control" value="{{ $category->category_name }}"
                    @error('category_name')
                        class="form-group has-danger mg-b-0"
                    @enderror
                    >
                    @error('category_name')
                        <div class='alert alert-danger'>{{$message}}</div>
                    @enderror
                    <br>
                    Category Description : <textarea name="category_desc" id="" cols="30" rows="10" class="form-control">{{ $category->category_desc }}</textarea><br>
                    {{-- Price: <input type="text" name="price" class="form-control" value="{{ old('price') }}"><br> --}}
                    {{-- Category:  --}}
                    {{-- <x-forms.select name="category_id" id="" class="form-control">
                        <option value="0">Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </x-forms.select> --}}
                        {{-- <select name="category_id" id="" id="dropdownMenuButton" class="btn btn-secondary dropdown-toggle">
                            <option value="0" class="dropdown-item">Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{ $category->id == old('category_id') ? 'selected': ''}} class="dropdown-item">{{$category->category_name}}</option>
                            @endforeach
                        </select><br><br> --}}
                        <input type="submit" name="submit" value="save" class="btn btn-gray-700 btn-block">
                </form>
          </div>
        </div>
    </div>
</x-admin.layout>