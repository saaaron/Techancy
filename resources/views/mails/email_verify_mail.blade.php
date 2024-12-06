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
            Thank you for creating an account with us, we have sent you a link for you to verify your email address. Click on the button below to proceed.
        </p>
        <div style="display: flex;justify-content: center;">
            <div>
                <a href="http://127.0.0.1:8000/email/verify/{{ $token }}"><button style="background-color: #000; color: #fff;padding: 10px;border-radius: 5px;border: 0;cursor: pointer;">Verify</button></a>
            </div>
        </div>
        <div style="margin-top: 3rem;margin-bottom: 3rem;">Best regards,<br>{{ env('APP_NAME') }}</div>
    </div>
    <footer style="background-color: #e7e7e7;text-align: center;padding: 25px;">
        &copy; 2024 {{ env('APP_NAME') }} built with <span style="color: red;">&hearts;</span> by <a href="https://saaaron.github.io"><b>Sa Aaron</b></a>
    </footer>
</body>
</html>