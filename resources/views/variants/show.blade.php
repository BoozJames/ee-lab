
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Variant Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-lg font-medium text-gray-800">Item Variant Information</div>
                    </div>
                    
                    <div class="grid grid-cols-5 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Item:</label>
                            <p class="mt-1 text-sm text-gray-900">
                                {{ $variant->item->name }} - {{ $variant->item->description }}
                            </p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Description:</label>
                            <p class="mt-1 text-sm text-gray-900">
                            {{ $variant->variant_description }} 
                            </p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Brand:</label>
                            <p class="mt-1 text-sm text-gray-900">
                            {{ $variant->brand }} 
                            </p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Equipment Label:</label>
                            <p class="mt-1 text-sm text-gray-900">
                                {{ $variant->equipment_label }} 
                            </p>
                        </div>
                            <div class="flex items-center justify-end">
                            <a href="{{ route('variants.edit', $variant->id) }}"
                                class="text-green-500 hover:text-green-700 mr-2">Edit</a>
                            <form action="{{ route('variants.destroy', $variant->id) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete('{{ $variant->id }}')" class="text-red-500 hover:text-red-700">Delete</button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-5 gap-4 mt-5">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Serial Number:</label>
                            <p class="mt-1 text-sm text-gray-900">
                            {{ $variant->serial_number }} 
                            </p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Category:</label>
                            <p class="mt-1 text-sm text-gray-900">
                            {{ $variant->category->name }} 
                            </p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Unit:</label>
                            <p class="mt-1 text-sm text-gray-900">
                                {{ $variant->unit->name }} 
                            </p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status:</label>
                            <p class="mt-1 text-sm text-gray-900">
                                {{ $variant->status }} 
                            </p>
                        </div>
                    </div>
                    <div class="grid grid-cols-5 gap-4 mt-5">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Last Calibration Date:</label>
                            <p class="mt-1 text-sm text-gray-900">
                                {{ $variant->last_calibration_date ? \Carbon\Carbon::parse($variant->last_calibration_date)->format('m-d-Y') : '-' }}
                            </p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Image:</label>
                            <p class="mt-1 text-sm text-gray-900">
                                <img src="{{ $variant->image }}" alt="item_image" style="max-width: 100px; max-height: 100px;">
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this variant?')) {
            // Proceed with the delete action
            document.querySelector(`form[action="{{ route('variants.destroy', ':id') }}"]`.replace(':id', id)).submit();
        }
    }
</script>