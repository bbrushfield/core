@extends('adm.layout')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-warning">
                <div class="box-header">
                    <div class="box-title">Search Criteria</div>
                </div>
                <div class="box-body">

                </div>
            </div>

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title ">
                        Search Results
                    </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div align="center">
                        {!! $applicationsQuery->render() !!}
                    </div>
                    <table id="applications" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th class="col-md-1">
                                @if($sortBy == "id")
                                    @if($sortDir == "ASC")
                                        {!! link_to_route("visiting.admin.application.list", "ID", ["sort_by" => "id", "sort_dir" => "DESC"]) !!}
                                        <small><i class="ion ion-arrow-up-b"></i></small>
                                    @else
                                        {!! link_to_route("visiting.admin.application.list", "ID", ["sort_by" => "id", "sort_dir" => "ASC"]) !!}
                                        <small><i class="ion ion-arrow-down-b"></i></small>
                                    @endif
                                @else
                                    {!! link_to_route("visiting.admin.application.list", "ID", ["sort_by" => "id", "sort_dir" => "ASC"]) !!}
                                @endif
                            </th>
                            <th class="col-md-1">
                                @if($sortBy == "account_id")
                                    @if($sortDir == "ASC")
                                        {!! link_to_route("visiting.admin.application.list", "Applicant ID", ["sort_by" => "account_id", "sort_dir" => "DESC"]) !!}
                                        <small><i class="ion ion-arrow-up-b"></i></small>
                                    @else
                                        {!! link_to_route("visiting.admin.application.list", "Applicant ID", ["sort_by" => "account_id", "sort_dir" => "ASC"]) !!}
                                        <small><i class="ion ion-arrow-down-b"></i></small>
                                    @endif
                                @else
                                    {!! link_to_route("visiting.admin.application.list", "Applicant ID", ["sort_by" => "account_id", "sort_dir" => "ASC"]) !!}
                                @endif
                            </th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type & Facility</th>
                            <th class="col-md-1 text-center">
                                @if($sortBy == "created_at")
                                    @if($sortDir == "ASC")
                                        {!! link_to_route("visiting.admin.application.list", "Created", ["sort_by" => "created_at", "sort_dir" => "DESC"]) !!}
                                        <small><i class="ion ion-arrow-up-b"></i></small>
                                    @else
                                        {!! link_to_route("visiting.admin.application.list", "Created", ["sort_by" => "created_at", "sort_dir" => "ASC"]) !!}
                                        <small><i class="ion ion-arrow-down-b"></i></small>
                                    @endif
                                @else
                                    {!! link_to_route("visiting.admin.application.list", "Created", ["sort_by" => "created_at", "sort_dir" => "ASC"]) !!}
                                @endif
                            </th>
                            <th class="col-md-1 text-center">
                                @if($sortBy == "created_at")
                                    @if($sortDir == "ASC")
                                        {!! link_to_route("visiting.admin.application.list", "Updated", ["sort_by" => "updated_at", "sort_dir" => "DESC"]) !!}
                                        <small><i class="ion ion-arrow-up-b"></i></small>
                                    @else
                                        {!! link_to_route("visiting.admin.application.list", "Updated", ["sort_by" => "updated_at", "sort_dir" => "ASC"]) !!}
                                        <small><i class="ion ion-arrow-down-b"></i></small>
                                    @endif
                                @else
                                    {!! link_to_route("visiting.admin.application.list", "Updated", ["sort_by" => "updated_at", "sort_dir" => "ASC"]) !!}
                                @endif
                            </th>
                            <th class="col-md-1 text-center">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($applications as $a)
                            <tr>
                                <td>{!! link_to_route('visiting.admin.application.view', $a->id, [$a->id]) !!}</td>
                                <td>{!! link_to_route('adm.mship.account.details', $a->account_id, [$a->account_id]) !!}</td>
                                <td>{{ $a->applicant->name  }}</td>
                                <td>{{ $_account->hasPermission("adm/mship/account/view/email") ? $a->applicant->email : "[ No Permission ]" }}</td>
                                <td>{{ $a->type_string }} - {{ $a->facility->name }}</td>
                                <td class="text-center">
                                    <a class="tooltip_displays" href="#" data-toggle="tooltip" title="{{ $a->created_at }}">
                                        {{ $a->created_at->diffForHumans() }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a class="tooltip_displays" href="#" data-toggle="tooltip" title="{{ $a->updated_at }}">
                                        {{ $a->updated_at->diffForHumans() }}
                                    </a>
                                </td>
                                <td class="text-center">{!! $a->is_open ? '<span class="label label-success">'.$a->status_string.'</span>' : '<span class="label label-danger">'.$a->status_string.'</span>' !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div align="center">
                        {!! $applicationsQuery->render() !!}
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
@stop

@section('scripts')
    @parent
    {!! HTML::script('/assets/js/plugins/datatables/dataTables.bootstrap.js') !!}
@stop