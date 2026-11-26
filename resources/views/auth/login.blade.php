<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SIM-Surat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-['Inter'] antialiased">

    <div class="login-wrapper">
        <!-- Aksen cahaya background -->
        <div class="login-glow"></div>

        <!-- Card Utama -->
        <div class="login-card">
            <!-- Header -->
            <div class="mb-6">
                <h1 class="login-title">SIM-Surat</h1>
                <p class="login-subtitle">Silakan masuk menggunakan akun petugas atau pembaca</p>
            </div>

            <!-- Form Login -->
            <form method="POST" action="{{ route('login.submit') }}" class="space-y-4">
                @csrf

                <!-- Input Email -->
                <div>
                    <label for="email" class="login-label">Email</label>
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        placeholder="petugas@example.test"
                        class="login-input @error('email') border-rose-500 @enderror"
                        required 
                        autofocus
                    >
                    @error('email') 
                        <p class="login-error">⚠ {{ $message }}</p> 
                    @enderror
                </div>

                <!-- Input Password -->
                <div>
                    <label for="password" class="login-label">Password</label>
                    <input 
                        id="password" 
                        type="password" 
                        name="password" 
                        placeholder="••••••••••••"
                        class="login-input @error('password') border-rose-500 @enderror"
                        required
                    >
                    @error('password') 
                        <p class="login-error">⚠ {{ $message }}</p> 
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <div class="pt-2">
                    <button type="submit" class="login-btn">
                        Masuk ke Sistem
                    </button>
                </div>
            </form>

            <!-- Footer kecil -->
            <p class="text-center text-[11px] text-rose-400/50 mt-6">
                &copy; {{ date('Y') }} Sistem Informasi Manajemen Surat
            </p>
        </div>
    </div>

</body>
</html>