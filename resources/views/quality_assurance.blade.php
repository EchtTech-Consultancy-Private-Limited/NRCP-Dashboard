@extends('layouts.main') 
@section('title')
{{__('Quality Form')}}
@endsection
@section('content')
<div class="container-fluid">
<div class='row'>
        <div class="col-md-12">
            <div class="card card-primary dashboard">
                <div class="form-tab">
                    <div class="bootstrap-tab">
                        <div class="tab-content" id="myTabContent">
                            <form action="{{ route('quality-add') }}" method="post" class="" id="quality_assurance">
                                 @csrf
                                 <div class="row">
                                    <div class="col-xl-2 col-lg-2 col-md-2 col-6">
                                       <div class="form-group">
                                          <label for="state">PTILCPR<span class="star" tooltip>*</span></label>
                                          <select class="form-select" aria-label="Default select example" name="pt" id="pt">
                                             <option value=""> Select </option>
                                             <option value='yes'>Yes</option>
                                             <option value='no'>No</option>
                                          </select>
                                            @error('pt') 
                                                <span class="form-text text-muted">{{ $message }}</span>
                                            @enderror 
                                       </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-3 col-6">
                                       <div class="form-group">
                                          <label for="district">PTPNABL(ISO 17043)<span class="star">*</span></label>
                                          <select class="form-select" aria-label="Default select example" name="accredited_pt" id="accredited_pt">
                                             <option value=""> Select</option>
                                             <option value='yes'>Yes</option>
                                             <option value='no'>No</option>
                                          </select>
                                            @error('accredited_pt') 
                                                <span class="form-text text-muted">{{ $message }}</span>
                                            @enderror 
                                       </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-3 col-6">
                                       <div class="form-group">
                                          <label for="fromYear">LSPTISO 15189/ISO17025</label>
                                          <select class="form-select" aria-label="Default select example" name="supervisors_trained" id="supervisors_trained">
                                             <option value=""> Select</option>
                                             <option value='yes'>Yes</option>
                                             <option value='no'>No</option>
                                          </select>
                                          <small id="supervisors_trained-error" class="form-text text-muted"></small>
                                       </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-md-2 col-6">
                                       <div class="form-group">
                                          <label for="diseasesSyndromes">LIMS available</label>
                                          <select class="form-select" name="lims" id="lims">
                                             <option value=""> Select</option>
                                             <option value='yes'>Yes</option>
                                             <option value='no'>No</option>
                                          </select>
                                          <small id="lims-error" class="form-text text-muted"></small>
                                       </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-12 col-md-2 col-6 search-reset">
                                        <div class="apply-filter mt-xl-4 mt-lg-3 pt-1">
                                            <button type="submit" class="btn bg-primary mr-2">Save</button>
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
                        <div id="quality_assurance_success"></div>
                        <table id="general_profiles_TABLE" class="display">
                            <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>PTILCPR</th>
                                    <th>PTPNABL(ISO 17043)</th>
                                    <th>LSPTISO 15189/ISO17025</th>
                                    <th>LIMS available</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($quality_assurances as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->pt}}</td>
                                    <td>{{$data->accredited_pt}}</td>
                                    <td>{{$data->supervisors_trained}}</td>
                                    <td>{{$data->lims}}</td>
                                    <td class="text-nowrap">
                                    <a href="{{ url('quality-edit',$data->id) }}" class="btn btn-primary editbtn btn-sm" title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                    <a href="javascript:void(0)" data-url="{{ route('quality-destroy', $data->id) }}" class="btn btn-danger deletebtn btn-sm delete-user mt-xl-0 mt-lg-2" title="Delete Data" id="delete">
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