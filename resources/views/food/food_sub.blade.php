<x-app-layout>
    
    <div class="w-3/4 mx-auto">
        
        <h2 class="text-4xl pt-16 pb-5">{{$heading}}</h2>
        
        <div class="flex flex-wrap gap-8">
            
            @foreach ($foods as $food)
            <div>
                
                <a href="{{route("singleItem", $food->id)}}">
                    
                    {{Storage::url($food->image)}}
                    <img src="{{Storage::url($food->image)}}" alt="{{$food->name}}" class= "h-36" >
                    <h3>
                        Name: {{$food->name}}
                    </h3>        
                </a>
            </div>        
            @endforeach
        </div>
    
    </div>    

</x-app-layout>