@extends('layouts.master')
@section('content')
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Add Inventory</h1>
                    <div class="row">
                        <div class="col-8">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, quod rerum sapiente animi, illum aliquid, soluta dolores beatae.</p>
                        </div>
                    </div>

                    <div class="form">
                        <form action="{{ url('updateInventory/'.$inventory->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6 col-md-4 col-lg-4 mb-3 mt-1">
                                    <label for="">Property Type</label>
                                    <select class="form-select" name="protype" aria-label="Default select example">
                                        <option selected value="{{ $inventory->property_type }}">{{ $inventory->property_type }}</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                    </select>

                                </div>
                                <div class="col-6 col-md-4 col-lg-4 mb-3 mt-1">
                                    <label for="">Area</label>
                                    <select class="form-select" name="area" onchange="area_change(this)" aria-label="Default select example">
                                        <option selected value="{{ $inventory->id }}">{{ $inventory->id }}</option>
                                        @foreach ($areas as $area)
                                            
                                        <option value="{{ $area->id }}">{{ $area->name }}</option>
                                        
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 col-md-4 col-lg-4 mb-3 mt-1">
                                    <label for="">Phase</label>
                                    <select class="form-select" name="phase"  id="phases-ele" aria-label="Default select example">
                                        <option value="{{ $inventory->area_phase_id }}">{{ $inventory->area_phase_id }}</option>
                                    </select>
                                </div>
                                <div class="col-6 col-md-4 col-lg-4 mb-3 mt-1">
                                    <label for="">Status of item</label>
                                    <select class="form-select" name="status" aria-label="Default select example">
                                        <option selected value="{{ $inventory->status }}">{{ $inventory->status }} </option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                    </select>
                                </div>
                                <div class="col-6 col-md-4 col-lg-4 mb-3 mt-1">
                                    <label for="">Size</label>
                                    <select class="form-select" name="size" aria-label="Default select example">
                                        <option selected value="{{ $inventory->size }}">{{ $inventory->size }} </option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                    </select>
                                </div>
                                <div class="col-6 col-md-4 col-lg-4 mb-3 mt-1">
                                    <label for="">Price</label>
                                    <select class="form-select" name="price" aria-label="Default select example">
                                        <option selected value="{{ $inventory->price }}">{{ $inventory->price }}</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                    </select>
                                </div>
                                <div class="col-6 col-md-4 col-lg-4 mb-3 mt-1">

                                    <label for="">Extra Land</label>
                                    <select class="form-select" name="extraland" aria-label="Default select example">
                                        <option selected value="{{ $inventory->extras }}">{{ $inventory->extras }}</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                    </select>

                                </div>
                                <div class="col-6 col-md-4 col-lg-4 mb-3 mt-1"></div>
                                <div class="col-6 col-md-4 col-lg-4 mb-3 mt-1"></div>

                                <div class="col-6 col-md-4 col-lg-4 mb-3 mt-1">
                                    <label for="">Item condition</label>
                                    <select class="form-select" name="itemcondition" aria-label="Default select example">
                                        <option selected value="{{ $inventory->item_condition }}">{{ $inventory->item_condition }}</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                    </select>
                                </div>
                                <div class="col-6 col-md-4 col-lg-4 mb-3 mt-1">
                                    <label for="">Agency</label>
                                    <select class="form-select" name="agency" aria-label="Default select example">
                                        <option selected value="{{ $inventory->agency_name }}">{{ $inventory->agency_name }}</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                    </select>
                                </div>
                                <div class="col-6 col-md-4 col-lg-4 mb-3 mt-1">
                                    <label for="">Name</label>
                                    <select class="form-select" name="name" aria-label="Default select example">
                                        <option selected value="{{ $inventory->client_name }}">{{ $inventory->client_name }}</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="divSave col-12 col-md-6 col-lg-6 mt-4">
                                    <button class="btnSave" type="submit">Update</button>
                                </div>
                                <div class="divCancel col-12 col-md-6 col-lg-6 mt-4">
                                    <button class="btnCancel">Cancel</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </main>
@endsection
@push('scripts')
    <script>
        const areas = @json($areas);

        console.log(areas);
const phase_element = document.getElementById("phases-ele");
        function area_change(ele){
            let area_id = ele.value;
            console.log(area_id);
            if(area_id){
                let area = areas.find(area => {
                    return area.id == area_id;
                });
                console.log(area.phases);
                if(area && area.phases) {
                    let html = "";
                    for (let i = 0; i < area.phases.length; i++) {
                        const element = area.phases[i];
                        html += `<option value="${element.id}">${element.title}</option>`;
                    }
                    phase_element.innerHTML=html;
                }

                console.log(area);

            }
        }

    </script>
@endpush