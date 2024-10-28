@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">{{ __('Verify Your Email Address') }}</h2>

        <div class="mb-3">
            @if (session('resent'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-3" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            <p class="text-gray-700 mb-3">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
            <p class="text-gray-700">{{ __('If you did not receive the email') }},</p>

            <form method="POST" action="{{ route('verification.resend') }}" class="inline">
                @csrf
                <button type="submit" class="text-blue-500 hover:text-blue-700 underline">
                    {{ __('click here to request another') }}
                </button>.
            </form>
        </div>
    </div>
</div>
@endsection
