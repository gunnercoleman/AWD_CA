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
