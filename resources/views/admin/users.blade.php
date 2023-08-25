<x-app-layout>
    <div class="w-2/4 mx-auto bg-white rounded-lg mt-16 px-5 py-8" id="aroundTabeleDiv">

        <table class="w-3/4 mx-auto" id="usersTable">
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
                    <button type="submit" style="background-color: #0080F6;"  class="text-white font-bold py-2 px-4 rounded">Edit</button>
                </td>
                </form>
    
                <td>
                    <form action="{{route("delete.user",$user->id )}}" method="POST">
                        @csrf
                        
                        <button type="submit" class="bg-red-500 text-white font-bold py-2 px-4 rounded">Delete</button>
                    </form>
                </td>
    
            </tr>
                
            @endforeach
        </table>
    </div>

</x-app-layout>