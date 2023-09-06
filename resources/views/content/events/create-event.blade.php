@extends('layouts/contentNavbarLayout')

@section('title', ' eventmanage Layouts - Forms')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Vertical Layouts</h4>

<!-- Basic Layout -->
<div class="row">
    <div class="col-md mb-4 mb-md-0 text-end">
    <button id="submitBtn" class="btn btn-primary mb-2">Submit</button>
    <button id="clearBtn" class="btn btn-secondary mb-2">Clear</button>
    </div>
    <div class="row">
      <div class="col-md mb-4 mb-md-0">
        <form class="browser-default-validation">
          <fieldset class="border rounded-3 p-3 bg-white">
            <legend class="float-none w-auto px-3 fs-5">Event Information</legend>
            <div class="mb-2">
              <label class="form-label" for="event-number">Event #1</label>
              <input type="text" class="form-control form-control-sm" id="event-number" name="event-number" placeholder="" required="">
            </div>
            <div class="mb-2">
              <label class="form-label" for="event-name">Event Name</label>
              <input type="text" id="event-name" name="event-name" class="form-control form-control-sm" placeholder="" required="">
            </div>
            <div class="mb-2">
              <label class="form-label" for="gender">Gender</label>
              <select class="form-select form-select-sm" id="gender" name="gender" required="">
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Mixed">Mixed</option>
              </select>
            </div>
            <div class="mb-2">
              <label class="form-label" for="event-type">Event Type:</label>
              <select class="form-select form-select-sm" id="event-type" name="event-type" required="">
                <option value="">Select</option>
                <option value="Others">Others</option>
                <option value="Track">Track</option>
              </select>
            </div>
            <div class="mb-2">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="relay" name="relay" required="">
                <label class="form-check-label" for="relay">Relay</label>
              </div>
            </div>
            <div class="mb-2">
              <label class="form-label" for="distance">Distance:</label>
              <select class="form-select form-select-sm" id="distance" name="distance" required="">
                <option value="">Select</option>
                <option value="Others">Others</option>
                <option value="Track">Track</option>
              </select>
            </div>
          </fieldset>
          <fieldset class="border rounded-3 p-3 bg-white">
            <legend class="float-none w-auto px-3 fs-5">Seeding:</legend>
            <div class="mb-2">
              <label class="form-label" for="num-lanes">Number of Lanes:</label>
              <input type="text" class="form-control form-control-sm" id="num-lanes" name="num-lanes" required="">
            </div>
            <div class="mb-2">
              <label class="form-label" for="lane-assignment">Lane/Position Assignment:</label>
              <select class="form-select form-select-sm" id="lane-assignment" name="lane-assignment" required="">
                <option value="">Select</option>
                <option value="Others">Others</option>
                <option value="Track">Track</option>
              </select>
            </div>
            <div class="mb-2">
              <label class="form-label" for="heat-assignment">Heat/Flight Assignment:</label>
              <select class="form-select form-select-sm" id="heat-assignment" name="heat-assignment" required="">
                <option value="">Select</option>
                <option value="Others">Others</option>
                <option value="Track">Track</option>
              </select>
            </div>
            <div class="mb-2">
              <label class="form-label" for="heat-order">Heat/Flight order</label>
              <select class="form-select form-select-sm" id="heat-order" name="heat-order" required="">
                <option value="">Select</option>
                <option value="Others">Others</option>
                <option value="Track">Track</option>
              </select>
            </div>
            <div class="mb-2">
              <label class="form-label" for="advancement">Advancement</label>
              <select class="form-select form-select-sm" id="advancement" name="advancement" required="">
                <option value="">Select</option>
                <option value="Others">Others</option>
                <option value="Track">Track</option>
              </select>
            </div>
          </fieldset>
          <fieldset class="border rounded-3 p-3 bg-white">
            <legend class="float-none w-auto px-3 fs-5">Rounds</legend>
            <div class="row g-3 align-items-center">
              <div class="col-auto">
                <label for="inputPassword6" class="col-form-label">No of Rounds</label>
              </div>
              <div class="col-auto">
                <input type="text" id="no-rounds" class="form-control" aria-describedby="passwordHelpInline">
              </div>
              <div class="col-auto">
                <button type="button" class="btn btn-primary" id="applyButton">Apply</button>
            </div>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Round Name</th>
                  <th scope="col">Date</th>
                  <th scope="col">Time</th>
                </tr>
              </thead>
              <tbody id="roundTableBody">
                <!-- Table rows will be added here dynamically -->
            </tbody>
            </table>
          </fieldset> 
        </form>
      </div>
{{-- Right side filed set --}}
  <div class="col-md">
    <form class="needs-validation" novalidate="">
      <fieldset class="border rounded-3 p-3 bg-white">
        <legend class="float-none w-auto px-3 fs-5">Scoring</legend>
        <div class="mb-2">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="score-event" name="score-event" required="">
            <label class="form-check-label" for="score-event">Score this event</label>
          </div>
        </div>
      </fieldset>
      
      <fieldset class="border rounded-3 p-3 bg-white">
        <legend class="float-none w-auto px-3 fs-5">Relays</legend>
        <div class="mb-2">
          <label class="form-label" for="num-members">Number of Members:</label>
          <select class="form-select form-select-sm" id="num-members" name="num-members" required="">
            <option value="">Select</option>
            <option value="Male">Others</option>
            <option value="Female">Track</option>
          </select>
        </div>
      </fieldset>
      
      <fieldset class="border rounded-3 p-3 bg-white">
        <legend class="float-none w-auto px-3 fs-5">Measurement System</legend>
        <div class="mb-2">
          <label class="form-label" for="entries">Entries:</label>
          <select class="form-select form-select-sm" id="entries" name="entries" required="">
            <option value="">Select</option>
            <option value="Male">Others</option>
            <option value="Female">Track</option>
          </select>
        </div>
        <div class="mb-2">
          <label class="form-label" for="results">Results:</label>
          <select class="form-select form-select-sm" id="results" name="results" required="">
            <option value="">Select</option>
            <option value="Male">Others</option>
            <option value="Female">Track</option>
          </select>
        </div>
      </fieldset>
      
      <fieldset class="border rounded-3 p-3 bg-white">
        <legend class="float-none w-auto px-3 fs-5">Wind</legend>
        <div class="mb-2">
          <label class="form-label" for="lane-assignment-wind">Lane/Position Assignment:</label>
          <select class="form-select form-select-sm" id="lane-assignment-wind" name="lane-assignment-wind" required="">
            <option value="">Select</option>
            <option value="Male">Others</option>
            <option value="Female">Track</option>
          </select>
        </div>
        <div class="mb-2">
          <label class="form-label" for="start-wind">Start</label>
          <input type="text" class="form-control form-control-sm" id="start-wind" name="start-wind" required="">
        </div>
        <div class="mb-2">
          <label class="form-label" for="duration-wind">Duration</label>
          <input type="text" class="form-control form-control-sm" id="duration-wind" name="duration-wind" required="">
        </div>
      </fieldset>
      
      <fieldset class="border rounded-3 p-3 bg-white">
        <legend class="float-none w-auto px-3 fs-5">Lap Time</legend>
        <div class="mb-2">
          <label for="total-laps" class="form-label">Total Laps</label>
          <input type="text" id="total-laps" name="total-laps" class="form-control" value="" readonly>
        </div>
        <div class="mb-2">
          <label for="laps-per-split" class="form-label">Laps Per Split</label>
          <input type="text" id="laps-per-split" name="laps-per-split" class="form-control" value="" readonly>
        </div>
        <div class="mb-2">
          <label for="too-fast-time" class="form-label">Too Fast Time</label>
          <input type="text" id="too-fast-time" name="too-fast-time" class="form-control" value="" readonly>
        </div>
        <div class="mb-2">
          <label for="too-slow-time" class="form-label">Too Slow Time</label>
          <input type="text" id="too-slow-time" name="too-slow-time" class="form-control" value="" readonly>
        </div>
      </fieldset>      
    </form>
  </div>


