<x-auth-layout>
  <x-auth-card>

    <x-slot name="title">Confirm Password</x-slot>

    <div class="mb-4 text-sm text-gray-600">
      {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('password.confirm') }}">
      @csrf

      <div class="row g-2 align-items-center mb-2">
        <div class="col-3 text-end">
          <label for="password" class="form-label">Password:</label>
        </div>
        <div class="col-9">
          <input type="password" class="form-control" id="password" placeholder="***" name="password" required autocomplete="current-password" />
        </div>
      </div>
      <div class="row g-2 align-items-center">
        <div class="col-3 text-end">
          &nbsp;
        </div>
        <div class="col-9">
          <button type="submit" class="btn btn-primary">{{ __('Confirm') }}</button>
        </div>
      </div>
    </form>
    </form>
  </x-auth-card>
</x-auth-layout>
