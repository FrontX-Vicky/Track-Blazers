@php
$container = 'container-xxl';
$containerNav = 'container-xxl';
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Container - Layouts')

@section('content')

<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Meet /</span> Meet Program Report
</h4>

<!-- Basic Bootstrap Table -->
<style>
    nav .w-5 {
        display: none;
    }

</style>
<div class="card">
    <h5 class="card-header">Meets</h5>
    <div style="max-height:200px;overflow-y:auto">
        <table class="table">
            <thead class="bg-white border-bottom-1" style="position: sticky; top:0">
                <tr>
                    <th>-</th>
                    <th>Event No</th>
                    <th>Event</th>
                    <th>Type</th>
                    <th>Round</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="rounds_list" class="text-nowrap">
                @if (count($data['event_rounds'])>0)
                @php
                $counter = 1;
                @endphp
                @foreach ( $data['event_rounds'] as $event_rounds)
                <tr>
                    <td class="">
                        <div class="form-check">
                            <input class="form-check-input multi_select" type="checkbox" value="{{$event_rounds->id}}" id="">
                        </div>
                    </td>
                    <td><strong>{{$event_rounds->event_no}}</strong></td>
                    <td>{{$event_rounds->event_name}}</td>
                    <td>{{$event_rounds->event_type}}</td>
                    <td>{{$event_rounds->round_name}}</td>
                    {{-- <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('event-create', $event_rounds->id)}}"><i class="bx bx-plus me-1"></i> Add Event</a> --}}
                    {{-- <a class="dropdown-item" href="javascript:void(0);" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal" data-id="{{$event_rounds->id}}" onclick="getData(this)"><i class="bx bx-plus me-1"></i> Add Batch</a>
                    <a class="dropdown-item" href="{{route('upload-attachment', $event_rounds->id)}}"><i class="bx bx-upload me-1"></i> Upload Attachment</a>
                    <a class="dropdown-item" href="{{route('event_rounds-edit', $event_rounds->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                    <a class="dropdown-item" href="{{route('event_rounds-delete', $event_rounds->id)}}"><i class="bx bx-trash me-1"></i> Delete</a> --}}
                    {{-- </div>
                        </div>
                    </td> --}}
                </tr>
                @php
                $counter++;
                @endphp
                @endforeach
                @else
                <tr>
                    <td colspan="9" align="center">No Data Found</td>
                </tr>
                @endif
            </tbody>
        </table>

    </div>

    <hr class="hr">
    </hr>
    <h6 class="mx-3">Options :</h6>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <small class="text-light fw-semibold">Gender</small>
                <div class="form-check mt-3">
                    <input name="gender" class="form-check-input" type="radio" value="0" id="gender1" checked />
                    <label class="form-check-label" for="gender1">
                        All
                    </label>
                </div>
                <div class="form-check">
                    <input name="gender" class="form-check-input" type="radio" value="1" id="gender2" />
                    <label class="form-check-label" for="gender2">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input name="gender" class="form-check-input" type="radio" value="2" id="gender3" />
                    <label class="form-check-label" for="gender3">
                        Female
                    </label>
                </div>
                <div class="form-check">
                    <input name="gender" class="form-check-input" type="radio" value="3" id="gender4" />
                    <label class="form-check-label" for="gender4">
                        Mixed
                    </label>
                </div>
            </div>
            <div class="col-sm-4">
                <small class="text-light fw-semibold">Rounds</small>
                <div class="form-check mt-3">
                    <input name="rounds" class="form-check-input" type="radio" value="0" id="rounds1" checked />
                    <label class="form-check-label" for="rounds1">
                        All Rounds
                    </label>
                </div>
                <div class="form-check">
                    <input name="rounds" class="form-check-input" type="radio" value="1" id="rounds2" />
                    <label class="form-check-label" for="rounds2">
                        Finals Only
                    </label>
                </div>
                <div class="form-check">
                    <input name="rounds" class="form-check-input" type="radio" value="2" id="rounds3" />
                    <label class="form-check-label" for="rounds3">
                        Round 1 Only
                    </label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="option1" checked />
                    <label class="form-check-label" for="option1">
                        Show Date
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="option2" checked />
                    <label class="form-check-label" for="option2">
                        Show Time
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="option3" />
                    <label class="form-check-label" for="option3">
                        One Event Per Page
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer">
        {{-- <div class="mt-5 col-md-12">
            {{$data->links()}}
      </div> --}}
      <div class="col-md my-4 mb-md-0 text-end">
          <button id="submitBtn" class="btn btn-primary mb-2">View</button>
          <button id="clearBtn" class="btn btn-secondary mb-2">Clear</button>
      </div>
    </div>
</div>

<!-- Extra Large Modal -->
<div class="modal fade" id="exLargeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe src="#" id="iframe" width="100%" height="600px">
                    <!-- Display an alternative text for browsers that do not support iframes -->
                    Your browser does not support iframes.
                </iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="submitBtn1" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    var meet_id = '';
    var selected_rows = [];
    var selected_rows_obj = {};
    const submitBtn = document.getElementById('submitBtn');
    const submitBtn1 = document.getElementById('submitBtn1');
    var dismissElements = $('[data-bs-dismiss="modal"]');

    submitBtn.addEventListener('click', function(event) {
        event.preventDefault();
        var file_id = $('#batchselect').val();
        var options = {
            gender: $('input[name="gender"]:checked').val()
            , rounds: $('input[name="rounds"]:checked').val()
            , show_date: $('#option1').prop('checked')
            , show_time: $('#option2').prop('checked')
            , event_per_page: $('#option3').prop('checked')
        };

        $.ajax({
            url: "/reports/get-report-meet-program-report"
            , type: 'POST'
            , data: {
                ids: selected_rows_obj
                , options: options
            }
            , success: function(result) {
                // if (result.success == 'true') {}
                console.log(result);
                $('#iframe').attr('src', result.data);
                $('#exLargeModal').modal('show');
                // $('#msg').html(result.msg);
            }
            , error: function(jqXhr, textStatus, errorMessage) {}
        });
    });
    submitBtn1.addEventListener('click', function(event) {
        event.preventDefault();
        var file_id = $('#batchselect').val();
        var options = {
            gender: $('input[name="gender"]:checked').val()
            , rounds: $('input[name="rounds"]:checked').val()
            , show_date: $('#option1').prop('checked')
            , show_time: $('#option2').prop('checked')
            , event_per_page: $('#option3').prop('checked')
        };

        $.ajax({
            url: "/reports/get-report-meet-program-report"
            , type: 'POST'
            , data: {
                ids: selected_rows_obj
                , options: options
            }
            , success: function(result) {
                // if (result.success == 'true') {}
                console.log(result);
                $('#iframe').attr('src', result.data);
                $('#exLargeModal').modal('show');
                // $('#msg').html(result.msg);
            }
            , error: function(jqXhr, textStatus, errorMessage) {}
        });
    });

    dismissElements.click(function() {
        $('#iframe').attr('src', '')
    });

    $('.multi_select').change(function() {
        selected_rows = [];
        $('input[type="checkbox"].multi_select:checked').each(function() {
            selected_rows.push($(this).val());
        });
        selected_rows_obj = Object.assign({}, selected_rows);
    });

</script>

@endsection
