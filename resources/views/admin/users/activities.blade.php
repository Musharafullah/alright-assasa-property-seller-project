@extends('layouts.master')
@section('content')
<style>
    .searchInput{
        width:fit-content !important;
        background: #F4F5FA!important;
        width:15% !important
    }
   .searchInput input::-webkit-input-placeholder {
        color: #CCC8CB !important;
}
.searchInput input{
    background: #F4F5FA!important;
    border-radius:10px !important;
   
}
.searchInput button{
    background: #F4F5FA!important;
    border-radius:10px !important;
}
@media only screen and (max-width: 768px){
    .searchInput{
      
        width:50% !important;
       
    }
    .searchBox{
        justify-content:center !important;
        
    }
}

</style>
    <div class="container">

        <div class="row mb-3">
            <div class="col-md-8">
                <h1 class="h3 d-inline align-middle fw-bold" style="font-size: 30px;"> <b>Activities of users</b> </h1>
                <p class="fw-bold">A detail list of users activities with date and time of asasa estate & Property management inventory
                    where we can see each & everything.</p>
            </div>

        </div>
    <!-- <div class="searchBox d-flex justify-content-end mb-4">
    <div class="input-group searchInput">
            <input class="form-control border-end-0 border " type="text"  id="example-search-input" placeholder="search">
            <span class="input-group-append">
                <button class="btn btn-outline-secondary bg-white border-start-0 border  ms-n3" type="button">
                    <i class="fa fa-search"></i>
                </button>
            </span>
     </div>
    </div> -->
        <div class="table-responsive">
            <table class="table-striped table-light table table-responsive" id="Table_ID"
                style="border: 1px solid #998F8F; border-radius: 7px;">
                <thead>
                    <tr>
                        <th
                            style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto;  border-top-left-radius: 7px;">
                            Sr#</th>
                        <th
                            style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">
                        </th>
                        <th
                            style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">
                            Name</th>
                        <th
                            style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">
                            Designation</th>
                        <th
                            style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">
                            Agency</th>
                        <th
                            style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">
                            Phone #</th>
                        <th
                            style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">
                            Date & Time</th>
                        <th
                            style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">
                            File</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    @if ($user->is_active==1)
                        <tr>
                            <td class=" pt-4">{{ $loop->iteration }}</td>
                            <td>
                                
                                <div class="d-flex align-items-center flex-nowrap gap-2" style="white-space: nowrap">
                            @if ($user->image_url)
                            <img src="{{ url('storage/'.$user->image)  }}" alt="img" style="width: 50px; border-radius: 50%;">
                            @else
                            <img src="{{ asset('assets/images/avatar.jpg') }}" alt="" style="width: 50px; border-radius: 50%;">
                            @endif
                            {{ $user->name }}
                        </div>
                                
                  
                            </td>
                            <td class="pt-4">{{$user->name}}</td>
                            <td class="pt-4">{{$user->designation}} </td>
                            <td class="pt-4">{{$user->agencyname}}</td>
                            <td class="pt-4">{{$user->phone}}</td>
                            <td class="pt-4 ">{{$user->created_at}}</td>
                            <td class="pt-4"><a href="{{url('export-data/'.$user->id)}}"><img src="{{ url('/assets/images/downloadicon.png') }}"
                                        alt="" style="width: 25px;"></a></td>
                        </tr>
                        @endif
                    @endforeach ()



                </tbody>
            </table>
        </div>

    </div>
    <script>
$(document).ready( function () {
    $('#Table_ID').DataTable();
} );
</script>
@endsection
