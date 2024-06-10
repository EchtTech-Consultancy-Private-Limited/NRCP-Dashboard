@extends('layouts.main') 
@section('title')
{{__('Equipments Edit')}}
@endsection
@section('content')
<div class="container-fluid">
<div class='row'>
        <div class="col-md-12">
            <div class="card card-primary dashboard">
                <div class="form-tab">
                    <div class="bootstrap-tab">
                        <div class="tab-content" id="myTabContent">
                            <form action="{{ route('equipment-update') }}" method="post" class="" id="general_equipment">
                                @csrf
                                <div class="row">
                                <input type="hidden" name="id" value="{{$equipment->id}}" >
                                <div class="col-lg-3 col-md-3 col-6">
                                    <div class="form-group">
                                        <label for="state">Equipment<span class="star">*</span></label>
                                        <select class="form-control" aria-label="Default select example" name="equipment" id="equipment">
                                            <option value=""> Select</option>
                                            @foreach($equipment_masters as $data)
                                            @if($equipment->equipment == $data->name)
                                                <option value='{{$equipment->equipment}}' selected>{{$data->name}}</option>
                                            @else
                                                <option value='{{$data->name}}'>{{$data->name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                            @error('equipment') 
                                                <span class="form-text text-muted">{{ $message }}</span>
                                            @enderror 
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6">
                                    <div class="form-group">
                                        <label for="district">Quantity<span class="star">*</span></label>
                                        <input type="text" class="form-control" maxlength="5" oninput="validateInput(this)" aria-label="Default select example" name="quantity" id="quantity" value="{{$equipment->quantity}}" >
                                        </select>
                                            @error('quantity') 
                                                <span class="form-text text-muted">{{ $message }}</span>
                                            @enderror 
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6">
                                    <div class="form-group">
                                        <label for="fromYear">Year of purchase<span class="star">*</span></label>
                                        <input type="date"t class="form-control" aria-label="Default select example" name="year_of_purchase" id="year_of_purchase" value="{{$equipment->year_of_purchase}}" >
                                            @error('year_of_purchase') 
                                                <span class="form-text text-muted">{{ $message }}</span>
                                            @enderror 
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6 search-reset">
                                        <div class="apply-filter mt-4 pt-1">
                                            <button type="submit" class="btn bg-primary mr-3">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection