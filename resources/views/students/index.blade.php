<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-hidden overflow-x-auto p-6 bg-white border-b border-gray-200">
                    <nav class="flex flex-wrap mb-4">
                        <a href="#" onclick="resetFilters()" class="mr-4 mb-2 py-2 px-4 bg-gray-300 rounded">
                            Reset Filters
                        </a>
                        <div class="ml-auto">
                            <a href="{{ route('students.create') }}" class="mb-2 py-2 px-4 bg-gray-300 rounded">
                                Create Student
                            </a>
                        </div>
                    </nav>
                    <div class="min-w-full align-middle">
                        <div class="my-2 bg-white">
                            <div class="flex flex-wrap items-center justify-between">
                                <!-- Search form -->
                                <form method="GET" action="{{ route('students.index') }}"
                                    class="flex flex-wrap items-center">
                                    <input type="text" name="search" placeholder="Search..."
                                        class="mr-2 px-4 py-2 border rounded">
                                    <button type="submit" class="bg-gray-300 px-4 py-2 rounded">Search</button>
                                </form>
                            </div>
                        </div>

                        <table class="min-w-full divide-y divide-gray-200 border">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span
                                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Full
                                            Name</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span
                                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Campus</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span
                                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">College</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span
                                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Program</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span
                                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Actions</span>
                                    </th>
                                </tr>
                            </thead>


                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                @foreach ($students as $student)
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $student->first_name }} {{ $student->middle_name }}
                                            {{ $student->last_name }} {{ $student->extra_name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $student->campus }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $student->college }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $student->program }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            <a href="{{ route('students.show', $student->id) }}"
                                                class="text-blue-500 hover:text-blue-700 mr-2">Show</a>
                                            <a href="{{ route('students.edit', $student->id) }}"
                                                class="text-green-500 hover:text-green-700 mr-2">Edit</a>
                                            <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-500 hover:text-red-700">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-2">
                        {{ $students->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function resetFilters() {
        window.location.href = "{{ route('students.index') }}";
    }
</script>
