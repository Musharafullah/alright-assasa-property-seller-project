@extends('layouts.master')
@section('content')
    <div class="container">

        <div class="row mb-3">
            <div class="col-md-8">
                <h1 class="h3 d-inline align-middle" style="font-size: 30px;"> <b>Users</b> </h1>
              

            </div>
            <div class="col-md-4">
                <br>
                <a href="{{ url('admin/user/create') }}" class="btn btn-lg  mx-5"
                    style="float: right; background: linear-gradient(180deg, #E60606 0%, #932C2C 100%);
border-radius: 8px; color: white;">
                    <i class="fa-solid fa-plus mx-1"></i> Add New</a>

            </div>
        </div>


        <div class="table-responsive">
            <table class="table-striped table-light table table-responsive" id="index-table"
                style="border: 1px solid #998F8F; border-radius: 7px;">
                <thead>
                    <tr>
                        <th
                            style="background-color: #F4F5FA;  white-space: nowrap;overflow: hidden;text-overflow: ellipsis; overflow: auto;  border-top-left-radius: 7px;">
                            #</th>
                        <th
                            style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">
                            Name</th>
                        <th
                            style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">
                            Phone</th>
                        <th
                            style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">
                            Email</th>
                        <th
                            style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">
                            Role</th>
                        <th
                            style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">
                            Area</th>
                        <th
                            style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">
                            Sale vs Pending</th>
                        <th
                            style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">
                            Total Listning</th>
                        <th
                            style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; border-top-right-radius: 7px;">
                            Actions</th>

                        <th
                            style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">
                            File</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class=" pt-4">{{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex align-items-center flex-nowrap gap-2" style="white-space: nowrap">
                                    @if ($user->image_url)
                                        <img src="{{ $user->image_url }}" alt="img"
                                            style="width: 50px; border-radius: 50%;">
                                    @else
                                        <img src="{{ asset('assets/images/avatar.jpg') }}" alt=""
                                            style="width: 50px; border-radius: 50%;">
                                    @endif
                                    {{ $user->name }}
                                </div>
                            </td>
                            <td class=" pt-4">{{ $user->phone }}</td>
                            <td class=" pt-4">{{ $user->email }}</td>
                            <td class=" pt-4">{{ $user->designation }}</td>
                            <td class=" pt-4">
                                <div class="d-flex gap-2">
                                    @if ($user->areas && sizeof($user->areas) > 0)
                                        @foreach ($user->areas as $area)
                                            <span
                                                style="border: 1px solid;padding: 2px;border-radius: 5px;">{{ $area->name }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </td>
                            <td class=" pt-2">

                                <div style="position: relative;">
                                    {{ $user->extras['sold'] }}/{{ $user->extras['pending'] }}
                                    <div style="width: 100%; height: 10px; border-radius: 5px; background-color: #998F8F;">
                                        <div
                                            style="width: 40%; height: 10px; border-radius: 5px; background: linear-gradient(180deg, #E60606 0%, #932C2C 100%); position: absolute; ">
                                        </div>

                                    </div>

                                </div>


                            </td>
                            <td class=" pt-4">{{ $user->extras['total'] }}</td>
                            <td class=" pt-3">
                                <div class="d-flex ">
                                    <div>
                                        <a href="{{ url('user/'.$user->id) }}"><button class="btn"
                                                style="background: #998F8F; border-radius: 6px;">
                                                <svg width="23" height="17" viewBox="0 0 23 17" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M22.4547 7.995C21.5726 5.71324 20.0412 3.73996 18.0498 2.31906C16.0584 0.898167 13.6943 0.0919297 11.2497 0C8.80507 0.0919297 6.44097 0.898167 4.44958 2.31906C2.45819 3.73996 0.926802 5.71324 0.0446809 7.995C-0.0148936 8.15978 -0.0148936 8.34022 0.0446809 8.505C0.926802 10.7868 2.45819 12.76 4.44958 14.1809C6.44097 15.6018 8.80507 16.4081 11.2497 16.5C13.6943 16.4081 16.0584 15.6018 18.0498 14.1809C20.0412 12.76 21.5726 10.7868 22.4547 8.505C22.5143 8.34022 22.5143 8.15978 22.4547 7.995ZM11.2497 15C7.27468 15 3.07468 12.0525 1.55218 8.25C3.07468 4.4475 7.27468 1.5 11.2497 1.5C15.2247 1.5 19.4247 4.4475 20.9472 8.25C19.4247 12.0525 15.2247 15 11.2497 15Z" fill="white"/>
<path d="M11.2496 3.75C10.3596 3.75 9.48959 4.01392 8.74957 4.50839C8.00955 5.00285 7.43277 5.70566 7.09218 6.52792C6.75158 7.35019 6.66247 8.25499 6.8361 9.12791C7.00974 10.0008 7.43832 10.8026 8.06766 11.432C8.69699 12.0613 9.49881 12.4899 10.3717 12.6635C11.2446 12.8372 12.1494 12.7481 12.9717 12.4075C13.794 12.0669 14.4968 11.4901 14.9912 10.7501C15.4857 10.01 15.7496 9.14002 15.7496 8.25C15.7496 7.05653 15.2755 5.91193 14.4316 5.06802C13.5877 4.22411 12.4431 3.75 11.2496 3.75ZM11.2496 11.25C10.6563 11.25 10.0763 11.0741 9.58293 10.7444C9.08958 10.4148 8.70506 9.94623 8.478 9.39805C8.25093 8.84987 8.19152 8.24667 8.30728 7.66473C8.42304 7.08279 8.70876 6.54824 9.12832 6.12868C9.54787 5.70912 10.0824 5.4234 10.6644 5.30764C11.2463 5.19189 11.8495 5.2513 12.3977 5.47836C12.9459 5.70542 13.4144 6.08994 13.744 6.58329C14.0737 7.07664 14.2496 7.65666 14.2496 8.25C14.2496 9.04565 13.9336 9.80871 13.371 10.3713C12.8083 10.9339 12.0453 11.25 11.2496 11.25Z" fill="white"/>
</svg>
</button></a>
                                    </div>
                                    <div style="margin-left: 2px;">
                                        <a href="{{ url('admin/dealers/' . $user->id . '/edit') }}"><button class="btn "
                                                style="background: linear-gradient(180deg, #172FAC 0%, #32138B 100%);border-radius: 6px;">
                                                <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_803_1252)">
<path d="M1.99939 8.87503V10.75H3.87439L9.40439 5.22003L7.52939 3.34503L1.99939 8.87503ZM10.8544 3.77003C11.0494 3.57503 11.0494 3.26003 10.8544 3.06503L9.68439 1.89503C9.48939 1.70003 9.17439 1.70003 8.97939 1.89503L8.06439 2.81003L9.93939 4.68503L10.8544 3.77003Z" fill="white"/>
</g>
<defs>
<clipPath id="clip0_803_1252">
<rect width="12" height="12" fill="white" transform="translate(0.49939 0.25)"/>
</clipPath>
</defs>
</svg>
</button></a>
                                    </div>
                                    <div style="margin-left: 2px;">
                                        <form action="{{ url('admin/dealers/' . $user->id) }}" method="post"
                                            class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn"
                                                style="background: linear-gradient(180deg, #E60606 0%, #B10707 91.67%); border-radius: 6px;">
                                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M8.49939 3.5H12.4994C12.4994 2.96957 12.2887 2.46086 11.9136 2.08579C11.5385 1.71071 11.0298 1.5 10.4994 1.5C9.96896 1.5 9.46025 1.71071 9.08518 2.08579C8.7101 2.46086 8.49939 2.96957 8.49939 3.5V3.5ZM6.99939 3.5C6.99939 3.04037 7.08992 2.58525 7.26581 2.16061C7.4417 1.73597 7.69951 1.35013 8.02452 1.02513C8.34952 0.700121 8.73536 0.442313 9.16 0.266422C9.58464 0.0905302 10.0398 0 10.4994 0C10.959 0 11.4141 0.0905302 11.8388 0.266422C12.2634 0.442313 12.6493 0.700121 12.9743 1.02513C13.2993 1.35013 13.5571 1.73597 13.733 2.16061C13.9089 2.58525 13.9994 3.04037 13.9994 3.5H19.7494C19.9483 3.5 20.1391 3.57902 20.2797 3.71967C20.4204 3.86032 20.4994 4.05109 20.4994 4.25C20.4994 4.44891 20.4204 4.63968 20.2797 4.78033C20.1391 4.92098 19.9483 5 19.7494 5H18.4294L17.2594 17.111C17.1696 18.039 16.7374 18.9002 16.0471 19.5268C15.3567 20.1534 14.4577 20.5004 13.5254 20.5H7.47339C6.54125 20.5001 5.64249 20.153 4.95234 19.5265C4.26219 18.8999 3.83012 18.0388 3.74039 17.111L2.56939 5H1.24939C1.05048 5 0.859712 4.92098 0.719059 4.78033C0.578407 4.63968 0.49939 4.44891 0.49939 4.25C0.49939 4.05109 0.578407 3.86032 0.719059 3.71967C0.859712 3.57902 1.05048 3.5 1.24939 3.5H6.99939ZM8.99939 8.25C8.99939 8.05109 8.92037 7.86032 8.77972 7.71967C8.63907 7.57902 8.4483 7.5 8.24939 7.5C8.05048 7.5 7.85971 7.57902 7.71906 7.71967C7.57841 7.86032 7.49939 8.05109 7.49939 8.25V15.75C7.49939 15.9489 7.57841 16.1397 7.71906 16.2803C7.85971 16.421 8.05048 16.5 8.24939 16.5C8.4483 16.5 8.63907 16.421 8.77972 16.2803C8.92037 16.1397 8.99939 15.9489 8.99939 15.75V8.25ZM12.7494 7.5C12.9483 7.5 13.1391 7.57902 13.2797 7.71967C13.4204 7.86032 13.4994 8.05109 13.4994 8.25V15.75C13.4994 15.9489 13.4204 16.1397 13.2797 16.2803C13.1391 16.421 12.9483 16.5 12.7494 16.5C12.5505 16.5 12.3597 16.421 12.2191 16.2803C12.0784 16.1397 11.9994 15.9489 11.9994 15.75V8.25C11.9994 8.05109 12.0784 7.86032 12.2191 7.71967C12.3597 7.57902 12.5505 7.5 12.7494 7.5ZM5.23339 16.967C5.28733 17.5236 5.54663 18.0403 5.96076 18.4161C6.37488 18.792 6.91414 19.0001 7.47339 19H13.5254C14.0846 19.0001 14.6239 18.792 15.038 18.4161C15.4521 18.0403 15.7115 17.5236 15.7654 16.967L16.9234 5H4.07539L5.23339 16.967Z" fill="white"/>
</svg>

                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            <td class="pt-4"><a href="{{url('export-data/'.$user->id)}}"><img
                                        src="{{ url('/assets/images/downloadicon.png') }}" alt=""
                                        style="width: 25px;"></a></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        $("#index-table").DataTable({
            "lengthMenu": [
                [50, 100, 500, -1],
                [50, 100, 500, "All"]
            ],
            "pageLength": 50
        });
    </script>
@endpush
