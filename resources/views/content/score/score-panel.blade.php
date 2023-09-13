@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Basic Tables
</h4>

<hr class="my-1">

<!-- Responsive Table -->
<div class="card">
  <h5 class="card-header">Score Table</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr class="text-nowrap">
          <th>#</th>
          <th>UID</th>
          <th>Name</th>
          <th>Round 1</th>
          <th>Round 2</th>
          <th>Round 3</th>
          <th>Round 4</th>
          <th>Round 5</th>
          <th>Round 6</th>
          <th>Round 7</th>
          <th>Round 8</th>
          <th>Round 9</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Table cell</td>
          <td>Table cell</td>
          <td>
            <div>
              <input id="smallInput" class="form-control form-control-sm my-2" type="text" />
            </div>
            <div>
              <select id="smallSelect" class="form-select form-select-sm">
                <option value=""></option>
                <option value="1"><i class='bx bx-no-entry'></i></option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </td>
          <td>
            <div>
              <input id="smallInput" class="form-control form-control-sm my-2" type="text" />
            </div>
            <div>
              <select id="smallSelect" class="form-select form-select-sm">
                <option value=""></option>
                <option value="1"><i class='bx bx-no-entry'></i></option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </td>
          <td>
            <div>
              <input id="smallInput" class="form-control form-control-sm my-2" type="text" />
            </div>
            <div>
              <select id="smallSelect" class="form-select form-select-sm">
                <option value=""></option>
                <option value="1"><i class='bx bx-no-entry'></i></option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </td>
          <td>
            <div>
              <input id="smallInput" class="form-control form-control-sm my-2" type="text" />
            </div>
            <div>
              <select id="smallSelect" class="form-select form-select-sm">
                <option value=""></option>
                <option value="1"><i class='bx bx-no-entry'></i></option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </td>
          <td>
            <div>
              <input id="smallInput" class="form-control form-control-sm my-2" type="text" />
            </div>
            <div>
              <select id="smallSelect" class="form-select form-select-sm">
                <option value=""></option>
                <option value="1"><i class='bx bx-no-entry'></i></option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </td>
          <td>
            <div>
              <input id="smallInput" class="form-control form-control-sm my-2" type="text" />
            </div>
            <div>
              <select id="smallSelect" class="form-select form-select-sm">
                <option value=""></option>
                <option value="1"><i class='bx bx-no-entry'></i></option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </td>
          <td>
            <div>
              <input id="smallInput" class="form-control form-control-sm my-2" type="text" />
            </div>
            <div>
              <select id="smallSelect" class="form-select form-select-sm">
                <option value=""></option>
                <option value="1"><i class='bx bx-no-entry'></i></option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </td>
          <td>
            <div>
              <input id="smallInput" class="form-control form-control-sm my-2" type="text" />
            </div>
            <div>
              <select id="smallSelect" class="form-select form-select-sm">
                <option value=""></option>
                <option value="1"><i class='bx bx-no-entry'></i></option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </td>
          <td>
            <div>
              <input id="smallInput" class="form-control form-control-sm my-2" type="text" />
            </div>
            <div>
              <select id="smallSelect" class="form-select form-select-sm">
                <option value=""></option>
                <option value="1"><i class='bx bx-no-entry'></i></option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<!--/ Responsive Table -->

@endsection
