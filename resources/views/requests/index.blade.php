<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Requests') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-hidden overflow-x-auto p-6 bg-white border-b border-gray-200">
                    <div class="min-w-full align-middle">
                        <div class="my-2 bg-white">
                            <div class="flex flex-wrap items-center justify-between">
                                <form method="GET" action="{{ route('requests.index') }}"
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
                                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Reference
                                            Number</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span
                                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Items</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span
                                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Requestors</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span
                                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Status</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span
                                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Actions</span>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                @foreach ($requests as $request)
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $request->reference_number }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            @if (is_array($request->items))
                                                @foreach ($request->items as $item)
                                                    @if (is_array($item) && empty($item['options']))
                                                        <p>{{ $item['name'] }} | {{ $item['qty'] }}</p>
                                                    @endif
                                                @endforeach
                                            @else
                                                <p>No items available.</p>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            @if (is_array($request->requestors))
                                                @foreach ($request->requestors as $requestor)
                                                    @if (is_array($requestor) && !empty($requestor))
                                                        <p>{{ $requestor['first_name'] }} @if (!empty($requestor['middle_name']))
                                                                {{ $requestor['middle_name'] }}
                                                            @endif {{ $requestor['last_name'] }}
                                                        </p>
                                                    @endif
                                                @endforeach
                                            @else
                                                <p>No requestor information available.</p>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            <p>{{ $request->completed ? 'Returned' : 'Borrowed' }}</p>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            <a href="{{ route('requests.show', $request->id) }}"
                                                class="text-blue-500 hover:text-blue-700 mr-2">Show</a>
                                            <a href="{{ route('requests.edit', $request->id) }}"
                                                class="text-green-500 hover:text-green-700 mr-2">Edit</a>
                                            <form action="{{ route('requests.destroy', $request->id) }}" method="POST"
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
                        {{ $requests->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
