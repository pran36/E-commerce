<x-admin.layout>
    <div class="az-content az-content-dashboard">
        <div class="container">
          <div class="az-content-body">
                <a href="{{route('admin.users.create')}}">Create Products</a>
                <div class="table-responsive">
                <table class="table table-hover mg-b-0">
                    <tr>
                        <td>S.N</td>
                        <td>Name</td>
                        <td>Role</td>
                        <td>Email</td>
                        <td>Action</td>
                    </tr>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->role}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <a href="{{route('admin.users.edit',$user->id)}}">Edit</a>
                            <form method="POST" action="{{route('admin.users.destroy',$user->id)}}"> 
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
          </div>
        </div>
    </div>
</x-admin.layout>