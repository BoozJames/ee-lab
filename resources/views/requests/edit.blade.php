<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Request') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('requests.update', $request->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="reference_number" class="block text-sm font-medium text-gray-700">Request
                                Reference Number</label>
                            <input type="text" name="reference_number" id="reference_number"
                                class="bg-gray-200 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                value="{{ $request->reference_number }}" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="items" class="block text-sm font-medium text-gray-700">Items</label>
                            <input type="text" name="items[]" id="items"
                                class="bg-gray-200 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                value="{{ is_array($request->items) ? implode(', ', array_map(fn($item) => $item['name'], array_filter($request->items, fn($item) => empty($item['options']['requestor'])))) : $request->items }}"
                                disabled>
                        </div>
                        <div class="mb-4">
                            <label for="requestors" class="block text-sm font-medium text-gray-700">Requestors</label>
                            <input type="text" name="requestors[]" id="requestors"
                                class="bg-gray-200 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                value="{{ is_array($request->requestors) ? implode(', ', array_map(fn($requestor) => $requestor['first_name'] . ' ' . $requestor['last_name'], array_filter($request->requestors))) : $request->requestors }}"
                                disabled>
                        </div>
                        <div class="mb-4">
                            <label for="item_variants" class="block text-sm font-medium text-gray-700">Item
                                Variants</label>
                            <select name="item_variants[]" id="item_variants" multiple
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach ($itemVariants as $variant)
                                    <option value="{{ $variant->id }}"
                                        {{ is_array($request->item_variants) && in_array($variant->id, json_decode($request->item_variants, true)) ? 'selected' : '' }}>
                                        {{ $variant->brand }} - {{ $variant->variant_description }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="completed" class="block text-sm font-medium text-gray-700">Completed</label>
                            <input type="checkbox" name="completed" id="completed" class="mt-1"
                                {{ $request->completed ? 'checked' : '' }}>
                        </div>
                        <!-- Add more input fields as needed -->
                        <div class="flex items-center justify-end">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
