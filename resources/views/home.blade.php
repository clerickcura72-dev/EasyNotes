<!DOCTYPE html>
<html>
<head>
    <title>EasyNotes</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            height: 100vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;

            /* Animated background */
            background: linear-gradient(-45deg, #f1f3f4, #ffffff, #e8f0fe, #fef7e0);
            background-size: 400% 400%;
            animation: bg 10s ease infinite;
        }

        @keyframes bg {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }

        .card {
            background: rgba(255,255,255,0.9);
            backdrop-filter: blur(10px);
            padding: 45px;
            border-radius: 18px;
            width: 380px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            animation: fadeIn 0.8s ease;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }

        .logo {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #666;
            margin-bottom: 25px;
        }

        .btn {
            display: block;
            padding: 12px;
            margin: 10px 0;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .login {
            background: #1a73e8;
            color: white;
        }

        .login:hover {
            background: #1558b0;
        }

        .register {
            background: #f1f3f4;
            color: black;
        }

        .register:hover {
            background: #e0e0e0;
        }

        .features {
            margin-top: 20px;
            font-size: 12px;
            color: #777;
        }

        .dot {
            height: 8px;
            width: 8px;
            background: #1a73e8;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
        }

    </style>
</head>

<body>

<div class="card">

    <div class="logo">📝 EasyNotes</div>

    <div class="subtitle">Your smart modern notepad system</div>

    <a href="/login" class="btn login">Login</a>
    <a href="/register" class="btn register">Create Account</a>

    

</div>

</body>
</html>