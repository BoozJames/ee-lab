<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Faculty Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-lg font-medium text-gray-800">Faculty Information</div>
                    </div>
                    
                    <div class="grid grid-cols-4 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Emp Code:</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $faculty->emp_code }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Name:</label>
                            <p class="mt-1 text-sm text-gray-900">
                                {{ $faculty->prefix_name }}
                                {{ $faculty->first_name }}
                                {{ $faculty->middle_name }}
                                {{ $faculty->last_name }}
                                {{ $faculty->extra_name }}
                            </p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">College:</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $faculty->college }}</p>
                        </div>
                        <div class="flex items-center justify-end">
                            <a href="{{ route('faculties.edit', $faculty->id) }}"
                                class="text-green-500 hover:text-green-700 mr-2">Edit</a>
                            <form action="{{ route('faculties.destroy', $faculty->id) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete('{{ $faculty->id }}')" class="text-red-500 hover:text-red-700">Delete</button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-4 gap-4 mt-5">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Date Created:</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $faculty->created_at }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Date Last Updated:</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $faculty->updated_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this faculty?')) {
            // Proceed with the delete action
            document.querySelector(`form[action="{{ route('faculties.destroy', ':id') }}"]`.replace(':id', id)).submit();
        }
    }
</script>