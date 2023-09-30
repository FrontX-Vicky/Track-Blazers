@php
$container = 'container-xxl';
$containerNav = 'container-xxl';
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Container - Layouts')

@section('content')

<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Meet /</span> Manage Meets
</h4>

<!-- Basic Bootstrap Table -->
<style>
    nav .w-5 {
        display: none;
    }

</style>
<div class="card">
    <h5 class="card-header">Meets</h5>
    <div class="text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Login ID</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php
                $counter = 1;
                @endphp
                @foreach ( $data as $meet)
                <tr>
                    <td class="">{{$counter}}</td>
                    <td><strong>{{$meet->name}}</strong></td>
                    <td>{{$meet->location}}</td>
                    <td>{{date('d M Y',strtotime($meet->from_date))}}</td>
                    <td>{{date('d M Y',strtotime($meet->to_date))}}</td>

                    <td><span class="badge bg-label-warning me-1">Upcomming</span></td>
                    <td>{{$meet->meet_login_id}}</td>
                    <td>{{$meet->password}}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('create-event', $meet->id)}}"><i class="bx bx-plus me-1"></i> Add Event</a>
                                <a class="dropdown-item" href="javascript:void(0);" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal" data-id="{{$meet->id}}" onclick="getData(this)"><i class="bx bx-plus me-1"></i> Add Batch</a>
                                <a class="dropdown-item" href="{{route('upload-attachment', $meet->id)}}"><i class="bx bx-upload me-1"></i> Upload Attachment</a>
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @php
                $counter++;
                @endphp
                @endforeach

            </tbody>
        </table>

    </div>
    <div class="card-footer">
        <div class="mt-5 d-flex justify-content-end">
            {{$data->links()}}
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- <div class="row">
          <div class="col mb-3">
            <label for="nameBasic" class="form-label">Meet Name</label>
            <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name">
          </div>
        </div> --}}
                <div class="row g-2">
                    <label for="defaultSelect" class="form-label">Select batch to add</label>
                    <select id="batchselect" name="batchselect" class="form-select">
                        {{-- <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option> --}}
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="submitBtn" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<!--/ Basic Bootstrap Table -->

<script>
    var meet_id = '';

    function getData(element = '') {
        meet_id = element.getAttribute('data-id');
        //  $("#basicModal").on("click", function(event) {
        $.ajax({
            url: "/upload/get-uploads"
            , type: 'GET'
            , success: function(result) {
                $('#batchselect').html(result);
            }
            , error: function(jqXhr, textStatus, errorMessage) {}
            // });
        });
    }

    const submitBtn = document.getElementById('submitBtn');

    submitBtn.addEventListener('click', function(event) {
        event.preventDefault();
        var file_id = $('#batchselect').val();
        $.ajax({
            url: "/meet/insert-athletes",
            type: 'POST',
            data: {
                file_id: file_id,
                meet_id: meet_id,
            }
            , success: function(result) {
                if (result.status == 1) {
                    // $('#tbody').html(result);
                }
            }
            , error: function(jqXhr, textStatus, errorMessage) {}
        });
    });

</script>

@endsection
