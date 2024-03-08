@extends('layouts.main')
@section("content")
<!-- Main content -->
<section class="content sform view-blade">
    <div class="container-fluid">
        <div class="panel-body ">
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
                    </tr>
                    @if($nhms->count())
                        @foreach ($nhms as $nhm)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ @$nhm->year }}</td>
                            <td>{{ @$nhm->state->state_name }}</td>
                            <td><a class="nhm-file" href="{{ asset('images/uploads/nhm/'.$nhm->rops) }}" download><i class="fa fa-file"> ({{ $nhm->rops_size }})</i></a></td>
                            <td><a class="nhm-file" href="{{ asset('images/uploads/nhm/'.$nhm->supplementary_rops) }}" download><i class="fa fa-file"> ({{ $nhm->supplementary_rops_size }})</i></a></td>
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