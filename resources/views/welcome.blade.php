<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cricket Tournament</title>
    <!-- Styles -->
    <style>
        button {
            background-color: red;
            font-size: 20px;
            border: none;
            padding: 5px;
            border-radius: 5px;
            text-align: center;
        }

        button .btn {
            text-decoration: none;
            color: white;
           

        }
    </style>
</head>

<body>

    <button><a href="{{ route('cricket') }}" class="btn">go to cricket Tournament</a></button>

</body>

</html>