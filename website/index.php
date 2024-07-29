

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD TRANSACTIONS</title>
</head>
<link rel="stylesheet" href="style.css">
<link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
<body>
<form class="forgot-password">
  <div class="header">
    <span class="title">Forgot Password</span>
    <p class="sub-title">Please Select Option To Reset Password</p>
  </div>
  <div class="reset-option">
    <input value="email" id="email" name="option" type="radio" checked="">
    <label for="email">
      <div class="reset-info">
        <span class="reset-title">Reset via Email</span>
        <span class="reset-sub-title">Reset link will be sent to your registered email address</span>
      </div>
    </label>
  </div>
  <div class="reset-option">
    <input value="sms" id="sms" name="option" type="radio">
    <label for="sms">
       <div class="reset-info">
        <span class="reset-title">Reset via SMS</span>
        <span class="reset-sub-title">Reset link will be sent to your registered number</span>
      </div>
    </label>
  </div>
    <a href="#" title="" class="send-btn">Send Link</a>
    <p class="sub-title">Didn't receive link? <span class="resend">Resend<span></span></span></p>
</form>
</body>
   
</html>