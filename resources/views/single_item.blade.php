<x-app-layout>

    <div id="containerDiv">
    
            @if (auth()->user()->roles == "user")

            <div class="w-2/4 h-64 mx-auto mt-16 flex m-3" id="mainDiv">
                     
                    <div class="w-2/4 h-64">
                        <img src="{{Storage::url($item->image)}}" alt="{{$item->name}}" class="w-full h-full object-cover">
                    </div>
                            
                                
                    <div class="w-2/4 h-64" style="background-color:#F75C1E;">
                        
                        <h3 class="font-bold text-white text-3xl mt-8 ml-5" id="title">
                            {{ ucfirst ($item->name)}}
                        </h3>
                        
                        <p class="font-bold text-white text-xl mt-8 ml-5"> {{ ucfirst ($item->description)}}</p>
                        <p class="font-bold text-white text-xl ml-5"> {{$item->price}}$</p>
                        
                    </div>
                </div>
                
                <div class="w-2/4 h-16 mx-auto mt-16" id="formDiv">
                    
                    <form action="{{route("order.store")}}" method="POST" class="flex mx-auto w-2/4" id="addToCartForm">
                    @csrf

                    <div>
                        
                        <label for="qty" class="text-white font-bold" style="color:#F75C1E; font-size:20px">Quantity:</label>
                        <input type="text" name="qty" value="1" class="w-2/4" id="qtyInpput">
                    </div>
                    
                    <input type="integer" name="item_id" value="{{$item->id}}" hidden>  
                    
                    <button type="submit" class="w-2/4 text-white font-bold text-base" style="background-color:#F75C1E;">
                        Add to cart
                    </button>

                    
                    </form>
                     @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li style="color:red;">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                     @endif
                </div>
                
                   
        </div> 
   
        @else

        <div class="w-2/4 mx-auto flex flex-col" id="editSingleItemDiv">

            
            <form action="{{route("admin.update")}}" method="POST" class="bg-white rounded-lg mt-16 mb-16">
                <h1 style="text-transform: capitalize;" class="text-2xl text-center my-8 tracking-wide text-gray-900 font-semibold"> {{$item->name}}</h1>
                
                @csrf
                <div class="w-2/4 pt-5 mx-auto flex flex-col">
                    
                    <label for="name" class="mt-5 tracking-wide text-gray-900 font-semibold">Name</label>
                    <input type="text" name="name" value="{{$item->name}}">
                    @error("name")
                        <p style="color: #F75C1E;">{{$message}}</p>
                    @enderror
                    <input type="" name="id" value="{{$item->id}}" hidden>
                    
                    <label for="description" class="mt-5 tracking-wide text-gray-900 font-semibold">Description</label>
                    <textarea type="text" rows="5" cols="50" name="description" value="{{$item->description}}">{{$item->description}}</textarea>
                    @error("description")
                        <p style="color: #F75C1E;">{{$message}}</p>
                    @enderror
                    
                    <label for="price" class="mt-5 tracking-wide text-gray-900 font-semibold">Price</label>
                    <input type="text" name="price" value="{{$item->price}}">    
                    @error("price")
                        <p style="color: #F75C1E;">{{$message}}</p>
                    @enderror
                    
                    
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