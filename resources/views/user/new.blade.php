@extends('layouts.app')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <div class="flex items-center justify-center">
        <div class="sm:w-8/12 md:w-6/12 lg:w-4/12 xl:w-4/12 ">
            <div class="p-6">
                <h1 class="text-2xl text-medium">{{ $user->name }}</h1>
                <p class="text-medium text-blue-500">{{ '@' }}{{ $user->username }}</p>
            </div>
            <div class="bg-white rounded-lg p-6">
                {{-- Notification box if any error or status gets send --}}
                @if (session('error'))
                    <div class="flex items-center justify-center bg-red-500 w-full text-white rounded-lg p-4 mb-4">
                        {{ session('error') }}
                    </div>
                @endif
                {{-- Page Heading --}}
                <div class="flex items-center justify-center bg-green-100 w-full rounded-lg p-4 mb-4">
                    <h1 class="text-2xl">+Add Awareness</h1>
                </div>
                {{-- Form --}}
                <form action="{{ route('new.awareness', $user) }}" method="post">
                    @csrf

                    <div class="input-fields">
                        <div class="mb-4">
                            <label for="names_0" class="sr-only">New Metric</label>
                            <input type="text" name="names[0]"
                                placeholder="Add a new awareness (eg. how many times did I get angry?)"
                                class="bg-gray-100 border-2 w-full p-4 rounded-lg text-sm @error('names[0]') border-red-500 @enderror"
                                value="{{ old('names[0]') }}">
                            {{-- @error Blade directive to quickly determine validation error message --}}
                            @error('names[0]')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <button id="add-more-field" class="bg-green-500 p-3 rounded-lg text-white">+ Add more</button>
                    </div>

                    <div class="mb-4">
                        <button type="submit" class="bg-blue-500 w-full p-4 rounded-lg text-white">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- JQuery to spawn more fields --}}
    <script>
        $(function() {
            var fieldCounter = 1; // Initialize a counter

            var more_fields = function(counter) {
                return `
                        <div class="mb-4">
                            <label for="names_${counter}" class="sr-only">New Metric</label>
                            <input type="text" name="names[${counter}]" placeholder="Add a new awareness"
                                class="bg-gray-100 border-2 w-full p-4 rounded-lg text-sm @error('names[${counter}]') border-red-500 @enderror"
                                value="{{ old('names[0]') }}">
                            {{-- @error Blade directive to quickly determine validation error message --}}
                            @error('names[${counter}]')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                         `;
            };

            $('#add-more-field').on('click', (function(e) {
                e.preventDefault();
                var newFields = more_fields(fieldCounter);
                $(".input-fields").append(newFields);
                fieldCounter++; // Increment the counter for the next set of fields
            }));
        });
    </script>
@endsection
