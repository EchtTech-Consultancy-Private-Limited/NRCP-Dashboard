@extends('layouts.main') 
@section('title')
{{__('Equipments')}}
@endsection
@section('content')
<div class="container-fluid">
<div class='row'>
        <div class="col-md-12">
            <div class="card card-primary dashboard">
                <div class="form-tab">
                    <div class="bootstrap-tab">
                        <div class="tab-content" id="myTabContent">
                            <form action="{{ route('equipment-add') }}" method="post" class="" id="general_equipment">
                                @csrf
                                <div class="row">
                                <div class="col-lg-3 col-md-3 col-6">
                                    <div class="form-group">
                                        <label for="state">Equipment<span class="star">*</span></label>
                                        <select class="form-control" aria-label="Default select example" name="equipment" id="equipment">
                                            <option value=""> Select</option>
                                            <option value='yes'>Yes</option>
                                            <option value='no'>No</option>
                                        </select>
                                            @error('equipment') 
                                                <span class="form-text text-muted">{{ $message }}</span>
                                            @enderror 
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6">
                                    <div class="form-group">
                                        <label for="district">Quantity<span class="star">*</span></label>
                                        <input type="number" class="form-control" aria-label="Default select example" name="quantity" id="quantity">
                                        </select>
                                            @error('quantity') 
                                                <span class="form-text text-muted">{{ $message }}</span>
                                            @enderror 
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6">
                                    <div class="form-group">
                                        <label for="fromYear">Year of purchase<span class="star">*</span></label>
                                        <input type="date"t class="form-control" aria-label="Default select example" name="year_of_purchase" id="year_of_purchase">
                                            @error('year_of_purchase') 
                                                <span class="form-text text-muted">{{ $message }}</span>
                                            @enderror 
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6 search-reset">
                                        <div class="apply-filter mt-4 pt-1">
                                            <button type="submit" class="btn bg-primary mr-3">Save</button>
                                            <button type="reset" class="btn bg-danger">Reset</button>
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
   <div class="row">
      <div class="clearfix hidden-md-up"></div>
      <div class="col-md-12">
         <div class="card card-primary dashboard">
            <div class="form-tab">
               <div class="bootstrap-tab">
                  <div class="tab-content" id="myTabContent">
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
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->equipment}}</td>
                                    <td>{{$data->quantity}}</td>
                                    <td>{{$data->year_of_purchase}}</td>
                                    <td>
                                    <a href="{{ url('equipment-edit',$data->id) }}" class="btn btn-primary editbtn btn-sm" title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                    <a href="javascript:void(0)" data-url="{{ route('equipment-destroy', $data->id) }}" class="btn btn-danger deletebtn btn-sm delete-user" title="Delete Data" id="delete">
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
         </div>
      </div>
   </div>
</div>
@endsection