<x-auth-layout>
  <x-auth-card>
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <x-slot name="title">Reset Password</x-slot>

    <form method="POST" class="p-2" action="{{ route('password.update') }}">
      @csrf

      <input type="hidden" name="token" value="{{ $request->route('token') }}">

      <div class="row g-2 align-items-center mb-2">
        <div class="col-3 text-end">
          <label for="email" class="form-label">Email:</label>
        </div>
        <div class="col-9">
          <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" value="{{ old('email', $request->email) }}" required />
        </div>
      </div>

      <div class="row g-2 align-items-center mb-2">
        <div class="col-3 text-end">
          <label for="password" class="form-label">Password:</label>
        </div>
        <div class="col-9">
          <input type="password" class="form-control" id="password" placeholder="***" name="password" required/>
        </div>
      </div>

      <div class="row g-2 align-items-center mb-2">
        <div class="col-3 text-end">
          <label for="password_confirmation" class="form-label">Confirm Password:</label>
        </div>
        <div class="col-9">
          <input type="password" class="form-control" id="password_confirmation" placeholder="***" name="password_confirmation" required/>
        </div>
      </div>

      <div class="row g-2 align-items-center">
        <div class="col-3 text-end">
          &nbsp;
        </div>
        <div class="col-9">
          <button type="submit" class="btn btn-primary">{{ __('Reset Password') }}</button>
        </div>
      </div>
    </form>
  </x-auth-card>
</x-auth-layout>
