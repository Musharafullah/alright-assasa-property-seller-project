@extends('layouts.master')

@section('content')
<style>
    
.row{
    font-family:poppins
}
.row label{
    font-style: normal;
font-weight: bold;
font-size: 20px;
line-height: 31px;
color:#292323;
}
@media only screen and (max-width: 768px){
    .row label{
   
font-size: 10px;
line-height: 21px;

}
}
@media only screen and (max-width: 400px){
    .row label{
   
font-size: 10px;
line-height: 10px;

}
}
</style>
    <div class="container-fluid p-0">
        <div class="mb-2 mt-4">
            <div class="mx-4">
                <h1 class="h3 d-inline align-middle"><b>Update User</b></h1>
                <p class="fw-bold">Create and manage your dealers list, send and receive purchase orders – your online
                    Dashboard is your new back of house.</p>
            </div>
        </div>
        <div class="row">
            <div class="container m-auto" style="margin-top:20px">
                <form class="myform " action="{{ url('/admin/users/' . $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="name" type="text" title="Name:" :inputValue="$user->name" required="true" />
                        </div>
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="phone" type="tel" title="Phone:" :inputValue="$user->phone" required="true" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="email" type="email" title="Email Address:" :inputValue="$user->email"
                                required="true" />
                        </div>
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="password" type="password" title="Password:" :inputValue="$user->password" required="true" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="image" type="file" title="Upload New Image:" />
                        </div>
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="designation" type="text" title="Designation:" :inputValue="$user->designation" />
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-6 mb-2 px-4">
                            @if ($user->areas && sizeof($user->areas) > 0)
                                <label for="area">Area : </label>
                                @foreach ($user->areas as $area)
                                    <input type="text" name="area" class="form-control mb-2" value="{{ $area->name }}"
                                        readonly>
                                @endforeach
                            @endif
                        </div>
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="address" class="" type="text" title="Address:" :inputValue="$user->address" />
                        </div>
                    </div>

                    <div class="row mt-5">
                        <!-- submit Button -->
                        <div class="col-md-6 d-flex justify-content-md-end justify-content-sm-center btnspaceform">
                            <button type="submit" class="btn btn-lg savBtn"
                                style="background: linear-gradient(180deg, #E60606 0%, #932C2C 100%); color: white; width: 50%;">Save</button>

                        </div>
                        <!-- cancel Button  -->
                        <div class="col-md-6 d-flex justify-content-md-start justify-content-sm-center btnspaceform">
                            <button type="submit" class="btn btn-lg canBtn"
                                style="background:#998F8F ;color: white; width: 50%;">Cancel</button>

                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
