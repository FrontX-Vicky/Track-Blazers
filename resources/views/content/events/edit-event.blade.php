@extends('layouts/contentNavbarLayout')

@section('title', ' eventmanage Layouts - Forms')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Vertical Layouts</h4>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<!-- Basic Layout -->

<div class="row mb-5">
    <form class="browser-default-validation" id="event_form" method="POST" action="{{ route('event-insert') }}">
        @csrf
        @method('POST')
        <div class="row">
            <div class="col-md mb-4 mb-md-0">
                <fieldset class="border rounded-3 p-3 bg-white">
                    <legend class="float-none w-auto px-3 fs-5">Meet name</legend>
                    <div class="mb-2">

                        {{-- <label class="form-label" for="distance">Distance:</label> --}}
                        <select class="form-select form-select-sm" id="meet_id" name="meet_id" required="">
                            <option value="">Select</option>
                            @foreach ($data['meets'] as $meet)
                            <option value="{{ $meet->id }}" @php if($meet->id == $data['event']['meet_id']) echo "selected"; @endphp>{{ $meet->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </fieldset>
                <fieldset class="border rounded-3 p-3 bg-white">
                    <legend class="float-none w-auto px-3 fs-5">Event Information</legend>
                    <div class="mb-2">
                        <label class="form-label" for="event_id">Event #1</label>
                        <input type="number" class="form-control form-control-sm" id="event_id" name="event_id" placeholder="" value="{{$data['event']['event_id']}}" required>
                        <input type="hidden" name="event_row_id" value="{{$data['event']['id']}}" />
                    </div>
                    <div class="mb-2">
                        <label class="form-label" for="event_name">Event Name</label>
                        <input type="text" id="event_name" name="event_name" class="form-control form-control-sm" value="{{$data['event']['name']}}" placeholder="" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label" for="gender">Gender</label>
                        <select class="form-select form-select-sm" id="gender" name="gender" required>
                            <option value="">Select Gender</option>
                            @foreach ($data['gender'] as $gender)
                            <option value="{{ $gender->id }}" @php if($gender->id == $data['event']['gender']) echo "selected"; @endphp>{{ $gender->gender}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label" for="event_type">Event Type:</label>
                        <select class="form-select form-select-sm" id="event_type" name="event_type" required>
                            <option value="">Select</option>
                            <option value="0">Others</option>
                            @foreach ($data['event_type'] as $event_type)
                            <option value="{{ $event_type->id }}" @php if($event_type->id == $data['event']['event_type']) echo "selected"; @endphp>{{ $event_type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="relay" name="relay" disabled>
                            <label class="form-check-label" for="relay">Relay</label>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-label" for="distance">Distance:</label>
                        <select class="form-select form-select-sm" id="distance" name="distance" disabled>
                            <option value="">Select</option>
                            <option value="65">65</option>
                            <option value="100">100</option>
                            <option value="150">150</option>
                            <option value="200">200</option>
                            <option value="250">250</option>
                            <option value="300">300</option>
                        </select>
                    </div>
                </fieldset>
                <fieldset class="border rounded-3 p-3 bg-white">
                    <legend class="float-none w-auto px-3 fs-5">Seeding:</legend>
                    <div class="mb-2">
                        <label class="form-label" for="no_positions">Number of Positions:</label>
                        <input type="number" class="form-control form-control-sm" id="no_positions" value="8" name="no_positions" required="">
                    </div>
                    <div class="mb-2">
                        <label class="form-label" for="position_assignment">Lane/Position Assignment:</label>
                        <select class="form-select form-select-sm" id="position_assignment" name="position_assignment" required="">
                            @foreach ($data['position_assignment'] as $position_assignment)
                            <option value="{{ $position_assignment->id }}" @php if($position_assignment->id == $data['event']['position_assignment']) echo "selected"; @endphp>{{ $position_assignment->orders}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label" for="flight_assignment">Heat/Flight Assignment:</label>
                        <select class="form-select form-select-sm" id="flight_assignment" name="flight_assignment" required="">
                            <option value="1">Seed Mark</option>
                            <option value="2" selected>Random</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label" for="flight_order">Heat/Flight order</label>
                        <select class="form-select form-select-sm" id="flight_order" name="flight_order" required="">
                            @foreach ($data['flight_orders'] as $flight_orders)
                            <option value="{{ $flight_orders->id }}" @php if($flight_orders->id == $data['event']['flight_order']) echo "selected"; @endphp>{{ $flight_orders->orders}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label" for="advancement">Advancement</label>
                        <select class="form-select form-select-sm" id="advancement" name="advancement" required="">
                            <option value="1" selected>Mark</option>
                            {{-- <option value="Time and Place">Time and Place</option> --}}
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
                {{-- </form> --}}
            </div>
            {{-- Right side filed set --}}
            <div class="col-md">
                {{-- <form class="needs-validation" novalidate=""> --}}
                <fieldset class="border rounded-3 p-3 bg-white">
                    <legend class="float-none w-auto px-3 fs-5">Scoring</legend>
                    <div class="mb-2">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="score_event" name="score_event" required="" checked>
                            <label class="form-check-label" for="score_event">Score this event</label>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="border rounded-3 p-3 bg-white">
                    <legend class="float-none w-auto px-3 fs-5">Relays</legend>
                    <div class="mb-2">
                        <label class="form-label" for="members">Number of Members:</label>
                        <input class="form-control form-control-sm" id="members" name="members" value="" readonly>
                    </div>
                </fieldset>

                <fieldset class="border rounded-3 p-3 bg-white">
                    <legend class="float-none w-auto px-3 fs-5">Measurement System</legend>
                    <div class="mb-2">
                        <label class="form-label" for="entries_unit">Entries:</label>
                        <select class="form-select form-select-sm" id="entries_unit" name="entries_unit" required="">
                            <option value="1">Metric</option>
                            <option value="2">English</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label" for="result_unit">Results:</label>
                        <select class="form-select form-select-sm" id="result_unit" name="result_unit" required="">
                            <option value="1">Metric</option>
                            <option value="2">English</option>
                        </select>
                    </div>
                </fieldset>

                <fieldset class="border rounded-3 p-3 bg-white">
                    <legend class="float-none w-auto px-3 fs-5">Wind</legend>
                    <div class="mb-2">
                        <label class="form-label" for="lane-assignment-wind">Mode</label>
                        <select class="form-select form-select-sm" id="lane-assignment-wind" name="lane-assignment-wind" disabled>
                            <option value=""></option>
                            <option value="Manual">Manual</option>
                            <option value="Custom">Custom</option>
                            <option value="100M">100M</option>
                            <option value="200M">200M</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label" for="start-wind">Start</label>
                        <input type="text" class="form-control form-control-sm" id="start-wind" name="start-wind" disabled>
                    </div>
                    <div class="mb-2">
                        <label class="form-label" for="duration-wind">Duration</label>
                        <input type="text" class="form-control form-control-sm" id="duration-wind" name="duration-wind" disabled>
                    </div>
                </fieldset>

                <fieldset class="border rounded-3 p-3 bg-white">
                    <legend class="float-none w-auto px-3 fs-5">Lap Time</legend>
                    <div class="mb-2">
                        <label for="total_laps" class="form-label">Total Laps</label>
                        <input type="text" id="total_laps" name="total_laps" class="form-control" value="" readonly>
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
                <div class="col-md my-4 mb-md-0 text-end">
                    <button id="submitBtn" class="btn btn-primary mb-2">Submit</button>
                    <button id="clearBtn" class="btn btn-secondary mb-2">Clear</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var roundTableBody = document.getElementById("roundTableBody");

        var rounds = @json($data['rounds']);
        const rounds_input = $("#no-rounds").val(rounds.length);
        var rounds_HTML = '';
        rounds.forEach((item, i) => {
            roundTableBody.innerHTML += `
                    <tr>
                        <th scope="row">${item.round_no}</th>
                        <td><input type="hidden" class="form-control" name="round_id[]" value="${item.round_no}"><input type="text" class="form-control" name="round_name[]" value="${item.name}"></td>
                        <td><input type="date" class="form-control" name="round_date[]" value="${item.date}"></td>
                        <td><input type="time" class="form-control" name="round_time[]" value="${item.time}"></td>
                    </tr>`;
        });
        const form = document.querySelector('form');
        const submitBtn = document.getElementById('submitBtn');
        const clearBtn = document.getElementById('clearBtn');
        var formData = [];
        var roundInfoArray = [];
        // Function to validate input fields
        function validateInputFields() {
            let isValid = true;
            const inputFields = form.querySelectorAll('input[required]');
            inputFields.forEach(function(input) {
                if (input.value.trim() === '') {
                    input.classList.add('is-invalid');
                    isValid = false;
                } else {
                    input.classList.remove('is-invalid');
                }
            });

            const selectFields = form.querySelectorAll('select[required]');
            selectFields.forEach(function(select) {
                if (select.value.trim() === '') {
                    select.classList.add('is-invalid');
                    isValid = false;
                } else {
                    select.classList.remove('is-invalid');
                }
            });

            // console.log(isValid);
            return isValid;
        }

        // Function to clear form fields
        function clearFormFields() {
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
        }

        // to generate round information
        function generateRoundInfo() {
            const noRoundsInput = document.getElementById("no-rounds");
            const numRounds = parseInt(noRoundsInput.value);
            roundInfoArray.length = 0;
            const roundNames = ["Heats", "Quarters", "Semis"];


            roundTableBody.innerHTML = '';
            for (let i = 1; i <= numRounds; i++) {
                var roundName = i <= roundNames.length ? roundNames[i - 1] : "Round " + i;
                const currentDate = new Date().toISOString().split("T")[0];
                const defaultTime = i === 1 ? "08:00" : addHours("08:00", i - 1);

                if (i === numRounds) {
                    roundName = "Final";
                }
                if (numRounds >= 2) {
                    if (i == 1) {
                        roundName = "Prelims";
                    }
                }

                var roundInfo = {
                    roundNumber: i
                    , roundName: roundName
                    , date: currentDate
                    , time: defaultTime
                };

                roundInfoArray.push(roundInfo);

                roundTableBody.innerHTML += `
                          <tr>
                              <th scope="row">${i}</th>

                              <td><input type="hidden" class="form-control" name="round_id[]" value="${i}"><input type="text" class="form-control" name="round_name[]" value="${roundName}"></td>
                              <td><input type="date" class="form-control" name="round_date[]" value="${currentDate}"></td>
                              <td><input type="time" class="form-control" name="round_time[]" value="${defaultTime}"></td>
                          </tr>`;
            }
        }

        // Function to add hours to a given time (hh:mm)
        function addHours(time, hours) {
            const [hh, mm] = time.split(":");
            const newHH = parseInt(hh) + hours;
            return `${newHH.toString().padStart(2, '0')}:${mm}`;
        }

        // const roundInfoArray = [];

        submitBtn.addEventListener('click', function(event) {
            event.preventDefault();
            if (validateInputFields()) {
                var fd = $("#event_form").serialize();
                console.log(fd);
                // return;
                $.ajax({
                    url: "/event/event-update"
                    , type: 'POST'
                    , data: fd
                    , success: function(result) {
                        console.log(result);
                        if (result.status == '1') {
                            window.location.replace('/events')
                        }
                    }
                    , error: function(jqXhr, textStatus, errorMessage) {}
                });
                roundInfoArray.forEach(function(roundInfo) {
                    // fd.append("round", JSON.stringify(roundInfoArray))
                });
            }
        });

        clearBtn.addEventListener('click', function(event) {
            event.preventDefault();
            clearFormFields();
        });


        const applyButton = document.getElementById("applyButton");
        applyButton.addEventListener("click", generateRoundInfo);

    });

</script>

@endsection
