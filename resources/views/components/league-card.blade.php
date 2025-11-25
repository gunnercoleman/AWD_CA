

@props(['image', 'name', 'description'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">

    <h1 class="font-bold text-black-600 mb-2" style="font-size: 1.5rem;">{{$name}}</h1>

    <img src="{{asset('images/leagues/' . $image)}}">

    <h2 class="text-gray-500 text-sm italic mb-4" style="font-size: 1rem;">{{$description}}</h2>


</div>


