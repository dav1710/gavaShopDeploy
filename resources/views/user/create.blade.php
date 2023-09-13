@extends('../admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Users</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="exampleInputEmail1" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="exampleInputEmail1" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="exampleInputEmail1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" id="exampleInputEmail1" placeholder="Password Confirmation">
                        </div>
                        <div class="form-group">
                            <input type="text" name="surname" value="{{ old('surname') }}" class="form-control" id="exampleInputEmail1" placeholder="Surname">
                        </div>
                        <div class="form-group">
                            <input type="text" name="patronymic" value="{{ old('patronymic') }}" class="form-control" id="exampleInputEmail1" placeholder="Patronymic">
                        </div>
                        <div class="form-group">
                            <input type="number" name="age" value="{{ old('age') }}" class="form-control" id="exampleInputEmail1" placeholder="Age">
                        </div>
                        <div class="form-group">
                            <input type="text" name="address" value="{{ old('address') }}" class="form-control" id="exampleInputEmail1" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <select name="gender" class="custom-select form-control">
                                <option disabled selected>Gender</option>
                                <option {{ old('gender') == 1 ? 'selected' : '' }} value="1">Male</option>
                                <option {{ old('gender') == 2 ? 'selected' : '' }} value="2">Female</option>
                            </select>
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
