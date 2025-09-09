<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<form action="{{route('products.add')}}" method="POST">
    @csrf
    <input type="text" name="name">
    <input type="text" name="description">
    <input type="number" name="price">
    <button>create</button>
</form>
</body>
</html>
