
<x-app-layout>
    
    <div class="w-2/4 mx-auto">
        
      
        <form action="{{route("item.store")}}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg">
            <div class="w-3/4 my-8 mx-auto flex flex-col">
                <h2 style="text-transform: capitalize;" class="text-2xl text-center my-8 tracking-wide text-gray-900 font-semibold">Create new item</h2>
                @csrf

                <label for="name" class="mt-5 tracking-wide text-gray-900 font-semibold">Name</label>
                <input type="text" name="name">
                <label for="description" class="mt-5 tracking-wide text-gray-900 font-semibold">Description</label>
                <textarea name="description" id="" cols="30" rows="10"></textarea>
                
                <div class="w-1/3 flex flex-col gap-4 py-4">
                    
                    <label for="category" class="mt-3 tracking-wide text-gray-900 font-semibold">Category</label>
                    <input type="radio" name="category" value="food" id="food">Food
                    <input type="radio" name="category" value="drink" id="drink">Drink
                </div>
                
                <div class="w-1/3 flex gap-4 py-4">
                    <label for="food_sub_category_id" class="mt-5 tracking-wide text-gray-900 font-semibold">Food type</label>
                    <select name="food_sub_category_id" id="food_sub_category">
                        <!--option value="">not food</option-->
                        @foreach ($food_sub_cetegories as $food_sub_cetegory)
                        <option value="{{$food_sub_cetegory->id}}">{{$food_sub_cetegory->food_sub_category}}</option>
                        
                        @endforeach
                        
                    </select>
                </div>
                
                <div class="w-1/3 flex gap-4 py-4">
                    
                    <label for="drink_sub_category_id" class="mt-5 tracking-wide text-gray-900 font-semibold">Drink type</label>
                    <select name="drink_sub_category_id" id="drink_sub_category_id">
                         <!--option value="">not drink</option-->
                         @foreach ($drink_sub_cetegories as $d)
                         <option value="{{$d->id}}">{{$d->drink_sub_category}}</option>
                         
                     @endforeach
                     </select>
                </div>

                <div>
                    <label for="price" class="mt-3 tracking-wide text-gray-900 font-semibold">Price</label>
                    <input type="input" name="price" class="mt-4">
                </div>
                <div class="mt-5">
                    <input type="file" class="form-control" name="photo" />
                </div>

                    <button type="submit" style="background-color: #0080F6; color:azure;" class=" mt-16 mr-4 font-semibold py-3 px-6 rounded shadow">Add</button>
                
            </div> 
    
        </form>
    </div>
    
    
</x-app-layout>

<script> 
console.log("cao")

var drink = document.getElementById("drink");
var food = document.getElementById("food");

console.log(food)

food.addEventListener("change", () => {
    var drink_sub_category_id = document.getElementById("drink_sub_category_id");
    if(food.checked)
    {
        food_sub_category.disabled = false
        drink_sub_category_id.disabled = true
    } else {
        drink_sub_category_id.disabled = false
    }
})

drink.addEventListener("change", () => {
    var food_sub_category = document.getElementById("food_sub_category");
    if(drink.checked)
    {
        drink_sub_category_id.disabled = false
        food_sub_category.disabled = true
    } else {
        food_sub_category.disabled = false
    }
})
   

</script>
