<x-auth-layout>
    <x-auth-card>
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}" class="p-3">
            @csrf
            <div class="row align-items-center mb-2">
              <div class="col-3 text-end">
                <label for="email" class="form-label">Email:</label>
              </div>
              <div class="col-9">
                <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" value="{{ old('email') }}" required autofocus />
              </div>
            </div>

            <div class="row align-items-center mb-2">
              <div class="col-3 text-end">
                <label for="password" class="form-label">Password:</label>
              </div>
              <div class="col-9">
                <input type="password" class="form-control" id="password" placeholder="***" name="password" required autocomplete="current-password" />
              </div>
            </div>

            <div class="row align-items-center mb-2">
              <div class="col-3 text-end">
                &nbsp;
              </div>
              <div class="col-9 d-flex justify-content-between">
                <div class="form-check">
                  <input type="checkbox" id="remember_me" class="form-check-input" name="remember">
                  <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
                </div>
                <div class="text-end">
                  @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                  @endif
                </div>
              </div>
            </div>

            <div class="row align-items-center">
              <div class="col-3 text-end">
                &nbsp;
              </div>
              <div class="col-9">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
            </div>
        </form>
    </x-auth-card>
</x-auth-layout>
