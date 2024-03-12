<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">SRCODE / RFID Code</label>
                        <div class="mt-1">
                            {{ $students->srcode }} / {{ $students->rfid_code }}
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <div class="mt-1">
                            {{ $students->first_name }} {{ $students->middle_name }} {{ $students->last_name }}
                            {{ $students->extra_name }}
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="campus" class="block text-sm font-medium text-gray-700">Campus</label>
                        <div class="mt-1">{{ $students->campus }}</div>
                    </div>
                    <div class="mb-4">
                        <label for="college" class="block text-sm font-medium text-gray-700">College</label>
                        <div class="mt-1">{{ $students->colleges }}</div>
                    </div>
                    <div class="mb-4">
                        <label for="programs" class="block text-sm font-medium text-gray-700">Programs</label>
                        <div class="mt-1">{{ $students->programs }}</div>
                    </div>
                    <div class="mb-4">
                        <label for="courses" class="block text-sm font-medium text-gray-700">Courses</label>
                        <div class="mt-1">{{ $students->courses }}</div>
                    </div>
                    <!-- Add more details as needed -->
                    <div class="flex items-center justify-end">
                        <a href="{{ route('students.edit', $students->id) }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2">Edit</a>
                        <form action="{{ route('students.destroy', $students->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                onclick="return confirm('Are you sure you want to delete this students?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
