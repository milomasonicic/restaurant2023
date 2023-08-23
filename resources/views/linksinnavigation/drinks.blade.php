<x-app-layout>

    <div class="w-full h-96 absolute-inset-0" style="background-image: url( {{asset( "storage/". "backgroundImages/drinkPage.jpg")}}); 
    background-size:cover; background-position:center 15%;"> 
         <div class="bg-gray-800 bg-opacity-50  w-full h-96 flex justify-center items-center ">
            
            <div class="flex justify-center gap-40 items-center">
                <form action="{{route("drinks.all")}}" method="GET">
                    <button  name="drinkType" value="juice" class="mr-4 bg-orange-300 hover:bg-yellow-300 text-gray-800 font-semibold py-3 px-6 rounded shadow">
                       Juice</button>  
                </form>

                <form action="{{route("drinks.all")}}" method="GET">
                    <button name="drinkType" value="coffie" class="mr-4 bg-green-300 hover:bg-yellow-300 text-gray-800 font-semibold py-3 px-6 rounded shadow">
                            Coffie</button>  
                </form>
                
                <form action="{{route("drinks.all")}}" method="GET">
                    <button name="drinkType" value="carbonate_drink" class="mr-4  bg-pink-300 hover:bg-yellow-300 text-gray-800 font-semibold py-3 px-6 rounded shadow">
                        Carbonated drinks</button>  

                </form>

                <form action="{{route("drinks.all")}}" method="GET">
                    <button name="drinkType" value="alcohol" class="mr-4 bg-yellow-300 hover:bg-yellow-300 text-gray-800 font-semibold py-3 px-6 rounded shadow">
                        Alcohol</button>          
                
                </form>

                <form action="{{route("drinks.all")}}" method="GET">
                    
                    <button name="drinkType" value="all" class="mr-4 bg-yellow-300 hover:bg-yellow-300 text-gray-800 font-semibold py-3 px-6 rounded shadow">
                        All</button>          
                </form>
                        
                            
            </div>
        </div> 
    </div>


    @if(count($juices) > 0)
    <div class="w-3/4 mx-auto">
        <h2 class="text-4xl pt-16 pb-5 font-mono pt-12 pb-5 tracking-wide text-gray-900 font-semibold">Juice</h2>  

        <div class="flex flex-wrap gap-8">
            @foreach ($juices as $juice)
                
                <a href="{{route("singleItem", $juice->id)}}">
                    <div class="w-52 h-48"> 
                        <img src="{{Storage::url($juice->image)}}" alt="{{$juice->name}}" class="w-full h-full object-cover">
                    </div> 
                    
                    <h3 style="text-transform: capitalize;" class="text-xl tracking-wide text-gray-900 font-semibold">
                        {{$juice->name}}
                    </h3>        
                </a>
                @endforeach
        </div>        
    
    </div> 
    @endif  

    @if(count($coffie_tea) > 0)
    <div class="w-3/4 mx-auto">
        
        <h2 class="text-4xl pt-16 pb-5 font-mono pt-12 pb-5 tracking-wide text-gray-900 font-semibold">Coffie Tea</h2>  
        <div class="flex flex-wrap gap-8">

            @foreach ($coffie_tea as $cofie)
            <div>
                <a href="{{route("singleItem", $cofie->id)}}">
                    <div class="w-52 h-48"> 
                        <img src="{{Storage::url($cofie->image)}}" alt="{{$cofie->name}}" class="w-full h-full object-cover">
                    </div> 
                    <h3 style="text-transform: capitalize;" class="text-xl tracking-wide text-gray-900 font-semibold">
                        {{$cofie->name}}
                    </h3>        
                </a>
            </div> 
        </div>
        
        @endforeach
        
    </div>
    @endif     
    
    @if(count($carbonates) > 0)
    <div class="w-3/4 mx-auto font-mono pt-12 pb-5 tracking-wide text-gray-900 font-semibold">
        <h2 class="text-4xl pt-16 pb-5">Carbonate drink</h2> 
        <div class="flex flex-wrap gap-8">
            @foreach ($carbonates as $carbonate)
            <div>
                <a href="{{route("singleItem", $carbonate->id)}}">
                    <div class="w-52 h-48"> 
                        <img src="{{Storage::url($carbonate->image)}}" alt="{{$carbonate->name}}" class="w-full h-full object-cover">
                    </div> 
                    <h3 style="text-transform: capitalize;" class="text-xl tracking-wide text-gray-900 font-semibold">
                        {{$carbonate->name}}
                    </h3>        
                </a>
            </div> 
            
            @endforeach

        </div>
        
    </div>
    @endif   
    
    @if(count($alcohols) > 0)
    
    <div class="w-3/4 mx-auto font-mono pt-12 pb-5 tracking-wide text-gray-900 font-semibold">

        <h2 class="text-4xl pt-16 pb-5">Alcohol</h2>
        <div class="flex flex-wrap gap-8">

            @foreach ($alcohols as $alcohol)
            <div>
                <a href="{{route("singleItem", $alcohol->id)}}">
                    <div class="w-52 h-48"> 
                        <img src="{{Storage::url($alcohol->image)}}" alt="{{$alcohol->name}}" class="w-full h-full object-cover">
                    </div> 
                    <h3 style="text-transform: capitalize;" class="text-xl tracking-wide text-gray-900 font-semibold">
                        {{$alcohol->name}}
                    </h3>        
                </a>
            </div> 
                       
            @endforeach
        </div>

    </div>   
    @endif
    
</x-app-layout>