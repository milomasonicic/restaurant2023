<x-app-layout>

    <div class="w-3/4 mx-auto bg-white rounded-lg mt-16 px-5 py-8">

        <h1 class="text-center text-xl">Orders</h1>
        
        <table class="w-2/4 mx-auto">
            
            <tr>
                <th>Order_id</th>
                <th>Order_total</th>
                <th>User</th>
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
    {{$orders->links()}}
    </div>


</x-app-layout>