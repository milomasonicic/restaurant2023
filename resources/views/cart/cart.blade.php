
<x-app-layout>  
<h1>Your Cart</h1>


<table>
    <th>
        Product
    </th>
    <th>
        Quantity
    </th>
    <th>
        Price
    </th>
    <?php
    $totalPrice=0;
    ?>
   /* @foreach ($carts as $cart)
    <tr>
        <td>
            {{$cart->item->name}}      
        </td>
    
        <td>
            {{$cart->qty}}      
        </td>
        <td>
            <?php
        $price = $cart->qty * $cart->item->price;
        echo $price;
        $totalPrice += $price; 
            ?>
        </td>

        <td>
            <form action="{{route("cart.delete", $cart->id)}}" method="POST">
                @csrf
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{$totalPrice}} 

<form action="{{route("order.complete")}}" method="post">
    @csrf
    <input type="text" value="{{$totalPrice}}" name="total" hidden>
    <button>Order</button>
</form>

</x-app-layout>