<script>
const form = document.querySelector('form');
const submitBtn = document.getElementById('submitBtn');
const clearBtn = document.getElementById('clearBtn');

submitBtn.addEventListener('click', function (event) {
  event.preventDefault();

  let isValid = true;
  const inputFields = form.querySelectorAll('input[required]');
  inputFields.forEach(function (input) {
    if (input.value.trim() === '') {
      input.classList.add('is-invalid');
      isValid = false;
    } else {
      input.classList.remove('is-invalid');
    }
  });

  if (isValid) {
    form.submit();
  }
});

clearBtn.addEventListener('click', function (event) {
  event.preventDefault();

  const inputFields = form.querySelectorAll('input');
  const selectFields = form.querySelectorAll('select');

  inputFields.forEach(input => {
    input.value = '';
    input.classList.remove('is-invalid');
  });

  selectFields.forEach(select => {
    select.value = '';
    select.classList.remove('is-invalid');
  });

  document.getElementById('start-wind').value = '';
  document.getElementById('duration-wind').value = '';
});
/// new JSSSSS

document.addEventListener("DOMContentLoaded", function () {
    const noRoundsInput = document.getElementById("no-rounds");
    const applyButton = document.getElementById("applyButton");
    const roundTableBody = document.getElementById("roundTableBody");

    applyButton.addEventListener("click", function () {
        const numRounds = parseInt(noRoundsInput.value);

        var roundNames = ["Quater", "Heat", "Prelims", "semis", "Final"];

        roundTableBody.innerHTML = '';

        for (let i = 1; i <= numRounds; i++) {
            const roundName = i <= roundNames.length ? roundNames[i - 1] : "Round " + i;
            const currentDate = new Date().toISOString().split("T")[0];

            // Calculate the time by adding one hour for each round
            const defaultTime = i === 1 ? "08:00" : addHours("08:00", i - 1);

            roundTableBody.innerHTML += `
                <tr>
                    <th scope="row">${i}</th>
                    <td>${roundName}</td>
                    <td><input type="date" class="form-control" name="date${i}" value="${currentDate}"></td>
                    <td><input type="time" class="form-control" name="time${i}" value="${defaultTime}"></td>
                </tr>`;
        }
    });

    // Function to add hours to a given time (hh:mm)
    function addHours(time, hours) {
        const [hh, mm] = time.split(":");
        const newHH = parseInt(hh) + hours;
        return `${newHH.toString().padStart(2, '0')}:${mm}`;
    }
});
        
</script>


@endsection