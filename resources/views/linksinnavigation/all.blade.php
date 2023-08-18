<x-app-layout>

    <div class="w-1/2  mx-auto py-96">
        
        <h2 class="uppercase text-3xl font-mono pt-24 pb-5">Products</h2>
        <div class="flex flex-wrap gap-6 mx-auto">          
            @foreach ($foods as $food)
            <div class="flex flex-col">
                <a href="{{route("food_sub_category", $food->id)}}" class="text-1xl mt-60 mt-auto">
                    <div class="w-52 h-48"> 
                        <img src="{{asset( "storage/". $food->url)}}" alt="" class="w-full h-full object-cover">
                    </div> 
                    {{$food->food_sub_category}}
                </a> 
            </div>
            @endforeach

        </div>

        <div class="flex gap-6 flex-wrap mx-auto">          
            @foreach ($drinks as $drink)
            <div class="flex flex-col">
                <a href="{{route("drink_sub_category", $drink->id)}}" class="text-1xl mt-60 mt-auto">
                    <div class="w-52 h-48"> 
                        <img src="{{asset( "storage/". $drink->url)}}" alt="" class="w-full h-full object-cover">
                    </div> 
                    {{$drink->drink_sub_category}}
                </a> 
            </div>
            @endforeach

        </div>
        
    </div>


</x-app-layout>