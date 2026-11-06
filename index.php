<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyShop - Welcome</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-dark: #0f172a;
            --glass-bg: rgba(30, 41, 59, 0.7);
            --glass-border: rgba(255, 255, 255, 0.1);
            --accent-primary: #3b82f6;
            --accent-glow: #60a5fa;
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
                radial-gradient(at 0% 0%, rgba(59, 130, 246, 0.25) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(139, 92, 246, 0.25) 0px, transparent 50%);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar / Header */
        .header {
            backdrop-filter: blur(12px);
            background: rgba(15, 23, 42, 0.8);
            border-bottom: 1px solid var(--glass-border);
            padding: 20px 0;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.6rem;
            font-weight: 800;
            background: linear-gradient(135deg, #60a5fa, #c084fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.5px;
        }

        .nav-tagline {
            font-size: 0.9rem;
            color: var(--text-muted);
        }

        /* Hero Section */
        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 24px;
        }

        .hero-card {
            background: var(--glass-bg);
            backdrop-filter: blur(16px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: 60px 40px;
            text-align: center;
            max-width: 720px;
            width: 100%;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .badge {
            display: inline-block;
            background: rgba(59, 130, 246, 0.15);
            color: var(--accent-glow);
            border: 1px solid rgba(59, 130, 246, 0.3);
            padding: 6px 16px;
            border-radius: 999px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 24px;
        }

        .hero-card h2 {
            font-size: 3rem;
            font-weight: 800;
            line-height: 1.15;
            margin-bottom: 16px;
            letter-spacing: -1px;
        }

        .hero-card p {
            font-size: 1.15rem;
            color: var(--text-muted);
            max-width: 520px;
            margin: 0 auto 36px auto;
            line-height: 1.6;
        }

        /* Call to Action Button */
        .signup-link {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
            color: white;
            padding: 16px 36px;
            text-decoration: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.5);
            transition: all 0.25s ease;
        }

        .signup-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px -5px rgba(139, 92, 246, 0.65);
            filter: brightness(1.1);
        }

        .signup-link:active {
            transform: translateY(0);
        }

        /* Feature Perks Grid */
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
            margin-top: 48px;
            padding-top: 36px;
            border-top: 1px solid var(--glass-border);
            text-align: left;
        }

        .feature-item h3 {
            font-size: 0.95rem;
            color: var(--text-main);
            margin-bottom: 4px;
        }

        .feature-item p {
            font-size: 0.85rem;
            color: var(--text-muted);
            margin: 0;
        }

        @media (max-width: 600px) {
            .hero-card h2 { font-size: 2.2rem; }
            .hero-card { padding: 40px 24px; }
            .nav-tagline { display: none; }
        }
    </style>
</head>
<body>

    <header class="header">
        <div class="container nav-content">
            <h1 class="logo">MyShop.</h1>
            <span class="nav-tagline">Your one-stop destination for amazing products</span>
        </div>
    </header>

    <main class="main-content">
        <div class="hero-card">
            <span class="badge">✨ Member Access Open</span>
            <h2>Welcome to MyShop</h2>
            <p>Join our community today to unlock exclusive member deals, early product drops, and instant order tracking.</p>
            
            <!-- Link to signup page -->
            <a href="register.php" class="signup-link">
                Create Your Account <span>&rarr;</span>
            </a>

            <div class="features">
                <div class="feature-item">
                    <h3>⚡ Fast Dispatch</h3>
                    <p>Priority next-day delivery on member orders.</p>
                </div>
                <div class="feature-item">
                    <h3>🔒 Exclusive Drops</h3>
                    <p>Early access to limited stock and flash sales.</p>
                </div>
                <div class="feature-item">
                    <h3>🎁 Member Rewards</h3>
                    <p>Earn points automatically on every purchase.</p>
                </div>
            </div>
        </div>
    </main>

</body>
</html>
