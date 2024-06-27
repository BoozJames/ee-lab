<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Request Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <p class="font-semibold">Reference Number:</p>
                        <p>{{ $request->reference_number }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="font-semibold">Items:</p>
                        <ul>
                            @foreach ($request->items as $item)
                                @if (is_array($item) && empty($item['options']))
                                    <li>{{ $item['name'] }} | {{ $item['qty'] }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="mb-4">
                        <p class="font-semibold">Requestors:</p>
                        <ul>
                            @foreach ($request->requestors as $requestor)
                                @if (is_array($requestor) && !empty($requestor))
                                    <li>{{ $requestor['first_name'] }}
                                        @if (!empty($requestor['middle_name']))
                                            {{ $requestor['middle_name'] }}
                                        @endif
                                        {{ $requestor['last_name'] }}
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    {{-- Saved Item Variants --}}
                    <div class="mb-4">
                        <p class="font-semibold">Item Variants:</p>
                        @if (!empty($savedItemVariants) && !empty($itemVariants))
                            <ul class="list-disc pl-5 mt-1 text-gray-900">
                                @foreach ($savedItemVariants as $savedVariantId)
                                    @php
                                        $savedVariant = $itemVariants->firstWhere('item_id', $savedVariantId);
                                    @endphp
                                    @if ($savedVariant)
                                        <li>{{ $savedVariant->brand }} - {{ $savedVariant->variant_description }}</li>
                                    @else
                                        <li class="text-red-500">Variant with ID {{ $savedVariantId }} not found.</li>
                                    @endif
                                @endforeach
                            </ul>
                        @else
                            <p class="text-red-500">No item variants available.</p>
                        @endif
                    </div>

                    <div class="mb-4">
                        <p class="font-semibold">Created At:</p>
                        <p>{{ $request->created_at }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="font-semibold">Updated At:</p>
                        <p>{{ $request->updated_at }}</p>
                    </div>
                    <!-- Add more details as needed -->
                    <div class="flex items-center justify-end">
                        <a href="{{ route('requests.edit', $request->id) }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2">Edit</a>
                        <form action="{{ route('requests.destroy', $request->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                onclick="return confirm('Are you sure you want to delete this request?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
