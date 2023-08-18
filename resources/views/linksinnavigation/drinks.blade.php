<x-app-layout>

    <h2>Juice</h2> 
    <div class="flex flex-wrap">
    
        @foreach ($juices as $juice)
        <div>
            <a href="{{route("singleItem", $juice->id)}}">
                <img src="{{$juice->image}}" alt="">
                <h3>
                    Name: {{$juice->name}}
                </h3>        
            </a>
        </div> 
                   
        @endforeach
    
    </div>   

    <div class="flex flex-wrap">
    
        @foreach ($alcohols as $alcohol)
        <div>
            <a href="{{route("singleItem", $alcohol->id)}}">
                <img src="{{$alcohol->image}}" alt="">
                <h3>
                    Name: {{$alcohol->name}}
                </h3>        
            </a>
        </div> 
                   
        @endforeach

    </div>   

    
    <div class="flex flex-wrap">
    
        @foreach ($coffie_tea as $cofie)
        <div>
            <a href="{{route("singleItem", $cofie->id)}}">
                <img src="{{$cofie->image}}" alt="">
                <h3>
                    Name: {{$cofie->name}}
                </h3>        
            </a>
        </div> 
                   
        @endforeach

    </div>   

    <div class="flex flex-wrap">
    
        @foreach ($carbonates as $carbonate)
        <div>
            <a href="{{route("singleItem", $carbonate->id)}}">
                <img src="{{$carbonate->image}}" alt="">
                <h3>
                    Name: {{$carbonate->name}}
                </h3>        
            </a>
        </div> 
                   
        @endforeach

    </div>   

    
    
</x-app-layout>