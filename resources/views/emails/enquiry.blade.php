<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8"><title>New enquiry</title></head>
<body style="font-family:Arial,Helvetica,sans-serif;color:#222;">
    <h2 style="color:#0b5d3b;margin:0 0 16px;">New website enquiry</h2>
    <table cellpadding="8" cellspacing="0" border="0" style="border-collapse:collapse;">
        <tr><td><strong>Name</strong></td><td>{{ $data['name'] }}</td></tr>
        <tr><td><strong>Mobile</strong></td><td>{{ $data['mobile'] }}</td></tr>
        <tr><td><strong>Email</strong></td><td>{{ $data['email'] }}</td></tr>
        <tr><td><strong>Address</strong></td><td>{{ $data['address'] }}</td></tr>
        <tr><td><strong>Service</strong></td><td>{{ $data['service'] }}</td></tr>
        <tr><td><strong>Received</strong></td><td>{{ $data['submitted_at'] }}</td></tr>
    </table>
</body>
</html>
