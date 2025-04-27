<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Access Denied</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Inter', sans-serif;
      height: 100vh;
      background: linear-gradient(135deg, #1e293b, #7258DB);
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
    }

    .access-container {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 16px;
      padding: 50px 40px;
      box-shadow: 0 8px 40px rgba(0, 0, 0, 0.2);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      text-align: center;
      max-width: 480px;
      width: 90%;
      color: #f9fafb;
      animation: slideIn 0.8s ease-out;
    }

    .icon {
      font-size: 64px;
      color: #f87171;
      margin-bottom: 25px;
    }

    h1 {
      font-size: 36px;
      font-weight: 600;
      margin-bottom: 10px;
    }

    p {
      font-size: 16px;
      color: #e2e8f0;
      margin-bottom: 30px;
      line-height: 1.6;
    }

    a {
      display: inline-block;
      padding: 12px 26px;
      font-size: 15px;
      font-weight: 500;
      text-decoration: none;
      color: #fff;
      background-color: #2563eb;
      border-radius: 8px;
      transition: background-color 0.3s ease;
    }

    a:hover {
      background-color: #1d4ed8;
    }

    @keyframes slideIn {
      from {
        transform: translateY(40px);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    @media (max-width: 500px) {
      .access-container {
        padding: 30px 20px;
      }

      h1 {
        font-size: 28px;
      }

      p {
        font-size: 15px;
      }

      .icon {
        font-size: 52px;
      }
    }
  </style>
</head>
<body>

  <div class="access-container">
    <div class="icon"><i class="bi bi-shield-lock-fill"></i></div>
    <h1>Access Denied</h1>
    <p>You do not have permission to view this page. Please contact the system administrator if you believe this is a mistake.</p>
    <a href="{{ route('admin') }}">← Back to Dashboard</a>
  </div>

</body>
</html>
