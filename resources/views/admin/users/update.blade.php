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
    <div class="container">
    <div class="row mb-3">
        <div class="col-md-8">
            <h1 class="h3 d-inline align-middle" style="font-size: 30px;"> <b>Update Users</b> </h1>
            <p class="fw-bold">A user dashboard lets you easily gather and visualize user data from optimizing their experience and
                ensuring customer retention.</p>
        </div>

    </div>

        <div class="row">
            <div class="container m-auto" style="margin-top:20px">
                <form class="myform " enctype="multipart/form-data" action="{{ url('/admin/users/' . $user->id) }}" method="POST">
               
                   
                @csrf
                    @method('PUT')
                    <div class="row pt-3">
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="name" type="text" title="Name:" :inputValue="$user->name" required="true" />
                        </div>
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="phone" type="tel" title="Phone:" :inputValue="$user->phone" required="true" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="email" type="email" title="Email Address:" :inputValue="$user->email" required="true" />
                        </div>
                        <div class="col-6 mb-2 px-4">
                            <label class="form-label">Password:</label>
                            <input type="password" name="password" value="********" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="image" type="file" accept="image/png, image/gif, image/jpeg,image/jpg" title="Upload New Image:" />
                        </div>
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="designation" type="text" title="Designation:" :inputValue="$user->designation" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-2 px-4">
                            <x-forms.multiselect name="area" title="Area:" :data="$areas" :selectedValuesArray="$user->areas->pluck('id')->toArray()" valueKey="id" dataKey="name" required="true" />
                        </div>
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="address" type="text" title="Address:" :inputValue="$user->address" />
                        </div>
                    </div>
                    <div class="row mt-5">
                    <!-- submit Button -->
                    <div class="col-md-6 d-flex justify-content-md-end justify-content-sm-center btnspaceform">
                    <button type="submit" class="btn btn-lg savBtn" style="background: linear-gradient(180deg, #E60606 0%, #932C2C 100%); color: white; width: 50%;">Save</button>

                    </div>
                    <!-- cancel Button  -->
                    <div class="col-md-6 d-flex justify-content-md-start justify-content-sm-center btnspaceform">
                    <button type="submit" class="btn btn-lg canBtn" style="background:#998F8F ;color: white; width: 50%;">Cancel</button>

                    </div>
                   
               
                </div>
                   
                </form>
            </div>
        </div>
    </div>
    <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });
</script>
@endsection
