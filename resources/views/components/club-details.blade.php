<div>

    @props(['name', 'image', 'description', 'position'])

    <div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 max-w-xl mx-auto">

        <h1 class="font-bold text-black-600 mb-2" style="font-size: 2rem;">{{$name}}</h1>

        <h2 class="text-gray-500 text-sm italic mb-4" style="font-size: 1rem;"> Club Position: {{$position}}</h2>

        <div class="overflow-hidden rounded-lg mb-4 flex justify-center">
            <img src="{{ asset('images/clubs/' . $image)}}" alt="{{$name}}"
            class="w-full max-w-xs h-auto object-cover">
        </div>



        <h3 class="text-gray-800 font-semibold mb-2" style="font-size: 1rem;">Description:</h3>
        <p class="text-gray-700 leading relaxed" style="font-size: 2rem;">{{$description}}</p>

    </div>
