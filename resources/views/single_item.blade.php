<x-app-layout>

    <div>
 

        @if (auth()->user()->roles == "user")
        <div class="w-1/2 mx-auto border border-red-500 flex">

            <div class="w-2/4">
                
                <img src="{{Storage::url($item->image)}}" alt="{{$item->name}}">
            </div>

            <div class="w-2/4">
                
                <h3>
                    Name: {{$item->name}}
                 </h3>
         
                 <p> Description: {{$item->description}}</p>
                 <p> Price: {{$item->price}}$</p>
                <form action="{{route("order.store")}}" method="POST">
        
                    @csrf
                    <label for="qty">Quantity:</label>
                    <input type="text" name="qty" value="1" class="w-8">
                
                    <input type="integer" name="item_id" value="{{$item->id}}">  
                    <button>Add to cart</button>
            </div>
            </form>
            
        </div>
        
        @else

        <div class="w-3/4 mx-auto border border-red-500 flex flex-col">

            <h1> Edit item {{$item->name}}</h1>
            <form action="{{route("admin.update")}}" method="POST">
                
                @csrf
                <div class="w-1/2 pt-10 mx-auto border border-red-500 flex flex-col">
                    
                    <label for="name">name</label>
                    <input type="text" name="name" value="{{$item->name}}">
                    <input type="" name="id" value="{{$item->id}}" hidden>
                    
                <label for="description">description</label>
            
                <textarea type="text" rows="5" cols="50" name="description" value="{{$item->description}}">{{$item->description}}</textarea>

                
                    
                <label for="price">price</label>
                <input type="textarea" name="price" value="{{$item->price}}">    
                <label for="category">Category</label>
                <input type="radio" name="category" value="food">Food
                <input type="radio" name="category" value="drink">Drink
            
               <label for="food_sub_category">food_sub_category</label>
                <select name="food_sub_category" id="">
                    <option value="">not food</option>
                    <option value="pizza">pizza</option>
                    <option value="hamburger">hamburger</option>
                    <option value="salad">salad</option>
                </select>
            
               <label for="drink_sub_category">drink_sub_category</label>
                <select name="drink_sub_category" id="">
                    <option value="">not drink</option>
                    <option value="juice">juice</option>
                    <option value="coffee_tea">hot drinks</option>
                    <option value="alcohol">alcohol</option>
                    <option value="carbonated_drink">carbonated_drink</option>
                </select>    
                
                 </div>
                 <div class="flex justify-center">
                     <button type="submit" class="bg-blue"> Edit</button>
                 </div>
            </form>
        @endif
        </div>
</div>  
</x-app-layout>