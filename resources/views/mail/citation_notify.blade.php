<!DOCTYPE html>
<html>

<head>
    <title>Order is Successfully Placed {{ $appname }}</title>
    <style>
        body {
            background-color: #f6f6f6;
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            margin: 0;
            padding: 0;
            text-align: left;
            color: #333;
        }

        h1 {
            color: #333;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            margin-bottom: 20px;
            width: 100%;
        }

        table td {
            border: 1px solid #ccc;
            padding: 10px;
        }

        table td:first-child {
            font-weight: bold;
            width: 30%;
        }

        .btn {
            background-color: #3498db;
            border: none;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            font-size: 16px;
            font-weight: bold;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease-in-out;
            border-radius: 4px;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        .centered_information {
            background: #333;
            color: #fff;
            font-weight: 600;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 250px;
            margin: 50px auto;
        }
    </style>
</head>

<body>
    <center>
        <img src="{{ url('') }}{{ $sitelogo }}" style="max-width: 100%; height: 300px;">
    </center>
    <h1>Welcome To {{ $appname }}</h1>

    @if ($status == 1)
        <h1>HURRAY!!</h1>
        <h3>Your Answer got selected for this specific question - "{{ $question_title }}"! Congratulations!!</h3>
        <a href="{{ url('') }}/track-my-answers">Check Online</a> <br>
    @elseif($status == 3)
        <h3>Your Answer got uselected for this specific question - "{{ $question_title }}"!</h3>
        <a href="{{ url('') }}/track-my-answers">Check Online</a> <br>
    @else
        <h3>Your Answer is in review state now for this specific question - "{{ $question_title }}"!</h3>
        <a href="{{ url('') }}/track-my-answers">Check Online</a> <br> <br>
    @endif





    Best Regards, <br>
    {{ $appname }}
</body>

</html>
