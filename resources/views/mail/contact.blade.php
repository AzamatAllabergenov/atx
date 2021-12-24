<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td><strong>Фамилия:</strong> </td>
            <td>{{ $last_name or '' }}</td>
        </tr>
        <tr>
            <td><strong>Имя:</strong </td>
            <td>{{ $first_name or '' }}</td>
        </tr>
        <tr>
            <td><strong>E-mail:</strong </td>
            <td>{{ $email or '' }}</td>
        </tr>
        <tr>
            <td><strong>Тел.:</strong </td>
            <td>{{ $phone or '' }}</td>
        </tr>
        <tr>
            <td><strong>Кому:</strong </td>
            <td>{{ $position or '' }}</td>
        </tr>
        <tr>
            <td><strong>Сообщения:</strong </td>
            <td>{{ $experience or '' }}</td>
        </tr>
    </table>
</body>
</html>