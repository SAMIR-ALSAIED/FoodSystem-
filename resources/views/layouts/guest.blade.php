<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">

<div class="login-box">
    <div class="login-logo">

    </div>

    <!-- محتوى الصفحة -->
    {{ $slot }}

</div>

<!-- Scripts -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>

    <!-- JavaScript -->
    <script>
        // اظهار كلمة السر
        function togglePassword() {
            let password = document.getElementById("password");
            let icon = document.getElementById("eyeIcon");

            if (password.type === "password") {
                password.type = "text";
                icon.classList.remove("bi-eye");
                icon.classList.add("bi-eye-slash");
            } else {
                password.type = "password";
                icon.classList.remove("bi-eye-slash");
                icon.classList.add("bi-eye");
            }
        }

        // Progress Bar قبل إرسال الفورم
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault(); // منع الإرسال الافتراضي

            const form = this;
            const progressContainer = document.getElementById('progressContainer');
            const progressBar = document.getElementById('loginProgress');

            progressContainer.style.display = 'block'; // اظهار الشريط

            let width = 0;
            const interval = setInterval(() => {
                if(width >= 100){
                    clearInterval(interval);
                    form.submit(); // بعد اكتمال الشريط، إرسال الفورم
                } else {
                    width += 1; // سرعة زيادة الشريط
                    progressBar.style.width = width + '%';
                    progressBar.textContent = width + '%';
                }
            }, 20); // كل 20ms يزيد 1%
        });
    </script>
</body>
</html>
