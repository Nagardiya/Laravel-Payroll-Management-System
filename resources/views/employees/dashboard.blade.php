<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <style>
        .container {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .card {
            width: 200px;
            padding: 20px;
            border-radius: 10px;
            color: white;
            text-align: center;
            font-family: Arial;
        }

        .blue { background: #3498db; }
        .green { background: #2ecc71; }
        .orange { background: #f39c12; }
        .red { background: #e74c3c; }
        .dark { background: #34495e; }
    </style>
</head>

<body>

    <h1>Payroll Dashboard</h1>

    <div class="container">

        <div class="card blue">
            <h3>Total Employees</h3>
            <h2>{{ $totalEmployees }}</h2>
        </div>

        <div class="card green">
            <h3>Total Salary</h3>
            <h2>{{ $totalSalary }}</h2>
        </div>

        <div class="card orange">
            <h3>Total Bonus</h3>
            <h2>{{ $totalBonus }}</h2>
        </div>

        <div class="card red">
            <h3>Total Deduction</h3>
            <h2>{{ $totalDeduction }}</h2>
        </div>

        <div class="card dark">
            <h3>Net Salary</h3>
            <h2>{{ $totalNetSalary }}</h2>
        </div>

    </div>

</body>
</html>