<div>

    @props(['action', 'method', 'club'])

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
                value="{{ old('name', $club->name ?? '') }}"
                required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            >
            @error('name')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Position Input  -->

        <div class="mb-4">
            <label for="position" class="block text-sm text-gray-700">Position</label>
            <input
                type="text"
                name="position"
                id="position"
                value="{{ old('position', $club->position ?? '') }}"
                required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            >
            @error('position')
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
            >
            @error('description')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Image Upload -->
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Club Image</label>
            <input
                type="file"
                name="image"
                id="image"
                {{ isset($club) ? '' : 'required' }}
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            >
            @error('image')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Preview Existing Image -->
        @isset($club->image)
            <div class="mb-4">
                <img src="{{ asset('images/clubs/' . $club->image) }}" alt="$club->image" class="w-24 h-32 object-cover">
            </div>
        @endisset

        {{-- Submit Button --}}
        <div>
            <x-primary-button>
                {{ isset($club) ? 'Update Club' : 'Add Club' }}
            </x-primary-button>
        </div>
    </form>
</div>
