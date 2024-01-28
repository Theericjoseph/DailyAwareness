@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center ">
        <div class="bg-white w-full p-6 text-center">
            <h1 class="text-5xl text-center font-bold font-arial tracking-tight mb-5">The Simplest Awareness Tracker App on
                this
                Planet</h1>
            <p class="text-center font-light font-arial tracking-widest mb-5">Finally, a daily awareness tracker that helps
                you
                grow
                more, by doing less.</p>

            <a href="@guest{{ route('register') }} @endguest @auth{{ route('awareness') }} @endauth"
                class="bg-black text-white px-4 py-3 rounded-lg font-arial font-medium tracking-wide">Start
                DailyAwareness
                today</a>

        </div>
    </div>

    {{-- Separate body colour for Home page --}}
    <style>
        body {
            background-color: white !important;
        }
    </style>
@endsection
