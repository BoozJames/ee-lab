<!DOCTYPE html>
<html>

<head>
    <title>Latest Request Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding-top: 3px;
        }

        p,
        li {
            font-size: 12px;
            margin-bottom: 3px;
        }

        ul {
            margin-top: 0;
            padding-left: 20px;
        }
    </style>
</head>

<body>

    @if ($latestRequest)
        <p>Reference Number: {{ $latestRequest['reference_number'] }}</p>
        <p>Items:</p>
        <ul>
            @foreach ($latestRequest['items'] as $item)
                @if (empty($item['options']))
                    <li>{{ $item['name'] }} - Qty: {{ $item['qty'] }}</li>
                @endif
            @endforeach
        </ul>
        <p>Requestors:</p>
        <ul>
            @foreach ($latestRequest['requestors'] as $requestor)
                @if ($requestor)
                    <li>{{ $requestor['first_name'] }} {{ $requestor['last_name'] }}</li>
                @endif
            @endforeach
        </ul>
    @else
        <p>No request found.</p>
    @endif

</body>

</html>
