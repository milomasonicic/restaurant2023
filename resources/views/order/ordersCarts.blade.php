<x-app-layout> 

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        @foreach($carts as $cart)
                            <h1>Name: {{ $cart->item->name }}</h1>
                            <p> Price: {{ $cart->item->price }}</p>
                            <p> Qty:  <form action="{{ route("cart.qty", $cart->id)}}" method="POST">
                            @csrf
                            <input type="integer" value="{{ $cart->qty }}" name="qty"> 
                            <button type="submit">Edit</button>   
                            </form></p>
                            <img src="{{Storage::url($cart->item->image)}}" 
                            alt="{{$cart->item->name}}" class="h-24">
                            <td>
                                <form action="{{route("cart.delete", $cart->id)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-red-500">Delete</button>
                                </form>
                            </td>
                            

                            <p>Subtotal: {{ $cart->qty * $cart->item->price }}</p>
                        @endforeach
                        @isset($order)
                         <p>Total: {{ $order->total }}</p>    
                        @endisset   
                    </div>
                </div>
            </div>
        </div>
    </div> 

    @isset($order)
    <form action="{{route("orderFinish")}}" method="post">
        
        @csrf
        <input type="text" value="finished" name="status" hidden> 
        <input type="integer" value="{{ $order->id }}" name="id" hidden> 
        <button type="submit" class="bg-red-500"> Buy </button>

    </form>
    @endisset  



</x-app-layout> 