<!-- resources/views/products/product-create.blade.php -->


<x-new-layout>
    <div class="container">
        <h2>Add New Product</h2>
        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" name="price" step="0.01" min="0.01" class="form-control">
            </div>
            <div class="form-group">
                <label for="rating">Rating:</label>
                <input type="number" name="rating" step="1" min="0" max="5" class="form-control">
            </div>
            <div class="form-group">
                <label for="rating_count">Rating Count:</label>
                <input type="number" name="rating_count" step="1" min="0" class="form-control">
            </div>
            <div class="form-group">
                <label for="category_id">Category:</label>
                <select name="category_id" class="form-control">
                    <option value="">Select a category</option> <!-- Optional placeholder option -->
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" name="photo" class="form-control">
            </div>
            <!-- Add more input fields for other product attributes -->
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
</x-new-layout>
