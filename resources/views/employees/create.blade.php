<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
</head>
<body>

    <h1>Add Employee (Payroll System)</h1>

    {{-- 🔥 Error Messages --}}
    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/employees/store" method="POST">
        @csrf

        <!-- Name -->
        <input type="text" name="name" placeholder="Enter Name" required>
        <br><br>

        <!-- Salary -->
        <input type="number" name="salary" placeholder="Enter Salary" required>
        <br><br>

        <!-- Bonus -->
        <input type="number" name="bonus" placeholder="Enter Bonus" value="0">
        <br><br>

        <!-- Deduction -->
        <input type="number" name="deduction" placeholder="Enter Deduction" value="0">
        <br><br>

        <button type="submit">Save Employee</button>

    </form>

</body>
</html>