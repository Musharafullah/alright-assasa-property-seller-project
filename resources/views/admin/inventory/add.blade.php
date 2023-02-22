@extends('layouts.master')
@section('content')
<style>
   

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
            <h1 class="h3 d-inline align-middle fw-bold" style="font-size: 30px;"> <b>Add Inventory</b> </h1>
            <p class="fw-bold"> Create and manage your dealers list, send and receive purchase orders – your online Dashboard is your new back of house.</p>
        </div>

    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="row">
            <div class="container m-auto" style="margin-top:20px">
                <form class="myform" action="{{ url('/admin/inventory') }}" method="POST">
                    @csrf
                    <div class="row newRow">
                        <div class="col-4 mb-2 ">
                            <x-forms.select name="property" title="Property Type:" required="true" :data="$properties" />
                        </div>
                        
                        <div class="col-4 mt-2 " >
                            <!--<x-forms.select onclick="get_phases()" name="area_id" id="area_id" title="Area:" required="true" valueKey="id" dataKey="name" :data="$areas" />-->
                            @php
                                $areas = DB::table('areas')->get();
                            @endphp
                             <label>Area:</label> <br>
                            <select onchange="get_phases()" class="form-control"  name="area_id" id="area_id">
                                <option value=""></option>
                                @foreach($areas as $area)
                                
                                <option value="{{$area->id}}"> {{$area->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4 mb-2 ">
                            <!--<x-forms.select name="area_phase_id" title="Phases:" required="true" :data="[2]" />-->
                        <label class="col-4 mb-2 " >Phase:</label>
                        <select onchange="get_phases()" class="form-control" name="area_phase_id" id="cars" required>
                          @php
                          $data=DB::table('area_phases')->get();
                          @endphp
                          <option value=""></option>
                          <!--@foreach($data as $value)-->
                          <!--<option value="{{$value->id}}">{{$value->title}}</option>-->
                          <!--@endforeach-->
</select>               </select>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-2 " id="s">
                            <x-forms.select name="item_status" title="Status of Item:"  :data="$item_statuses" class="a" id="myS"/>
                        </div>
                         <div class="col-4 mb-2 " id="houeseN">

                        </div>
                                              <div class="col-4 mb-2 " id="pN">
                            
                        </div>
                       
                    </div>

                    <div class="row">
                        <div class="col-4 mb-2 ">
                            <x-forms.input name="street_number" title="Street No:" type="text" required="true" />
                        </div>
                        <div class="col-4 mb-2 ">
                            <x-forms.input name="sector" title="Sector:" type="text" required="true" />
                        </div>
                        <div class="col-4 mb-2 ">
                            <x-forms.select name="orientation" title="Orientation:" required="true" :data="$orientations" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-2 ">
                            <x-forms.select name="item_condition" title="Item Condition:" required="true" :data="$item_conditions" />
                        </div>
                        <div class="col-4 mb-2 " id="agency">
                            <x-forms.input name="agency_name" title="Agency:" type="text"  />
                        </div>
                         <div class="col-4 mb-2 ">
                            <x-forms.input name="price" title="Price:" type="number" required="true" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-2 ">
                            <x-forms.input name="client_name" title="Client Name:" type="text" required="true" />
                        </div>
                        <div class="col-4 mb-2 ">
                            <x-forms.input name="client_mobile" title="Client Mobile:" type="tel" size="11" />
                        </div>
                        <div class="col-4 mb-2 ">
                            <label>Plot Type:</label>
                            <select class="form-control" name="plot_type"  required>
                          <option value="residential">Residential</option>
                          <option value="commercial">Commercial</option>
                          <option value="others">Others</option>
                            </select>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-4 mb-2 ">
                            <x-forms.input name="size" title="Size:" type="number" required="true" />
                        </div>
                        <div class="col-4 mb-2 ">
                            <x-forms.select name="size_unit" title="Size Unit:" required="true" :data="$size_units" />
                        </div>
                        <div class="col-4 mb-2 ">
                            <x-forms.input name="extra_land" title="Extra Land:" type="text" />
                        </div>
                       
                        <div class="col-4 mb-2 ">
                            <label >Category:</label><br>
                            <input type="checkbox"  name="category[]" value="boulvard">
                            <label > Boulevard</label><br>
                            <input type="checkbox"  name="category[]" value="avenue">
                            <label> Avenue</label><br>
                          
                            <input type="checkbox"  name="category[]" value="general">
                            <label > General</label><br>
                            <input type="checkbox"  name="category[]" value="corner">
                            <label > Corner</label><br>
                    </div>
                    
                       

                    <div class="row">
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
@endsection

@push('scripts')
    <script>
        function get_phases(){
            area_id = document.getElementById('area_id').value;
            $.ajax({
                url: "/get-phases",
                type: "POST",
                data: {
                    '_token': '{{ csrf_token() }}',
                    'area_id': area_id
                },
                cache: false,
                success: function(result){
                    $("#cars").html(result);
                    // submitfilter();
                }
            });
            
        }
    </script>
    <script>
        const all_areas =@json($areas);
        $(document).ready(function() {
            $("#inputarea_id").change(function() {
                const area = all_areas.find(a => {
                    return a.id == $(this).val();
                });
                if (area && area.phases && typeof area.phases == "object" && area.phases.length > 0) {
                    let html = `<option value="">Select</option>`;
                    for (let i = 0; i < area.phases.length; i++) {
                        const phase = area.phases[i];
                        html += `<option value="${phase.id}"> ${phase.title} </option>`;
                    }
                    $("#inputarea_phase_id").html(html);
                }
            });
        });
    </script>
<script>
let ss=document.getElementsByClassName("hs")
console.log(ss.id)
    let select=document.getElementById("myS");
   
    let house= document.getElementById("houeseN")
    let agency=document.getElementById('agency')
    let p= document.getElementById("pN")
    console.log(p)
      $('.hs').on('change', function() { 
        //   alert(this.value)
   if(this.value==="house"){
      
       console.log(this.value)
       house.innerHTML=`<x-forms.input name="house_number" title="House Number:" type="text" /> 
      
       `
    //   $("#pN").children().remove()
       
   } 
  else if(this.value==="plot"){
     
       house.innerHTML=`<x-forms.input name="plot_number" title="Plot Number:" type="text" />`
         

// $("#houeseN").children().remove()
    
   }
   else if(this.value==="direct_client"){
       $("#agency").children().remove()
   }
   else if(this.value==="direct_dealer") {
       agency.innerHTML=`<x-forms.input name="agency_name" title="Agency:" type="text"  />`
   }
    else if(this.value==="one_down_dealer") {
       agency.innerHTML=`<x-forms.input name="agency_name" title="Agency:" type="text"  />`
   }
   else if(this.value==="other") {
       agency.innerHTML=`<x-forms.input name="agency_name" title="Agency:" type="text"  />`
   }
   
   
  
});
 
</script>
@endpush
