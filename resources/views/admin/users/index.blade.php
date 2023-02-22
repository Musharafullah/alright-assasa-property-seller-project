@extends('layouts.master')
@section('content')
<style>
    .sIcon
    {
        position: absolute;
       
        width:fit-content;
        right:12px;
        top:4px;
        z-index: 200;
    }
    table{
        border: 12px solid #F4F5FA !important;
    }
    @media only screen and (max-width: 640px){
	/*Big smartphones [426px -> 600px]*/
    .sIcon
    {
       
        right:177px; 
       
        top:36px;
       
    }
}
    @media only screen and (max-width: 500px){
	/*Big smartphones [426px -> 600px]*/
    .sIcon
    {
       
        right:127px; 
       
        top:36px;
       
    }
    
}
@media only screen and (max-width: 380px){
	/*Big smartphones [426px -> 600px]*/
    .sIcon
    {
       
        right:76px; 
       
        top:36px;
       
    }}
</style>
<div class="container">

    <div class="row mb-3">
        <div class="col-md-8">
            <h1 class="h3 d-inline align-middle " style="font-size: 30px; font-weight:bolder !important;"> <b>Users List</b> </h1>
            <p class="fw-bold">A user dashboard lets you easily gather and visualize user data from optimizing their experience and ensuring customer retention.</p>
        </div>
        <div class="col-md-4">
            <br>
            <a href="{{ url('admin/users/create') }}" class="btn btn-lg  mx-5" style="float: right; background: linear-gradient(180deg, #E60606 0%, #932C2C 100%);
border-radius: 8px; color: white;"> <i class="fa-solid fa-plus mx-1"></i> Add New</a>

        </div>
    </div>

    <div class="table-responsive" style="position:relative">
      
        <table class="table-striped table-light table table-responsive newTable" id="index-table" style="border: 1px solid #998F8F; border-radius: 7px;">
            <thead>
                <tr>
                    <th style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto;  border-top-left-radius: 7px;">#</th>
                    <th style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">Name</th>
                    <th style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">Phone</th>
                    <th style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">Email</th>
                    <th style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">Role</th>
                    <th style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">Area</th>
                    <th style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">Sale vs Pending</th>
                    <th style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">Total Listning</th>
   <th style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; border-top-right-radius: 7px;">File Access</th>
                    <th style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; border-top-right-radius: 7px;">Actions</th>
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
                            <img src="{{$user->image_url  }}" alt="img" style="width: 50px; border-radius: 50%;">
                            @else
                            <img src="{{ asset('assets/images/avatar.jpg') }}" alt="" style="width: 50px; border-radius: 50%;">
                            @endif
                            {{ $user->name }}
                        </div>
                    </td>
                    <td class="pt-4">{{ $user->phone }}</td>
                    <td class="pt-4">{{ $user->email }}</td>
                    <td class="pt-4">{{ $user->designation }}</td>
                    <td class="pt-4">
                        <div class="d-flex gap-2">
                            @if ($user->areas && sizeof($user->areas) > 0)
                            @foreach ($user->areas as $area)
                            <span style="padding: 2px;border-radius: 5px; background: #68E089; color: white; font-size: 16px;">{{ $area->name }}</span>
                            @endforeach
                            @endif
                        </div>
                    </td>
                    <td class="pt-2">

                        <div style="position: relative;">
                            {{ $user->extras['sold'] }}/{{ $user->extras['pending'] }}
                            <div style="width: 100%; height: 10px; border-radius: 5px; background-color: #998F8F;">
                                <div style="width: 40%; height: 10px; border-radius: 5px; background: linear-gradient(180deg, #E60606 0%, #932C2C 100%); position: absolute; "></div>

                            </div>

                        </div>

                    </td>
                    <td class="pt-4 ">{{ $user->extras['total'] }}</td>
                    <td>@if ($user->file==0)
                                                            <a href="{{ url('file-active') }}/{{ $user->id }}"><button class="btn btn-success" >Active</button></a>
                                                            @elseif ($user->file==1)
                                                            <a href="{{ url('file-inactive') }}/{{ $user->id }}"><button class="btn btn-danger" >Inactive</button></a>
                                                            @endif</td>
                    <td class="pt-3">
                        <div class="d-flex gap-2 ">
