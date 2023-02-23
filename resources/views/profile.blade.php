@extends('layouts.master')
@section('content')
    <div class="container-fluid px-4">
        <div class="mb-1">
            <h1 class="h3 d-inline align-middle"> <b>My Profile</b>
            </h1>
        </div>
        <div class="row" style="border: 1px solid black;padding: 10px;border-radius: 10px">

            <div class="container-fluid">
                <table class="table-striped table-dark table-responsive table">

                </table>
                <form method="POST" action="{{ url('profile') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="name" title="Name:" :inputValue="$current_user->name" required="true" />
                        </div>
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="phone" title="Phone:" :inputValue="$current_user->phone" size="11" required="true" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="address" title="Address:" :inputValue="$current_user->address" required="true" />
                        </div>
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="image" title="Upload New Image:" type="file" accept="image/*" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="agencyname" title="Agency Name:" :inputValue="$current_user->agencyname" />
                        </div>
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="designation" title="Designation:" :inputValue="$current_user->designation" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-2 px-4">
    
                            <x-forms.input name="email" type="email" title="Email Address:" :inputValue="$current_user->email" required="true" />
                        </div>
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="password" type="password" title="Password:" :inputValue="$current_user->password" required="true" />
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4 mb-4">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
