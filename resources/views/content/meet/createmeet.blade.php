@extends('layouts/contentNavbarLayout')

@section('title', ' createmeet - Forms')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Meet/</span>Create Meet</h4>

<!-- Basic Layout -->
{{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css"> --}}
<script src="{{ asset('jquery.js') }}"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

<div class="row">
    <div class="col-md mb-4 mb-md-0">
        <form class="needs-validation" id="date-form" novalidate method="POST" action="/meet/insert-meet">
            @csrf
            @method('POST')
            <fieldset class="border rounded-3 px-3 bg-white">
                <legend class="float-none w-auto px-3 fs-5">New Meet</legend>
                <div class="mb-3">
                    <label for="meet-name" class="form-label">Meet Name</label>
                    <input type="text" id="meet-name" class="form-control" name="meet-name" required>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="from-date" class="form-label">From Date</label>
                        <input type="date" class="form-control datepicker" id="from-date" name="from-date"
                            placeholder="Select a date"  required>
                    </div>
                    <div class="col-md-6">
                        <label for="to-date" class="form-label">To Date</label>
                        <input type="date" class="form-control datepicker" id="to-date" name="to-date"
                            placeholder="Select a date"  required>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="score-competition"
                            name="score-competition" required>
                        <label class="form-check-label" for="score-competition">Score Competition</label>
                    </div>
                </div>
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
        $('#from-date').datepicker({
            format: 'dd-mm-yyyy',
        });

        $('#date-form').submit(function(event) {
            var fromDate = $('#from-date').datepicker('getFormattedDate');
            var toDate = $('#to-date').datepicker('getFormattedDate');

            if (fromDate && toDate) {
                var fromDateObj = new Date(fromDate);
                var toDateObj = new Date(toDate);

                if (fromDateObj >= toDateObj) {
                    alert("To Date must be greater than From Date");
                    event.preventDefault();
                }
            }
        });
    });
</script>
@endsection
