

@props(['image', 'name', 'description', 'position'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">

    <h1 class="font-bold text-black-600 mb-2" style="font-size: 1.5rem;">{{$name}}</h1>

    <h2 class="text-gray-500 text-sm italic mb-4" style="font-size: 1rem;"> Club Position: {{$position}}</h2>

    <img src="{{asset('images/clubs/' . $image)}}">

    <h3 class="text-lg">{{$description}}</h3>
</div>


