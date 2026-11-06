<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - MyShop</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-dark: #0f172a;
            --glass-bg: rgba(30, 41, 59, 0.72);
            --glass-border: rgba(255, 255, 255, 0.08);
            --glass-border-focus: rgba(96, 165, 250, 0.5);
            --input-bg: rgba(15, 23, 42, 0.6);
            --accent-primary: #3b82f6;
            --accent-gradient: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
            --error-bg: rgba(239, 68, 68, 0.12);
            --error-border: rgba(239, 68, 68, 0.3);
            --error-text: #fca5a5;
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
                radial-gradient(at 100% 100%, rgba(139, 92, 246, 0.22) 0px, transparent 50%);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Top Bar */
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

        /* Center Layout */
        .main-wrapper {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px 20px 60px 20px;
        }

        .register-card {
            background: var(--glass-bg);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.55);
            width: 100%;
            max-width: 440px;
            padding: 40px 36px;
            animation: cardEntrance 0.5s ease-out;
        }

        @keyframes cardEntrance {
            from { opacity: 0; transform: translateY(16px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .card-header {
            margin-bottom: 28px;
            text-align: left;
        }

        .card-header h2 {
            font-size: 1.85rem;
            font-weight: 800;
            letter-spacing: -0.5px;
            margin-bottom: 8px;
        }

        .card-header p {
            color: var(--text-muted);
            font-size: 0.95rem;
        }

        /* Error Banner */
        .error {
            background: var(--error-bg);
            border: 1px solid var(--error-border);
            color: var(--error-text);
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 0.88rem;
            margin-bottom: 22px;
            display: flex;
            align-items: center;
            gap: 10px;
            line-height: 1.4;
        }

        .error::before {
            content: "⚠️";
            font-size: 1rem;
        }

        /* Form Inputs */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.88rem;
            font-weight: 600;
            color: #cbd5e1;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            background: var(--input-bg);
            border: 1px solid var(--glass-border);
            border-radius: 10px;
            padding: 13px 16px;
            font-size: 0.95rem;
            color: var(--text-main);
            font-family: inherit;
            outline: none;
            transition: all 0.2s ease;
        }

        input[type="text"]::placeholder,
        input[type="email"]::placeholder,
        input[type="password"]::placeholder {
            color: #64748b;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: var(--accent-primary);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
            background: rgba(15, 23, 42, 0.85);
        }

        /* Submit Button */
        .btn-submit {
            background: var(--accent-gradient);
            color: white;
            padding: 14px 20px;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            margin-top: 8px;
            box-shadow: 0 10px 20px -5px rgba(59, 130, 246, 0.45);
            transition: all 0.25s ease;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 26px -5px rgba(139, 92, 246, 0.55);
            filter: brightness(1.08);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        /* Footer Link */
        .back-link-wrapper {
            margin-top: 24px;
            text-align: center;
        }

        .back-link {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .back-link:hover {
            color: var(--text-main);
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <header class="top-nav">
        <a href="index.html" class="logo">MyShop.</a>
    </header>

    <main class="main-wrapper">
        <div class="register-card">
            <div class="card-header">
                <h2>Create Account</h2>
                <p>Join MyShop for member-only access and discounts.</p>
            </div>

            <!-- Server-Side Error Feedback -->
            <?php if (!empty($_GET['error'])): ?>
                <div class="error" role="alert">
                    <span><?php echo htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
            <?php endif; ?>

            <form method="post" action="process register.php" novalidate autocomplete="on">
                <div class="form-group">
                    <label for="name">Full Name *</label>
                    <input type="text" id="name" name="name" placeholder="Jane Doe" required autofocus>
                </div>

                <div class="form-group">
                    <label for="email">Email Address *</label>
                    <input type="email" id="email" name="email" placeholder="jane@example.com" required>
                </div>

                <div class="form-group">
                    <label for="password">Password *</label>
                    <input type="password" id="password" name="password" placeholder="At least 8 characters" minlength="8" required>
                </div>

                <button type="submit" class="btn-submit">Register</button>
            </form>

            <div class="back-link-wrapper">
                <a href="index.html" class="back-link">&larr; Back to Home</a>
            </div>
        </div>
    </main>

</body>
</html>
