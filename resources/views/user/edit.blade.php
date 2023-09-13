@extends('../admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit User</h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="form-group">
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="exampleInputEmail1" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="exampleInputEmail1" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" value="{{ $user->password }}" class="form-control" id="exampleInputEmail1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" value="{{ $user->password_confirmation }}" class="form-control" id="exampleInputEmail1" placeholder="Password Confirmation">
                        </div>
                        <div class="form-group">
                            <input type="text" name="surname" value="{{ $user->surname }}" class="form-control" id="exampleInputEmail1" placeholder="Surname">
                        </div>
                        <div class="form-group">
                            <input type="text" name="patronymic" value="{{ $user->patronymic }}" class="form-control" id="exampleInputEmail1" placeholder="Patronymic">
                        </div>
                        <div class="form-group">
                            <input type="number" name="age" value="{{ $user->age }}" class="form-control" id="exampleInputEmail1" placeholder="Age">
                        </div>
                        <div class="form-group">
                            <input type="text" name="address" value="{{ $user->address }}" class="form-control" id="exampleInputEmail1" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <select name="gender" class="custom-select form-control">
                                <option disabled selected>Gender</option>
                                <option {{ $user->gender == 1 ? 'selected' : '' }} value="1">Male</option>
                                <option {{ $user->gender == 2 ? 'selected' : '' }} value="2">Female</option>
                            </select>
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
