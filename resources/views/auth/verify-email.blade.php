@include('layouts.header')
<div class="container mx-auto">
    <div class="mb-4 text-sm text-gray-600">
        Vui lòng xác thực email để thực hiện bước kế tiếp.
    </div>

    @if (session('status') == 'verification-link-sent')
    <div class="mb-4 text-sm font-medium text-green-600">
        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
    </div>
    @endif

    <div class="flex items-center justify-between mt-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-button>
                    {{ __('Resend Verification Email') }}
                </x-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="text-sm text-gray-600 underline hover:text-gray-900">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</div>

@include('layouts.footer')