<x-app-layout>
    
    <div class="w-3/4 mx-auto">
        
        <h2 class="text-4xl pt-16 pb-5 uppercase text-4xl font-mono pt-24 pb-5 tracking-wide text-gray-900 font-semibold">{{$heading}}</h2>
        
        <div class="flex flex-wrap gap-8">
            
            @foreach ($foods as $food)
            <div>
                
                <a href="{{route("singleItem", $food->id)}}">
                    
                    <div class="w-52 h-48"> 
                        <img src="{{Storage::url($food->image)}}" alt="{{$food->name}}" class="w-full h-full object-cover">
                    </div> 
                    <h3 style="text-transform: capitalize;" class="text-xl tracking-wide text-gray-900 font-semibold">
                        {{$food->name}}
                    </h3>        
                </a>
            </div>        
            @endforeach
        </div>
    
    </div>    

</x-app-layout>