<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@csrf
<div class="login-container">
    <div class="login-card">
        <h2>Login</h2>
        @if (session('error'))
            <div class="error-message">{{ session('error') }}</div>
        @endif
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
                @error('username')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                @error('password')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="login-btn">Login</button>
           
        </form>
    </div>
</div>
