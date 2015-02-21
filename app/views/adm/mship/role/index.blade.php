@extends('adm.layout')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header">
                <div class="box-title">Options</div>
            </div>
            <div class="box-body">
                <div class="btn-toolbar">
                    <div class="btn-group pull-right">
                        {{ link_to_route("adm.mship.role.create", "Create Role", [], ["class" => "btn btn-success"]) }}
                    </div>
                </div>
            </div>
        </div>

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
                <table id="mship-roles" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Default</th>
                            <th># Members</th>
                            <th># Permissions</th>
                            <th>Last Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $r)
                        <tr>
                            <td>{{ link_to_route('adm.mship.role.update', $r->role_id, [$r->role_id]) }}</td>
                            <td>{{ $r->name }}</td>
                            <td>{{ $r->default }}</td>
                            <td>0</td>
                            <td>0</td>
                            <td>{{ $r->updated_at->toDateTimeString() }}</td>
                        </tr>
                        @endforeach
                        @if(count($roles) < 1)
                        <tr>
                            <td colspan="6" align="center">No roles to display :(</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>
@stop

@section('scripts')
@parent
{{ HTML::script('/assets/js/plugins/datatables/dataTables.bootstrap.js') }}
@stop