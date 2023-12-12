<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Census Browse') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    View Census Report

                    <form action="{{ route('census.populate') }}" method="post" class="mt-6">
                        @csrf
                        @method('PUT')
                        <x-primary-button>Populate Data from US Census</x-primary-button>
                    </form>

                    <table class="w-full mt-6">
                        <tr class="border-b">
                            <th class="text-center">Year</th>
                            <th class="text-center">Age</th>
                            <th class="text-center">Population</th>
                        </tr>
                    @foreach ($censusData as $data)
                        <tr class="border-b">
                            <th class="text-center">{{ $data->year }}</th>
                            <td class="text-center">{{ $data->age }}</td>
                            <td class="text-center">{{ $data->pop }}</td>
                        </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
