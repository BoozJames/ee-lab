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
    /* Add your print styles here */
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
            {{ __('Inventory Report') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- <div class="flex justify-center items-center">
                    </div> -->
                
                    <button onclick="printContent()" class="bordered border-gray-300 bg-gray-300 mb-2">Print</button>
                    <br>
                    <br>
                    
                    <div class="overflow-x-auto">

                    <div id="print-section" style="font-family: times;">
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

                        <div class="mt-2 text-center"><b>INVENTORY REPORT AS OF ______________</b></div>
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
                            <th class="border border-gray-300 text-center">
                                Last
                                <br>
                                Calibration Date
                            </th>
                        </tr>
                        </thead>
                        <tbody class="border border-gray-300">
                        @for ($i = 0; $i < 15; $i++)
                            <tr>
                                <td class="border border-gray-300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td class="border border-gray-300"></td>
                                <td class="border border-gray-300"></td>
                                <td class="border border-gray-300"></td>
                                <td class="border border-gray-300"></td>
                                <td class="border border-gray-300"></td>
                                <td class="border border-gray-300"></td>
                                <td class="border border-gray-300"></td>
                                <td class="border border-gray-300"></td>
                                <td class="border border-gray-300"></td>
                            </tr>
                        @endfor
                            
                        </tbody>
                    </table>
                    <br>
                    <div class="grid grid-cols-10 gap-0">
                        <div class="col-span-2 text-left">
                        </div>
                        <div class="col-span-4 text-left">
                            <div>Prepared by:</div>
                            <div class="mt-4"><b>Name of Techcnician</b></div>
                            <div>Designation</div>
                            <div>Date</div>

                            <div class="mt-8">Checked by:</div>
                            <div class="mt-4"><b>Name of Laboratory Coordinator</b></div>
                            <div>Designation</div>
                            <div>Date</div>
                        </div>
                        <div class="col-span-4 text-left">
                        <div>Prepared by:</div>
                            <div class="mt-4"><b>Name of Dept. Chair</b></div>
                            <div>Designation</div>
                            <div>Date</div>

                            <div class="mt-8">Noted by:</div>
                            <div class="mt-4"><b>Name of Dean</b></div>
                            <div>Dean, CoE</div>
                            <div>Date</div>
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
