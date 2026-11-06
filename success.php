<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful - MyShop</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-dark: #0f172a;
            --glass-bg: rgba(30, 41, 59, 0.72);
            --glass-border: rgba(255, 255, 255, 0.08);
            --accent-primary: #3b82f6;
            --accent-gradient: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
            --success-color: #10b981;
            --success-glow: rgba(16, 185, 129, 0.25);
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background-color: var(--bg-dark);
            background-image: 
                radial-gradient(at 0% 0%, rgba(59, 130, 246, 0.22) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(16, 185, 129, 0.18) 0px, transparent 50%);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            text-align: center;
        }

        /* Top Nav Bar */
        .top-nav {
            padding: 24px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 800;
            text-decoration: none;
            background: linear-gradient(135deg, #60a5fa, #c084fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.5px;
        }

        /* Main Container */
        .main-wrapper {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 24px 60px 24px;
        }

        .success-card {
            background: var(--glass-bg);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.55);
            max-width: 500px;
            width: 100%;
            padding: 50px 36px;
            animation: cardEntrance 0.5s ease-out;
        }

        @keyframes cardEntrance {
            from { opacity: 0; transform: translateY(16px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Animated Icon Badge */
        .icon-wrapper {
            width: 80px;
            height: 80px;
            background: rgba(16, 185, 129, 0.12);
            border: 2px solid rgba(16, 185, 129, 0.4);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px auto;
            box-shadow: 0 0 25px var(--success-glow);
            animation: popIn 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        @keyframes popIn {
            0% { transform: scale(0.4); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }

        .icon-wrapper svg {
            width: 40px;
            height: 40px;
            stroke: var(--success-color);
        }

        .success-card h2 {
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: -0.5px;
            margin-bottom: 12px;
        }

        .success-card p {
            font-size: 1.05rem;
            color: var(--text-muted);
            line-height: 1.6;
            margin-bottom: 36px;
        }

        /* Action Buttons */
        .button-group {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 14px 24px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.25s ease;
        }

        .btn-primary {
            background: var(--accent-gradient);
            color: #ffffff;
            box-shadow: 0 10px 20px -5px rgba(59, 130, 246, 0.45);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 26px -5px rgba(139, 92, 246, 0.55);
            filter: brightness(1.08);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.05);
            color: var(--text-main);
            border: 1px solid var(--glass-border);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .btn:active {
            transform: translateY(0);
        }

        @media (min-width: 480px) {
            .button-group {
                flex-direction: row;
            }
            .btn {
                flex: 1;
            }
        }
    </style>
</head>
<body>

    <header class="top-nav">
        <a href="index.php" class="logo">MyShop.</a>
    </header>

    <main class="main-wrapper">
        <div class="success-card">
            <div class="icon-wrapper">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
            </div>

            <h2>Registration Successful!</h2>
            <p>Your account has been created and verified. Welcome to the community!</p>

            <div class="button-group">
                <a href="index.html" class="btn btn-primary">Go to Home</a>
                <a href="register.php" class="btn btn-secondary">Register Another</a>
            </div>
        </div>
    </main>

</body>
</html>
