<x-app-layout>

all items


<table>

    <th>
        Name
    </th>

    <th>
        Category
    </th>

    <th>
        Price
    </th>

    @foreach ($items as $item)

    <tr>
        <td> {{$item->name}}</td>
   
        <td> {{$item->category}}</td>

        <td> {{$item->price}}$</td>

        <td>
            <form action="{{route("admin.delete", $item->id)}}" method="post">
                @csrf
                <button type="submit">Delete</button>
            </form>
        </td>

        <td>
            <a href="">Edit</a>
        </td>
    </tr>
    
    @endforeach
    
</table>
{{$items->links()}}

</x-app-layout>