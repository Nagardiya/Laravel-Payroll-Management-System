<!DOCTYPE html>
<html>
<head>
    <title>Employee List</title>
</head>
<body>

    <h1>Employee List (Payroll System)</h1>

    {{-- ✅ SUCCESS MESSAGE --}}
    @if(session('success'))
        <div style="color:green; padding:10px; margin-bottom:10px; border:1px solid green;">
            {{ session('success') }}
        </div>
    @endif

    {{-- 🔍 SEARCH + FILTER --}}
    <form method="GET" action="/employees">

        <input type="text"
               name="search"
               value="{{ $search ?? '' }}"
               placeholder="Search employee name">

        <input type="number"
               name="min_salary"
               value="{{ $minSalary ?? '' }}"
               placeholder="Min Salary">

        <button type="submit">Filter</button>

        <a href="/employees">Reset</a>
    </form>

    <br>

    <a href="/employees/create">+ Add Employee</a>

    <br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>Name</th>
            <th>Salary</th>
            <th>Bonus</th>
            <th>Deduction</th>
            <th>Net Salary</th>
            <th>Action</th>
        </tr>

        @foreach($employees as $emp)

            @php
                $netSalary = $emp->basic_salary + $emp->bonus - $emp->deduction;
            @endphp

            <tr>
                <td>{{ $emp->name }}</td>
                <td>{{ $emp->basic_salary }}</td>
                <td>{{ $emp->bonus }}</td>
                <td>{{ $emp->deduction }}</td>
                <td><b>{{ $netSalary }}</b></td>

                <td>
                    <a href="/employees/edit/{{ $emp->id }}">Edit</a> |
                    <a href="/employees/delete/{{ $emp->id }}"
                       onclick="return confirm('Are you sure you want to delete this employee?')">
                       Delete
                    </a>
                </td>
            </tr>

        @endforeach

        {{-- ❌ NO RESULT MESSAGE --}}
        @if($employees->count() == 0)
            <tr>
                <td colspan="6" style="color:red; text-align:center;">
                    No employee found
                </td>
            </tr>
        @endif

    </table>

</body>
</html>