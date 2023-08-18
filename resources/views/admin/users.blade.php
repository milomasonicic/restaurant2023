<x-app-layout>
    <table>
        <tr>
            <th>name</th>
            <th>email</th>
            <th>role</th>
        </tr>

        @foreach ($users as $user)
        <tr>
            <form action="{{route("user.update", $user->name)}}" method="POST">
                @csrf
            <td> <input type="text" value="{{$user->name}}" name="name"></td>
            <td> <input type="text" value="{{$user->email}}" name="email"></td>
            <td> <select name="roles">
                
                <option value="admin" {{$user->roles =="admin" ? "selected":""}}>admin</option>
                <option value="user" {{$user->roles =="user" ? "selected":""}}>user</option>
            </select> </td>
            <td> <input type="" value="{{$user->id}}" name="id" hidden></td>

            <td>
                <button type="submit">Edit</button>
            </td>
            </form>

            <td>
                <form action="{{route("delete.user",$user->id )}}" method="POST">
                    @csrf
                    
                    <button type="submit">Delete</button>
                </form>
            </td>

        </tr>
            
        @endforeach
    </table>


</x-app-layout>