<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #ff4b2b, #ff416c);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: "Segoe UI", sans-serif;
        }
        .auth-box {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            overflow: hidden;
            width: 100%;
            max-width: 480px;
        }
        .nav-tabs {
            border: none;
        }
        .nav-tabs .nav-link {
            border: none;
            border-radius: 0;
            color: #555;
            font-weight: 600;
            padding: 1rem;
        }
        .nav-tabs .nav-link.active {
            background: #ff4b2b;
            color: #fff !important;
        }
        .btn-main {
            background: #ff4b2b;
            border: none;
            color: #fff;
            font-weight: 600;
            padding: .75rem;
            border-radius: 8px;
            transition: 0.3s;
        }
        .btn-main:hover {
            background: #e33c21;
        }
    </style>
</head>
<body>

<div class="auth-box">
    <!-- Tabs -->
    <ul class="nav nav-tabs nav-fill" id="authTab" role="tablist">
        <li class="nav-item">
            <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#loginTab" type="button" role="tab">
                Login
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#registerTab" type="button" role="tab">
                Register
            </button>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content p-4">
        <!-- Login Form -->
        <div class="tab-pane fade show active" id="loginTab" role="tabpanel">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required autofocus>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="d-flex justify-content-between mb-3">
                    <div class="form-check">
                        <input type="checkbox" name="remember" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="small text-muted">Forgot Password?</a>
                </div>

                <button type="submit" class="btn btn-main w-100">Login</button>
            </form>
        </div>

        <!-- Register Form -->
        <div class="tab-pane fade" id="registerTab" role="tabpanel">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success w-100">Register</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
