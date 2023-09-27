
@php
$container = 'container-xxl';
$containerNav = 'container-xxl';
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Container - Layouts')

@section('content')

{{-- <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Basic Tables
</h4> --}}

<!-- Bootstrap Table with Header - Dark -->
{{-- <div class="card">
  <h5 class="card-header">Meets</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead class="table-dark">
        <tr>
          <th>Sr. No.</th>
          <th>Name</th>
          <th>Location</th>
          <th>Start Date</th>
          <th>End Date</th>
          <th>Scoring</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @php
          $counter = 1;
        @endphp
        @foreach ( $meets as $meet)
        <tr>
          <td class="">{{$counter}}</td>
<td><strong>{{$meet->name}}</strong></td>
<td>{{$meet->location}}</td>
<td>{{date('d M Y',strtotime($meet->from_date))}}</td>
<td>{{date('d M Y',strtotime($meet->to_date))}}</td>
<td><span class="badge bg-label-primary me-1">Active</span></td>
<td>
    <div class="dropdown">
        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
        <div class="dropdown-menu">
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
</div> --}}
<!--/ Bootstrap Table with Header Dark -->

<!-- Basic Bootstrap Table -->
<style>
    nav .w-5 {
        display: none;
    }

</style>
<div class="card">
    <h5 class="card-header">Events</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>EventId</th>
                    <th>Event Name</th>
                    <th>Gender</th>
                    <th>Event Type </th>
                    <th>Distance</th>
                    <th>Member Count</th>
                    <th>Entries</th>
                    <th>Result</th>
                    <th>Number of Positions</th>
                    <th>Lane/Position Assignment</th>
                    <th>Heat/Flight Assignment</th>
                    <th>Heat/Flight order</th>
                    <th>Advancement</th>
                    <th>Number of Members</th>
                    <th>Entries</th>
                    <th>Results</th>
                    <th>mode</th>
                    <th>start</th>
                    <th>duration</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php
                $counter = 1;
                @endphp
                @foreach ( $data as $events)
                <tr>
                    <td class="">{{$counter}}</td>
                    <td><strong>{{$events->event_id}}</strong></td>
                    <td>{{$events->name}}</td>
                    <td>{{$events->gender}}</td>
                    <td>{{$events->event_type}}</td>
                    <td>{{$events->relay}}</td>
                    <td>{{$events->distance}}</td>
                    <td>{{$events->member_count}}</td>
                    <td>{{$events->entries}}</td>
                    <td>{{$events->result}}</td>
                    <td>{{$events->lane_count}}</td>
                    <td>{{$events->position_assigment}}</td>
                    <td>{{$events->flight_assigment}}</td>
                    <td>{{$events->flight_order}}</td>
                    <td>{{$events->advancement}}</td>
                    <td>{{$events->scoring}}</td>
                    <td>{{$events->mode}}</td>
                    <td>{{$events->start}}</td>
                    <td>{{$events->duration}}</td>

                    <td><span class="badge bg-label-primary me-1">Active</span></td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('create-event', $events->id)}}"><i class="bx bx-plus me-1"></i> Add Event</a>
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
<!--/ Basic Bootstrap Table -->

@endsection
