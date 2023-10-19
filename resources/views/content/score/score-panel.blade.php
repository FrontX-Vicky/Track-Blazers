@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Tables /</span> Basic Tables
</h4>

<hr class="my-1">
<style>
    nav .w-5 {
        display: none;
    }

    table td select {
        min-width: 70px;
    }

    .jump_height {
        text-align: right;
    }

</style>
<!-- Responsive Table -->
<div class="card">
    <h5 class="card-header">Score Table</h5>
    <div class="mb-2 mx-5">

        <label class="form-label" for="distance">Event :</label>
        <select class="form-select form-select" id="event_no" name="event_no" required="" data-value="">
            <option value="">Select</option>
            @foreach ($events as $event)
            <option value="{{ $event->id }}">{{ $event->name}}</option>
            @endforeach

        </select>
    </div>
    <div class="table-responsive text-nowrap mx-2 my-5">
        <table class="table table-bordered" id="tbody">

        </table>
        {{-- <div class="card-footer">
            <div class="mt-5 d-flex justify-content-end">
                {{$data->links()}}
    </div>
</div> --}}
</div>
</div>
<!--/ Responsive Table -->

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        const eventDropdown = document.getElementById('event_no');

        function get_athletes(event_no = '') {
            $.ajax({
                url: "/score/score-panel"
                , type: 'POST',
                data : {
                  event_no
                }

                , success: function(result) {
                    if (result.status = 1) {
                        $('#tbody').html(result);
                    }
                }
                , error: function(jqXhr, textStatus, errorMessage) {}
            });
        }
        get_athletes();
        eventDropdown.addEventListener('change', function(event) {
            event.preventDefault();

            get_athletes(event.target.value);
        });
    });

</script>
@endsection
