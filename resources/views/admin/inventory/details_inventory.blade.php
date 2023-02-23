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
        <div class="row mb-3">
            <div class="col-md-8">
                <h1 class="h3 d-inline align-middle" style="font-size: 30px;"> <b>Inventory Information</b> </h1>

            </div>

        </div>

        <div class="row">
            <div class="container m-auto" style="margin-top:20px">
                <form style="border:1px solid black; border-radius:4px" class="myform " enctype="multipart/form-data">


                    <div class="row pt-3">
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="id" type="text" title=" ID:" :inputValue="$properties->id" required="true" />

                        </div>

                        <div class="col-6 mb-2 px-4">
                            <label for="name">User Name : </label>
                            <input type="text" name="user" class="form-control" value="{{ $properties->user->name }}"
                                readonly>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="name" type="text" title="Property:" :inputValue="$properties->property"
                                required="true" />

                        </div>


                        <div class="col-6 mb-2 px-4">
                            <label for="area_id">Area : </label>
                            <input type="text" name="area_id" class="form-control" value="{{ $properties->area->name }}"
                                readonly>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-2 px-4">

                            <label for="phase">Phase : </label>
                            <input type="text" name="Phase" class="form-control"
                                value="{{ $properties->phase->title }}" readonly>
                        </div>


                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="street_number" type="streat_number" title="Street Number:"
                                :inputValue="$properties->street_number" required="true" />
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="house_number" type="text" title="House Number:" :inputValue="$properties->house_number"
                                required="true" />
                        </div>
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="plot_number" type="number" title="Plot Number:" :inputValue="$properties->plot_number"
                                required="true" />

                        </div>
                    </div>
                    <div class="row">

                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="sector" type="text" title="Sector:" :inputValue="$properties->sector" />
                        </div>
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="size" type="text" title="Size:" :inputValue="$properties->size" readonly />
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="size_unit" type="text" title="Size Unit:" :inputValue="$properties->size_unit" />
                        </div>
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="price" type="number" title="Price:" :inputValue="$properties->price" readonly />
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="item_status" type="text" title="Status:" :inputValue="$properties->item_status"
                                required="true" />
                        </div>



                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="extra_land" type="text" title="Extra Land:" :inputValue="$properties->extra_land"
                                readonly />
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="orientation" type="text" title="Orientation:" :inputValue="$properties->orientation" />
                        </div>
                        <div class="col-6 mb-2 px-4">
                            @php
                            $cat=json_decode($properties->category)
                            @endphp
                            <label>Category:</label>
                            <input class='form-control' value="@foreach($cat as $c) {{ucfirst($c)}},@endforeach" /> 
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="item_condition" type="text" title="Item Condition:"
                                :inputValue="$properties->item_condition" />
                        </div>
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="agency_name" type="text" title="Agency Name:" :inputValue="$properties->agency_name"
                                readonly />
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="reference_name" type="text" title="Reference Name:"
                                :inputValue="$properties->reference_name" />
                        </div>
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="reference_mobile" type="number" title="Reference Mobile:"
                                :inputValue="$properties->reference_mobile" readonly />
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="plot_type" type="text" title="Plot Type:" :inputValue="$properties->plot_type" />
                        </div>
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="Purchase_status" type="text" title="Purchase status:"
                                :inputValue="$properties->purchase_status" readonly />
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
