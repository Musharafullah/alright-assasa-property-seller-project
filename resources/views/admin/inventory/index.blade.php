@extends('layouts.master')
@section('content')
    <style>
        * {
            font-family: Poppins;
        }

        .newSelect {
            background: #F8F8F8;
            border-radius: 20px;
            box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.25);
            display:flex;
            flex-direction:row;
            padding:10px
        }

        .newSelect select {
            border: none
        }

        .newSelect input {
            width: 90%;
            border: 1px solid #e6e6e6;
            border-radius: 5px
        }

        .myCol {
            background: #FFFFFF;
            border-radius: 5px;
            padding: 10px;
            border: 1px solid #e6e6e6;
            width: 150px;
            margin-right: 3px
        }

        .downloadB {
            background: #DEDEDE;
            border-radius: 5px;
            padding: 4px;
            margin-bottom: 3px;
            cursor: pointer;
        }

        .dataTables_filter {
            display: none !important;
        }
        .dataTables_length select{
            margin-bottom:15px
        }
        .expdiv{
            margin-bottom:-34px
        }

        @media only screen and (max-width: 768px) {

            /*Big smartphones [426px -> 600px]*/
            .nCol {
                flex-direction: column;
            }

            .mycol {
                margin-right: 10px;
            }

            .sec1 {
                margin-top: 5px;
                justify-content: center;
            }

            .sec2 {
                margin-top: 5px;
                margin-left: 32px !important;
                justify-content: center
            }

            .smallboxinventory123 .row span {
                font-size: 30px !important;
                font-weight: 800 !important
            }

            .smallboxinventory div {
                width: 96%
            }
            .smallboxinventory123{
                margin-top:10px !important;
            }
            .newSelect {
            
            flex-direction:column;
            justify-content:center
          
        }
        .newSelect input {
            
            margin-top:10px;
            margin-left:20px
          
        }
        }

        @media only screen and (max-width: 1300px) {

            /*Big smartphones [426px -> 600px]*/
            .myCol {
                width: 130px;
                margin-right: 10px;
            }
        }

        @media only screen and (max-width: 1200px) {

            /*Big smartphones [426px -> 600px]*/
            .myCol {
                width: 100px;
                margin-right: 10px;
            }

            .smallboxinventory123 .row span {
                font-size: 10px !important;
                font-weight: 500
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class="container">

        <div class="row mb-3">
            <div class="col-md-8">


                <h1 class="h3 d-inline align-middle" style="font-size: 30px;"> <b class="">Complete Inventory</b> </h1>

                <p class="fw-bold">A detail list of asasa estate & Property management inventory
                    where we can see each & everything. </p>
            </div>
            <div class="col-md-4">
                <br>

                <a href="{{ url('admin/inventory/create') }}" class="btn btn-lg  mx-5"
                    style="float: right; background: linear-gradient(180deg, #E60606 0%, #932C2C 100%);
border-radius: 8px; color: white;">
                    <i class="fa-solid fa-plus mx-1"></i> Add New</a>
            </div>
        </div>

        <div class="row mb-4 mx-2 text-muted fontS">
            <div class="col-12 col-lg-8 col-sm-12">
                <div class="row gx-3" id="cardcolor">
                    @foreach ($areas_inventory as $count_area)
                        <div class="col-md-3 col-sm-6 col-6   smallboxinventory ">
                            <div class="d-flex align-items-center flex-column justify-center"
                                style="padding-block: 2rem; background-color: #F4F5FA;box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.25);border-radius: 8px;">
                                <p style="font-size: 40px; font-weight: 600;">0{{ $count_area['inventory_count'] }}</p>
                                <span
                                    style="color: 998F8F !important; font-size: 20px; font-weight: 600;">{{ $count_area['name'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-12 smallboxinventory123"
                style="background-color: #F4F5FA;box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.25);border-radius: 8px;">
                <div class="row p-2 ">
                    <!-- <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-5 mx-1 d-flex align-items-center flex-column justify-center"
                                        style="padding-block: 1rem; background-color:  #FFE7E7;box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.25);border-radius: 8px;">
                                        <p style="font-size: 30px; " class="pt-3">40</p>
                                        <span style="color: 998F8F !important; font-size: 16px;  "
                                            class="pb-3">{{ $count_area['name'] }}</span>
                                    </div>

                                    <div class="col-md-5  smallboxinventory1  mx-1 d-flex align-items-center flex-column justify-center"
                                        style="padding-block: 1rem; background-color: #FFEBA6;box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.25);border-radius: 8px;">
                                        <p style="font-size: 30px; " class="pt-3">40</p>
                                        <span style="color: 998F8F !important; font-size: 16px;  "
                                            class="pb-3">{{ $count_area['name'] }}</span>
                                    </div>
                                </div>

                            </div> -->

                    <div class="col-md-12 ">
                        <div class="row   ">
                            <div class="col-md-6 col-sm-6 col-6 smallboxinventory    d-block" style="">
                                <div class="mt-2"
                                    style="padding: 5px; background-color:  #FFA6A6;box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.25);border-radius: 8px; text-align: center;">
                                    @php
                                        $house = \App\Models\Property::where('item_status', 'house')
                                            ->where('user_id', Auth::user()->id)
                                            ->count();
                                    @endphp
                                    <span style="font-size: 25px; text-align: center; "
                                        class="pt-1">{{ $house }}</span>
                                    <span style="color: 998F8F !important; font-size: 16px;  " class="">House</span>
                                </div>
                                <div class="mt-5"
                                    style="padding: 5px;  background-color:  #A6FFC9;box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.25);border-radius: 8px; text-align: center;">
                                    @php
                                        $flat = \App\Models\Property::where('item_status', 'flat')
                                            ->where('user_id', Auth::user()->id)
                                            ->count();
                                    @endphp
                                    <span style="font-size: 25px; text-align: center; "
                                        class="pt-3">{{ $flat }}</span>
                                    <span style="color: 998F8F !important; font-size: 16px;  " class="">Flat</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-6 smallboxinventory1    d-block" style="">
                                <div class="mt-2"
                                    style="padding: 5px; background-color:  #C8FFA6;box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.25);border-radius: 8px; text-align: center;">
                                    @php
                                        $plot = \App\Models\Property::where('item_status', 'plot')
                                            ->where('user_id', Auth::user()->id)
                                            ->count();
                                    @endphp
                                    <span style="font-size: 25px; text-align: center; "
                                        class="pt-1">{{ $plot }}</span>
                                    <span style="color: 998F8F !important; font-size: 16px;  " class="">Plot</span>
                                </div>
                                <div class="mt-5"
                                    style="padding: 5px;  background-color:  #FFC6A6;box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.25);border-radius: 8px; text-align: center;">
                                    @php
                                        $shop = \App\Models\Property::where('item_status', 'shop')
                                            ->where('user_id', Auth::user()->id)
                                            ->count();
                                    @endphp
                                    <span style="font-size: 25px; text-align: center; "
                                        class="pt-3">{{ $shop }}</span>
                                    <span style="color: 998F8F !important; font-size: 16px;  " class="">Shop</span>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>



            </div>
        </div>


        <div class=" mx-3 mb-3 py-3 newSelect">
            <!-- <div class="col-md-12 d-flex  nCol">
                    <div class="sec1 d-flex ms-4">
                    <div class=" d-flex flex-column myCol  ">
                        <small class="fw-bold ">Area</small>
                    <select name="" id="" class="valSelect text-muted">
                        <option value="danish">(ALL)</option>
                        <option value="asdas">A</option>
                        <option value="sdsadas">A</option>
                    </select>
                        </div>
                        <div class=" d-flex flex-column myCol ">
                        <small class="fw-bold ">Property Type</small>
                    <select name="" id="" class="valSelect text-muted">
                        <option value="">(ALL)</option>
                        <option value="">A</option>
                        <option value="">A</option>
                    </select>
                        </div>
                        <div class=" d-flex flex-column myCol ">
                        <small class="fw-bold ">Phase</small>
                    <select name="" id="" class="valSelect text-muted">
                        <option value="">(ALL)</option>
                        <option value="">A</option>
                        <option value="">A</option>
                    </select>
                        </div>
                    </div>
                    <div class="sec2 d-flex  mx-2">
                    <div class=" d-flex flex-column myCol ">
                        <small class="fw-bold ">Orientation</small>
                    <select name="" id="" class="valSelect text-muted">
                        <option value="">(ALL)</option>
                        <option value="">A</option>
                        <option value="">A</option>
                    </select>
                        </div>
                        <div class=" d-flex flex-column myCol ">
                        <small class="fw-bold ">Catagory</small>
                    <select name="" id="" class="valSelect text-muted">
                        <option value="">(ALL)</option>
                        <option value="">A</option>
                        <option value="">A</option>
                    </select>
                        </div>
                        <div class=" d-flex flex-column myCol ">
                        <small class="fw-bold ">Face</small>
                    <select name="" id="" class="valSelect text-muted">
                        <option value="">(ALL)</option>
                        <option value="">A</option>
                        <option value="">A</option>
                    </select>
                        </div>
                    </div>
                </div> -->
            <div class="">
                <input type="text" id="inpA" placeholder="Property Type">
            </div>
            <div class="">
                <input type="text" id="inpP" placeholder="Area">
            </div>
            <div class="">
                <input type="text" id="inpPh" placeholder="Phase">
            </div>
            <div class="">
                <input type="text" id="inpO" placeholder="Sector">
            </div>
            <div class="">
                <input type="text" id="inpC" placeholder="Orientation">
            </div>
            <div class="">
                <input type="text" id="inpF" placeholder="Category">
            </div>
            <div class="">
                <input type="text" id="inCd" placeholder="Condition">
            </div>



        </div>




    </div>
    
        <a href="{{ url('export') }}" class="btn btn-success" >Export Inventory</a><br><br>
    
   
<div class="container">
    
    <div class="table-responsive ">
   

        <table class="table-striped table-light table  table-responsive  " id="example"
            style="border: 1px solid #998F8F; border-radius: 7px;"></div>
           
   
            <thead>
                <tr>
                    <th
                        style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto;  border-top-left-radius: 7px;">
                        Sr #</th>
                    <th
                        style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">
                        Property Type</th>
                    <th
                        style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">
                        Area</th>
                    <th
                        style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">
                        Phase</th>
                    <th
                        style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">
                        Sector</th>
                    <th
                        style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">
                        Size</th>
                    <th
                        style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">
                        Price</th>
                    <th
                        style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">
                        Face</th>
                    <th
                        style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">
                        Category</th>
                    <th
                        style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">
                        Condition</th>
                    <th
                        style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">
                        Created By</th>
                    <th
                        style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; ">
                        Status</th>
                    <th
                        style="background-color: #F4F5FA;  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis; overflow: auto; border-top-right-radius: 7px;">
                        Actions</th>
                </tr>
            </thead>
            <tbody class="text-muted">
                @foreach ($properties as $property)
                    <tr class=" text-muted">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $property->property }}</td>
                        <td>
                            {{ $property->area->name }}
                        </td>
                        <td>{{ $property->phase->title }}</td>
                        <td>{{ $property->sector }}</td>
                        <td>{{ $property->size }} {{ get_title_string($property->size_unit) }}</td>
                        <td>
                            {{ $property->price }}
                        </td>
                        <td>{{ get_title_string($property->orientation) }}</td>
                        @php
                            $cat = json_decode($property->category);
                            
                        @endphp
                        <td>
                            @foreach ($cat as $c)
                                {{ ucfirst($c) }}
                            @endforeach
                            <!--{{ get_title_string($property->category) }}-->
                        </td>
                        <td>{{ get_title_string($property->item_condition) }}</td>
                        <td>{{ $property->user->name }}</td>
                        <td>
                            <span class="d-flex align-items-center flex-nowrap gap-1">
                                {{ get_title_string($property->purchase_status) }}
                                <div class="cursor-pointer" data-bs-toggle="modal"
                                    data-bs-target="#update-status-model-{{ $property->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                        <path
                                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                    </svg>
                                </div>

                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <div style="margin-left: 2px;">
                                    <a href="{{ url('admin/inventory/' . $property->id . '/edit') }}"><button
                                            class="btn "
                                            style="background: linear-gradient(180deg, #172FAC 0%, #32138B 100%);border-radius: 6px;">
                                            <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_801_1163)">
                                                    <path
                                                        d="M1.99936 8.87503V10.75H3.87436L9.40436 5.22003L7.52936 3.34503L1.99936 8.87503ZM10.8544 3.77003C11.0494 3.57503 11.0494 3.26003 10.8544 3.06503L9.68436 1.89503C9.48936 1.70003 9.17436 1.70003 8.97936 1.89503L8.06436 2.81003L9.93936 4.68503L10.8544 3.77003Z"
                                                        fill="white" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_801_1163">
                                                        <rect width="12" height="12" fill="white"
                                                            transform="translate(0.499363 0.25)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button></a>
                                </div>
                                <div style="margin-left: 2px;">

                                    <x-alerts.deletemodal key="del-model-key-{{ $property->id }}" :modelId="$property->id" />
                                </div>
                            </div>



                        </td>
                    </tr>
                @endforeach
            </tbody>
            <table class="table-striped table-light table  table-responsive  " id="example"
                style="border: 1px solid #998F8F; border-radius: 7px;">

            </table>
    </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script>
        //       $(document).ready(function () {
        //     // Setup - add a text input to each footer cell
        //     $('#example tfoot th').each(function () {
        //         var title = $(this).text();
        //         $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        //     });
        //     // DataTable
        //     var table = $('#example').DataTable({
        //         initComplete: function () {
        //             // Apply the search
        //             this.api()
        //                 .columns()
        //                 .every(function () {
        //                     var that = this;
        //                     $('input', this.footer()).on('keyup change clear', function () {
        //                         if (that.search() !== this.value) {
        //                             that.search(this.value).draw();
        //                         }
        //                     });
        //                 });
        //         },
        //     });
        // });
        var table = $('#example').DataTable({
            "pageLength": 5,
            lengthMenu: [
                [5, 10, 20, -1],
                [5, 10, 20, 'Todos']
            ]
        });

        $('#inpA').on('keyup', function() {
            table.column(1).search(this.value).draw();
        });
        $('#inpC').on('keyup', function() {
            table.column(7).search(this.value).draw();
        });
        $('#inpP').on('keyup', function() {
            table.column(2).search(this.value).draw();
        });
        $('#inpPh').on('keyup', function() {
            table.column(3).search(this.value).draw();
        });
        $('#inpO').on('keyup', function() {
            table.column(4).search(this.value).draw();
        });
        $('#inpF').on('keyup', function() {
            table.column(8).search(this.value).draw();
        });
        $('#inCd').on('keyup', function() {
            table.column(9).search(this.value).draw();
        });
    </script>
@endpush

@push('modals')
    @foreach ($properties as $property)
        <div class="modal fade" id="update-status-model-{{ $property->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel{{ $property->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel{{ $property->id }}">Update Property Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/admin/inventory/update/status/' . $property->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div>
                                <x-forms.select key="statusId{{ $property->id }}" name="status" title="Choose Status:"
                                    :data="$purchase_statuses" :selectedValue="$property->purchase_status" required="true" />
                            </div>
                            <div class="d-flex justify-content-end mt-4 mb-2">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script>
            let cardcolor = document.getElementById("cardcolor").childNodes;
            cardcolor[1].childNodes[1].childNodes[1].style.color = "#E50606";
            cardcolor[3].childNodes[1].childNodes[1].style.color = "#DDA617";

            cardcolor[5].childNodes[1].childNodes[1].style.color = "#0AA75B";
            cardcolor[7].childNodes[1].childNodes[1].style.color = " #336BFB";
        </script>
    @endforeach
@endpush