<!--                            <div>-->
<!--                                <a href="{{url('user/'.$user->id)}}"><button class="btn" style="background: #998F8F; border-radius: 6px;">-->
<!--                                <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--<rect width="28.4994" height="28.5" rx="4" fill="#998F8F"/>-->
<!--<path d="M25.4547 13.995C24.5726 11.7132 23.0412 9.73996 21.0498 8.31906C19.0584 6.89817 16.6943 6.09193 14.2497 6C11.8051 6.09193 9.44097 6.89817 7.44958 8.31906C5.45819 9.73996 3.9268 11.7132 3.04468 13.995C2.98511 14.1598 2.98511 14.3402 3.04468 14.505C3.9268 16.7868 5.45819 18.76 7.44958 20.1809C9.44097 21.6018 11.8051 22.4081 14.2497 22.5C16.6943 22.4081 19.0584 21.6018 21.0498 20.1809C23.0412 18.76 24.5726 16.7868 25.4547 14.505C25.5143 14.3402 25.5143 14.1598 25.4547 13.995ZM14.2497 21C10.2747 21 6.07468 18.0525 4.55218 14.25C6.07468 10.4475 10.2747 7.5 14.2497 7.5C18.2247 7.5 22.4247 10.4475 23.9472 14.25C22.4247 18.0525 18.2247 21 14.2497 21Z" fill="white"/>-->
<!--<path d="M14.2497 9.75C13.3597 9.75 12.4896 10.0139 11.7496 10.5084C11.0096 11.0029 10.4328 11.7057 10.0922 12.5279C9.75163 13.3502 9.66251 14.255 9.83615 15.1279C10.0098 16.0008 10.4384 16.8026 11.0677 17.432C11.697 18.0613 12.4989 18.4899 13.3718 18.6635C14.2447 18.8372 15.1495 18.7481 15.9718 18.4075C16.794 18.0669 17.4968 17.4901 17.9913 16.7501C18.4858 16.01 18.7497 15.14 18.7497 14.25C18.7497 13.0565 18.2756 11.9119 17.4317 11.068C16.5877 10.2241 15.4432 9.75 14.2497 9.75ZM14.2497 17.25C13.6563 17.25 13.0763 17.0741 12.583 16.7444C12.0896 16.4148 11.7051 15.9462 11.478 15.398C11.251 14.8499 11.1916 14.2467 11.3073 13.6647C11.4231 13.0828 11.7088 12.5482 12.1284 12.1287C12.5479 11.7091 13.0825 11.4234 13.6644 11.3076C14.2464 11.1919 14.8496 11.2513 15.3977 11.4784C15.9459 11.7054 16.4144 12.0899 16.7441 12.5833C17.0737 13.0766 17.2497 13.6567 17.2497 14.25C17.2497 15.0456 16.9336 15.8087 16.371 16.3713C15.8084 16.9339 15.0453 17.25 14.2497 17.25Z" fill="white"/>-->
<!--</svg>-->
<!--</button></a>-->
<!--                            </div>-->

                            <div style="margin-left: 2px;">
                                <a href="{{ url('admin/users/' . $user->id . '/edit') }}"><button class="btn " style="background: linear-gradient(180deg, #172FAC 0%, #32138B 100%);border-radius: 6px;">
                                <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect x="0.499363" y="0.25" width="28" height="28" rx="4" fill="url(#paint0_linear_803_1134)"/>
<g clip-path="url(#clip0_803_1134)">
<path d="M9.99936 16.875V18.75H11.8744L17.4044 13.22L15.5294 11.345L9.99936 16.875ZM18.8544 11.77C19.0494 11.575 19.0494 11.26 18.8544 11.065L17.6844 9.89503C17.4894 9.70003 17.1744 9.70003 16.9794 9.89503L16.0644 10.81L17.9394 12.685L18.8544 11.77Z" fill="white"/>
</g>
<defs>
<linearGradient id="paint0_linear_803_1134" x1="14.4994" y1="0.25" x2="14.4994" y2="28.25" gradientUnits="userSpaceOnUse">
<stop stop-color="#172FAC"/>
<stop offset="1" stop-color="#32138B"/>
</linearGradient>
<clipPath id="clip0_803_1134">
<rect width="12" height="12" fill="white" transform="translate(8.49936 8.25)"/>
</clipPath>
</defs>
</svg>
</button></a>
                            </div>
                            <div style="margin-left: 2px;">
                                @if ($user->is_active==1)
                                <a href="{{ url('in-active') }}/{{ $user->id }}"><button class="btn" style="background: linear-gradient(180deg, #E60606 0%, #B10707 91.67%); border-radius: 6px;">
                                <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect x="0.499359" width="28" height="28.5" rx="4" fill="url(#paint0_linear_803_1138)"/>
