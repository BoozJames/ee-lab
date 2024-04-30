<style>
  /* Custom checkbox checked state */
  .custom-checkbox input[type="checkbox"]:checked + .checkmark {
    background-color: #66c;
  }

  @media print {
    /* Add your print styles here */
    /* For example, hide elements not needed in print */
    body * {
        visibility: hidden;
    }

    tbody {
        font-size: 12px;
    }
   
    #print-section, #print-section * {
        visibility: visible;
    }
    #print-section {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
    }

    .repeat-section {
        page-break-before: always;
    }
}
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventory Report') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- <div class="flex justify-center items-center">
                    </div> -->
                
                    <button onclick="printContent()" class="bordered border-gray-300 bg-gray-300 p-2 mb-2">Print</button>
                    <a href="/inventory"  class="float-right text-red-500 hover:text-red-700">Back</a>

                    <br>
                    
                    <div class="overflow-x-auto">

                    <div id="print-section" style="font-family: times;">
                        <div class="repeat-section">
                        <div class="flex justify-center">
                            <div class="max-w-6xl w-full grid grid-cols-12 gap-0">
                                <div class="col-span-1">
                                    <img class="border-none" src="/images/bsu-neu-logo.png" style="max-width: 150px; height: auto;" alt="">
                                </div>
                                <div class="col-span-11 text-center">
                                    <div><b>Republic of the Philippines</b></div>
                                    <div style="font-size: 18px"><b>BATANGAS STATE UNIVERSITY</b></div>
                                    <div style="font-family: Arial; font-size: 14px; color: red; "><b>The National Engineering University</b></div>
                                    <div style="font-size: 14px;"><b>Alangilan Campus</b></div>
                                    <div style="font-size: 12px;">Golden Country Homes, Alangilan Batangas City, Batangas, Philippines 4200</div>
                                    <div style="font-size: 12px;">Tel Nos.: (+63 43) 425-0139 local 2121 / 2221</div>
                                    <div style="font-size: 12px;">Email address: coe.alangilan@g.batstate-u.edu.ph | Website Address: http://www.batstate-u.edu.ph</div>

                                </div>
                            </div>
                        </div>
                        <hr class="w-full border-t-2 border-gray-800">
                        <div><b>Office of the Dean - College of Engineering</b></div>

                        </div>
                        <div class="mt-2 text-center uppercase"><b>INVENTORY REPORT AS OF {{ \Carbon\Carbon::parse($inventoryReport->created_at)->isoFormat('MMMM D, YYYY') }}</b></div>
                        <div class="mt-2 text-center"><b>SUPPLY ROOM</b></div>
                        
                        <br>
                        <table class="min-w-full border border-gray-300">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="border border-gray-300 text-center">Equipment</th>
                                    <th class="border border-gray-300 text-center">Brand</th>
                                    <th class="border border-gray-300 text-center">Equipment Label</th>
                                    <th class="border border-gray-300 text-center">Serial Number</th>
                                    <th class="border border-gray-300 text-center">Previous<br>Inventory<br>Quantity</th>
                                    <th class="border border-gray-300 text-center">New<br>Inventory<br>Quantity</th>
                                    <th class="border border-gray-300 text-center">Inventory<br>Difference</th>
                                    <th class="border border-gray-300 text-center">Status</th>
                                    <th class="border border-gray-300 text-center">Last<br>Calibration Date</th>
                                </tr>
                            </thead>
                            <tbody class="border border-gray-300 tbody">
                                    @php
                                    $count = 1;
                                    $rowspanValues = [];
                                    $prevItemName = null;
                                    $prevBrand = null;
                                    $currentRowspan = 0;
                                @endphp

                                {{-- Calculate rowspan values --}}
                                @foreach($reportItems as $index => $item)
                                    @if($index > 0 && strtolower($item->item_name) === strtolower($prevItemName) && strtolower($item->brand) === strtolower($prevBrand))
                                        @php
                                            $currentRowspan++;
                                        @endphp
                                    @else
                                        @if($index > 0)
                                            @php
                                                // Store the rowspan value for the previous group
                                                $rowspanValues[] = $currentRowspan;
                                            @endphp
                                        @endif
                                        @php
                                            $prevItemName = $item->item_name;
                                            $prevBrand = $item->brand;
                                            $currentRowspan = 1;
                                        @endphp
                                    @endif
                                @endforeach
                                {{-- Add the rowspan value for the last group --}}
                                @php
                                    $rowspanValues[] = $currentRowspan;
                                @endphp

                                {{-- Apply rowspan values to table rows --}}
                                @php
                                    $rowIndex = 0;
                                @endphp
                                @foreach($reportItems as $index => $item)
                                    @if($index == 0 || (strtolower($item->item_name) !== strtolower($prevItemName) || strtolower($item->brand) !== strtolower($prevBrand)))
                                        @if($index > 0)
                                            </tr>
                                        @endif
                                        <tr>
                                            <td class="border border-gray-300 text-center">{{ $count }}</td>
                                            <td class="border border-gray-300 text-center">{{ $item->item_name }}</td>
                                            <td class="border border-gray-300 text-center" rowspan="{{ $rowspanValues[$rowIndex] }}">{{ $item->brand }}</td>
                                            <td class="border border-gray-300 text-center">{{ $item->equipment_label }}</td>
                                            <td class="border border-gray-300 text-center">{{ $item->serial_number }}</td>
                                            <td class="border border-gray-300 text-center" rowspan="{{ $rowspanValues[$rowIndex] }}">
                                                @if(isset($previousInventoryQuantities[$item->item_name][$item->brand]))
                                                    {{ $previousInventoryQuantities[$item->item_name][$item->brand] }}
                                                @else
                                                N/A
                                                    @php
                                                        $previousInventoryQuantities[$item->item_name][$item->brand] = 0
                                                    @endphp
                                                @endif
                                            </td>
                                            <td class="border border-gray-300 text-center" rowspan="{{ $rowspanValues[$rowIndex] }}"> {{ $rowspanValues[$rowIndex] }} </td>

                                            <td class="border border-gray-300 text-center" rowspan="{{ $rowspanValues[$rowIndex] }}">
                                                @php
                                                    $newInventoryQuantity = isset($previousInventoryQuantities[$item->id]) ? $previousInventoryQuantities[$item->item_name][$item->brand] - $rowspanValues[$rowIndex] : $rowspanValues[$rowIndex];
                                                @endphp
                                                {{ abs($newInventoryQuantity - $previousInventoryQuantities[$item->item_name][$item->brand]) }}
                                            </td>

                                            <td class="border border-gray-300 text-center">{{ $item->status }}</td>
                                            <td class="border border-gray-300 text-center">{{ $item->last_calibration_date }}</td>
                                        </tr>
                                        @php
                                            $prevItemName = $item->item_name;
                                            $prevBrand = $item->brand;
                                            $rowIndex++;
                                        @endphp
                                    @else
                                        </tr>
                                        <tr>
                                            <td class="border border-gray-300 text-center">{{ $count }}</td>
                                            <td class="border border-gray-300 text-center">{{ $item->item_name }}</td>
                                            <td class="border border-gray-300 text-center">{{ $item->equipment_label }}</td>
                                            <td class="border border-gray-300 text-center">{{ $item->serial_number }}</td>
                                            <td class="border border-gray-300 text-center">{{ $item->status }}</td>
                                            <td class="border border-gray-300 text-center">{{ $item->last_calibration_date }}</td>
                                        </tr>
                                    @endif
                                    @php
                                        $count++;
                                    @endphp

                                @endforeach
                                </tr> <!-- Close the last row -->
                            </tbody>
                        </table>
                    <br>
                    <div class="grid grid-cols-10 gap-0">
                        <div class="col-span-2 text-left">
                        </div>
                        <div class="col-span-4 text-left">
                            <div>Prepared by:</div>
                            <div class="mt-4"><b>{{ $inventoryReport->prepared_by}}</b></div>
                            <div>{{ $inventoryReport->prepared_by_designation}}</div>
                            <div>Date: {{ $inventoryReport->date_prepared_by}}</div>

                            <div class="mt-8">Checked by:</div>
                            <div class="mt-4"><b>{{ $inventoryReport->checked_by}}</b></div>
                            <div>{{ $inventoryReport->checked_by_designation}}</div>
                            <div>Date: {{ $inventoryReport->date_checked_by}}</div>
                        </div>
                        <div class="col-span-4 text-left">
                            <div>Verified by:</div>
                            <div class="mt-4"><b>{{ $inventoryReport->verified_by}}</b></div>
                            <div>{{ $inventoryReport->verified_by_designation}}</div>
                            <div>Date: {{ $inventoryReport->date_verified_by}}</div>

                            <div class="mt-8">Noted by:</div>
                            <div class="mt-4"><b>{{ $inventoryReport->noted_by}}</b></div>
                            <div>{{ $inventoryReport->noted_by_designation}}</div>
                            <div>Date: {{ $inventoryReport->date_noted_by}}</div>
                        </div>
                        <div class="col-span-1 text-left">
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function printContent() {
        window.print();
    }
</script>
