<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Faculty') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('faculties.update', $faculty->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="emp_code" class="block text-sm font-medium text-gray-700">Employee Code<sup class="text-rose-500">*</sup></label>
                            <input type="text" name="emp_code" id="emp_code" value="{{ $faculty->emp_code }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div class="mb-4">
                            <label for="prefix_name" class="block text-sm font-medium text-gray-700">Prefix Name</label>
                            <input type="text" name="prefix_name" id="prefix_name" value="{{ $faculty->prefix_name }}" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div class="mb-4">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">First Name<sup class="text-rose-500">*</sup></label>
                            <input type="text" name="first_name" id="first_name" value="{{ $faculty->first_name }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div class="mb-4">
                            <label for="middle_name" class="block text-sm font-medium text-gray-700">Middle Name<sup class="text-rose-500">*</sup></label>
                            <input type="text" name="middle_name" id="middle_name" value="{{ $faculty->middle_name }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div class="mb-4">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name<sup class="text-rose-500">*</sup></label>
                            <input type="text" name="last_name" id="last_name" value="{{ $faculty->last_name }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div class="mb-4">
                            <label for="extra_name" class="block text-sm font-medium text-gray-700">Extra Name</label>
                            <input type="text" name="extra_name" id="extra_name" value="{{ $faculty->extra_name }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div class="mb-4">
                            <label for="college" class="block text-sm font-medium text-gray-700">College<sup class="text-rose-500">*</sup></label>
                            <input type="text" name="college" id="college" value="{{ $faculty->college }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
