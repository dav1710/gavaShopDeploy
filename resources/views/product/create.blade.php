@extends('../admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Product</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="exampleInputEmail1" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <input type="text" name="description" value="{{ old('description') }}" class="form-control" id="exampleInputEmail1" placeholder="Description">
                        </div>
                        <div class="form-group">
                            <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Content">{{ old('content') }}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" name="price" value="{{ old('price') }}" class="form-control" id="exampleInputEmail1" placeholder="Price">
                        </div>
                        <div class="form-group">
                            <input type="text" name="count" value="{{ old('count') }}" class="form-control" id="exampleInputEmail1" placeholder="Count">
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="cover" class="custom-file-input">
                                    <label class="custom-file-label" for="inputGroupFile02">Choose Cover</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="images[]" multiple class="custom-file-input">
                                    <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="select2-purple">
                                <select name="category_id" class="select2" data-placeholder="Select a Category" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                    <option value="" disabled selected></option>
                                   @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                   @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="select2-purple">
                                <select name="tags[]" class="select2" multiple="multiple" data-placeholder="Select a Tags" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                    @foreach($tags as $tag)
                                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="select2-purple">
                                <select name="shoes_size[]" class="select2" multiple="multiple" data-placeholder="Select a Shoes Size" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                    @foreach($shoes as $item)
                                        <option value="{{$item->id}}">{{$item->shoes_size}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="select2-purple">
                                <select name="colors[]" class="select2" multiple="multiple" data-placeholder="Select a Colors" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                    @foreach($colors as $color)
                                        <option value="{{$color->id}}">{{$color->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer" style="background-color: transparent !important;">
                        <button type="submit" class="btn btn-outline-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
