<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            border: none;
            border-radius: 15px;
        }

        .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container mt-4 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold text-success">Daftar Akun Baru</h3>
                        <p class="text-muted">Lengkapi data diri untuk bergabung</p>
                    </div>

                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Username</label>
                                <input type="text" name="username" class="form-control bg-light" placeholder="username123" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Email</label>
                                <input type="email" name="email" class="form-control bg-light" placeholder="email@contoh.com" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text" name="namaLengkap" class="form-control bg-light" placeholder="Masukkan nama sesuai KTP" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password</label>
                            <input type="password" name="password" class="form-control bg-light" placeholder="Minimal 8 karakter" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Alamat</label>
                            <textarea name="alamat" class="form-control bg-light" rows="3" placeholder="Alamat lengkap tempat tinggal..." required></textarea>
                        </div>

                        <button type="submit" class="btn btn-success w-100 py-2 fw-bold shadow-sm rounded-3">
                            Daftar Sebagai User
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <p class="mb-0 text-muted">Sudah punya akun? <a href="{{ route('login') }}" class="text-success fw-bold text-decoration-none">Login di sini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>