<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
</head>
<body>

    <h1>✏️ Edit Employee (Payroll System)</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/employees/update/{{ $employee->id }}" method="POST">
        @csrf

        <!-- Name -->
        <label>Name:</label><br>
        <input type="text" name="name" value="{{ $employee->name }}">
        <br><br>

        <!-- Basic Salary -->
        <label>Basic Salary:</label><br>
        <input type="number" name="salary" value="{{ $employee->basic_salary }}">
        <br><br>

        <!-- Bonus -->
        <label>Bonus:</label><br>
        <input type="number" name="bonus" value="{{ $employee->bonus }}">
        <br><br>

        <!-- Deduction -->
        <label>Deduction:</label><br>
        <input type="number" name="deduction" value="{{ $employee->deduction }}">
        <br><br>

        <!-- Live Preview (IMPORTANT for interview WOW factor) -->
        <h3>💡 Live Net Salary Preview:</h3>

        <p>
            <b>
                {{ $employee->basic_salary + $employee->bonus - $employee->deduction }}
            </b>
        </p>

        <button type="submit">Update Employee</button>

    </form>

</body>
</html>