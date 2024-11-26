<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Product Management</h1>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Product Form -->
        <form action="{{ route('products.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="product_name">Product Name:</label>
                    <input type="text" id="product_name" name="product_name" class="form-control" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="quantity_in_stock">Quantity in Stock:</label>
                    <input type="number" id="quantity_in_stock" name="quantity_in_stock" class="form-control" required min="0">
                </div>
                <div class="form-group col-md-4">
                    <label for="price_per_item">Price per Item:</label>
                    <input type="number" id="price_per_item" name="price_per_item" class="form-control" required min="0" step="0.01">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <!-- Product Table -->
        <h2>Submitted Products</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Datetime Submitted</th>
                    <th>Total Value</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->created_at->format('Y-m-d H:i:s') }}</td>
                        <td>${{ number_format($product->quantity * $product->price, 2) }}</td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No products submitted yet.</td>
                    </tr>
                @endforelse
                <!-- Sum Total Row -->
                <tr>
                    <td colspan="4"><strong>Total Sum</strong></td>
                    {{-- <td colspan="2"><strong>${{ number_format($totalSum, 2) }}</strong></td> --}}
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
