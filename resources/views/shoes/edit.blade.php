@extends('../admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Shoes Size</h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <form action="{{ route('shoes.update', $shoes->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="number" name="shoes_size" value="{{ $shoes->shoes_size }}" class="form-control" id="exampleInputEmail1" placeholder="Enter Shoes Size">
                    </div>
                </div>

                <div class="card-footer" style="background-color: transparent !important;">
                    <button type="submit" class="btn btn-outline-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
