@extends('layouts.app')
@section('title','Reassessment')
@section('content')
<div class="bg-gray-100 py-12">
    <div class="container mx-auto px-4">
        @if (Session::has('dataInform'))
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-8 text-center animate-pulse" role="alert">
            {{ Session::get('dataInform') }}
        </div>
        @endif

        <h2 class="font-semibold text-xl text-gray-600">Reassessment</h2>
        <p class="text-gray-500 mb-6">Please provide the reason for extending your meal plan.</p>
        <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                <div class="text-gray-600">
                    <p class="font-medium text-lg">Extension Request</p>
                    <p>Explain why you need to extend your meal plan.</p>
                </div>

                <div class="lg:col-span-2">
                    <form action="{{ route('member#newReassesment', Auth()->user()->id) }}" method="POST">
                        @csrf
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                            <div class="md:col-span-5">
                                <label for="member_extends_reason">Why do you want to extend the time of receiving this charity?</label>
                                <textarea name="member_extends_reason" id="member_extends_reason" rows="5" class="border mt-1 rounded px-4 w-full bg-gray-50">{{ old('member_extends_reason', $memberData->member_extends_reason) }}</textarea>
                            </div>

                            <div class="md:col-span-5 text-right">
                                <div class="inline-flex items-end">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Send</button>
                                    <a href="{{ route('member#index') }}" class="ml-4 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection