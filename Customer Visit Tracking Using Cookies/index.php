<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Back | Customer Visit Tracker</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="page">

    <div class="welcome-card">

        <div class="icon">☕</div>

        <p class="small-title">CUSTOMER EXPERIENCE</p>

        <h1>Welcome to Your<br><span>Personal Space</span></h1>

        <p class="description">
            Tell us a little about yourself and we'll remember
            your preferences for your next visit.
        </p>

        <form action="process.php" method="POST">

            <div class="input-group">
                <label>What should we call you?</label>
                <input 
                    type="text" 
                    name="customer_name" 
                    placeholder="Enter your name"
                    required
                >
            </div>

            <div class="input-group">
                <label>Your favorite experience</label>

                <select name="preference" required>
                    <option value="">Choose a preference</option>
                    <option value="Coffee">☕ Coffee</option>
                    <option value="Desserts">🍰 Desserts</option>
                    <option value="Music">🎵 Music</option>
                    <option value="Books">📚 Books</option>
                </select>
            </div>

            <button type="submit">
                Continue
                <span>→</span>
            </button>

        </form>

        <div class="privacy">
            🔒 Your preferences are stored securely using cookies.
        </div>

    </div>

    <div class="side-content">

        <div class="quote">
            <span class="quote-mark">“</span>

            <h2>
                We remember<br>
                <span>the little things.</span>
            </h2>

            <p>
                Your preferences help us create a more
                personalized experience every time you return.
            </p>
        </div>

        <div class="features">

            <div class="feature">
                <div class="feature-icon">🍪</div>
                <div>
                    <h3>Smart Cookies</h3>
                    <p>Remember your preferences</p>
                </div>
            </div>

            <div class="feature">
                <div class="feature-icon">👋</div>
                <div>
                    <h3>Personal Greetings</h3>
                    <p>Feel welcomed on every visit</p>
                </div>
            </div>

            <div class="feature">
                <div class="feature-icon">📈</div>
                <div>
                    <h3>Visit Tracking</h3>
                    <p>Keep track of your visits</p>
                </div>
            </div>

        </div>

    </div>

</div>

</body>
</html>