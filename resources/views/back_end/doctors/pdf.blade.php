<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doctors Report</title>
 <style>
        /* تنسيق الجدول */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        /* تخصيص الألوان */
        body {
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            color: #333;
        }
    </style>

</head>
<body>

    <h2>Doctors Report</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Specialization</th>
                <th>Nationality</th>
                <th>Hospital</th>
                <th>Gender</th>
                <th>Bio</th>
                <th>Created At</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($data as $doctor)
                <tr>
                    <td>{{ $doctor->id }}</td>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->specialization?->name }}</td>
                    <td>{{ $doctor->nationalitie?->name }}</td>
                    <td>{{ $doctor->hospital?->name }}</td>
                    <td>{{ $doctor->gender }}</td>
                    <td>{{ $doctor->bio }}</td>
                    <td>{{ $doctor->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>

