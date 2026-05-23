<?php
require_once 'includes/config.php';

// Read token and email from query string — they will be validated client-side before form is shown
$token = isset($_GET['token']) ? trim($_GET['token']) : '';
$email = isset($_GET['email']) ? trim(strtolower($_GET['email'])) : '';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Reset Password – UX Pacific Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>" />
    <?php include 'includes/auth-preload.php'; ?>
    <link
      href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
      <link rel="icon" type="image/x-icon" href="img/faviconUXP444@4x-789.png" />
    <link rel="stylesheet" href="style.css" />
  </head>

  <body class="reset-password-page" data-reset-token="<?php echo htmlspecialchars($token, ENT_QUOTES, 'UTF-8'); ?>" data-reset-email="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>">
    <div class="page">
      <!-- NAVBAR -->
      <header class="site-header" id="navbar">
        <nav class="nav-bar">
          <div class="nav-logo">
            <a href="index.php">
              <img src="img/logo1.webp" alt="UX Pacific" />
            </a>
          </div>
          <ul class="nav-links">
            <li><a href="index.php" class="nav-link">Home</a></li>
            <li><a href="shopAll.php" class="nav-link">Buy Now</a></li>
          </ul>
          <div class="nav-actions">
            <a href="signin.php" class="nav-cta">Sign in</a>
          </div>
          <button id="mobile-menu-btn" class="nav-toggle" aria-label="Toggle navigation">
            <span></span><span></span><span></span>
          </button>
        </nav>
        <div id="mobile-menu" class="nav-mobile-menu">
          <a href="index.php" class="nav-mobile-link">Home</a>
          <a href="shopAll.php" class="nav-mobile-link">Buy Now</a>
          <a href="signin.php" class="nav-mobile-link nav-mobile-cta">Sign in</a>
        </div>
      </header>

      <!-- MAIN CONTENT -->
      <main class="main">
        <section class="auth-section">
          <div class="auth-container">
            <div class="auth-card">
              <h1 class="auth-title">Create New Password</h1>
              <p class="auth-subtitle">Enter and confirm your new password below.</p>

              <!-- Validation state (shown while checking token) -->
              <div id="token-checking" class="auth-status-block">
                <p>Validating reset link…</p>
              </div>

              <!-- Invalid token state -->
              <div id="token-invalid" class="is-hidden">
                <div class="error-message auth-message-spaced">
                  This reset link is invalid or has expired.
                  <br>Please <a href="forgot-password.php" class="auth-link">request a new one</a>.
                </div>
              </div>

              <!-- New password form (shown after token validation) -->
              <form class="auth-form is-hidden" id="reset-password-form">
                <div id="reset-error" class="error-message is-hidden"></div>

                <div class="form-field">
                  <label for="new-password">New Password *</label>
                  <input
                    id="new-password"
                    name="password"
                    type="password"
                    placeholder="At least 8 characters"
                    required
                    minlength="8"
                    autocomplete="new-password"
                  />
                  <span class="field-hint">Must be at least 8 characters</span>
                  <span class="field-error"></span>
                </div>

                <div class="form-field">
                  <label for="confirm-password">Confirm Password *</label>
                  <input
                    id="confirm-password"
                    name="confirm_password"
                    type="password"
                    placeholder="Repeat your new password"
                    required
                    minlength="8"
                    autocomplete="new-password"
                  />
                  <span class="field-error"></span>
                </div>

                <button type="submit" class="btn-primary auth-submit" id="save-btn">
                  <span id="save-text">Save New Password</span>
                  <span id="save-loader" class="is-hidden">Saving…</span>
                </button>
              </form>

              <!-- Success state -->
              <div id="reset-success" class="is-hidden">
                <div class="success-message auth-message-spaced">
                  <strong>Password updated successfully!</strong><br>
                  You can now sign in with your new password.
                </div>
                <a href="signin.php" class="btn-primary auth-submit">
                  Go to Sign In
                </a>
              </div>

              <p class="auth-footer">
                <a href="signin.php" class="auth-link">Back to Sign In</a>
              </p>
            </div>
          </div>
        </section>
      </main>

      <!-- FOOTER -->
      <footer class="site-footer">
        <div class="footer-bottom">
          <p>©2026 UXPacific. All rights reserved.</p>
        </div>
      </footer>
    </div>

    <script src="script.js"></script>
  </body>
</html>
