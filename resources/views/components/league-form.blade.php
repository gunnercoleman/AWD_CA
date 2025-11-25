@props(['action', 'method', 'league', 'clubs' => []])

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
                value="{{ old('name', $league->name ?? '') }}"
                required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            />
            @error('name')
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
                value="{{ old('description', $league->description ?? '') }}"
                required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            />
            @error('description')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Image Upload -->
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">League Image</label>
            <input
                type="file"
                name="image"
                id="image"
                {{ isset($league) ? '' : 'required' }}
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            />
            @error('image')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Clubs -->

        <label for="image" class="block text-sm font-medium text-gray-700">Clubs</label>

        <div class="mt-2 mb-5 space-y-2">
            @foreach($clubs as $club)
                <div class="flex items-center px-5">
                    <input
                        type="checkbox"
                        name="clubs[]"
                        id="club_{{ $club->id }}"
                        value="{{ $club->id }}"
                        @checked(isset($league) && $league->clubs->contains($club->id))
                        class="h-4 w-4 text-blue-600 border-gray-300 rounded"
                    />

                    <label for="club_{{ $club->id }}" class="ml-2 text-sm text-gray-700">
                        {{ $club->name }}
                    </label>
                </div>
            @endforeach
        </div>

        @error('name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror


        {{-- Submit Button --}}
        <div>
            <x-primary-button>
                {{ isset($league) ? 'Update League' : 'Add League' }}
            </x-primary-button>
        </div>
    </form>

