@extends('layouts/contentNavbarLayout')

@section('title', ' Vertical Layouts - Forms')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Vertical Layouts</h4>

<!-- Basic Layout -->
<div class="row">
  <div class="col-md mb-4 mb-md-0">
    <!-- <div class="card">
                                <h5 class="card-header">Form Name</h5>
                                <div class="card-body"> -->
    <form class="browser-default-validation">
      <fieldset class="border rounded-3 p-3">
        <legend class="float-none w-auto  px-3 fs-5">Event Information</legend>
        <div class="mb-2">
          <label class="form-label" for="basic-default-id">Event #1</label>
          <input type="text" class="form-control form-control-sm" id="basic-default-id" placeholder="" required="">
        </div>
        <div class="mb-2">
          <label class="form-label" for="basic-default-name">Event Name</label>
          <input type="name" id="basic-default-name" class="form-control form-control-sm" placeholder="" required="">
        </div>
        <div class="mb-2">
          <label class="form-label" for="basic-default-country">Gender</label>
          <select class="form-select form-select-sm" id="basic-default-country" required="">
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Mixed">Mixed</option>
          </select>
        </div>
        <div class="mb-2">
          <label class="form-label" for="basic-default-country">Event Type:</label>
          <select class="form-select form-select-sm" id="basic-default-country" required="">
            <option value="">Select</option>
            <option value="Male">Others</option>
            <option value="Female">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
          </select>
        </div>
        <div class="mb-2">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="basic-default-checkbox" required="">
            <label class="form-check-label" for="basic-default-checkbox">Relay</label>
          </div>
        </div>
        <div class="mb-2">
          <label class="form-label" for="basic-default-country">Distance :</label>
          <select class="form-select form-select-sm" id="basic-default-country" required="">
            <option value="">Select</option>
            <option value="Male">Others</option>
            <option value="Female">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
          </select>
        </div>
      </fieldset>
      <fieldset class="border rounded-3 p-3">
        <legend class="float-none w-auto px-3 fs-5 ">Seeding:</legend>
        <div class="mb-2">
          <label class="form-label" for="basic-default-id">Number of Lanes:</label>
          <input type="text" class="form-control form-control-sm" id="basic-default-id" required="">
        </div>
        <div class="mb-2">
          <label class="form-label" for="basic-default-country">Lane/Position
            Assignment:</label>
          <select class="form-select form-select-sm" id="basic-default-country" required="">
            <option value="">Select</option>
            <option value="Male">Others</option>
            <option value="Female">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
          </select>
        </div>
        <div class="mb-2">
          <label class="form-label" for="basic-default-country">Heat/Flight
            Assignment</label>
          <select class="form-select form-select-sm" id="basic-default-country" required="">
            <option value="">Select</option>
            <option value="Male">Others</option>
            <option value="Female">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
          </select>
        </div>
        <div class="mb-2">
          <label class="form-label" for="basic-default-country">Heat/Flight order</label>
          <select class="form-select form-select-sm" id="basic-default-country" required="">
            <option value="">Select</option>
            <option value="Male">Others</option>
            <option value="Female">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
          </select>
        </div>
        <div class="mb-2">
          <label class="form-label" for="basic-default-country">Advancement</label>
          <select class="form-select form-select-sm" id="basic-default-country" required="">
            <option value="">Select</option>
            <option value="Male">Others</option>
            <option value="Female">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
          </select>
        </div>
      </fieldset>
    </form>
  </div>
  <!-- </div>
                        </div> -->
  <!-- /Browser Default -->

  <!-- Bootstrap Validation -->
  <div class="col-md">
    <!-- <div class="card">
                                <div class="card-body"> -->
    <form class="needs-validation" novalidate="">
      <fieldset class="border rounded-3 p-3">
        <legend class="float-none w-auto px-3 fs-5 ">Scoring</legend>
        <div class="mb-2">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="basic-default-checkbox" required="">
            <label class="form-check-label" for="basic-default-checkbox">Score
              this event</label>
          </div>
        </div>
      </fieldset>
      <fieldset class="border rounded-3 p-3">
        <legend class="float-none w-auto px-3 fs-5 ">Relays</legend>
        <div class="mb-2">
          <label class="form-label" for="basic-default-country">Number of
            Members:</label>
          <select class="form-select form-select-sm" id="basic-default-country" required="">
            <option value="">Select</option>
            <option value="Male">Others</option>
            <option value="Female">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
          </select>
        </div>
      </fieldset>
      <fieldset class="border rounded-3 p-3">
        <legend class="float-none w-auto px-3 fs-5">Measurement System</legend>
        <div class="mb-2">
          <label class="form-label" for="basic-default-country">Entries:</label>
          <select class="form-select form-select-sm" id="basic-default-country" required="">
            <option value="">Select</option>
            <option value="Male">Others</option>
            <option value="Female">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
          </select>
        </div>
        <div class="mb-2">
          <label class="form-label" for="basic-default-country">Results:</label>
          <select class="form-select form-select-sm" id="basic-default-country" required="">
            <option value="">Select</option>
            <option value="Male">Others</option>
            <option value="Female">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
          </select>
        </div>
      </fieldset>
      <fieldset class="border rounded-3 p-3">
        <legend class="float-none w-auto px-3 fs-5 ">Wind</legend>
        <div class="mb-2">
          <label class="form-label" for="basic-default-country">Lane/Position
            Assignment:</label>
          <select class="form-select form-select-sm" id="basic-default-country" required="">
            <option value="">Select</option>
            <option value="Male">Others</option>
            <option value="Female">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
            <option value="Mixed">Track</option>
          </select>
        </div>
        <div class="mb-2">
          <label class="form-label" for="basic-default-id">Start</label>
          <input type="text" class="form-control form-control-sm" id="basic-default-id" required="">
        </div>
        <div class="mb-2">
          <label class="form-label" for="basic-default-id">Duration</label>
          <input type="text" class="form-control form-control-sm" id="basic-default-id" required="">
        </div>
      </fieldset>
      <fieldset class="border rounded-3 p-3">
        <legend class="float-none w-auto px-3 fs-5 ">Lap Time</legend>
        <div class="mb-2">
          <label for="label1" class="form-label">Total Laps</label>
          <input type="text" id="label1" class="form-control" value="" readonly>
        </div>
        <div class="mb-2">
          <label for="label1" class="form-label">Laps Per Split</label>
          <input type="text" id="label1" class="form-control" value="" readonly>
        </div>
        <div class="mb-2">
          <label for="label1" class="form-label">Too Fast Time</label>
          <input type="text" id="label1" class="form-control" value="" readonly>
        </div>
        <div class="mb-2">
          <label for="label1" class="form-label">To Slow Time</label>
          <input type="text" id="label1" class="form-control" value="" readonly>
        </div>
      </fieldset>
    </form>
  </div>
</div>

@endsection
