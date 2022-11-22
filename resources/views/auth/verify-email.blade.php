<x-guest-layout>
    <x-auth-card >
        <div class="verify-email-box">
            <x-slot name="logo">
                <a href="{{route('home')}}">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </x-slot>
            <div class="text-wrap">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>
            @if (session('status') == 'verification-link-sent')
            <div class="text-wrap">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
            @endif
            <div class="">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <div>
                        <x-button class="btn">
                            {{ __('Resend Verification Email') }}
                        </x-button>
                    </div>
                </form>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn">
                    {{ __('Log out') }}
                    </button>
                </form>
            </div>
        </div>
    </x-auth-card>
</x-guest-layout>