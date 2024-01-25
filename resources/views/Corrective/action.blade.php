@extends('main')
@section('content')

<h4 class="py-3 mb-3">
    <span class="text-muted fw-light">Corrective /</span> Action Corrective
</h4>
<div class="card">
    <div class="card-datatable dataTable_select text-nowrap">
        <table class="dt-select-table table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>PIC Prod</th>
                    <th>Datetime</th>
                    <th>Section</th>
                    <th>Type</th>
                    <th>Machine Name</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach($arr as $key => $value)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$value->pic_name}}</td>
                        <td>
                            {{ \Carbon\Carbon::parse($value->date_create)->isoFormat('dddd, D MMMM YYYY HH:mm:ss') }}
                        </td>
                        <td>{{$value->section}}</td>
                        <td>{{$value->mc_type}}</td>
                        <td>{{$value->mc_name}}</td>
                        <td>{{$value->location}}</td>
                        <td>
                            <span class="badge rounded-pill bg-label-{{$value->st_color}}">{{$value->st_name}}</span>
                        </td>
                        <td>
                            @if($value->id_status == 1)
                                @php
                                    $dataname       = 'start';
                                    $databutton     = 'primary';
                                    $dataicon       = 'settings-check';
                                    $datadisplay    = 'block';
                                @endphp
                            @elseif($value->id_status == 2)
                                @php
                                    $dataname       = 'maintenance';
                                    $databutton     = 'info';
                                    $dataicon       = 'clock-star';
                                    $datadisplay    = 'block';
                                @endphp
                            @elseif($value->id_status == 3)
                                @php
                                    $dataname       = 'waitingpart';
                                    $databutton     = 'warning';
                                    $dataicon       = 'clock-star';
                                    $datadisplay    = 'block';
                                @endphp
                            @elseif($value->id_status == 5)
                                @php
                                    $dataname       = 'waitingclose';
                                    $databutton     = 'primary';
                                    $dataicon       = 'clock-star';
                                    $datadisplay    = 'block';
                                @endphp
                            @else
                                @php
                                    $dataname       = '';
                                    $databutton     = '';
                                    $dataicon       = '';
                                    $datadisplay    = 'none';
                                @endphp
                            @endif

                            @if(in_array($value->id_status, $listcorr))
                                <button type="button" class="btn btn-icon btn-{{$databutton}} waves-effect waves-light" data-name="{{$dataname}}" data-item="{{$value->id}}">
                                    <span class="ti ti-{{$dataicon}}"></span>
                                </button>
                            @endif

                            <button type="button" class="btn btn-icon btn-secondary waves-effect waves-light" data-name="showdetail" data-item="{{$value->id}}">
                                <span class="ti ti-eye"></span>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.dt-select-table').DataTable();
    });
</script>

@stop
