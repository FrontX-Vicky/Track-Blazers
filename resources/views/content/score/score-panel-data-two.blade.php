<table class="table table-bordered" >
@php

  $options = $data['options'];
  $score_data = $data['score_data'];
  $height_level = $data['height_level'];
  $counter = 1;

@endphp
<thead>
    <tr class="text-nowrap">
        <th rowspan="3" style="text-align:center">#</th>
        <th rowspan="3" style="text-align:center">UID</th>
        <th rowspan="3" style="text-align:center">Name</th>
        <th rowspan="3" style="text-align:center">State</th>
        <th colspan="{{count($height_level) * 3 + 1}}" style="text-align: center; color:black"><b>PERFORMANCE at HEIGHTS</b></th>
        <th rowspan="3" style="text-align: center; ">Trials at <br><b style="color:black">HEIGHT</b><br> CLEARED</th>
        <th rowspan="3" style="text-align: center; ">TOTAL<br><br>FAILURE</th>
        <th rowspan="3" style="text-align: center; ">FINAL<br><br>POSITION</th>
    </tr>
    <tr class="text-nowrap jump_height">
        @foreach ($height_level as $height)
          <th colspan="3">
            <div class="row">
              <div class="col-md-6">
                <input class="form-control form-control-sm my-2 height_level" type="text" data-col-name="height" data-row-id="{{$height->id}}" value="{{$height->height}}" />
              </div>
              <div class="col-md-3 form-control-sm mt-2">
                M.
              </div>
            </div>
          </th>
        @endforeach
        <th rowspan="3">BEST<br>JUMP</th>
    </tr>
    <tr class="text-nowrap">
       @foreach ( $height_level as $header)
          @for($i = 1; $i <= 3; $i++)
                <th>{{$i}}</th>
          @endfor
       @endforeach
    </tr>
</thead>

@foreach($score_data as $key => $value)
<tr data-row-id="{{$value->id}}">
    <th scope="row">{{$counter}}</th>
    <td>{{$value->athlete_uid}}</td>
    <td>{{$value->fname.' '.$value->lname}}</td>
    <td></td>

    @foreach ($value['grid'] as $grid)
      <td>
          <div>
              <input class="form-control form-control-sm my-2" type="text"  value="{{$grid->value}}" disabled />
          </div>
          <div>
              <select data-header-name="{{$grid->header}}" data-col-name="{{$grid->col}}" class="form-select form-select-sm mark-dropdown">
                  @foreach ($options as $item)
                  <option value="{{$item}}" @php if($item==$grid->value){ echo "selected"; } @endphp>{{$item}}</option>
                  @endforeach
              </select>
          </div>
      </td>
    @endforeach

    <td>
        <div>
            <input name="" class="form-control form-control-sm my-2" type="text" value="{{$value->best}}" readonly />
        </div>
    </td>
    <td>
        <div>
            <input name="" class="form-control form-control-sm my-2" type="text" value="{{$value->cleared_count}}" readonly />
        </div>
    </td>
    <td>
        <div>
            <input name="" class="form-control form-control-sm my-2" type="text" value="{{$value->failed_count}}" readonly />
        </div>
    </td>
    <td>
        <div>
            <input name="" class="form-control form-control-sm my-2" type="text" value="{{$value->final_position}}" readonly />
        </div>
    </td>
  </tr>
  @php
    $counter++;
  @endphp
  @endforeach
</table>

<script>
    $(".height_level").on("focusout", function(event) {
        var col = $(this).data('col-name');
        var row_id = $(this).data('row-id');
        // const CSRF = $('meta[name="csrf-token"]').attr('content');
        var event_id = $('#event_id').val();
        $.ajax({
            url: "/score/score-update-height"
            , type: 'POST'
            , data: {
                col
                , val: event.target.value
                , row_id
                , event_id
            }
            , success: function(result) {
                if (result.status = 1) {
                    $('#tbody').html(result);
                }
            }
            , error: function(jqXhr, textStatus, errorMessage) {}
        });
    });
    $(".mark-dropdown").on("change", function(event) {
        var row_id = $(this).closest('tr').data('row-id');
        var col_name = $(this).data('col-name');
        var header_name = $(this).data('header-name');
        var value = $(this).val();
        var event_id = $('#event_id').val();
        $.ajax({
            url: "/score/update-score"
            , type: 'POST'
            , data: {
                 col_name
                , value
                , row_id
                , header_name
                , event_id,
                version : '2'
            }
            , success: function(result) {
                if (result.status = 1) {
                    $('#tbody').html(result);
                }
            }
            , error: function(jqXhr, textStatus, errorMessage) {}
        });
    });

</script>
