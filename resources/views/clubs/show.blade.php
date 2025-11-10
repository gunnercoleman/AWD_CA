<div>
    <x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Clubs') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Club Details</h3>
                    <a href="{{ route('clubs.show', $club) }}">
                        <x-club-details
                            :name="$club->name"
                            :image="$club->image"
                            :description="$club->description"
                            :position="$club->position"
                        />
                    </a>
                <!--
                This is the part in the view where we display the all players with the associated club.

                This uses a foreach loop which will display every player associated with the club,
                displaying their name, age, position, goals and assits.

                If there are no players associated with the club, it will display a message saying No players.
                -->
                <h4 class="font-semibold text-md mt-8">Players</h4>
                @if($club->players->isEmpty())
                    <p class="text-gray-600">No players associated with this club.</p>
                @else
                    <ul class="mt-4 space-y-4">
                        @foreach($club->players as $player)
                            <li class="bg-gray-100 p-4 rounded-lg">
                                <p>Player Name: {{ $player->name }}</p>
                                <p>Age: {{ $player->age }}</p>
                                <p>Position: {{ $player->position }}</p>
                                <p>Goals: {{ $player->goals }}</p>
                                <p>Assits: {{ $player->assits }}</p>

                                @if ($player->user->is(auth()->user()) || auth()->user()->role === 'admin')

                                    <a href="{{ route('players.edit', $player)}}" class="bg-yellow-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">
                                        {{__('Edit Player')}}
                                    </a>

                                    <form method="POST" action="{{ route('players.destroy', $player)}}">
                                        @csrf
                                        @method('Delete')
                                        <x-danger-button :href="route('players.destoy', $player)"
                                                onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{__('Delete Player')}}
                                        </x-danger-button>
                                    </form>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif

                <!--
                This is the part in the view where we add a new player to the associated club.

                It contains a form with fields for the player's name, age, position, goals and assits.

                The form submits to the players.store route, which will handle the logic for adding the player to the database.

                The club_id is passed as a hidden input field to associate the new player with the correct club.
                -->

                <h4 class="font-semibold text-md mt-8">Add a Player</h4>
                <form action="{{ route('clubs.players.store', $club->id) }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="club_id" value="{{ $club->id }}">

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Player Name:</label>
                        <input type="text" name="name" id="name" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label for="age" class="block text-gray-700">Age:</label>
                        <input type="number" name="age" id="age" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label for="position" class="block text-gray-700">Position:</label>
                        <input type="text" name="position" id="position" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label for="goals" class="block text-gray-700">Goals:</label>
                        <input type="number" name="goals" id="goals" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label for="assits" class="block text-gray-700">Assits:</label>
                        <input type="number" name="assits" id="assits" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    </div>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add Player
                    </button>
                </form>



                <div class="mt-4 flex space-x-2">

                    <a href="{{ route('clubs.edit', $club)}}" class="text-gray-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
                        Edit
                    </a>

                    <form action="{{ route('clubs.destroy', $club) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this club?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-gray-600 bg-red-300 hover:bg-red-700 font-bold py-2 px-4 rounded">
                            Delete
                        </button>
                    </form>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
</div>
