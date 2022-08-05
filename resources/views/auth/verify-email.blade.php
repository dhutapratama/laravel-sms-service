<x-auth-layout>
  <x-auth-card>
    <x-slot name="title">Verify Email</x-slot>

    <div class="mb-4 text-sm text-gray-600">
      {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
      <div class="mb-4 font-medium text-sm text-green-600">
        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
      </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
      <form method="POST" action="{{ route('verification.send') }}">
        @csrf

        <div class="row g-2 align-items-center">
          <div class="col-3 text-end">
            &nbsp;
          </div>
          <div class="col-9">
            <button type="submit" class="btn btn-primary">{{ __('Resend Verification Email') }}</button>
          </div>
        </div>
      </form>

      <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
          {{ __('Log Out') }}
        </button>
      </form>
    </div>
  </x-auth-card>
</x-auth-layout>
