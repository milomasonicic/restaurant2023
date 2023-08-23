<x-app-layout>
    
    
    <div class="w-3/4 mx-auto">
        <h2  class="text-4xl pt-16 pb-5 uppercase text-4xl font-mono pt-24 pb-5 tracking-wide text-gray-900 font-semibold">{{str_replace("_", " ", $heading)}}</h2>
        
        <div class="flex flex-wrap gap-8">
            
            @foreach ($drinks as $drink)
            <div>
                <a href="{{route("singleItem", $drink->id)}}">
                    <div class="w-52 h-48"> 
                        <img src="{{Storage::url($drink->image)}}" alt="{{$drink->name}}" class="w-full h-full object-cover">
                    </div> 
                    <h3 style="text-transform: capitalize;"  class="text-xl tracking-wide text-gray-900 font-semibold">
                        {{$drink->name}}
                    </h3>        
                </a>
            </div> 
            @endforeach

        </div>
    
    </div>  
    
               
</x-app-layout>