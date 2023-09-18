@php
$container = 'container-xxl';
$containerNav = 'container-xxl';
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Container - Layouts')

@section('content')

<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Uploads /</span> Manage Uploads
</h4>

<!-- Basic Bootstrap Table -->
<style>
    nav .w-5 {
        display: none;
    }

</style>
<div class="card">
    <h5 class="card-header">Uploads</h5>
    <div class="text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>File Name</th>
                    <th>Extension</th>
                    <th>Uploaded at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php
                $counter = 1;
                @endphp
                @foreach ( $data as $uploads)
                <tr>
                    <td class="">{{$counter}}</td>
                    <td><strong>{{$uploads->original_name}}</strong></td>
                    <td>{{$uploads->ext}}</td>
                    <td>{{date('d M Y',strtotime($uploads->created_at))}}</td>

                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                {{-- <a class="dropdown-item" href="{{route('create-event', $uploads->id)}}"><i class="bx bx-plus me-1"></i> Add Event</a> --}}
                                {{-- <a class="dropdown-item" href="{{route('upload-attachment', $uploads->id)}}"><i class="bx bx-upload me-1"></i> Upload Attachment</a> --}}
                                {{-- <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a> --}}
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
