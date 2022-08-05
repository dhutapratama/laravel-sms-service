<x-auth-layout>
  <x-auth-card>
    <x-slot name="title">Lupa Password</x-slot>
    <form method="POST" class="p-2" action="{{ route('password.email') }}">
      @csrf
      <x-auth-session-status class="mb-4" :status="session('status')" />
      <x-auth-validation-errors class="alert alert-danger p-2 mb-2" role="alert" :errors="$errors" />
      <div class="mb-2">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
      </div>

      <div class="row g-2 align-items-center mb-2">
        <div class="col-2 text-end">
          <label for="email" class="form-label">Email:</label>
        </div>
        <div class="col-10">
          <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" value="{{ old('email') }}" required autofocus />
        </div>
      </div>
      <div class="row g-2 align-items-center">
        <div class="col-2 text-end">
          &nbsp;
        </div>
        <div class="col-10">
          <button type="submit" class="btn btn-primary">{{ __('Email Password Reset Link') }}</button>
        </div>
      </div>
    </form>
  </x-auth-card>
</x-auth-layout>
