<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .container-fluid {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h3 { font-size: 16px; }
        p { font-size: 13px; }
        .underline-div { border-bottom: 1px solid black; }
        @page { size: A4 landscape; max-height: 100%; max-width: 100%; }
    </style>
</head>
<body onload="window.print()">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
              <div style="width: 700px; margin: 0 auto; border: 1px solid #ccc; padding: 20px; font-family: Arial, sans-serif;">
                <h2 style="text-align: center;">INVOICE</h2>

                <p><strong>Name:</strong> {{ $user->name }}</p>
                <p><strong>Phone Number:</strong> {{ $user->tele_no }}</p>
                <p><strong>Order Date:</strong> {{ \Carbon\Carbon::parse($user->date)->format('d-m-Y') }}</p>

                <hr>

                <table width="100%" border="1" cellspacing="0" cellpadding="8">
                    <thead style="background-color: #f0f0f0;">
                        <tr>
                            <th>No</th>
                            <th>Item Name</th>
                            <th>Unit Price (RM)</th>
                            <th>Quantity</th>
                            <th>Total (RM)</th>
                        </tr>
                    </thead>
                    <tbody>
                          <tr>
                              <td>1</td>
                              <td>{{ $user->item }}</td>
                              <td>{{ number_format($user->price, 2) }}</td>
                              <td>{{ $user->quantity }}</td>
                              <td>{{ number_format($user->price * $user->quantity, 2) }}</td>
                          </tr>
                    </tbody>
                </table>

                <hr>

                <h3 style="text-align: right;">Grand Total: RM {{ number_format($user->amount, 2) }}</h3>
              </div>
            </div>
        </div>
    </div>
</body>
</html>