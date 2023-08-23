<x-app-layout>
    <div class="mt-16">

        @if (auth()->user()->roles == "user")

        <div class="w-3/4 h-1/3 mx-auto flex">

            <div class="w-3/4 h-96 ">
                <img src="{{Storage::url($item->image)}}" alt="{{$item->name}}" class="w-full h-full object-cover">
                
            </div>
            
            <div class="w-2/4" style="background-color:#F75C1E;">
                
                <h3 class="font-bold pt-10 pl-10 text-5xl text-white">
                    {{ ucfirst ($item->name)}}
                </h3>
                
                <p class="text-xl pl-10 text-3xl text-white "> {{$item->price}}$</p>
                <p class="pt-10 pl-10 text-white"> {{ ucfirst ($item->description)}}</p>
                
                <form action="{{route("order.store")}}" method="POST" class="pt-10 pl-10">
                    @csrf
                    <label for="qty" class="text-lg text-white">Quantity:</label>
                    <input type="text" name="qty" value="1" class="w-8">
                    
                    <input type="integer" name="item_id" value="{{$item->id}}" hidden>  
                    
                    <button type="submit" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                        Add to cart
                    </button>
                    
                </form>
                </div>
                
        @else

        <div class="w-2/4 mx-auto flex flex-col">

            
            <form action="{{route("admin.update")}}" method="POST" class="bg-white rounded-lg">
                <h1 style="text-transform: capitalize;" class="text-2xl text-center my-8 tracking-wide text-gray-900 font-semibold"> {{$item->name}}</h1>
                
                @csrf
                <div class="w-2/4 pt-5 mx-auto flex flex-col">
                    
                    <label for="name" class="mt-5 tracking-wide text-gray-900 font-semibold">Name</label>
                    <input type="text" name="name" value="{{$item->name}}">
                    <input type="" name="id" value="{{$item->id}}" hidden>
                    
                <label for="description" class="mt-5 tracking-wide text-gray-900 font-semibold">Description</label>
                <textarea type="text" rows="5" cols="50" name="description" value="{{$item->description}}">{{$item->description}}</textarea>

            
                     
                <label for="price" class="mt-5 tracking-wide text-gray-900 font-semibold">Price</label>
                <input type="text" name="price" value="{{$item->price}}">    
                

                <input type="text" name="category" value="{{$item->category}}" hidden>
                
                <input type="text" value="{{$item->food_sub_category_id}}" name="" id="" name="drink_sub_category_id" hidden>
                <input type="text" value="{{$item->drink_sub_category_id}}" name="drink_sub_category_id" id="" hidden>  
                
                 </div>
                 <div class="flex justify-center">
                     <button type="submit" style="background-color: #0080F6; color:azure;" class=" my-8 mr-4 font-semibold py-3 px-6 rounded shadow"> Edit</button>
                 </div>
            </form>
        @endif
        </div>
</div>  
</x-app-layout>