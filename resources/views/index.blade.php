<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Product</h1>
    <div>Index</div>
    <ul>
        @foreach ($products as $product)
            <li>
                <div style="{display: flex; gap: 10;}">
                    <label>{{ $product->id }};</label>
                    <label>{{ $product->productname }};</label>
                    <label>{{ $product->description }};</label>
                    <label>{{ $product->price }};</label>
                    <label>{{ $product->stock }}</label>
                    <a href="{{ route('edit', ['product' => $product]) }}">edit</a>

                </div>
            </li>
        @endforeach
    </ul>
</body>

</html>
