<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Thomas Aquinas Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; background: #0a1d37; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-md bg-white rounded-3xl p-8 shadow-2xl">
        <div class="text-center mb-8">
            <img src="https://cdn-icons-png.flaticon.com/512/2940/2940651.png" alt="Logo" class="w-16 h-16 mx-auto mb-4">
            <h1 class="text-2xl font-bold text-[#0a1d37]">Staff Portal</h1>
            <p class="text-gray-500 text-sm">Authorized Personnel Only</p>
        </div>
        
        <form id="loginForm" class="space-y-4">
            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Username</label>
                <input type="text" id="username" class="w-full p-3 border rounded-xl outline-none focus:ring-2 focus:ring-blue-500" placeholder="admin" required>
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Password</label>
                <input type="password" id="password" class="w-full p-3 border rounded-xl outline-none focus:ring-2 focus:ring-blue-500" placeholder="••••••••" required>
            </div>
            <button type="submit" class="w-full bg-[#0a1d37] text-white py-3 rounded-xl font-bold hover:bg-[#15325a] transition-all">Login to Dashboard</button>
        </form>
        
        <p class="text-center text-xs text-red-500 mt-4 hidden" id="loginError"></p>
    </div>

    <script>
        const loginForm = document.getElementById('loginForm');
        const loginError = document.getElementById('loginError');

        loginForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            loginError.classList.add('hidden');

            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value;

            try {
                const response = await fetch('login_router.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: new URLSearchParams({ username, password })
                });

                const data = await response.json();

                if (data.success) {
                    window.location.href = 'dashboard.php';
                } else {
                    loginError.textContent = data.message || "Login failed.";
                    loginError.classList.remove('hidden');
                }
            } catch (err) {
                loginError.textContent = "Server error. Check if login.php exists.";
                loginError.classList.remove('hidden');
            }
        });
    </script>
</body>
</html>