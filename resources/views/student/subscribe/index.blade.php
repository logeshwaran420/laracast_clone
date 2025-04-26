@extends('layout.student')
@section('content')

<div class="bg-gray-900 text-white p-10">

<x-heading.main-head title="One click">
    Choose a plan that fits your pace. No ads. No limits.
    Just a focused path to becoming the developer you want to be.
</x-heading.main-head>

@php
    $activePlanId = auth()->user()->subscriptions()->where('is_active', operator: true)->value('plan_id');
@endphp




<div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-10">

    @foreach ($plans as $plan)
    @if(!$activePlanId || $activePlanId === $plan->id)
        <div class="bg-gray-800 p-6 flex flex-col items-center text-center">
            <h2 class="text-3xl font-bold mb-2">{{ $plan->name }}</h2>
            <img src="{{ asset('storage/images/bill.png') }}" alt="{{ $plan->name }} Plan" class="h-32 mb-4" />
            <p class="text-gray-300 mb-6">{{ $plan->description }}</p>

            <form action="{{ route('subscribe',['user' =>auth()->id() ]) }}" method="POST">
                @csrf
                <input type="hidden" name="plan_id" value="{{ $plan->id }}">

                @if($activePlanId === $plan->id)
                    <button type="button" class="bg-green-600 text-white px-5 py-2 rounded-md cursor-default">
                        ✓ Selected
                    </button>
                @else
                    <button type="submit" class="bg-[#1e293b] px-5 py-2 rounded-md hover:bg-blue-600 transition border">
                        ✓ Select Plan
                    </button>
                @endif
            </form>
        </div>
    @endif
@endforeach

</div>

</div>

@endsection
