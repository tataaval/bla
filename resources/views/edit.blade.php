<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Edit Product</h1>
    <div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <form method="POST" action="{{ route('update', ['product' => $product]) }}">
        @csrf
        @method('put')
        <div>
            <label>Product Name</label>
            <input type="text" name="productname" placeholder="name" value="{{ $product->productname }}" />
        </div>
        <div>
            <label>description</label>
            <input type="text" name="description" placeholder="description" value="{{ $product->description }}" />
        </div>
        <div>
            <label>Price</label>
            <input type="number" name="price" placeholder="price" value="{{ $product->price }}" />
        </div>
        <div>
            <label>Stock</label>
            <input type="number" name="stock" placeholder="stock" value="{{ $product->stock }}" />
        </div>
        <div>
            <input type="submit" value="Update" />
        </div>
    </form>

</body>

</html>
