

    @props(['action', 'method', 'player'])

    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if($method === 'PUT' || $method === 'PATCH')
            @method($method)
        @endif

        <!-- Name Input -->
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

        <!-- Position Input  -->

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

        <!-- Description Input -->

        <div class="mb-4">
            <label for="description" class="block text-sm text-gray-700">Description</label>
            <input
                type="text"
                name="description"
                id="description"
                value="{{ old('description', $club->description ?? '') }}"
                required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            />
            @error('description')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Submit Button --}}
        <div>
            <x-primary-button>
                {{ isset($club) ? 'Update Club' : 'Add Club' }}
            </x-primary-button>
        </div>
    </form>

