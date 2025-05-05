<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>جدول المستخدمين</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            direction: rtl;
            padding: 20px;
            background: #f4f4f4;
        }
        .container {
            width: 90%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 6px;
            box-shadow: 0 0 10px #ccc;
        }
        .add-button {
            margin-bottom: 15px;
            background: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .add-button:hover {
            background: #218838;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        table th {
            background-color: #f2f2f2;
        }
        .action-button {
            padding: 6px 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .action-button:hover {
            background-color: #0056b3;
        }
        .pagination {
            text-align: center;
        }
        .pagination a {
            margin: 0 4px;
            padding: 8px 12px;
            border: 1px solid #ddd;
            color: #333;
            text-decoration: none;
        }
        .pagination a.active {
            background: #007bff;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <button class="add-button" onclick="window.location.href='{{ route('greeting.create') }}'">+ إضافة مستخدم</button>

    <table>
        <thead>
        <tr>
            <th>التاريخ</th>
            <th>الإيميل</th>
            <th>رقم الهاتف</th>
            <th>الإجراء</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($admin) && count($admin) > 0)
            @foreach ($admin as $user)
                <tr>
                    <td>{{ $user->date }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>
                        <a href="{{ route('greeting.edit', $user->id) }}" class="action-button">تعديل</a>
                        <!-- زر حذف ممكن هنا -->
                    </td>
                </tr>
            @endforeach
        @else
            <div>Table is Empty or Not Found</div>
        @endif

        </tbody>
    </table>

    <div class="pagination">
{{--        {{ $users->links() }}--}}
    </div>
</div>

</body>
</html>
