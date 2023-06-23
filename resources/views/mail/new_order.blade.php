<!DOCTYPE html>
<html>

<head>
    <title>New Order from {{$appname}}</title>
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
    </style>
</head>

<body>
    <center>
        <img src="{{url('')}}{{ $sitelogo }}" style="max-width: 100%; height: 300px;">
    </center>
    <h1>New Order from {{$appname}}</h1>
    <table>
        <tr>
            <td>Orderer Name:</td>
            <td>{{ $user_name }}</td>
        </tr>
        <tr>
            <td>Product Email:</td>
            <td>{{ $orderer_email }}</td>
        </tr>
        <tr>
            <td>Orderer Type:</td>
            <td>{{ $orderer_type }}</td>
        </tr>
        <tr>
            <td>Product Name:</td>
            <td>{{ $prod_name }}</td>
        </tr>
        <tr>
            <td>Amount:</td>
            <td>{{ $amount }}</td>
        </tr>
        <tr>
            <td>Total Cost:</td>
            <td>{{ $total_cost }}</td>
        </tr>
    </table>

    Best Regards, <br>
    {{ $appname }}
</body>

</html>
