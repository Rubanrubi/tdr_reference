<!DOCTYPE html>
<html>
<head>
    <title>TDR</title>
</head>
<body>
<h1>Kindly click the following link to verify your email.</h1>
<p>
    {{url('/')}}/creditor/email/verify/{{$details['verification_code']}}/{{$details['creditor_id']}}
</p>
Thank you
</body>
</html>
