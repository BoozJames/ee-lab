<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trainer Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-lg font-medium text-gray-800">Category Information</div>
                    </div>
                    
                    <div class="grid grid-cols-4 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Name:</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $category->name }}</p>
                        </div>
                        <div class="flex items-center justify-end">
                            <a href="{{ route('categories.edit', $category->id) }}"
                                class="text-green-500 hover:text-green-700 mr-2">Edit</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete('{{ $category->id }}')" class="text-red-500 hover:text-red-700">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</x-app-layout>

<!-- <script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this category?')) {
            // Proceed with the delete action
            document.querySelector(`form[action="{{ route('categories.destroy', ':id') }}"]`.replace(':id', id)).submit();
        }
    }
</script> -->