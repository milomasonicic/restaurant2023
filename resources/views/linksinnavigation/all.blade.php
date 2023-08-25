<x-app-layout>

    <div class="w-full h-96  absolute-inset-0" style="background-image: url( {{asset( "storage/". "backgroundImages/mainBackground1.jpg")}}); 
        background-size:cover; background-position:center 15%;"> 
             <div class="bg-gray-800 bg-opacity-50  w-full h-96 flex justify-center items-center ">
                
                <div class="flex-col justify-center items-center">
                    <h1 class="text-6xl text-white font-bold">Lorem ipsum dolor sit <p>amet consectetur.</p> </h1>
                     <button class="bg-yellow-300 hover:bg-yellow-300 text-gray-800 font-semibold py-3 px-6 rounded shadow">
                         Menu</button>   
                </div>
            </div> 
    </div>

    <div class="w-1/2  mx-auto mb-16">
        
        <h2 class="uppercase text-4xl font-mono pt-24 pb-5 tracking-wide text-gray-900 font-semibold">Products</h2>
        <div class="flex flex-wrap gap-6 mx-auto">          
            @foreach ($foods as $food)
            <div class="flex flex-col">
                <a href="{{route("food_sub_category", $food->id)}}" class="text-1xl mt-60 mt-auto">
                    <div class="w-52 h-48"> 
                        <img src="{{asset( "storage/". $food->url)}}" alt="" class="w-full h-full object-cover">
                    </div> 
                    <h1 style="text-transform: capitalize;" class="tracking-wide text-gray-900 font-semibold text-lg">
                        {{$food->food_sub_category}}
                    </h1>
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
                    <h1 style="text-transform: capitalize;" class="tracking-wide text-gray-900 font-semibold text-lg">
                        {{str_replace("_", " ", $drink->drink_sub_category)}}
                    </h1>
                </a> 
            </div>
            @endforeach

        </div>
        
    </div>

</x-app-layout>