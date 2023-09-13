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

</style>
<!-- Responsive Table -->
<div class="card">
    <h5 class="card-header">Score Table</h5>
    <div class="table-responsive text-nowrap mx-2 my-5">
        <table class="table table-bordered">
            <thead>
                <tr class="text-nowrap">
                    <th rowspan="2" style="text-align:center">#</th>
                    <th rowspan="2" style="text-align:center">UID</th>
                    <th rowspan="2" style="text-align:center">Name</th>
                    <th colspan="3" style="text-align: center; color:black"><b>TRIALS</b></th>
                    <th rowspan="2" style="text-align: center; ">best of <br><b style="color:black">THREE</b><br> Trials</th>
                    <th rowspan="2" style="text-align: center; ">Position<br>after three<br>Trials</th>
                    <th colspan="2" style="text-align: center; color:black"><b>TRIALS</b></th>
                    <th rowspan="2" style="text-align: center; ">best of <br><b style="color:black">FIVE</b><br> Trials</th>
                    <th rowspan="2" style="text-align: center; ">Position<br>after Five<br>Trials</th>
                    <th style="text-align: center; color:black;"><b></b></th>
                    <th rowspan="2" style="text-align: center; ">best of <br><b style="color:black">ALL</b><br> Trials</th>
                    <th rowspan="2" style="text-align: center; ">FINAL<br><br>POSITION</th>
                </tr>
                <tr class="text-nowrap">
                    <th>FIRST</th>
                    <th>SECOND</th>
                    <th>THIRD</th>
                    <th>FOURTH</th>
                    <th>FIFTH</th>
                    <th>SIXTH</th>
                </tr>
            </thead>
            <tbody id="tbody">
            </tbody>
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
        $.ajax({
            url: "/score/score-panel",
            type: 'POST',
            success: function(result) {
                if (result.status = 1) {
                    $('#tbody').html(result);
                }
            },
            error: function(jqXhr, textStatus, errorMessage) {
            }
        });
    });

</script>
@endsection
