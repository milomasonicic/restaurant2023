<x-app-layout>
    <h1>Orders</h1>
    
    <table>
        
        <tr>
            <th>order_id</th>
            <th>order_total</th>
            <th>user</th>
        </tr>
        
        @foreach ($orders as $order)
        
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->total}}$</td>
            <td>
               @if ($order->user)
               {{$order->user->name}}
               @else

               User deleted
                      
               @endif
                
            </td>

        </tr>
    @endforeach

</table>

</x-app-layout>