<path d="M12.4994 7.5H16.4994C16.4994 6.96957 16.2886 6.46086 15.9136 6.08579C15.5385 5.71071 15.0298 5.5 14.4994 5.5C13.9689 5.5 13.4602 5.71071 13.0851 6.08579C12.7101 6.46086 12.4994 6.96957 12.4994 7.5ZM10.9994 7.5C10.9994 7.04037 11.0899 6.58525 11.2658 6.16061C11.4417 5.73597 11.6995 5.35013 12.0245 5.02513C12.3495 4.70012 12.7353 4.44231 13.16 4.26642C13.5846 4.09053 14.0397 4 14.4994 4C14.959 4 15.4141 4.09053 15.8388 4.26642C16.2634 4.44231 16.6492 4.70012 16.9742 5.02513C17.2992 5.35013 17.557 5.73597 17.7329 6.16061C17.9088 6.58525 17.9994 7.04037 17.9994 7.5H23.7494C23.9483 7.5 24.139 7.57902 24.2797 7.71967C24.4203 7.86032 24.4994 8.05109 24.4994 8.25C24.4994 8.44891 24.4203 8.63968 24.2797 8.78033C24.139 8.92098 23.9483 9 23.7494 9H22.4294L21.2594 21.111C21.1696 22.039 20.7374 22.9002 20.047 23.5268C19.3567 24.1534 18.4577 24.5004 17.5254 24.5H11.4734C10.5412 24.5001 9.64246 24.153 8.95231 23.5265C8.26216 22.8999 7.83009 22.0388 7.74036 21.111L6.56936 9H5.24936C5.05045 9 4.85968 8.92098 4.71903 8.78033C4.57838 8.63968 4.49936 8.44891 4.49936 8.25C4.49936 8.05109 4.57838 7.86032 4.71903 7.71967C4.85968 7.57902 5.05045 7.5 5.24936 7.5H10.9994ZM12.9994 12.25C12.9994 12.0511 12.9203 11.8603 12.7797 11.7197C12.639 11.579 12.4483 11.5 12.2494 11.5C12.0504 11.5 11.8597 11.579 11.719 11.7197C11.5784 11.8603 11.4994 12.0511 11.4994 12.25V19.75C11.4994 19.9489 11.5784 20.1397 11.719 20.2803C11.8597 20.421 12.0504 20.5 12.2494 20.5C12.4483 20.5 12.639 20.421 12.7797 20.2803C12.9203 20.1397 12.9994 19.9489 12.9994 19.75V12.25ZM16.7494 11.5C16.9483 11.5 17.139 11.579 17.2797 11.7197C17.4203 11.8603 17.4994 12.0511 17.4994 12.25V19.75C17.4994 19.9489 17.4203 20.1397 17.2797 20.2803C17.139 20.421 16.9483 20.5 16.7494 20.5C16.5504 20.5 16.3597 20.421 16.219 20.2803C16.0784 20.1397 15.9994 19.9489 15.9994 19.75V12.25C15.9994 12.0511 16.0784 11.8603 16.219 11.7197C16.3597 11.579 16.5504 11.5 16.7494 11.5ZM9.23336 20.967C9.2873 21.5236 9.5466 22.0403 9.96073 22.4161C10.3749 22.792 10.9141 23.0001 11.4734 23H17.5254C18.0846 23.0001 18.6239 22.792 19.038 22.4161C19.4521 22.0403 19.7114 21.5236 19.7654 20.967L20.9234 9H8.07536L9.23336 20.967Z" fill="white"/>
<defs>
<linearGradient id="paint0_linear_803_1138" x1="14.4994" y1="0" x2="14.4994" y2="28.5" gradientUnits="userSpaceOnUse">
<stop stop-color="#E60606"/>
<stop offset="0.916667" stop-color="#B10707"/>
</linearGradient>
</defs>
</svg>

                                </button></a>
                             
                                @endif
                               
                            </div>
                        </div>
                    </td>
                </tr>
                @endif
                @endforeach

            </tbody>
        </table>
    </div>

</div>
@endsection

@push('scripts')
<script>
    $("#index-table").DataTable({
        scrollX: true,
        "lengthMenu": [
            [50, 100, 500, -1],
            [50, 100, 500, "All"]
        ],
        "pageLength": 50,
        scrollCollapse: true
       
        
    });
    
   
    let btnAccess=document.querySelectorAll(".access")
        // console.log(btns)
        btnAccess.forEach(btnA =>{
            console.log("in foreach")
            btnA.onclick= () =>{
                console.log("clikc")
                btnA.classList.toggle("btn-success")

                btnA.classList.toggle("btn-warning")
                if(btnA.classList.contains("btn-warning")){
                    btnA.innerText="No"
                }
                else{
                    btnA.innerText="Yes"
                }
                
            }
        })

</script>
@endpush