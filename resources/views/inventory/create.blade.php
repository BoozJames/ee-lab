<style>
    #create_btn:disabled {
        background-color: #dddddd; /* Change the background color */
        color: #999999; /* Change the text color */
        cursor: not-allowed; /* Change the cursor */
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Inventory Report
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <nav class="flex flex-wrap mb-4">
                        <div class="ml-auto">
                            <a href="{{ route('inventory.index') }}" class="mb-2 py-2 px-4 bg-gray-300 rounded">Back</a>
                        </div>
                    </nav>

                    <form id="inventory_form" method="POST" action="{{ route('inventory.store') }}">
                        @csrf
                        @method('POST')

                        <div class="flex mb-4">
                            <div class="mr-4 w-1/4">
                                <label for="prepared_by" class="block text-sm font-medium text-gray-700">Prepared By</label>
                                <input required type="text" name="prepared_by" id="prepared_by"
                                    value="{{ Auth::user()->name }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div class="mr-4 w-1/4">
                                <label for="verified_by" class="block text-sm font-medium text-gray-700">Verified By</label>
                                <input required type="text" name="verified_by" id="verified_by"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div class="mr-4 w-1/4">
                                <label for="checked_by" class="block text-sm font-medium text-gray-700">Checked By</label>
                                <input required type="text" name="checked_by" id="checked_by"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            
                            <div class="w-1/4">
                                <label for="noted_by" class="block text-sm font-medium text-gray-700">Noted By</label>
                                <input required type="text" name="noted_by" id="noted_by" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                        </div>

                        <div class="flex mb-4">
                            <div class="mr-4 w-1/4">
                                <label for="prepared_by_designation" class="block text-sm font-medium text-gray-700">Prepared By Designation</label>
                                <input required type="text" name="prepared_by_designation" id="prepared_by_designation"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div class="mr-4 w-1/4">
                                <label for="verified_by_designation" class="block text-sm font-medium text-gray-700">Verified By Designation</label>
                                <input required type="text" name="verified_by_designation" id="verified_by_designation"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div class="mr-4 w-1/4">
                                <label for="checked_by_designation" class="block text-sm font-medium text-gray-700">Checked By Designation</label>
                                <input required type="text" name="checked_by_designation" id="checked_by_designation"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            
                            <div class="w-1/4">
                                <label for="noted_by_designation" class="block text-sm font-medium text-gray-700">Noted By Designation</label>
                                <input required type="text" name="noted_by_designation" id="noted_by_designation" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                        </div>

                        <div class="flex mb-4">
                            <div class="mr-4 w-1/4">
                                <label for="date_prepared_by" class="block text-sm font-medium text-gray-700">Date Prepared </label>
                                <input required type="date" name="date_prepared_by" id="date_prepared_by"
                                    value="{{ date('Y-m-d') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div class="mr-4 w-1/4">
                                <label for="date_verified_by" class="block text-sm font-medium text-gray-700">Date Verified </label>
                                <input type="date" name="date_verified_by" id="date_verified_by"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div class="mr-4 w-1/4">
                                <label for="date_checked_by" class="block text-sm font-medium text-gray-700">Date Checked </label>
                                <input type="date" name="date_checked_by" id="date_checked_by"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            
                            <div class="w-1/4">
                                <label for="date_noted_by" class="block text-sm font-medium text-gray-700">Date Noted </label>
                                <input type="date" name="date_noted_by" id="date_noted_by" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                        </div>

                        <table class="min-w-full divide-y divide-gray-200 border">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Equipment</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Brand</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Equipment Label</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Serial Number</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Status</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Last Calibration Date</span>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                @foreach ($items as $variant)
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                            <a href="/variants/{{ $variant->id }}/edit" style="color: blue;">
                                                {{ $variant->item->name }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $variant->brand }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $variant->equipment_label }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $variant->serial_number }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $variant->status }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            @if ($variant->last_calibration_date)
                                                {{ $variant->last_calibration_date->format('m-d-Y') }}
                                            @else
                                                {{ '' }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-2">
                            {{ $items->links() }}
                        </div>

                        <div class="flex items-center justify-end">
                            <button type="submit"
                                id="create_btn"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-3 rounded focus:outline-none focus:shadow-outline">
                                Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('inventory_form');
            const submitButton = document.getElementById('create_btn');

            submitButton.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default submission

                // Check if form is valid
                if (form.checkValidity()) {
                    Swal.fire({
                        title: 'Confirm Action',
                        text: 'Save Inventory Report?',
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonText: 'Save',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // Submit form if confirmed
                        }
                    });
                } else {
                    // If form is not valid, trigger browser validation
                    form.reportValidity();
                }
            });
        });
    </script>
</x-app-layout>
