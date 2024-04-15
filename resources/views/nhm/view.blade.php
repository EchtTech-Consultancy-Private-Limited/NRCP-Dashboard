@extends('layouts.main')
@section("content")
@section('title')
{{__('NHM View')}}
@endsection
<!-- Main content -->
<section class="content sform view-blade">
    <div class="container-fluid">
        <div class="panel-body nhmView">
            <div class="row">
                <div class="col-md-12">

                    <a href="{{ route('nhm.index') }}" class="btn bg-primary text-light float-right m-2">Back</a>
                </div>
            </div>
           
                <div class="w-100 ">
                    <div class="table-title">National Health Mission (NHM) ROPs</div>
                </div>            
                <table class="w-100 table-title"> 
                    <tr>
                        <th>S No.</th>
                        <th>Year</th>
                        <th>State</th>
                        <th>ROPs</th>
                        <th>Supplementry ROPs</th>
                        <th>Action</th>
                    </tr>
                    @if($nhms->count())
                        @foreach ($nhms as $nhm)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ @$nhm->year }}</td>
                            <td>{{ @$nhm->state->state_name }}</td>
                            <td>
                                @if ($nhm->rops)
                                    <a class="nhm-file" href="{{ asset('images/uploads/nhm/'.$nhm->rops) }}" download>
                                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i> 
                                        <span>{{ $nhm->rops_size }}</span>
                                        <i class="fa fa-download" aria-hidden="true"></i>
                                    </a>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                @if ($nhm->supplementary_rops)
                                    <a class="nhm-file" href="{{ asset('images/uploads/nhm/'.$nhm->supplementary_rops) }}" download>
                                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                        <span>({{ $nhm->supplementary_rops_size }})</span>
                                        <i class="fa fa-download" aria-hidden="true"></i>
                                    </a>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                              <a href= "{{route('nhm.edit',$nhm->id)}}" id="edit_2" class="btn bg-success action-btn pformEdit" data-id="2" title="Edit">
                                <i class="fa fa-edit"></i>
                              </a>
                              <a href="{{route('nhm.delete',$nhm->id)}}" class="btn bg-danger action-btn" title="Delete">
                                <i class="fa fa-trash-o"></i>
                              </a>
                            </td>  
                        </tr>
                        @endforeach
                    @else
                    <tr> 
                        <td colspan="5">No Data Available !</td>
                    </tr>
                    @endif
                </table>
        </div>
    </div>
</section>
@endsection