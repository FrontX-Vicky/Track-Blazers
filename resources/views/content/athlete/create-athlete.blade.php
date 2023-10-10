@extends('layouts/contentNavbarLayout')

@section('title', ' createmeet - Forms')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Atheletes/ </span>Create Athlete</h4>

<!-- Basic Layout -->
{{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css"> --}}
<script src="{{ asset('jquery.js') }}"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

<div class="row">
    <div class="col-md mb-4 mb-md-0">
        <form class="needs-validation" id="athlete-form" novalidate method="POST" action="/athlete/athlete-insert">
            @csrf
            @method('POST')
            <fieldset class="border rounded-3 px-3 bg-white">
                <legend class="float-none w-auto px-3 fs-5">New Athlete</legend>
                <div class="mb-3">
                    <label for="athlete_uid" class="form-label">ID#</label>
                    <input type="text" id="athlete_uid" class="form-control" name="athlete_uid" required>
                </div>
                <div class="mb-3">
                    <label for="fname" class="form-label">First Name</label>
                    <input type="text" id="fname" class="form-control" name="fname" required>
                </div>
                <div class="mb-3">
                    <label for="lname" class="form-label">Last Name</label>
                    <input type="text" id="lname" class="form-control" name="lname" required>
                </div>
                <div class="mb-3">
                    <label for="affiliation" class="form-label">Affiliation</label>
                    <input type="text" id="affiliation" class="form-control" name="affiliation" required>
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select form-select-sm" id="gender" name="gender" required="">
                        <option value="">Select Gender</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                </div>
                {{-- <div class="mb-3">
                    <label for="gender" class="form-label">Meet</label>
                    <select class="form-select form-select-sm" id="gender" name="gender" required="">
                        <option value="">Select Meet</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
                </div> --}}
                <div class="mb-3">
                    <label for="event_id" class="form-label">Event</label>
                    <select class="form-select form-select-sm" id="event_id" name="event_id" required="">
                        <option value="">Select Event</option>
                        <option value="10">Event 1</option>
                        <option value="11">Event 2</option>
                    </select>
                </div>
                {{-- <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="scoring"
                            name="scoring" required>
                        <label class="form-check-label" for="scoring">Score Competition</label>
                    </div>
                </div> --}}
                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary">OK</button>
                    <button type="button" class="btn btn-secondary" id="cancel-button">Cancel</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        // $('#from-date').datepicker({
        //     format: 'dd-mm-yyyy'
        //  });

        $('#athlete-form').submit(function(event) {
            // var fromDate = $('#from-date').datepicker('getFormattedDate');
            // var toDate = $('#to-date').datepicker('getFormattedDate');

            // if (fromDate && toDate) {
            //     var fromDateObj = new Date(fromDate);
            //     var toDateObj = new Date(toDate);

            //     if (fromDateObj >= toDateObj) {
            //         alert("To Date must be greater than From Date");
            //         event.preventDefault();
            //     }
            // }
        });
    });

</script>
@endsection
