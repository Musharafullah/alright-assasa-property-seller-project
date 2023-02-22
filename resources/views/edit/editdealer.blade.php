@extends('layouts.master')
@section('content')
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Add Dealer</h1>
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
                        <form action="{{ url('updateDealer/'.$dealer->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6 mt-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Agency Name</label>
                                        <input type="Text" value="{{ $dealer->agencyname }}" name="agencyname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Agency Name">

                                    </div>

                                </div>
                                <div class="col-12 col-md-6 col-lg-6 mt-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Dealar Name</label>
                                        <input type="text" name="dealername" value="{{ $dealer->dealername }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Dealar Name">

                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-6 mt-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone Number</label>
                                        <input type="text" name="phone"value="{{ $dealer->phone }}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone Number">

                                    </div>

                                </div>
                                <div class="col-12 col-md-6 col-lg-6 mt-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Destination</label>
                                        <input type="text" name="destination" value="{{ $dealer->destination }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Destinition">

                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 mt-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Area</label>
                                        <input type="text" name="area" value="{{ $dealer->area }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Area">

                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 mt-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Address</label>
                                        <input type="text" name="address" value="{{ $dealer->address }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Address">

                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 mt-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Image</label>
                                        <img style="width:40px;" src="/public/assets/img/{{ $dealer->image }}">
                                        <input type="file" name="image" value="{{ $dealer->image }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

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