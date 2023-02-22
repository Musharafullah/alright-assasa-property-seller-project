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
</style>
<div class="container">
<div class="row mb-3">
        <div class="col-md-8">
            <h1 class="h3 d-inline align-middle" style="font-size: 30px;"> <b> Add Area </b> </h1>
            <p class="fw-bold">A user dashboard lets you easily gather and visualize user data from optimizing their experience and
                ensuring customer retention.</p>
        </div>

    </div>
    </div>
        <div class="row">
            <div class="container m-auto" style="margin-top:20px">
                <form class="myform " action="{{ url('/admin/areas') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6 mb-2 px-4">
                            <label for="exampleInputArea" class="form-label">Name:</label>
                            <input type="text" name='name' class="form-control" id="exampleInputArea">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-2 px-4">
                            <label for="exampleInputArea" class="form-label">Area Phases:</label>
                            <div id="phases-array" class="d-flex flex-column gap-4">
                                <div class="d-flex align-items-center gap-4">
                                    <input type="text" name='phases[]' class="form-control">
                                    <button onclick="addNewPhase()" class="btn btn-info" type="button"> <i class="fas fa-plus"></i> </button>
                                </div>
                            </div>
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                        <div class="row mt-5">
                    <!-- submit Button -->
                    <div class="col-md-6 d-flex justify-content-md-end justify-content-sm-center btnspaceform">
                    <button type="submit" class="btn btn-lg savBtn" style="background: linear-gradient(180deg, #E60606 0%, #932C2C 100%); color: white; width: 50%;">Save</button>

                    </div>
                    <!-- cancel Button  -->
                    <div class="col-md-6 d-flex justify-content-md-start justify-content-sm-center btnspaceform">
                    <button type="submit" class="btn btn-lg canBtn" style="background:#998F8F ;color: white; width: 50%;">Cancle</button>

                    </div>
                   
               
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function addNewPhase() {
            $("#phases-array").append(`
                <div class="d-flex align-items-center gap-4">
                    <input type="text" name='phases[]' class="form-control">
                    <button onclick="$(this).parent().remove()" class="btn " type="button" style="background: linear-gradient(180deg, #E60606 0%, #932C2C 100%);"> <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M8.49939 3.5H12.4994C12.4994 2.96957 12.2887 2.46086 11.9136 2.08579C11.5385 1.71071 11.0298 1.5 10.4994 1.5C9.96896 1.5 9.46025 1.71071 9.08518 2.08579C8.7101 2.46086 8.49939 2.96957 8.49939 3.5V3.5ZM6.99939 3.5C6.99939 3.04037 7.08992 2.58525 7.26581 2.16061C7.4417 1.73597 7.69951 1.35013 8.02452 1.02513C8.34952 0.700121 8.73536 0.442313 9.16 0.266422C9.58464 0.0905302 10.0398 0 10.4994 0C10.959 0 11.4141 0.0905302 11.8388 0.266422C12.2634 0.442313 12.6493 0.700121 12.9743 1.02513C13.2993 1.35013 13.5571 1.73597 13.733 2.16061C13.9089 2.58525 13.9994 3.04037 13.9994 3.5H19.7494C19.9483 3.5 20.1391 3.57902 20.2797 3.71967C20.4204 3.86032 20.4994 4.05109 20.4994 4.25C20.4994 4.44891 20.4204 4.63968 20.2797 4.78033C20.1391 4.92098 19.9483 5 19.7494 5H18.4294L17.2594 17.111C17.1696 18.039 16.7374 18.9002 16.0471 19.5268C15.3567 20.1534 14.4577 20.5004 13.5254 20.5H7.47339C6.54125 20.5001 5.64249 20.153 4.95234 19.5265C4.26219 18.8999 3.83012 18.0388 3.74039 17.111L2.56939 5H1.24939C1.05048 5 0.859712 4.92098 0.719059 4.78033C0.578407 4.63968 0.49939 4.44891 0.49939 4.25C0.49939 4.05109 0.578407 3.86032 0.719059 3.71967C0.859712 3.57902 1.05048 3.5 1.24939 3.5H6.99939ZM8.99939 8.25C8.99939 8.05109 8.92037 7.86032 8.77972 7.71967C8.63907 7.57902 8.4483 7.5 8.24939 7.5C8.05048 7.5 7.85971 7.57902 7.71906 7.71967C7.57841 7.86032 7.49939 8.05109 7.49939 8.25V15.75C7.49939 15.9489 7.57841 16.1397 7.71906 16.2803C7.85971 16.421 8.05048 16.5 8.24939 16.5C8.4483 16.5 8.63907 16.421 8.77972 16.2803C8.92037 16.1397 8.99939 15.9489 8.99939 15.75V8.25ZM12.7494 7.5C12.9483 7.5 13.1391 7.57902 13.2797 7.71967C13.4204 7.86032 13.4994 8.05109 13.4994 8.25V15.75C13.4994 15.9489 13.4204 16.1397 13.2797 16.2803C13.1391 16.421 12.9483 16.5 12.7494 16.5C12.5505 16.5 12.3597 16.421 12.2191 16.2803C12.0784 16.1397 11.9994 15.9489 11.9994 15.75V8.25C11.9994 8.05109 12.0784 7.86032 12.2191 7.71967C12.3597 7.57902 12.5505 7.5 12.7494 7.5ZM5.23339 16.967C5.28733 17.5236 5.54663 18.0403 5.96076 18.4161C6.37488 18.792 6.91414 19.0001 7.47339 19H13.5254C14.0846 19.0001 14.6239 18.792 15.038 18.4161C15.4521 18.0403 15.7115 17.5236 15.7654 16.967L16.9234 5H4.07539L5.23339 16.967Z" fill="white"/>
</svg>
 </button>
                </div>
            `);
        }
    </script>
@endpush
