<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Create Product</h1>
    <div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <form method="POST" action="{{ route('store') }}">
        @csrf
        @method('post')
        <div>
            <label>Product Name</label>
            <input type="text" name="productname" placeholder="name" />
        </div>
        <div>
            <label>description</label>
            <input type="text" name="description" placeholder="description" />
        </div>
        <div>
            <label>Price</label>
            <input type="number" name="price" placeholder="price" />
        </div>
        <div>
            <label>Stock</label>
            <input type="number" name="stock" placeholder="stock" />
        </div>
        <div>
            <input type="submit" value="Save" />
        </div>
    </form>

</body>

</html>
