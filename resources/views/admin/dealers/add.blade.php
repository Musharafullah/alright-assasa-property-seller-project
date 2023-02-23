@extends('layouts.master')
<style>
      .row{
    font-family:poppins
}
.row label{
    font-style: normal;
font-weight: bold;
font-size: 16px;
line-height: 31px;
color:#292323;
}
</style>
@section('content')
    <div class="container ">
        <div class="col-md-8">
            <h1 class="h3 d-inline align-middle" style="font-size: 30px;"> <b>Add Dealer</b> </h1>
            <p class="fw-bold"> Create and manage your dealers list, send and receive purchase orders – your online Dashboard is your new
                back of house.</p>
        </div>
        <div class="row">
            <div class="container m-auto" style="margin-top:20px">
                <form class="myform " enctype="multipart/form-data" action="{{ url('/admin/dealers') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="name" type="text" title="Name:" />
                        </div>
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="phone" type="tel" title="Phone:" />
                        </div>
                       
                        <div class="col-6 mb-2 px-4">
                            <x-forms.input name="email" type="email" title="Email Address:" />
                        </div>
                        
                        <div class="col-6 mb-2 px-4">
                                <label class="form-label" for="exampleInputPassword">Password:</label><br>
                                <input type="password" name="password" class="form-control"  id="exampleInputPassword"
                                    required>
                                <span class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-6 mb-2 px-4">
                           
                           <x-forms.input name="image" accept="image/png, image/gif, image/jpeg,image/jpg"  type="file" title="Image:" />
   
                       
                           </div>
                           <div class="col-6 mb-2 px-4">
                               <label for="inputDesignation" class="form-label">Designation:</label>
                               <input type="text" name="designation" class="form-control" id="inputDesignation" required>
                               <span class="text-danger">
                                   @error('designation')
                                       {{ $message }}
                                   @enderror
                               </span>
                           </div>
                           <div class="col-6 mb-2 px-4">
                               <label for="inputArea" class="form-label">Area:</label>
                               <select name="area[]" id="inputArea" class="selectpicker" multiple>
                                   @foreach ($areas as $area)
                                       <option value="{{ $area->id }}">{{ $area->name }}</option>
                                   @endforeach
                               </select>
                               <span class="text-danger">
                                   @error('area')
                                       {{ $message }}
                                   @enderror
                               </span>
                           </div>
   
                           <div class="col-6 mb-2 px-4">
                               <label for="inputAddress" class="form-label">Address:</label>
                               <input type="text" name="address" class="form-control" id="inputAddress">
                               <span class="text-danger">
                                   @error('address')
                                       {{ $message }}
                                   @enderror
                               </span>
                           </div>
                       </div>
                       
                    </div>

                    

                   

                    <div class="row mt-5">
                        <!-- submit Button -->
                        <div class="col-md-6 d-flex justify-content-md-end justify-content-sm-center btnspaceform">
                            <button type="submit" class="btn btn-lg  savBtn"
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
