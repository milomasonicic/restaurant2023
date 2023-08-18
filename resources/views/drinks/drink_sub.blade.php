<x-app-layout>
    
    <h2>{{$heading}}</h2>

       
    
    @foreach ($drinks as $drink)
    <div>
        <a href="{{route("singleItem", $drink->id)}}">
            <img src="{{$drink->image}}" alt="">
            <h3>
                Name: {{$drink->name}}
            </h3>        
        </a>
    </div> 
               
    @endforeach
</x-app-layout>