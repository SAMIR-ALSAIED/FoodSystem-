<x-guest-layout>
    <div class="card">
        <div class="card-body login-card-body">


            <!-- Session Status -->


            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="input-group mb-3">
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="Email" required autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <!-- Password -->
                <div class="input-group mb-3">
                    <input type="password" name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <!-- Remember Me -->
              <div class="form-group">
    <div class="icheck-primary mb-3">
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">تذكرنى</label>
    </div>

    <button type="submit" class="btn btn-primary btn-block">
        تسجيل الدخول
    </button>
</div>

            </form>
{{--
            @if (Route::has('password.request'))
                <p class="mb-1 mt-3">
                    <a href="{{ route('password.request') }}">هل نسيت كلمة المرور</a>
                </p>
            @endif --}}

        </div>
    </div>
</x-guest-layout>
