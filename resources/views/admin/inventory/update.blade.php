@extends('layouts.master')
@section('content')
    <style>
        .row label {
            font-style: normal;
            font-weight: bold;
            font-size: 20px;
            line-height: 31px;
            color: #292323;
        }

        @media only screen and (max-width: 768px) {
            .row label {

                font-size: 10px;
                line-height: 21px;

            }
        }

        @media only screen and (max-width: 400px) {
            .row label {

                font-size: 10px;
                line-height: 10px;

            }
        }
    </style>
    <div class="container">
        <div class="mb-2 mt-4">
            <div class="mx-4">
                <h1 class="h3 d-inline align-middle"><b>Update Inventory</b></h1>
                <p class="fw-bold">Create and manage your dealers list, send and receive purchase orders – your online
                    Dashboard is your new back of house.</p>
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-danger err">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="container m-auto" style="margin-top:20px">
                <form class="myform border-dark mx-4 rounded border p-4"
                    action="{{ url('/admin/inventory/' . $property->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-4 mb-2 px-4">
                            <x-forms.input name="client_name" title="Client Name:" type="text" required="true"
                                :inputValue="$property->reference_name" />
                        </div>
                        <div class="col-4 mb-2 px-4">
                            <x-forms.input name="client_mobile" title="Client Mobile:" type="tel" size="11"
                                :inputValue="$property->reference_mobile" />
                        </div>
                        <div class="col-4 mb-2 px-4">
                            <x-forms.input name="agency_name" title="Agency:" type="text" required="true"
                                :inputValue="$property->agency_name" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-2 px-4">
                            <x-forms.select name="property" title="Property Type:" required="true" :data="$properties"
                                :selectedValue="$property->property" />
                        </div>
                        <div class="col-4 mb-2 px-4">
                            <x-forms.select name="area_id" title="Area:" required="true" valueKey="id" dataKey="name"
                                :data="$areas" :selectedValue="$property->area_id" />
                        </div>
                        <div class="col-4 mb-2 px-4">
                            <x-forms.select name="area_phase_id" title="Phases:" required="true" :data="$property->area->phases"
                                valueKey="id" dataKey="title" :selectedValue="$property->area_phase_id" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-2 px-4">
                            <x-forms.select name="item_status" title="Status of Item:" required="true" :data="$item_statuses"
                                :selectedValue="$property->item_status" />
                        </div>
                        <div class="col-4 mb-2 px-4">
                            <x-forms.input name="size" title="Size:" type="number" required="true"
                                :inputValue="$property->size" />
                        </div>
                        <div class="col-4 mb-2 px-4">
                            <x-forms.select name="size_unit" title="Size Unit:" required="true" :data="$size_units"
                                :selectedValue="$property->size_unit" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4 mb-2 px-4">
                            <x-forms.input name="street_number" title="Street No:" type="text" required="true"
                                :inputValue="$property->street_number" />
                        </div>
                        <div class="col-4 mb-2 px-4">
                            <x-forms.input name="sector" title="Sector:" type="text" required="true"
                                :inputValue="$property->sector" />
                        </div>
                        <div class="col-4 mb-2 px-4">
                            <x-forms.select name="orientation" title="Orientation:" required="true" :data="$orientations"
                                :selectedValue="$property->orientation" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4 mb-2 px-4">
                            <x-forms.input name="price" title="Price:" type="number" required="true"
                                :inputValue="$property->price" />
                        </div>
                        <div class="col-4 mb-2 px-4">
                            <x-forms.input name="extra_land" title="Extra Land:" type="text" :inputValue="$property->extra_land" />
                        </div>
                        <div class="col-4 mb-2 px-4">
                            @php
                                $check = strtolower($property->category);
                                
                                $cat = json_decode($property->category);
                                
                            @endphp
                            <label>Category:</label><br>



                            @php
                                $i = 0;
                            @endphp
                            @foreach ($cat as $c)
                                @if (str_contains(strtolower($c), 'boulevard') == true)
                                    <input checked type="checkbox" name="category[]" value="boulvard">
                                    <label> Boulevard</label><br>

                                    @php
                                        $i = 1;
                                    @endphp
                                @break
                            @endif
                        @endforeach
                        @if ($i == 0)
                            <input type="checkbox" name="category[]" value="boulvard">
                            <label> Boulevard</label><br>
                        @endif

                        @php
                            $i = 0;
                        @endphp
                        @foreach ($cat as $c)
                            @if (str_contains(strtolower($c), 'avenue') == true)
                                <input checked type="checkbox" name="category[]" value="avenue">
                                <label> Avenue</label><br>

                                @php
                                    $i = 1;
                                @endphp
                            @break
                        @endif
                    @endforeach
                    @if ($i == 0)
                        <input type="checkbox" name="category[]" value="avenue">
                        <label> Avenue</label><br>
                    @endif

                    @php
                        $i = 0;
                    @endphp
                    @foreach ($cat as $c)
                        @if (str_contains(strtolower($c), 'general') == true)
                            <input checked type="checkbox" name="category[]" value="general">
                            <label> General</label><br>

                            @php
                                $i = 1;
                            @endphp
                        @break
                    @endif
                @endforeach
                @if ($i == 0)
                    <input type="checkbox" name="category[]" value="general">
                    <label> General</label><br>
                @endif

                @php
                    $i = 0;
                @endphp
                @foreach ($cat as $c)
                    @if (str_contains(strtolower($c), 'corner') == true)
                        <input checked type="checkbox" name="category[]" value="corner">
                        <label> Corner</label><br>

                        @php
                            $i = 1;
                        @endphp
                    @break
                @endif
            @endforeach
            @if ($i == 0)
                <input type="checkbox" name="category[]" value="corner">
                <label> Corner</label><br>
            @endif

        </div>
    </div>
    <div class="row">
        <div class="col-4 mb-2 px-4">
            <x-forms.select name="item_condition" title="Item Condition:" required="true"
                :data="$item_conditions" :selectedValue="$property->item_condition" />
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
</div>
</div>
</div>
@endsection

@push('scripts')
<script>
    const all_areas = @json($areas);
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
@endpush
