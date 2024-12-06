<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin: 0;">
    <div style="background-color: #ffffff;border-radius: 15px;padding: 10px;font-size: 15px;">
        <p>Hi {{ $username }},</p>
        <p style="text-align: justify;">
            We noticed you signed up using your Google account so we generated a password for your account. We strongly advise you change the password in your account settings into something you can remember or if you wish to keep the password to yourself, you can keep on using the 'Continue with Google' option to login (or even login in directly with us using your Google email address and the generated password below).
        </p>
        <div>
            <h2>{{ $password }}</h2>
        </div>
        <p>Which ever method you choose to login your account, our system will always authenticate you as <b>{{ $username }}</b> ( {{ $email }} )</p>
        <div style="margin-top: 3rem;margin-bottom: 3rem;">Best regards,<br>{{ env('APP_NAME') }}</div>
    </div>
    <footer style="background-color: #e7e7e7;text-align: center;padding: 25px;">
        &copy; 2024 {{ env('APP_NAME') }} built with <span style="color: red;">&hearts;</span> by <a href="https://saaaron.github.io"><b>Sa Aaron</b></a>
    </footer>
</body>
</html>