<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Trainer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form id="trainerForm" action="{{ route('trainers.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="trainer_name" class="block text-sm font-medium text-gray-700">Trainer Name</label>
                            <input type="text" name="trainer_name" id="trainer_name" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div style="display: flex;">
                            <div style="flex: 1;">
                                <h2><b>Items List</b></h2>
                                <div id="availableItemsList" style="height: 300px; overflow-y: auto; margin-right: 2em;">
                                    @foreach ($items as $item)
                                        <div>
                                            <input type="checkbox" name="selected_items[]" value="{{ $item->id }}" id="item_{{ $item->id }}">
                                            <label for="item_{{ $item->id }}">{{ $item->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div style="flex: 1;">
                                <h2><b>Selected Items</b></h2>
                                <div id="selectedItemsList">
                                    <!-- Selected items will be dynamically added here -->
                                </div>
                            </div>
                        </div>
                        <button type="submit"
                            class="mt-7 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create Trainer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectedItemsList = document.getElementById('selectedItemsList');
        const availableItemsList = document.getElementById('availableItemsList');
        const trainerForm = document.getElementById('trainerForm');
        const arrayItemIds = [];
        const arrayQty = [];

        // Function to move items between columns
        function moveItem(item, moveToSelected) {
            const checkbox = item.querySelector('input[type="checkbox"]');
            const itemId = checkbox.value;
            if (moveToSelected) {
                // Append the parent element of the checkbox (the <div>) to the selected items list
                selectedItemsList.appendChild(item);
                // Create input field for quantity
                const quantityInput = document.createElement('input');
                quantityInput.type = 'number';
                quantityInput.name = 'quantities[' + itemId + ']';
                quantityInput.id = 'quantity_' + itemId;
                quantityInput.placeholder = 'Quantity';
                quantityInput.classList.add('mt-1', 'block', 'w-full', 'rounded-md', 'border-gray-300', 'shadow-sm', 'focus:border-indigo-300', 'focus:ring', 'focus:ring-indigo-200', 'focus:ring-opacity-50');
                quantityInput.addEventListener('input', function () {
                    arrayQty[arrayItemIds.indexOf(itemId)] = this.value;
                });
                quantityInput.required = true;
                selectedItemsList.appendChild(quantityInput);
                // Add item ID and initialize quantity in arrays
                arrayItemIds.push(itemId);
                arrayQty.push(0); // You can set a default quantity here if needed
            } else {
                // Remove the quantity input field
                const quantityInput = document.getElementById('quantity_' + itemId);
                if (quantityInput) {
                    quantityInput.remove();
                }
                // Append the parent element of the checkbox (the <div>) back to the available items list
                availableItemsList.appendChild(item);
                // Remove item ID and quantity from arrays
                const index = arrayItemIds.indexOf(itemId);
                if (index !== -1) {
                    arrayItemIds.splice(index, 1);
                    arrayQty.splice(index, 1);
                }
            }
        }

        // Event listener for checkbox change
        document.querySelectorAll('input[type="checkbox"]').forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                const item = this.parentElement;
                moveItem(item, this.checked); // Move item based on checkbox status
            });
        });

        // Submit event listener for the form
        trainerForm.addEventListener('submit', function () {
            // Remove all unchecked items from the arrays
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function (checkbox) {
                const itemId = checkbox.value;
                if (!checkbox.checked) {
                    const index = arrayItemIds.indexOf(itemId);
                    if (index !== -1) {
                        arrayItemIds.splice(index, 1);
                        arrayQty.splice(index, 1);
                    }
                }
            });
            // Set hidden input fields for array_item_ids and array_qty
            const arrayItemIdsInput = document.createElement('input');
            arrayItemIdsInput.type = 'hidden';
            arrayItemIdsInput.name = 'array_item_ids';
            arrayItemIdsInput.value = arrayItemIds.join(',');
            this.appendChild(arrayItemIdsInput);

            const arrayQtyInput = document.createElement('input');
            arrayQtyInput.type = 'hidden';
            arrayQtyInput.name = 'array_qty';
            arrayQtyInput.value = arrayQty.join(',');
            this.appendChild(arrayQtyInput);
        });
    });
</script>
