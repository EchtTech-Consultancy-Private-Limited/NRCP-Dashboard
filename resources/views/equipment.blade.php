@extends('layouts.main')
@section('title')
{{__('Equipments Form')}}
@endsection
@section('content')
<div class="container-fluid">
    <div class="dashboard">
        <div class="dashboard-filter mb-4">
            <form action="{{ route('equipment-add') }}" method="post" class="" id="general_equipment">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="state">Equipment<span class="star">*</span></label>
                            <select class="form-control" aria-label="Default select example" name="equipment"
                                id="equipment">
                                <option value=""> Select</option>
                                @foreach($equipment_masters as $data)
                                <option value='{{$data->name}}'>{{$data->name}}</option>
                                @endforeach
                            </select>
                            @error('equipment')
                            <span class="form-text text-muted">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="district">Quantity<span class="star">*</span></label>
                            <input type="text" class="form-control" maxlength="5" oninput="validateInput(this)"
                                aria-label="Default select example" name="quantity" id="quantity" placeholder="Quantity">
                            </select>
                            @error('quantity')
                            <span class="form-text text-muted">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="fromYear">Year of purchase<span class="star">*</span></label>
                            <input type="date" t class="form-control" aria-label="Default select example"
                                name="year_of_purchase" id="year_of_purchase" placeholder="DD/MM/YYYY">
                            @error('year_of_purchase')
                            <span class="form-text text-muted">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col search-reset">
                        <div class="apply-filter mt-4 pt-1">
                            <button type="submit" class="btn bg-primary search-patient-btn mt-0 mr-1">Save</button>
                            <button type="reset" class="btn bg-danger">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="dashboard">
        <div class="dashboard-filter mb-4">

            <div class="" id="nav-add-patient-record" role="tabpanel" aria-labelledby="home-tab">
                <table id="general_profiles_TABLE" class="display">
                    <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th>Equipment</th>
                            <th>Quantity</th>
                            <th>Year Of Purchase</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($equipment as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            @foreach($equipment_masters as $datas)
                            @if($data->equipment ==$datas->name)
                            <td>{{$datas->name}}</td>
                            @endif
                            @endforeach
                            <td>{{$data->quantity}}</td>
                            <td>{{ date('d-m-Y',strtotime($data->year_of_purchase))}}</td>
                            <td>
                                <a href="{{ url('equipment-edit',$data->id) }}" class="btn btn-primary editbtn btn-sm"
                                    title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                <a href="javascript:void(0)" data-url="{{ route('equipment-destroy', $data->id) }}"
                                    class="btn btn-danger deletebtn btn-sm delete-user" title="Delete Data" id="delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection