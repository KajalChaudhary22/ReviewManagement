<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $subject }}</title>
</head>
<body>
    {{-- <p>Dear {{ $user->name ?? 'User' }},</p> --}}

    <p>{!! $content !!}</p>

    <p>Best regards,<br>The SCIZORA Team</p>
</body>
</html>
