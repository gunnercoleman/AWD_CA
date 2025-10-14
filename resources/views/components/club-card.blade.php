

@props(['image', 'name', 'description'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">

    <img src="{{asset('images/clubs/' . $image)}}">
    <h4 class="font-bold text-lg">{{$name}}</h4>
    <h3 class="text-lg">{{$description}}</h3>
</div>


