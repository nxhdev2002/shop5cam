@include('layouts.header')
<div class="container">
    @foreach ($products as $product)
    <p>This is {{ $product->name }}</p>
    <p>description {{ $product->description }}</p>
    @endforeach
</div>
{{ $products->links() }}


@include('layouts.footer')