<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Faculties') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-hidden overflow-x-auto p-6 bg-white border-b border-gray-200">
                    <nav class="flex flex-wrap mb-4">
                        {{-- <a href="#" class="mr-4 mb-2 py-2 px-4 bg-gray-300 rounded">Non-verified</a> --}}
                        {{-- <a href="#" class="mr-4 mb-2 py-2 px-4 bg-gray-300 rounded">Archived</a> --}}
                        <a href="#" onclick="resetFilters()" class="mr-4 mb-2 py-2 px-4 bg-gray-300 rounded">
                            Reset Filters
                            {{-- <i class="fas fa-sync-alt ml-2"></i> --}}
                        </a>
                        <div class="ml-auto">
                            <a href="{{ route('faculties.create') }}" class="mb-2 py-2 px-4 bg-gray-300 rounded">Add
                                Faculty</a>
                        </div>
                    </nav>
                    <div class="min-w-full align-middle">
                        <div class="my-2 bg-white">
                            <div class="flex flex-wrap items-center justify-between">

                                {{-- <form method="GET" action="{{ route('faculties.index') }}"
                                    class="flex flex-wrap items-center">
                                    <select name="role" class="mr-2 rounded">
                                        <option value="">Select Filter</option>
                                        <option value="0">Super Admin</option>
                                        <option value="1">Admin</option>
                                        <option value="2">item</option>
                                    </select>
                                    <button type="submit" class="bg-gray-300 px-4 py-2 rounded">Filter</button>
                                </form> --}}

                                <form method="GET" action="{{ route('faculties.index') }}"
                                    class="flex flex-wrap items-center">
                                    <div class="flex flex-wrap items-center ml-auto">
                                        <input type="text" name="search" placeholder="Search..."
                                            class="mr-2 px-4 py-2 border rounded">
                                        <button type="submit" class="bg-gray-300 px-4 py-2 rounded">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <table class="min-w-full divide-y divide-gray-200 border">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span
                                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Empcode</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span
                                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span
                                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">College
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span
                                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Actions</span>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                @foreach ($faculties as $faculty)
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $faculty->emp_code }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $faculty->prefix_name }}
                                            {{ $faculty->first_name }}
                                            {{ $faculty->middle_name }}
                                            {{ $faculty->last_name }}
                                            {{ $faculty->extra_name }}
                                        </td>
                                        <td>
                                            {{ $faculty->college }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            <a href="{{ route('faculties.show', $faculty->id) }}"
                                                class="text-blue-500 hover:text-blue-700 mr-2">Show</a>
                                            <a href="{{ route('faculties.edit', $faculty->id) }}"
                                                class="text-green-500 hover:text-green-700 mr-2">Edit</a>
                                            <form action="{{ route('faculties.destroy', $faculty->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="confirmDelete('{{ $faculty->id }}')" class="text-red-500 hover:text-red-700">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-2">
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

    function resetFilters() {
        // Replace "items.index" with the appropriate route to reset filters
        window.location.href = "{{ route('faculties.index') }}";
    }
</script>
