<table class="table table-bordered" >
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
@php

  $options = $data['options'];
  $score_data = $data['score_data'];
  // $counter = ($score_data->perPage() * ($score_data->currentPage() - 1)) + 1;
  $counter = 1;

@endphp
@foreach($score_data as $key => $value)
<tr data-row-id="{{$value->id}}">
    <th scope="row">{{$counter}}</th>
    <td>{{$value->athlete_uid}}</td>
    <td>{{$value->fname.' '.$value->lname}}</td>
    <td>
        <div>
            <input id="r_1_{{$value->id}}" name="r_1" class="form-control form-control-sm my-2 score_input" type="text"  value="{{$value->r_1}}" @php echo is_numeric($value->r_1) ? '' : 'disabled' ; @endphp />
        </div>
        <div>
            <select  data-col-name = "r_1" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                    <option value="{{$item}}" @php if($item == $value->r_1){ echo "selected"; }  @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <input id="r_2_{{$value->id}}" name="r_2"  class="form-control form-control-sm my-2 score_input" type="text"  value="{{$value->r_2}}" @php echo is_numeric($value->r_2) ? '' : 'disabled' ; @endphp/>
        </div>
        <div>
            <select  data-col-name = "r_2" class="form-select form-select-sm mark-dropdown">
              @foreach ($options as $item)
              <option value="{{$item}}" @php if($item == $value->r_2){ echo "selected";}  @endphp>{{$item}}</option>
          @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <input id="r_3_{{$value->id}}" name="r_3" class="form-control form-control-sm my-2 score_input" type="text"  value="{{$value->r_3}}" @php echo is_numeric($value->r_3) ? '' : 'disabled' ; @endphp/>
        </div>
        <div>
            <select   data-col-name = "r_3" class="form-select form-select-sm mark-dropdown">
              @foreach ($options as $item)
              <option value="{{$item}}" @php if($item == $value->r_3){ echo "selected";}  @endphp>{{$item}}</option>
          @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <input name="" class="form-control form-control-sm my-2" type="text"  value="{{$value->best_3}}" readonly/>
        </div>
        {{-- <div>
            <select  class="form-select form-select-sm mark-dropdown">
                <option value=""selected>Mark</option>
                <option value="X">X</option>
                <option value="-">-</option>
                <option value="DNS">DNS</option>
                <option value="r">r</option>
            </select>
        </div> --}}
    </td>
    <td>
        <div>
            <input name="" class="form-control form-control-sm my-2" type="text"  value="{{$value->position_after_3}}" readonly/>
        </div>
        {{-- <div>
            <select  class="form-select form-select-sm mark-dropdown">
                <option value=""selected>Mark</option>
                <option value="X">X</option>
                <option value="-">-</option>
                <option value="DNS">DNS</option>
                <option value="r">r</option>
            </select>
        </div> --}}
    </td>
    <td>
        <div>
            <input id="r_4_{{$value->id}}" name="r_4" class="form-control form-control-sm my-2 score_input" type="text"  value="{{$value->r_4}}" @php echo is_numeric($value->r_4) ? '' : 'disabled' ; @endphp/>
        </div>
        <div>
            <select   data-col-name = "r_4" class="form-select form-select-sm mark-dropdown">
              @foreach ($options as $item)
              <option value="{{$item}}" @php if($item == $value->r_4){ echo "selected";}  @endphp>{{$item}}</option>
          @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <input id="r_5_{{$value->id}}" name="r_5" class="form-control form-control-sm my-2 score_input" type="text"  value="{{$value->r_5}}" @php echo is_numeric($value->r_5) ? '' : 'disabled' ; @endphp/>
        </div>
        <div>
            <select  data-col-name = "r_5" class="form-select form-select-sm mark-dropdown">
              @foreach ($options as $item)
              <option value="{{$item}}" @php if($item == $value->r_5){ echo "selected";}  @endphp>{{$item}}</option>
          @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <input name="" class="form-control form-control-sm my-2" type="text"  value="{{$value->best_5}}" readonly/>
        </div>
        {{-- <div>
            <select  class="form-select form-select-sm mark-dropdown">
                <option value=""selected>Mark</option>
                <option value="X">X</option>
                <option value="-">-</option>
                <option value="DNS">DNS</option>
                <option value="r">r</option>
            </select>
        </div> --}}
    </td>
    <td>
        <div>
            <input name="" class="form-control form-control-sm my-2" type="text"  value="{{$value->position_after_5}}" readonly/>
        </div>
        {{-- <div>
            <select  class="form-select form-select-sm mark-dropdown">
                <option value=""selected>Mark</option>
                <option value="X">X</option>
                <option value="-">-</option>
                <option value="DNS">DNS</option>
                <option value="r">r</option>
            </select>
        </div> --}}
    </td>
    <td>
      <div>
          <input id="r_6_{{$value->id}}" name="r_6" class="form-control form-control-sm my-2 score_input" type="text"  value="{{$value->r_6}}" @php echo is_numeric($value->r_6) ? '' : 'disabled' ; @endphp/>
      </div>
      <div>
          <select   data-col-name = "r_6" class="form-select form-select-sm mark-dropdown">
            @foreach ($options as $item)
            <option value="{{$item}}" @php if($item == $value->r_6){ echo "selected";}  @endphp>{{$item}}</option>
        @endforeach
          </select>
      </div>
  </td>
  <td>
      <div>
          <input  name="" class="form-control form-control-sm my-2" type="text"  value="{{$value->best_all}}" readonly/>
      </div>
      {{-- <div>
          <select  class="form-select form-select-sm mark-dropdown">
              <option value=""selected>Mark</option>
              <option value="X">X</option>
              <option value="-">-</option>
              <option value="DNS">DNS</option>
              <option value="r">r</option>
          </select>
      </div> --}}
  </td>
  <td>
      <div>
          <input name="" class="form-control form-control-sm my-2" type="text"  value="{{$value->position_final}}" readonly/>
      </div>
      {{-- <div>
          <select  class="form-select form-select-sm mark-dropdown">
              <option value=""selected>Mark</option>
              <option value="X">X</option>
              <option value="-">-</option>
              <option value="DNS">DNS</option>
              <option value="r">r</option>
          </select>
      </div> --}}
  </td>
</tr>
@php
  $counter++;
@endphp
@endforeach
</table>
{{-- <div class="card-footer">
  <div class="mmt-5 col-md-12">
      {{$score_data->links()}}
  </div>
</div> --}}


<script>
      $(".score_input").on("focusout", function(event) {
            var row_id = $(this).closest('tr').data('row-id');
            // const CSRF = $('meta[name="csrf-token"]').attr('content');
            var event_no = $('#event_no').val();
            $.ajax({
                url: "/score/update-score",
                type: 'POST',
                data: {
                    col: event.target.name,
                    val: event.target.value,
                    row_id,
                    event_no
                },
                success: function(result) {
                    if (result.status = 1) {
                        $('#tbody').html(result);
                    }
                },
                error: function(jqXhr, textStatus, errorMessage) {
                }
            });
       });
       $(".mark-dropdown").on("change", function(event) {
            var row_id = $(this).closest('tr').data('row-id');
            var col_name = $(this).data('col-name');
            var value = $(this).val();
            if(value == ''){
                $('[name='+col_name+']').prop("disabled", false);
                value = 0 ;
            }
            // const CSRF = $('meta[name="csrf-token"]').attr('content');
            var event_no = $('#event_no').val();
            $.ajax({
                url: "/score/update-score",
                type: 'POST',
                data: {
                    col: col_name,
                    val: value,
                    row_id,
                    event_no,
                    version: '1'
                },
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
