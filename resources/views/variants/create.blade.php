<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Variant') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('variants.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="item_id" class="block text-sm font-medium text-gray-700">Select Item</label>
                            <select 
                                name="item_id"
                                id="item_id" 
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            >
                                <option value=""></option>
                                @foreach ($items as $item)
                                    <option
                                        value="{{ $item->id }}">{{ $item->name }} - {{ $item->description }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <input type="text" name="variant_description" id="variant_description"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div class="mb-4">
                            <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>
                            <input type="text" name="brand" id="brand"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div class="mb-4">
                            <label for="equipment_label" class="block text-sm font-medium text-gray-700">Equipment Label</label>
                            <input type="text" name="equipment_label" id="equipment_label"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div class="mb-4">
                            <label for="serial_number" class="block text-sm font-medium text-gray-700">Serial Number</label>
                            <input type="text" name="serial_number" id="serial_number"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div class="mb-4">
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                            <select 
                                name="category_id"
                                id="category_id" 
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            >
                                <option value=""></option>
                                @foreach ($categories as $category)
                                    <option
                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="unit_id" class="block text-sm font-medium text-gray-700">Unit</label>
                            <select 
                                name="unit_id"
                                id="unit_id" 
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            >
                                <option value=""></option>
                                @foreach ($units as $unit)
                                    <option
                                        value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="last_calibration_date" class="block text-sm font-medium text-gray-700">Last Calibration Daate</label>
                            <input type="date" name="last_calibration_date" id="last_calibration_date"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select 
                                name="status"
                                id="status" 
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            >
                                <option value=""></option>
                                <option value="Newly Acquired">Newly Acquired</option>
                                <option value="Functional">Functional</option>
                                <option value="Non-Functional">Non-Functional</option>
                                <option value="For Condemn">For Condemn</option>
                                <option value="Defective">Defective</option>
                                <option value="Obsolete">Obsolete</option>
                            </select>
                        </div>
                        
                        <div class="flex items-center justify-end">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
