<!DOCTYPE html>
<html>

<head>
<style>
table, th, td {
  border: 1px solid;
  text-align: center;
}

table {
  width: 100%;
}
</style>
</head>

<body>
    <h1 style="text-align: center;">CSE,BRUR Alumni Association</h1>
    <h3 style="text-align: center;">Alumni Expense Report</h3>
    <p>Report Generation Date: {{$date}}</p>
    <div class="card">
        <h5 class="card-header">Expense Report</h5>
        <div class="table-responsive text-nowrap">
            @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
            @endif
            <table >
                <thead>
                    <tr>
                        <th>Sl. No</th>
                        <th>Purpose</th>
                        <th>Paid By</th>
                        <th>Paid At</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                @php
                $sl=1;
                $tamount = 0;
                @endphp
                <tbody class="table-border-bottom-0">
                    @forelse ($payments as $payment)

                    <tr>
                        <td>{{ $sl }}</td>

                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                            <strong>{{ $payment->purpose }} </strong>
                        </td>
                        <td>{{ $payment->user->name }}</td>
                        <td>
                            {{ $payment->created_at }}
                        </td>
                        <td><span class="badge bg-label-primary me-1">{{ $payment->amount }}</span>
                        </td>

                    </tr>
                    @php
                    $sl = $sl +1;
                    $tamount = $tamount + $payment->amount;
                    @endphp
                    @empty
                    <tr>
                        <td colspan="4">No payments found.</td>
                    </tr>

                    @endforelse
                    <tr>
                        <td colspan="4">Total Amount Paid.</td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                            <strong>{{ $tamount }} </strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>