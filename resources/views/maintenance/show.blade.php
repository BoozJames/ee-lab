<style>
  /* Custom checkbox styles */
  .custom-checkbox {
    width: 20px;
    height: 20px;
    border: 2px solid #999;
    border-radius: 3px;
    cursor: pointer;
  }

  /* Hide the default checkbox */
  .custom-checkbox input[type="checkbox"] {
    display: none;
  }

  /* Custom checkbox checked state */
  .custom-checkbox input[type="checkbox"]:checked + .checkmark {
    background-color: #66c;
  }

  @media print {
    /* For example, hide elements not needed in print */
    body * {
        visibility: hidden;
    }
    #print-section, #print-section * {
        visibility: visible;
    }
    #print-section {
        position: absolute;
        left: 0;
        top: 0;
    }
}

</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Maitenance Reports Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
               
                <div class="overflow-x-auto">
                <button onclick="printContent()" class="bordered border-gray-300 bg-gray-300 p-2 mb-2">Print</button>
                <a href="/maintenance"  class="float-right text-red-500 hover:text-red-700">Back</a>

                <table id="print-section" class="min-w-full border border-gray-300" style="font-family: times;">
                    <thead>
                    <tr>
                        <td class="border border-gray-300 text-center">
                            <div style="display: inline-block;">
                                <img class="border-none" src="/images/bsu-neu-logo.png" style="max-width: 50px; height: auto;" alt="">
                            </div>
                        </td>
                        <td colspan="10" class="border border-gray-300">Reference No.: BatStateU-DOC-AF-05 </td>
                        <td colspan="6" class="border border-gray-300">Effectivity: May 18, 2022</td>
                        <td class="border border-gray-300">Revision No.: 01</td>
                    </tr>
                    </thead>
                    <tbody class="border border-gray-300">
                        <tr>
                            <th class="border border-gray-300 p-2 border border-gray-300 text-center" colspan="18" >PREVENTIVE MAINTENANCE CHECKLIST AND CORRECTIVE RECORD</th>
                        </tr>
                        <tr>
                            <td class="border border-gray-300" colspan="2">Office/College</td>
                            <td class="border border-gray-300" colspan="15"><b>College of Engineering</b></td>
                            <td class="border border-gray-300"><b>FY {{ $maintenance->year }}</b></td>
                        </tr>
                        <tr>
                            <th class="border border-gray-300 text-left" colspan="18" >Tick appropriate box  with (&check;) if checked item is ok. Put an (&cross;) mark if item is not okay.</th>
                        </tr>
                        <tr>
                            <td colspan="3" class="border border-gray-300 text-center"><b>TYPE OF<br>EQUIPMENT/ITEM</b></td>
                            <td colspan="3">
                                <div>
                                    <input class="m-1" type="checkbox" name="vehicle" id="vehicle"> Vehicle
                                </div>
                                <div>
                                    <input class="m-1" type="checkbox" name="building" id="building"> Building
                                </div>
                            </td>
                            <td colspan="2">
                                <div>
                                    <input class="m-1" type="checkbox" name="acu" id="acu"> ACU
                                </div>
                                <div>
                                    <input class="m-1" type="checkbox" name="emu" id="emu"> EMU
                                </div>
                            </td>
                            <td colspan="4">
                                <div>
                                    <input class="m-1" type="checkbox" name="ic_equipment" id="ic_equipment"> ICT Equipment
                                </div>
                                <div>
                                    <input class="m-1" type="checkbox" name="laboratoty_equipment" id="laboratoty_equipment"> Laboratory Equipment
                                </div>
                            </td>
                            <td colspan="4">
                                <div>
                                    <input class="m-1" type="checkbox" name="medical_dental_equipment" id="medical_dental_equipment"> Medical/Dental Equipment
                                </div>
                                <div>
                                    <input class="m-1" type="checkbox" name="others" id="others"> Others, specify: __________
                                </div>
                            </td>
                            <td colspan="2" class="border border-gray-300 text-left">
                                <div class="text-center"><b>FREQUENCY</b></div>

                                <div class="flex">
                                    <div class="w-1/2">
                                        <input class="m-1" type="checkbox" name="frequency_monthly" id="frequency_monthly"> Monthly
                                        <br>
                                        <input class="m-1" type="checkbox" name="frequency_monthly" id="frequency_semi_annually"> Semi-annually
                                    </div>
                                    <div class="w-1/2">
                                        <input class="m-1" type="checkbox" name="frequency_quarterly" id="frequency_quarterly"> Quarterly
                                        <br>
                                        <input class="m-1" type="checkbox" name="frequency_quarterly" id="frequency_annually"> Annually
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" rowspan="2" class="border border-gray-300 text-center">
                                <b>ACTIVITIES</b>
                            </td>
                            <td colspan="12" class="border border-gray-300 text-center">
                                <b>EQUIPMENT NO./ITEMS LOCATION</b>
                            </td>
                            <td colspan="2" rowspan="2" class="border border-gray-300 text-center">
                                <b>REMARKS</b>
                            </td>
                        </tr>
                        <tr>
                            <td class="bg-gray-200 border border-gray-300 text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td class="bg-gray-200 border border-gray-300 text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td class="bg-gray-200 border border-gray-300 text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td class="bg-gray-200 border border-gray-300 text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td class="bg-gray-200 border border-gray-300 text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td class="bg-gray-200 border border-gray-300 text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td class="bg-gray-200 border border-gray-300 text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td class="bg-gray-200 border border-gray-300 text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td class="bg-gray-200 border border-gray-300 text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td class="bg-gray-200 border border-gray-300 text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td class="bg-gray-200 border border-gray-300 text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td class="bg-gray-200 border border-gray-300 text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>

                        @foreach($maintenance->items->chunk(12) as $chunk)
                        <tr>
                            <td colspan="4" class="text-center border border-gray-300"><b>Cleaning and Checking (M)</b></td>
                            @foreach($chunk as $item)
                                <td class="text-center border border-gray-300"><small>{{ $item->equipment_label }}</small></td>
                            @endforeach
                            @for ($i = count($chunk); $i < 12; $i++)
                                <td class="text-center border border-gray-300"></td>
                            @endfor
                            <td colspan="2" class="text-center border border-gray-300">
                                <small>
                                @php
                                    $groupedItems = [];

                                    foreach($chunk as $item) {
                                        if ($item->status !== 'Functional' && $item->status !== 'Newly Acquired') {
                                            if (!isset($groupedItems[$item->status])) {
                                                $groupedItems[$item->status] = [];
                                            }
                                            $groupedItems[$item->status][] = $item->equipment_label;
                                        }
                                    }

                                    $remarks = '';
                                    foreach ($groupedItems as $status => $items) {
                                        $remarks .= ucfirst($status) . ' - ' . implode(', ', $items) . ', ';
                                    }

                                    echo rtrim($remarks, ', '); // Remove trailing comma
                                @endphp
                                </small>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="4" class="text-center border border-gray-300">&nbsp;</td>
                            @foreach($chunk as $item)
                                <td class="text-center border border-gray-300">
                                    @if($item->status == 'Newly Acquired' || $item->status == 'Functional')
                                        &check; 
                                    @else
                                        &cross;
                                    @endif
                                </td>
                            @endforeach
                            @for ($i = count($chunk); $i < 12; $i++)
                                <td class="text-center border border-gray-300"></td>
                            @endfor
                            <td colspan="2" class="text-center border border-gray-300"></td>
                        </tr>
                    @endforeach

                    <tr>
                        <td colspan="4" class="text-center border border-gray-300 text-right"><b>Conducted by:</b></td>
                        <td colspan="7" class="text-center border border-gray-300" style="text-align: left;">&nbsp;{{ $maintenance->conducted_by }}</td>
                        <td colspan="2" class="text-center border border-gray-300 text-right"><b>Date:</b></td>
                        <td colspan="3" class="text-center border border-gray-300">{{ $maintenance->created_at->format('m-d-Y') }}</td>
                        <td colspan="2" class="text-center border border-gray-300"></td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-center border border-gray-300 text-right"><b>Verified by:</b></td>
                        <td colspan="7" class="text-center border border-gray-300" style="text-align: left;">&nbsp;{{ $maintenance->verified_by }}</td>
                        <td colspan="2" class="text-center border border-gray-300 text-right"><b>Date:</b></td>
                        <td colspan="3" class="text-center border border-gray-300">{{ $maintenance->created_at->format('m-d-Y') }}</td>
                        <td colspan="2" class="text-center border border-gray-300"></td>
                    </tr>

                    <tr>
                        <td colspan="18" class="bg-gray-200 border border-gray-300">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 text-center"><b>Date</b></td>
                        <td colspan="10" class="border border-gray-300 text-center"><b>Corrective Action</b></td>
                        <td colspan="3" class="border border-gray-300 text-center"><b>Office Responsible</b></td>
                        <td colspan="2" class="border border-gray-300 text-center"><b>Date Accomplished</b></td>
                        <td colspan="2" class="border border-gray-300 text-center"><b>Remarks</b></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 text-center">
                            @php $hasCorrectiveAction = false; @endphp
                            @foreach($maintenance->items as $item)
                                @if($item->corrective_action)
                                    @php $hasCorrectiveAction = true; break; @endphp
                                @endif
                            @endforeach
                            
                            @if($hasCorrectiveAction)
                                {{ $maintenance->created_at->format('m-d-Y') }}
                            @else 
                                &nbsp;
                            @endif
                        </td>
                        <td colspan="10" class="border border-gray-300 text-center">
                            @foreach($maintenance->items as $item)
                                @if($item->corrective_action)
                                    <div>{{ $item->corrective_action }}</div>
                                @endif
                            @endforeach
                        </td>
                        <td colspan="3" class="border border-gray-300 text-center">
                            @php $hasCorrectiveAction = false; @endphp
                            @foreach($maintenance->items as $item)
                                @if($item->corrective_action)
                                    @php $hasCorrectiveAction = true; break; @endphp
                                @endif
                            @endforeach
                            
                            @if($hasCorrectiveAction)
                                Lab Tech EE
                            @else 
                                &nbsp;
                            @endif
                        </td>
                        <td colspan="2" class="border border-gray-300 text-center">
                            @php $hasCorrectiveAction = false; @endphp
                            @foreach($maintenance->items as $item)
                                @if($item->corrective_action)
                                    @php $hasCorrectiveAction = true; break; @endphp
                                @endif
                            @endforeach
                            
                            @if($hasCorrectiveAction)
                                {{ $maintenance->created_at->format('m-d-Y') }}
                            @else 
                                &nbsp;
                            @endif
                        </td>   
                        <td colspan="2" class="border border-gray-300 text-center">
                            @foreach($maintenance->items as $item)
                                @if($item->remarks)
                                    <div>{{ $item->remarks }}</div>
                                @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 text-center">&nbsp;</td>
                        <td colspan="10" class="border border-gray-300 text-center"></td>
                        <td colspan="3" class="border border-gray-300 text-center"></td>
                        <td colspan="2" class="border border-gray-300 text-center"></td>
                        <td colspan="2" class="border border-gray-300 text-center"></td>
                    </tr>
                    </tbody>
                </table>
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
