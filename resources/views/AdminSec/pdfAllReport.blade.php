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
    <h3 style="text-align: center;">Alumni Total Report</h3>
    <p>Report Generation Date: {{$date}}</p>
    <div class="card">
        <h5 class="card-header">Total Report</h5>
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
                        <th>Amount</th>
                    </tr>
                </thead>
                @php
                $sl=1;
                $tamount = 0;
                @endphp
                <tbody class="table-border-bottom-0">
                    @forelse ($incomes as $income)

                    <tr>
                        <td>{{ $sl }}</td>

                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                            <strong>{{ $income->purpose }} </strong>
                        </td>
                        <td><span class="badge bg-label-primary me-1">{{ $income->amount }}</span>
                        </td>

                    </tr>
                    @php
                    $sl = $sl +1;
                    $tamount = $tamount + $income->amount;
                    @endphp
                    @empty
                    <tr>
                        <td colspan="2">No payments found.</td>
                    </tr>

                    @endforelse
                    <tr>
                        <td colspan="2">Total Amount Paid.</td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                            <strong>{{ $tamount }} </strong>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h4> Total Expense</h4>
            <hr>
            <table >
                <thead>
                    <tr>
                        <th>Sl. No</th>
                        <th>Purpose</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                @php
                $sl=1;
                $tamountExpense = 0;
                @endphp
                <tbody class="table-border-bottom-0">
                    @forelse ($expenses as $expense)

                    <tr>
                        <td>{{ $sl }}</td>

                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                            <strong>{{ $expense->purpose }} </strong>
                        </td>
                        <td><span class="badge bg-label-primary me-1">{{ $expense->amount }}</span>
                        </td>

                    </tr>
                    @php
                    $sl = $sl +1;
                    $tamountExpense = $tamountExpense + $expense->amount;
                    @endphp
                    @empty
                    <tr>
                        <td colspan="2">No payments found.</td>
                    </tr>

                    @endforelse
                    <tr>
                        <td colspan="2">Total Amount Paid.</td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                            <strong>{{ $tamountExpense }} </strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <h4> Total Remaining Balance: </h4>
        {{$tamount - $tamountExpense}}
    </div>
</body>

</html>