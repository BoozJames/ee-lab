<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Variant') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('variants.update',$variant->id) }}">
                        @csrf
                        @method('PUT')
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
                                        {{ $variant->item_id == $item->id ? 'selected' : '' }}
                                        value="{{ $item->id }}">{{ $item->name }} - {{ $item->description }}</option>
                                @endforeach
                            </select>
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
                                        {{ $variant->category_id == $category->id ? 'selected' : '' }}
                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Item Number</label>
                            <input type="text" name="item_variant_number" id="item_variant_number" value="{{$variant->item_variant_number}}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <input type="text" name="variant_description" id="variant_description" value="{{$variant->variant_description}}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Brand</label>
                            <input type="text" name="brand" id="brand" value="{{$variant->brand}}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label for="unit_id" class="block text-sm font-medium text-gray-700">Unit</label>
                            <select 
                                name="unit_id"
                                id="units_id" 
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            >
                                <option value=""></option>
                                @foreach ($units as $unit)
                                    <option
                                        {{ $variant->unit_id == $unit->id ? 'selected' : '' }}
                                        value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                            </select>
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
                                <option 
                                    {{ $variant->status == 'Functional' ? 'selected' : '' }}  
                                    value="Functional">
                                    Functional
                                </option>
                                <option 
                                    {{ $variant->status == 'Non-Functional' ? 'selected' : '' }}  
                                    value="Non-Functional">
                                    Non-Functional
                                </option>
                            </select>
                        </div>
                        
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
