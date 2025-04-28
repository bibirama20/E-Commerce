<!DOCTYPE html>
<html>
<head>
    <title>Login - Sagara Mart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Tambahkan sedikit CSS custom di sini */
        .login-card {
            background: linear-gradient(135deg,rgb(20, 31, 182) 0%, #2575fc 100%); /* Gradasi biru ungu */
            color: white;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .login-card input.form-control {
            background-color: rgba(255,255,255,0.8);
            border: none;
        }
        .login-card input.form-control:focus {
            background-color: white;
            border: 1px solid #2575fc;
        }
        .login-card label {
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card p-4 login-card" style="min-width: 350px;">
        
        <!-- Logo dan Toko di dalam Card -->
        <div class="text-center mb-3">
            <img src="<?= base_url('uploads/SM.png') ?>" alt="Logo" style="height: 80px; border-radius: 50%;">
        </div>

        <h4 class="mb-3 text-center">Login</h4>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form method="POST" action="/login">
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required autofocus>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button class="btn btn-light w-100 fw-bold">Login</button>
        </form>
    </div>

</body>
</html>
