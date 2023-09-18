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
        <form method="post" enctype="multipart/form-data" id="doc_form" action="{{route('upload-upload')}}">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="formFile" class="form-label">Select file to upload</label>
                <input class="form-control" type="file" name="file" id="formFile" id="" required>
            </div>
            <div class="mb-3">
                <button type="submit" id="submitBtn" class="btn btn-secondary">Upload</button>
            </div>
        </form>
    </div>
</div>
<!--/ Basic Bootstrap Table -->

<script>
    const form = document.querySelector('form');
    const submitBtn = document.getElementById('submitBtn');
    // const clearBtn = document.getElementById('clearBtn');

    submitBtn.addEventListener('click', function(event) {
        event.preventDefault();
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
        if (isValid) {
            form.submit();

              // console.log( $('#doc_form').serialize() );
              // $.ajax({
              //     url: "upload-upload"
              //     , type: 'POST',
              //     data
              //     , success: function(result) {
              //         if (result.status = 1) {
              //             // $('#tbody').html(result);
              //         }
              //     }
              //     , error: function(jqXhr, textStatus, errorMessage) {}
              // });
        }
        // $.ajax({
        //     url: "/upload/score-panel"
        //     , type: 'POST',
        //     data
        //     , success: function(result) {
        //         if (result.status = 1) {
        //             // $('#tbody').html(result);
        //         }
        //     }
        //     , error: function(jqXhr, textStatus, errorMessage) {}
        // });
        // let isValid = true;
        // const inputFields = form.querySelectorAll('input[required]');
        // inputFields.forEach(function(input) {
        //     if (input.value.trim() === '') {
        //         input.classList.add('is-invalid');
        //         isValid = false;
        //     } else {
        //         input.classList.remove('is-invalid');
        //     }
        // });

        // if (isValid) {
        //     form.submit();
        // }
    });

    // clearBtn.addEventListener('click', function(event) {
    //     event.preventDefault();

    //     const inputFields = form.querySelectorAll('input');
    //     const selectFields = form.querySelectorAll('select');

    //     inputFields.forEach(input => {
    //         input.value = '';
    //         input.classList.remove('is-invalid');
    //     });

    //     selectFields.forEach(select => {
    //         select.value = '';
    //         select.classList.remove('is-invalid');
    //     });

    //     document.getElementById('start-wind').value = '';
    //     document.getElementById('duration-wind').value = '';
    // });
    $(document).ready(function() {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    });

</script>

@endsection
