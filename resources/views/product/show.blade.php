@extends('../admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Product</h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex p-4">
                        <div class="mr-2">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-success">Edit Product</a>
                        </div>
                        <form action="{{ route('products.destroy', $product->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-outline-danger" value="Delete">
                        </form>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>{{ $product->id }}</td>
                                </tr>
                                <tr>
                                    <td>Title</td>
                                    <td>{{ $product->title }}</td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>{{ $product->description }}</td>
                                </tr>
                                <tr>
                                    <td>Content</td>
                                    <td>{{ $product->content }}</td>
                                </tr>
                                <tr>
                                    <td>Count</td>
                                    <td>{{ $product->count }}</td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td>{{ $product->price }}</td>
                                </tr>
                                <tr>
                                    <td>Cover IMG</td>
                                    <td>
                                        <img src="{{ asset('cover/'.$product->cover) }}" alt="multiple image"
                                        class="border border-blue-600" style="width: 200px">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Images</td>
                                    <td>
                                        @foreach ($images as $item)
                                            <img src="{{ asset('images/'.$item->image) }}" alt="multiple image"
                                            class="border border-blue-600" style="width: 200px">
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
@endsection
