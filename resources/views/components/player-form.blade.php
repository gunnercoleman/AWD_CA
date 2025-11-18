

    @props(['action', 'method', 'player'])

    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if($method === 'PUT' || $method === 'PATCH')
            @method($method)
        @endif

        <!-- Player Name Input -->
        <div class="mb-4">
            <label for="name" class="block text-sm text-gray-700">Name</label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name', $player->name ?? '') }}"
                required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            />
            @error('name')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Players Age Input  -->

        <div class="mb-4">
            <label for="age" class="block text-sm text-gray-700">Age</label>
            <input
                type="number"
                name="age"
                id="age"
                value="{{ old('age', $player->age ?? '') }}"
                required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            />
            @error('age')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Player Position Input -->

        <div class="mb-4">
            <label for="position" class="block text-sm text-gray-700">Position</label>
            <input
                type="text"
                name="position"
                id="position"
                value="{{ old('position', $player->position ?? '') }}"
                required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            />
            @error('position')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Goals Input -->

        <div class="mb-4">
            <label for="goals" class="block text-sm text-gray-700">Goals</label>
            <input
                type="number"
                name="goals"
                id="goals"
                value="{{ old('goals', $player->goals ?? '') }}"
                required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            />
            @error('goals')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Assits Input -->

        <div class="mb-4">
            <label for="assits" class="block text-sm text-gray-700">Assits</label>
            <input
                type="number"
                name="assits"
                id="assits"
                value="{{ old('assits', $player->assits ?? '') }}"
                required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            />
            @error('assits')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>        

        {{-- Submit Button --}}
        <div>
            <x-primary-button>
                {{ isset($player) ? 'Update Player' : 'Add Player' }}
            </x-primary-button>
        </div>
    </form>

