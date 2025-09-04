<style>
    .confirmation-container {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 60px 40px;
        text-align: center;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        max-width: 500px;
        width: 100%;
        margin: 40px auto;
        position: relative;
        overflow: hidden;
        animation: slideUp 0.8s ease-out;
    }

    .confirmation-container::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(102, 126, 234, 0.1), transparent);
        animation: rotate 20s linear infinite;
        pointer-events: none;
    }

    .logo-container {
        position: relative;
        z-index: 1;
        margin-bottom: 30px;
    }

    .confirmation-logo {
        width: 80px;
        height: 80px;
        border-radius: 20px;
        object-fit: cover;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        transition: transform 0.3s ease;
    }

    .confirmation-logo:hover {
        transform: scale(1.05) rotate(5deg);
    }

    .welcome-text {
        position: relative;
        z-index: 1;
        font-size: 2rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 10px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .confirmation-title {
        position: relative;
        z-index: 1;
        font-size: 1.5rem;
        font-weight: 600;
        color: #4a5568;
        margin-bottom: 30px;
    }

    .confirmation-description {
        position: relative;
        z-index: 1;
        color: #718096;
        margin-bottom: 40px;
        font-size: 1rem;
        line-height: 1.6;
    }

    .confirm-btn {
        position: relative;
        z-index: 1;
        display: inline-block;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 16px 40px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        border: none;
        cursor: pointer;
    }

    .confirm-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(102, 126, 234, 0.5);
        background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        color: white;
        text-decoration: none;
    }

    .confirm-btn:active {
        transform: translateY(0);
    }

    .security-notice {
        position: relative;
        z-index: 1;
        margin-top: 30px;
        padding: 15px;
        background: rgba(102, 126, 234, 0.1);
        border-radius: 10px;
        font-size: 0.9rem;
        color: #4a5568;
        border-left: 4px solid #667eea;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }

    @media (max-width: 600px) {
        .confirmation-container {
            padding: 40px 30px;
            margin: 20px auto;
        }

        .welcome-text {
            font-size: 1.5rem;
        }

        .confirmation-title {
            font-size: 1.25rem;
        }

        .confirm-btn {
            padding: 14px 30px;
            font-size: 1rem;
        }
    }
</style>

<div class="confirmation-container">
    <div class="logo-container">
        <img src="https://drive.google.com/file/d/1XBAcxFmmlqLco1_8p_BxUERWu8YlcmD5/view?usp=sharing" alt="Logo" class="confirmation-logo">
    </div>

    <h2 class="welcome-text">Welcome {{$name}}!</h2>

    <h3 class="confirmation-title">Confirm your account</h3>

    <p class="confirmation-description">
        We're excited to have you on board! Please click the button below to verify your email address and activate your account.
    </p>

    <a href="{{$href}}" class="confirm-btn">
        Confirm Account
    </a>

    <div class="security-notice">
        <strong>Security tip:</strong> If you didn't create this account, you can safely ignore this email.
    </div>
</div>
