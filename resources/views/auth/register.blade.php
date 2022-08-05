<x-auth-layout>
  <x-auth-card>
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <x-slot name="title">Registrasi</x-slot>

    <form method="POST" class="p-2" action="{{ route('register') }}">
      @csrf

      <div class="row g-2 align-items-center mb-2">
        <div class="col-3 text-end">
          <label for="name" class="form-label">Name:</label>
        </div>
        <div class="col-9">
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus />
        </div>
      </div>

      <div class="row g-2 align-items-center mb-2">
        <div class="col-3 text-end">
          <label for="email" class="form-label">Email:</label>
        </div>
        <div class="col-9">
          <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" value="{{ old('email') }}" required />
        </div>
      </div>

      <div class="row g-2 align-items-center mb-2">
        <div class="col-3 text-end">
          <label for="password" class="form-label">Password:</label>
        </div>
        <div class="col-9">
          <input type="password" class="form-control" id="password" placeholder="***" name="password" required autocomplete="new-password" />
        </div>
      </div>

      <div class="row g-2 align-items-center mb-2">
        <div class="col-3 text-end">
          <label for="password_confirmation" class="form-label">Confirm Password:</label>
        </div>
        <div class="col-9">
          <input type="password" class="form-control" id="password_confirmation" placeholder="***" name="password_confirmation" required autocomplete="new-password" />
        </div>
      </div>

      <div class="row g-2 align-items-center mb-2">
        <div class="col-3 text-end">
          &nbsp;
        </div>
        <div class="col-9 d-flex justify-content-between">
          <a href="{{ route('login') }}">
            {{ __('Already registered?') }}
          </a>
          <div class="text-end">
            @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}">
                  {{ __('Forgot your password?') }}
              </a>
            @endif
          </div>
        </div>
      </div>

      <div class="row g-2 align-items-center">
        <div class="col-3 text-end">
          &nbsp;
        </div>
        <div class="col-9">
          <button type="submit" class="btn btn-primary">{{ __('Daftar') }}</button>
        </div>
      </div>
    </form>
  </x-auth-card>
</x-guest-layout>
