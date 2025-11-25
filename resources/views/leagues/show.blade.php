<div>
    <x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Leagues') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">League Details</h3>
                    <a href="{{ route('leagues.show', $league) }}">
                        <x-league-details
                            :name="$league->name"
                            :image="$league->image"
                            :description="$league->description"
                        />
                    </a>

                    @if(auth()->user()->role === 'admin')
                    <div class="border flex space-x-2 rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 max-w-xl mx-auto">
                        
                        <a href="{{ route('leagues.edit', $league)}}" class="text-gray-600 bg-gray-300 hover:bg-red-700 font-bold py-2 px-4 rounded">
                            Edit
                        </a>

                        <form action="{{ route('leagues.destroy', $league) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this club?');">
                            
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-gray-600 bg-red-300 hover:bg-red-700 font-bold py-2 px-4 rounded">
                                Delete
                            </button>
                        </form>

                    </div>
                    @endif

                     <div class="border flex mt-10 mb-10 space-x-2 rounded-lg shadow-md p-6 bg-white justify-center max-w-xl mx-auto">
                        <h1 class="font-bold text-black-600 mb-2" style="font-size: 3rem;">Associated Clubs</h1>
                     </div>

                    <ul class="flex">
                        @foreach($league->clubs as $club)
                        <div>
                                <h1 class="font-bold text-black-600 mb-2" style="font-size: 2rem;">{{ $club->name }}</h1>

                                <h3 class="font-semibold text-lg mb-4">Domestic League Position: {{ $club->position }}</h3>

                                <div class="overflow-hidden rounded-lg flex justify-center mx-10">
                                    <img src="{{ asset('images/clubs/' . $club->image)}}" alt="{{$club->name}}"
                                    class="w-full max-w-xs h-auto object-cover">
                                </div>
                        </div>
                        @endforeach
                    </ul>
                  




            </div>
        </div>
    </div>
</x-app-layout>
</div>
