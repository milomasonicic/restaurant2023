<x-app-layout>

    <div class="w-3/4 mx-auto">
        <div class="flex gap-8 py-2.5">
    
            <form action="{{route("items")}}" method="GET">
                <!--input type="text" name="food" /-->
                <button type="text" name="food" value="food">Food</button>
            </form>
        
            <form action="{{route("items")}}" method="GET">
                <button type="text" name="drink" value="drink">Drink</button>
            </form>
        </div>
    
    
        <table>
            <tr>
                <th>Name</th>
                <th>created_at</th>
                <th>delete</th>
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
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            </span>
            
            @endforeach
        </table>

    </div>


</x-app-layout>