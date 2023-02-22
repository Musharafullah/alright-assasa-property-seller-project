@extends('layouts.master')

@section('content')
<style>
    
.row{
    font-family:Space Grotesk
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
    <div class="row mb-3">
        <div class="col-md-8">
            <h1 class="h3 d-inline align-middle" style="font-size: 30px;"> <b> User Information</b> </h1>
            
        </div>

    </div>

        <div class="row">
            <div class="container m-auto" style="margin-top:20px">
                <form style="border:1px solid black; border-radius:4px" class="myform " enctype="multipart/form-data" >
               
                 
                    <div class="row pt-3">
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="id" type="text" title=" User Id:" :inputValue="$user->id" required="true" />

                        </div>
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="name" type="text" title="Name:" :inputValue="$user->name" required="true" />

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="email" type="email" title="Email Address:" :inputValue="$user->email" required="true" />
                        </div>
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="phone" type="tel" title="Phone:" :inputValue="$user->phone" required="true" />

                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="address" type="text" title="Address:" :inputValue="$user->address" />
                        </div>
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="designation" type="text" title="Designation:" :inputValue="$user->designation" readonly  />
                        </div>
                    </div>
                    <div class="row">
                       {{-- <div class="col-6 mb-2 px-4">
                            <x-forms.input name="image" type="file" accept="image/png, image/gif, image/jpeg,image/jpg" title="Upload New Image:" />
                        </div> --}}
                       
                    </div>
                    {{-- <div class="row">
                    <!-- submit Button -->
                    <div class="col-md-6 d-flex justify-content-md-end justify-content-sm-center btnspaceform">
                    <button type="submit" class="btn btn-lg" style="background: linear-gradient(180deg, #E60606 0%, #932C2C 100%); color: white; width: 50%;">Submit</button>

                    </div>
                    <!-- cancel Button  -->
                    <div class="col-md-6 d-flex justify-content-md-start justify-content-sm-center btnspaceform">
                    <button type="submit" class="btn btn-lg" style="background:#998F8F ;color: white; width: 50%;">Cancel</button>

                    </div> --}}
                   
               
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
