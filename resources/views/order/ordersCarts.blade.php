<x-app-layout> 

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <table class="w-full">
                            <tr>
                                <th>
                                    Name
                                </th>

                                <th>
                                    Price
                                </th>

                                <th>
                                    Quantity
                                </th>

                                <th>
                                    Image
                                </th>

                                <th>
                                    Delete
                                </th>

                                <th>
                                    Subtotal
                                </th>
                            </tr>



                            @foreach($carts as $cart)
                            <tr>
                                <td class="text-center">
                                    {{ $cart->item->name }}
                                </td>

                                <td class="text-center">
                                    {{ $cart->item->price }}$
                                </td>

                                <td class="text-center">
                                    {{ $cart->qty }} 
                                </td>

                                <td class="w-36 h-36">

                                    <img src="{{Storage::url($cart->item->image)}}" 
                                    alt="{{$cart->item->name}}" class="w-36 h-36 object-cover">
                                    
                                </td>

                                <td class="flex justify-center mt-14">
                                    <form action="{{route("cart.delete", $cart->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-red-500 text-white font-bold py-2 px-4 rounded">Delete</button>
                                    </form>
                                </td>

                                <td class="text-center">
                                    {{ $cart->qty * $cart->item->price }}$

                                </td>
                            </tr>
                            
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    
    </div>

    @if($order->total > 0)
     <p class="text-center text-3xl font-bold">Total: {{ $order->total }}$</p>    
    @endif 
       
    @if($order->total > 0)

    <div class="text-center mt-20">
        <form action="{{route("orderFinish")}}" method="post" >
            
            @csrf
            <input type="text" value="finished" name="status" hidden> 
            <input type="integer" value="{{ $order->id }}" name="id" hidden> 
            
            <button class="w-36 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Buy
            </button>
            
    
        </form>
    </div>
    @endif  




</x-app-layout> 