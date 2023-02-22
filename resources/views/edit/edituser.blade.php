@extends('layouts.master')

@section('content')
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Add User</h1>
                    <div class="row">
                        <div class="col-8">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, quod rerum sapiente animi, illum aliquid, soluta dolores beatae non eligendi tenetur eaque incidunt magnam? Optio, iste consequatur! Dolorem, cupiditate veniam!</p>
                        </div>
                    </div>
                    <div class="chooseImage d-flex ">

                        <div class="imag">

                        </div>
                        {{-- <div class="uploadImage mt-4 m-4">
                            Upload User Image
                        </div> --}}
                    </div>
                    <div class="form">
                        <form action="{{ url('updateUser/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6 mt-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Full Name</label>
                                        <input type="Text" name="name" value="{{ $user->name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">

                                    </div>

                                </div>
                                <div class="col-12 col-md-6 col-lg-6 mt-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Password</label>
                                        <input type="Text" name="name" value="{{ $user->password }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Password">

                                    </div>

                                </div>
                                <div class="col-12 col-md-6 col-lg-6 mt-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-6 mt-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone Number</label>
                                        <input type="Text" name="phone" value="{{ $user->phone }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone Number">

                                    </div>

                                </div>
                                <div class="col-12 col-md-6 col-lg-6 mt-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Destination</label>
                                        <input type="text" name="designation" value="{{ $user->designation }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Destination">

                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 mt-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Area</label>
                                        <input type="text" name="address" value="{{ $user->address }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Area">

                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 mt-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Upload Image</label>
                                        <img style="width:40px;" src="/public/assets/img/{{ $user->image }}">
                                        <input type="file" value="{{ $user->image }}" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                    </div>
                                </div>

                            </div>
                            <div class="row justify-content-center">
                                <div class="divSave col-12 col-md-6 col-lg-6 mt-4">
                                    <button class="btnSave" type="submit">Update</button>
                                </div>
                                <div class="divCancel col-12 col-md-6 col-lg-6 mt-4">
                                    <button class="btnCancel">Cancel</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </main>
@endsection