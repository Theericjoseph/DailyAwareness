@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center mt-1">
        <div class="bg-white sm:w-8/12 md:w-6/12 lg:w-4/12 xl:w-3/12 rounded-lg p-6">

            @if (session('success'))
                <div class="flex items-center justify-center bg-green-500 w-full rounded p-4 mb-4 text-white">
                    {{ session('success') }}
                </div>
            @elseif (session('status'))
                <div class="flex items-center justify-center bg-red-500 w-full rounded p-4 mb-4 text-white">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="post" class="space-y-4">

                {{-- Cross Site Request Forgery --}}
                @csrf

                <div class="flex items-center justify-center bg-green-100 w-full rounded-lg p-4 mb-4">
                    <h1 class="text-2xl">Login</h1>
                </div>

                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" id="email" placeholder="Enter Your Email"
                        class="bg-gray-100 border-1 w-full p-4 rounded-lg @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}">

                    {{-- @error Blade directive to quickly determine validation error message --}}
                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter Your Password"
                        class="bg-gray-100 border-1 w-full p-4 rounded-lg @error('password') border-red-500 @enderror">

                    {{-- @error Blade directive to quickly determine validation error message --}}
                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <button class="bg-blue-500 w-full p-4 rounded-lg text-white" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection
