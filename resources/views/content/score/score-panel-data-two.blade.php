<table class="table table-bordered" >
@php

  $options = $data['options'];
  $score_data = $data['score_data'];
  $height_level = $data['height_level'][0];
  // $counter = ($score_data->perPage() * ($score_data->currentPage() - 1)) + 1;
  $counter = 1;

@endphp
<thead>
    <tr class="text-nowrap">
        <th rowspan="3" style="text-align:center">#</th>
        <th rowspan="3" style="text-align:center">UID</th>
        <th rowspan="3" style="text-align:center">Name</th>
        <th rowspan="3" style="text-align:center">State</th>
        <th colspan="31" style="text-align: center; color:black"><b>PERFORMANCE at HEIGHTS</b></th>
        {{-- <th rowspan="2" style="text-align: center; ">best of <br><b style="color:black">THREE</b><br> Trials</th>
    <th rowspan="2" style="text-align: center; ">Position<br>after three<br>Trials</th>
    <th colspan="2" style="text-align: center; color:black"><b>TRIALS</b></th>
    <th rowspan="2" style="text-align: center; ">best of <br><b style="color:black">FIVE</b><br> Trials</th>
    <th rowspan="2" style="text-align: center; ">Position<br>after Five<br>Trials</th>
    <th style="text-align: center; color:black;"><b></b></th> --}}
        <th rowspan="3" style="text-align: center; ">Trials at <br><b style="color:black">HEIGHT</b><br> CLEARED</th>
        <th rowspan="3" style="text-align: center; ">TOTAL<br><br>FAILURE</th>
        <th rowspan="3" style="text-align: center; ">FINAL<br><br>POSITION</th>
    </tr>
    <tr class="text-nowrap jump_height">
        <th colspan="3">
          <div class="row">
            <div class="col-md-6">
              <input class="form-control form-control-sm my-2 height_level" type="text" data-col-name="h1" data-row-id="{{$height_level->id}}" value="{{$height_level->h1}}" />
            </div>
            <div class="col-md-3 form-control-sm mt-2">
              M.
            </div>
          </div>
        </th>
        <th colspan="3">
          <div class="col-md-6">
            <input class="form-control form-control-sm my-2 height_level" type="text" data-col-name="h2" data-row-id="{{$height_level->id}}" value="{{$height_level->h2}}" />
          </div> M.
        </th>
        <th colspan="3">
          <div class="col-md-6">
            <input class="form-control form-control-sm my-2 height_level" type="text" data-col-name="h3" data-row-id="{{$height_level->id}}" value="{{$height_level->h3}}" />
          </div> M.
        </th>
        <th colspan="3">
          <div class="col-md-6">
            <input class="form-control form-control-sm my-2 height_level" type="text" data-col-name="h4" data-row-id="{{$height_level->id}}" value="{{$height_level->h4}}" />
          </div> M.
        </th>
        <th colspan="3">
          <div class="col-md-6">
            <input class="form-control form-control-sm my-2 height_level" type="text" data-col-name="h5" data-row-id="{{$height_level->id}}" value="{{$height_level->h5}}" />
          </div> M.
        </th>
        <th colspan="3">
          <div class="col-md-6">
            <input class="form-control form-control-sm my-2 height_level" type="text" data-col-name="h6" data-row-id="{{$height_level->id}}" value="{{$height_level->h6}}" />
          </div> M.
        </th>
        <th colspan="3">
          <div class="col-md-6">
            <input class="form-control form-control-sm my-2 height_level" type="text" data-col-name="h7" data-row-id="{{$height_level->id}}" value="{{$height_level->h7}}" />
          </div> M.
        </th>
        <th colspan="3">
          <div class="col-md-6">
            <input class="form-control form-control-sm my-2 height_level" type="text" data-col-name="h8" data-row-id="{{$height_level->id}}" value="{{$height_level->h8}}" />
          </div> M.
        </th>
        <th colspan="3">
          <div class="col-md-6">
            <input class="form-control form-control-sm my-2 height_level" type="text" data-col-name="h9" data-row-id="{{$height_level->id}}" value="{{$height_level->h9}}" />
          </div> M.
        </th>
        <th colspan="3">
          <div class="col-md-6">
            <input class="form-control form-control-sm my-2 height_level" type="text" data-col-name="h10" data-row-id="{{$height_level->id}}" value="{{$height_level->h10}}" />
          </div> M.
        </th>
        <th rowspan="2">BEST<br>JUMP</th>
    </tr>
    <tr class="text-nowrap">
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
    </tr>
</thead>

@foreach($score_data as $key => $value)
<tr data-row-id="{{$value->id}}">
    <th scope="row">{{$counter}}</th>
    <td>{{$value->athlete_uid}}</td>
    <td>{{$value->fname.' '.$value->lname}}</td>
    <td></td>
    <td>
        <div>
            <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_11}}" disabled />
        </div>
        <div>
            <select data-col-name="r_11" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_11){ echo "selected"; } @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
      <div>
        <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_12}}" disabled />
    </div>
        <div>
            <select data-col-name="r_12" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_12){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
      <div>
        <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_13}}" disabled />
    </div>
        <div>
            <select data-col-name="r_13" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_13){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    {{-- --}}
    <td>
      <div>
        <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_21}}" disabled />
    </div>
        <div>
            <select data-col-name="r_21" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_21){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
      <div>
        <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_22}}" disabled />
    </div>
        <div>
            <select data-col-name="r_22" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_22){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
      <div>
        <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_23}}" disabled />
    </div>
        <div>
            <select data-col-name="r_23" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_23){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    {{-- --}}
    <td>
      <div>
        <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_31}}" disabled />
    </div>
        <div>
            <select data-col-name="r_31" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_31){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
      <div>
        <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_32}}" disabled />
    </div>
        <div>
            <select data-col-name="r_32" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_32){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
      <div>
        <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_33}}" disabled />
    </div>
        <div>
            <select data-col-name="r_33" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_33){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    {{-- --}}
    <td>
      <div>
        <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_41}}" disabled />
    </div>
        <div>
            <select data-col-name="r_41" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_41){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
      <div>
        <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_42}}" disabled />
    </div>
        <div>
            <select data-col-name="r_42" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_42){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
      <div>
        <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_43}}" disabled />
    </div>
        <div>
            <select data-col-name="r_43" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_43){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    {{-- --}}
    <td>
      <div>
        <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_51}}" disabled />
    </div>
        <div>
            <select data-col-name="r_51" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_51){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
      <div>
        <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_52}}" disabled />
    </div>
        <div>
            <select data-col-name="r_52" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_52){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
      <div>
        <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_53}}" disabled />
    </div>
        <div>
            <select data-col-name="r_53" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_53){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    {{-- --}}
    <td>
      <div>
        <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_61}}" disabled />
    </div>
        <div>
            <select data-col-name="r_61" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_61){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
      <div>
        <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_62}}" disabled />
    </div>
        <div>
            <select data-col-name="r_62" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_62){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
      <div>
        <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_63}}" disabled />
    </div>
        <div>
            <select data-col-name="r_63" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_63){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    {{-- --}}
    <td>
      <div>
        <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_71}}" disabled />
    </div>
        <div>
            <select data-col-name="r_71" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_71){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
      <div>
        <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_72}}" disabled />
    </div>
        <div>
            <select data-col-name="r_72" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_72){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
      <div>
        <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_73}}" disabled />
    </div>
        <div>
            <select data-col-name="r_73" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_73){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    {{-- --}}
    <td>
      <div>
        <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_81}}" disabled />
    </div>
        <div>
            <select data-col-name="r_81" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_81){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
      <div>
        <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_82}}" disabled />
    </div>
        <div>
            <select data-col-name="r_82" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_82){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
      <div>
        <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_83}}" disabled />
    </div>
        <div>
            <select data-col-name="r_83" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_83){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    {{-- --}}
    <td>
      <div>
        <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_91}}" disabled />
    </div>
        <div>
            <select data-col-name="r_91" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_91){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
      <div>
        <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_92}}" disabled />
    </div>
        <div>
            <select data-col-name="r_92" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_92){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
      <div>
        <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_93}}" disabled />
    </div>
        <div>
            <select data-col-name="r_93" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_93){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    {{-- --}}
    <td>
      <div>
        <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_101}}" disabled />
    </div>
        <div>
            <select data-col-name="r_101" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_101){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
      <div>
        <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_102}}" disabled />
    </div>
        <div>
            <select data-col-name="r_102" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_102){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
      <div>
        <input class="form-control form-control-sm my-2" type="text"  value="{{$value->r_103}}" disabled />
    </div>
        <div>
            <select data-col-name="r_103" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_103){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>

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
{{-- <div class="card-footer">
  <div class="mmt-5 col-md-12">
      {{$score_data->links()}}
  </div>
</div> --}}


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
        var value = $(this).val();
        var event_id = $('#event_id').val();
        $.ajax({
            url: "/score/update-score"
            , type: 'POST'
            , data: {
                col: col_name
                , val: value
                , row_id
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
