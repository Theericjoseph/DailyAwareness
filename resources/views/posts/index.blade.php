@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center mt-1">
        <div class="bg-white sm:w-8/12 md:w-6/12 lg:w-6/12 xl:w-6/12 rounded-lg p-6">
            @if (session('error'))
                <div class="flex items-center justify-center bg-red-500 text-white w-full rounded-lg p-4 mb-4">
                    {{ session('error') }}
                </div>
            @elseif(session('status'))
                <div class="flex items-center justify-center bg-green-500 text-white w-full rounded-lg p-4 mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <div class="flex items-center justify-center bg-green-100 w-full rounded-lg p-4 mb-4">
                <h1 class="text-2xl">Daily Awareness</h1>
            </div>
            <form action="{{ route('awareness') }}" method="post">
                {{-- Cross Site Request Forgery --}}
                @csrf

                {{-- Display todays date --}}
                <div class="flex w-full items-center justify-center">
                    <div class="relative max-w-sm mb-4">
                        <label for="date" class="sr-only">Date</label>
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input datepicker-format="dd-mm-yyyy" type="text" name="date" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Select date" value="{{ now()->format('d-m-Y') }}" readonly>
                    </div>
                </div>

                {{-- Display metrics --}}
                @foreach ($metricNames as $index => $metricName)
                    @if ($inputTypes[$index] == 'text')
                        <div class="mb-4">
                            <label for="{{ $metricName }}" class="sr-only">{{ $metricName }}</label>
                            <input type="text" name="{{ $metricName }}" id="{{ $metricName }}"
                                placeholder="{{ str_replace('_', ' ', $metricName) }}"
                                class="bg-gray-100 border-2 w-full p-4 rounded-lg text-sm @error('{{ $metricName }}') border-red-500 @enderror"
                                value="{{ old($metricName) }}">

                            {{-- @error Blade directive to quickly determine validation error message --}}
                            @error($metricName)
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    @elseif($inputTypes[$index] == 'dropdown')
                        <div class="mb-4">
                            <label for="{{ $metricName }}" class="sr-only">{{ $metricName }}</label>
                            <select name="{{ $metricName }}" id="{{ $metricName }}"
                                class="bg-gray-100 border-2 w-full p-4 rounded-lg text-sm">
                                <option value="+2">+2</option>
                                <option value="+1">+1</option>
                                <option value="0" selected>{{ str_replace('_', ' ', $metricName) }} (0)</option>
                                <option value="-1">-1</option>
                                <option value="-2">-2</option>
                            </select>
                        </div>
                    @else
                        <div class="mb-4">
                            <label for="{{ $metricName }}" class="sr-only">{{ $metricName }}</label>
                            <textarea name="{{ $metricName }}" id="{{ $metricName }}" rows="4" cols="50"
                                placeholder="{{ str_replace('_', ' ', $metricName) }}"
                                class="bg-gray-100 border-2 w-full p-4 rounded-lg text-sm @error('{{ $metricName }}') border-red-500 @enderror"
                                value="{{ old($metricName) }}"></textarea>

                            {{-- @error Blade directive to quickly determine validation error message --}}
                            @error($metricName)
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    @endif
                @endforeach

                <div class="mb-4">
                    <a href="{{ route('new.awareness', auth()->user()) }}" class="bg-green-500 p-3 rounded-lg text-white">+
                        Add
                        Awareness</a>
                </div>

                <div class="mb-4">
                    <button class="bg-blue-500 w-full p-4 rounded-lg text-white" type="submit">Continue</button>
                </div>


            </form>
        </div>
    </div>
@endsection
