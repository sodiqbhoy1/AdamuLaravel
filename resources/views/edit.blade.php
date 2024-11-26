<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Product</h1>

        <!-- Product Form -->
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" id="product_name" name="product_name" class="form-control" value="{{ $product->name }}" required>
            </div>
            <div class="form-group">
                <label for="quantity_in_stock">Quantity in Stock:</label>
                <input type="number" id="quantity_in_stock" name="quantity_in_stock" class="form-control" value="{{ $product->quantity }}" required min="0">
            </div>
            <div class="form-group">
                <label for="price_per_item">Price per Item:</label>
                <input type="number" id="price_per_item" name="price_per_item" class="form-control" value="{{ $product->price }}" required min="0" step="0.01">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
