@php
$container = 'container-xxl';
$containerNav = 'container-xxl';
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Container - Layouts')

@section('content')

<div class="card">
    <h5 class="card-header">File Upload</h5>
    <div class="card-body">
      <div class="mb-3">
        <label for="formFile" class="form-label">Default file input example</label>
        <input class="form-control" type="file" id="formFile">
      </div>
      <div class="mb-3">
        <button type="button" class="btn btn-secondary">Secondary</button>
      </div>
    </div>
  </div>
<!--/ Basic Bootstrap Table -->

@endsection
