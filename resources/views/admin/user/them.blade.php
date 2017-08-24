@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
               @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                       {{$error}} <br>
                    @endforeach
                </div>
              @endif
              @if(session('mess'))
                <div class="alert alert-success">
                    {{session('mess')}}
                </div>
              @endif



                <form action="admin/user/add_user" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>UserName</label>
                        <input class="form-control" name="userName" placeholder="Please Enter Username" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="pass" placeholder="Please Enter Password" />
                    </div>
                    <div class="form-group">
                        <label>RePassword</label>
                        <input type="password" class="form-control" name="rePass" placeholder="Please Enter RePassword" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Please Enter Email" />
                    </div>
                    <div class="form-group">
                        <label>User Level</label>
                        <label class="radio-inline">
                            <input name="level" value="0" checked="" type="radio">User
                        </label>
                        <label class="radio-inline">
                            <input name="level" value="1" type="radio">Admin
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">User Save</button>

                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
