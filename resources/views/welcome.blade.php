<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
@foreach($products as $product)
    <div>
        <h1>{{$product->name}}</h1>
        <p>{{$product->description}}</p>
        <p>{{$product->price}}</p>
        <a href="{{route('products.permalink', $product->id )}}">Detaljnije</a>
    </div>
@endforeach
</body>
</html>
