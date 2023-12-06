@extends('../admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Category</h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <p>Cover:</p>
                <form action="{{ route('categories.deletecover', $category->id) }}" method="post">
                    <button class="btn text-danger">X</button>
                    @csrf
                    @method('post')
                </form>
                <img src="{{ asset('cover/'.$category->cover) }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">

            </div>
            <div class="col-lg-6">
            <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" name="title" value="{{ $category->title }}" class="form-control" id="exampleInputEmail1" placeholder="Enter category name">
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="cover" class="custom-file-input" {{$category->cover ? 'required' : ''}}>
                                <label class="custom-file-label" for="inputGroupFile02">Choose Cover</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer" style="background-color: transparent !important;">
                    <button type="submit" class="btn btn-outline-primary">Update</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</section>
@endsection
