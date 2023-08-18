
<x-app-layout>
    
    <div class="w-3/4 mx-auto">
        
        <h2>Create new item</h2>

        
        <form action="{{route("item.store")}}" method="POST" enctype="multipart/form-data">
        <div class="w-1/2 pt-10 mx-auto border border-red-500 flex flex-col">
                @csrf
                <label for="name">Name</label>
                <input type="text" name="name">
                <label for="description">Description</label>
                <textarea name="description" id="" cols="30" rows="10"></textarea>
                
                <div class="w-1/3 flex gap-4 py-4">
                    
                    <label for="category">Category</label>
                    <input type="radio" name="category" value="food">Food
                    <input type="radio" name="category" value="drink">Drink
                </div>

                <div class="w-1/3 flex gap-4 py-4">
                    <label for="food_sub_category_id">food_sub_category</label>
                     <select name="food_sub_category_id" id="">
                        <option value="">not food</option>
                        @foreach ($food_sub_cetegories as $food_sub_cetegory)
                            <option value="{{$food_sub_cetegory->id}}">{{$food_sub_cetegory->food_sub_category}}</option>
                            
                        @endforeach
                         
                     </select>
                </div>

                <div class="w-1/3 flex gap-4 py-4">
                    
                    <label for="drink_sub_category_id">drink_sub_category</label>
                     <select name="drink_sub_category_id" id="">
                         <option value="">not drink</option>
                         @foreach ($drink_sub_cetegories as $d)
                         <option value="{{$d->id}}">{{$d->drink_sub_category}}</option>
                         
                     @endforeach
                     </select>
                </div>

                <div>
                    <label for="price">Price</label>
                    <input type="integer" name="price">
                </div>
                
                <input type="file" class="form-control" name="photo" />
                <button type="submit" class="py-5">Add</button>
            </div> 
    
        </form>
    </div>
    

</x-app-layout>