<x-app-layout>

    <div class="w-2/4 mx-auto bg-white rounded-lg mt-16 px-5 py-8">
        <div class="flex gap-8 py-2.5">
    
            <form action="{{route("items")}}" method="GET">
                <!--input type="text" name="food" /-->
                <button type="text" name="food" value="food" class="mr-3 bg-blue-300 hover:bg-yellow-300 text-gray-800 font-semibold py-2 px-6">Food</button>
            </form>
        
            <form action="{{route("items")}}" method="GET" class="">
                <button type="text" name="drink" value="drink" class="mr-3 bg-yellow-300 hover:bg-yellow-300 text-gray-800 font-semibold py-2 px-6">Drink</button>
            </form>
        </div>
    
    
        <table class="w-3/4 mx-auto">
            <tr>
                <th>Name</th>
                <th>Created_at</th>
                <th>Delete</th>
            </tr>
            
            @foreach ($items as $item)
            
            <span>
                <tr>
                    <td>
                        <a href="{{route("singleItem", $item->id)}}">{{$item->name}}</a>
                    </td>
    
                    <td>
                        {{$item->created_at}}
                    </td>
                    
                    <td>
                        <form action="{{route("item.destroy", $item->id)}}" method="post" >
                            @csrf
                            <button type="submit" class="bg-red-500 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            </span>
            
            @endforeach
        </table>

    </div>


</x-app-layout>