<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fullname = htmlspecialchars(trim($_POST['fullname'] ?? ''));
    $email    = htmlspecialchars(trim($_POST['email'] ?? ''));
    $phone    = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $dob      = htmlspecialchars(trim($_POST['dob'] ?? ''));
    $gender   = htmlspecialchars(trim($_POST['gender'] ?? ''));
    $course   = htmlspecialchars(trim($_POST['course'] ?? ''));
    $address  = htmlspecialchars(trim($_POST['address'] ?? ''));

    if (empty($fullname) || empty($email) || empty($phone) || empty($dob) ||
        empty($gender) || empty($course) || empty($address)) {
        echo "<h3 style='text-align:center;color:red;'>Please fill in all required fields.</h3>";
        exit;
    }

    // Generate a registration ID
    $registrationId = '#' . rand(1000, 9999);
} else {
    echo "<h3 style='text-align:center;color:red;'>No data received. Please go back and fill the form.</h3>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Successful</title>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html, body {
      height: 100%;
      overflow: hidden;
    }

    body {
      background: linear-gradient(135deg, #1A2A4F 0%, #764ba2 100%);
      font-family: 'Open Sans', 'Segoe UI', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .container {
      background: #ffffff;
      border-radius: 16px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
      width: 100%;
      max-width: 750px;
      max-height: 95vh;
      padding: 50px 60px;
      text-align: center;
      animation: fadeIn 0.8s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    h1 {
      font-family: 'Merriweather', serif;
      font-size: 36px;
      font-weight: 700;
      color: #2f2f2f;
      margin-bottom: 15px;
      letter-spacing: 0.5px;
    }

    .success-message {
      font-size: 18px;
      color: #667eea;
      font-weight: 600;
      margin-bottom: 35px;
    }

    .section-title {
      font-family: 'Merriweather', serif;
      font-size: 24px;
      font-weight: 700;
      color: #2f2f2f;
      margin-bottom: 25px;
      text-align: center;
    }

    .details-table {
      width: 100%;
      margin-bottom: 30px;
    }

    .detail-row {
      display: flex;
      padding: 16px 20px;
      border-bottom: 1px solid #f0f0f0;
      transition: background 0.2s;
      background: #f8f9fa;
    }

    .detail-row:nth-child(even) {
      background: #ffffff;
    }

    .detail-row:hover {
      background: #f0f2ff;
    }

    .detail-label {
      font-size: 15px;
      color: #555;
      font-weight: 600;
      width: 200px;
      flex-shrink: 0;
      text-align: left;
    }

    .detail-value {
      font-size: 15px;
      color: #2f2f2f;
      font-weight: 400;
      flex-grow: 1;
      text-align: left;
    }

    .highlight {
      color: #667eea;
      font-weight: 600;
    }

    .btn-back {
      display: inline-block;
      background: linear-gradient(135deg, #667eea, #764ba2);
      color: #fff;
      text-decoration: none;
      padding: 14px 40px;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
      margin-top: 10px;
    }

    .btn-back:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5);
      background: linear-gradient(135deg, #5a68c7, #6a3f94);
    }

    @media (max-width: 600px) {
      .detail-row {
        flex-direction: column;
        gap: 5px;
      }
      
      .detail-label {
        width: 100%;
      }
      
      .container {
        padding: 40px 30px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Registration Successful!</h1>
    <p class="success-message">Your registration has been submitted successfully.</p>
    
    <h2 class="section-title">Registration Details</h2>
    
    <div class="details-table">
      <div class="detail-row">
        <span class="detail-label">Registration ID</span>
        <span class="detail-value highlight"><?php echo $registrationId; ?></span>
      </div>
      
      <div class="detail-row">
        <span class="detail-label">Full Name</span>
        <span class="detail-value"><?php echo $fullname; ?></span>
      </div>
      
      <div class="detail-row">
        <span class="detail-label">Email Address</span>
        <span class="detail-value"><?php echo $email; ?></span>
      </div>
      
      <div class="detail-row">
        <span class="detail-label">Phone Number</span>
        <span class="detail-value"><?php echo $phone; ?></span>
      </div>
      
      <div class="detail-row">
        <span class="detail-label">Date of Birth</span>
        <span class="detail-value"><?php echo date('F d, Y', strtotime($dob)); ?></span>
      </div>
      
      <div class="detail-row">
        <span class="detail-label">Gender</span>
        <span class="detail-value"><?php echo $gender; ?></span>
      </div>
      
      <div class="detail-row">
        <span class="detail-label">Course</span>
        <span class="detail-value"><?php echo $course; ?></span>
      </div>
      
      <div class="detail-row">
        <span class="detail-label">Address</span>
        <span class="detail-value"><?php echo nl2br($address); ?></span>
      </div>
    </div>
    
  </div>
</body>
</html>