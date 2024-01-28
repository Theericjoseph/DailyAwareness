@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center">
        <div class="sm:w-8/12 md:w-6/12 lg:w-5/12 xl:w-5/12 ">
            <div class="p-6">
                <h1 class="text-2xl text-medium">{{ $user->name }}</h1>
                <p class="text-medium text-blue-500">{{ '@' }}{{ $user->username }}</p>
            </div>
            <div class="bg-white rounded-lg p-6">
                <form action="{{ route('user.history.search', $user) }}" method="post">
                    {{-- Cross Site Request Forgery --}}
                    @csrf

                    {{-- Checks if date is set or sets date as today's date --}}
                    @php
                        if (!isset($date)) {
                            $date = now()->format('d-m-Y');
                        }
                    @endphp


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
                            <input datepicker datepicker-format="dd-mm-yyyy" type="text" name="date" id="date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('date') border-red-500 @enderror"
                                placeholder="Select date" value="{{ $date }}">

                        </div>

                        <button type="submit" name="search" id="search" class="float-right mb-4 ml-2 p-2 rounded-lg">
                            <i class="fa fa-search" style="font-size:20px"></i>
                        </button>
                    </div>
                    @error('date')
                        <div class="flex w-full items-center justify-center text-red-500 text-sm">
                            {{ $message }}
                        </div>
                    @enderror

                </form>

                {{-- Display the users entry if entry present for that day --}}
                @if (request()->has('search') && isset($entries) && $entries->count())
                    {{-- Display metrics --}}
                    @foreach ($metrics as $index => $metric)
                        @if ($metric->input_type == 'text')
                            <div class="mb-4">
                                <label for="{{ $metric->name }}"
                                    class="mb-2">{{ str_replace('_', ' ', $metric->name) }}</label>
                                <input type="text" name="{{ $metric->name }}" id="{{ $metric->name }}"
                                    class="bg-gray-100 border-2 w-full p-4 rounded-lg text-sm @error('{{ $metric->name }}') border-red-500 @enderror"
                                    value="{{ $entries->where('metric_id', $metric->id)->first()->value ?? '' }}" readonly>

                                {{-- @error Blade directive to quickly determine validation error message --}}
                                @error($metric->name)
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        @elseif($metric->input_type == 'dropdown')
                            <div class="mb-4">
                                <label for="{{ $metric->name }}"
                                    class="mb-2">{{ str_replace('_', ' ', $metric->name) }}</label>
                                <select name="{{ $metric->name }}" id="{{ $metric->name }}"
                                    class="bg-gray-100 border-2 w-full p-4 rounded-lg text-sm" disabled>
                                    {{-- Checks the value from the db and sets selected flag on the dropdown --}}
                                    <option selected>{{ $entries->where('metric_id', $metric->id)->first()?->value }}
                                    </option>
                                </select>
                            </div>
                        @else
                            <div class="mb-4">
                                <label for="{{ $metric->name }}"
                                    class="mb-2">{{ str_replace('_', ' ', $metric->name) }}</label>
                                <textarea name="{{ $metric->name }}" id="{{ $metric->name }}" rows="4" cols="50"
                                    class="bg-gray-100 border-2 w-full p-4 rounded-lg text-sm @error('{{ $metric->name }}') border-red-500 @enderror"
                                    value="{{ old($metric->name) }}" readonly>{{ $entries->where('metric_id', $metric->id)->first()->value ?? '' }}</textarea>

                                {{-- @error Blade directive to quickly determine validation error message --}}
                                @error($metric->name)
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        @endif
                    @endforeach
                    {{-- Checks if search is clicked an no entries were made for the day --}}
                @elseif(request()->has('search') && (!isset($entries) || $entries->count() == 0))
                    {{-- No entries made today --}}
                    <div class="flex items-center justify-center bg-red-500 w-full rounded p-4 mb-4 text-white">
                        <p>No entries for this day.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
