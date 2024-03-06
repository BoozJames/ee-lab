<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
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
                            <a href="{{ route('users.create') }}" class="mb-2 py-2 px-4 bg-gray-300 rounded">Create
                                User</a>
                        </div>
                    </nav>
                    <div class="min-w-full align-middle">
                        <div class="my-2 bg-white">
                            <div class="flex flex-wrap items-center justify-between">

                                <form method="GET" action="{{ route('users.index') }}"
                                    class="flex flex-wrap items-center">
                                    <select name="role" class="mr-2 rounded">
                                        <option value="">Select Filter</option>
                                        <option value="0">Super Admin</option>
                                        <option value="1">Admin</option>
                                        <option value="2">User</option>
                                    </select>
                                    <button type="submit" class="bg-gray-300 px-4 py-2 rounded">Filter</button>
                                </form>

                                <form method="GET" action="{{ route('users.index') }}"
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
                                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span
                                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span
                                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Actions</span>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                @foreach ($users as $user)
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $user->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $user->email }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            <a href="{{ route('users.show', $user->id) }}"
                                                class="text-blue-500 hover:text-blue-700 mr-2">Show</a>
                                            <a href="{{ route('users.edit', $user->id) }}"
                                                class="text-green-500 hover:text-green-700 mr-2">Edit</a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST"
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
                        {{ $users->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function resetFilters() {
        // Replace "users.index" with the appropriate route to reset filters
        window.location.href = "{{ route('users.index') }}";
    }
</script>
