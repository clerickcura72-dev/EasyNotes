<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Arial;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f9fafb;
        }

        /* background glow */
        body::before {
            content: "";
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(147,51,234,0.2), transparent 70%);
            top: -120px;
            right: -120px;
            z-index: 0;
        }

        body::after {
            content: "";
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(79,70,229,0.2), transparent 70%);
            bottom: -120px;
            left: -120px;
            z-index: 0;
        }

        .card {
            position: relative;
            z-index: 1;
            background: white;
            padding: 32px;
            border-radius: 16px;
            width: 340px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            border: 1px solid #eee;
        }

        h2 {
            margin: 0 0 6px 0;
            font-size: 22px;
        }

        p {
            margin: 0 0 18px 0;
            font-size: 13px;
            color: #6b7280;
        }

        input {
            width: 100%;
            padding: 11px;
            margin-top: 10px;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
            outline: none;
            transition: 0.2s;
        }

        input:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79,70,229,0.1);
        }

        button {
            width: 100%;
            margin-top: 15px;
            padding: 11px;
            border: none;
            background: #4f46e5;
            color: white;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 500;
            transition: 0.2s;
        }

        button:hover {
            background: #4338ca;
        }

        a {
            display: block;
            margin-top: 14px;
            text-align: center;
            font-size: 13px;
            color: #4f46e5;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="card">
    <h2>Create account</h2>
    <p>Start organizing your notes with EasyNotes</p>

    <form method="POST" action="/register">
        @csrf
        <input name="name" type="text" placeholder="Name" required>
        <input name="email" type="email" placeholder="Email" required>
        <input name="password" type="password" placeholder="Password" required>
        <button>Register</button>
    </form>

    <a href="/login">Already have an account? Login</a>
</div>

</body>
</html>