<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>إضافة مستخدم</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            direction: rtl;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .form-container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .submit-button {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            width: 100%;
            font-size: 16px;
            cursor: pointer;
        }
        .submit-button:hover {
            background-color: #0056b3;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #333;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>  {{ route("greeting.store") ? 'إضافة' : ' تعديل '}}  مستخدم جديد </h2>
    <form method="POST" action="{{ route("greeting.store") ? route("greeting.store") : route("greeting.update",$admin->id) }}">
        @csrf

        <label for="email">البريد الإلكتروني</label>
        <input type="email" id="email" value="{{old('email',$admin->email ?? null)}}" name="email" >

        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="password">كلمة المرور</label>
        <input type="password" id="password" name="password">
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="phone">رقم الهاتف</label>
        <input type="text" id="phone" value="{{old('phone',$admin->phone ?? null)}}" name="phone">
        @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="date">التاريخ</label>
        <input type="date" id="date" value="{{old('date',$admin->date ?? null)}}" name="date">
        @error('date')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="submit-button">إرسال</button>
    </form>

    <a href="{{ route('greeting.index') }}" class="back-link">العودة إلى القائمة</a>
</div>

</body>
</html>
