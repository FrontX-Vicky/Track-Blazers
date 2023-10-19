<thead>
    <tr class="text-nowrap">
        <th rowspan="3" style="text-align:center">#</th>
        <th rowspan="3" style="text-align:center">UID</th>
        <th rowspan="3" style="text-align:center">Name</th>
        <th rowspan="3" style="text-align:center">State</th>
        <th colspan="22" style="text-align: center; color:black"><b>PERFORMANCE at HEIGHTS</b></th>
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
        <th colspan="3">M.</th>
        <th colspan="3">M.</th>
        <th colspan="3">M.</th>
        <th colspan="3">M.</th>
        <th colspan="3">M.</th>
        <th colspan="3">M.</th>
        <th colspan="3">M.</th>
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
    </tr>
</thead>

@foreach($score_data as $key => $value)
<tr data-row-id="{{$value->id}}">
    <th scope="row">1</th>
    <td>{{$value->athlete_uid}}</td>
    <td>{{$value->fname.' '.$value->lname}}</td>
    <td></td>
    <td>
        <div>
            <select data-col-name="r_1_1" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_1_1){ echo "selected"; } @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_1_2" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_1_2){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_1_3" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_1_3){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    {{-- --}}
    <td>
        <div>
            <select data-col-name="r_2_1" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_2_1){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_2_2" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_2_2){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_2_3" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_2_3){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    {{-- --}}
    <td>
        <div>
            <select data-col-name="r_3_1" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_2_1){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_3_2" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_2_2){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_3_3" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_2_3){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    {{-- --}}
    <td>
        <div>
            <select data-col-name="r_4_1" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_2_1){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_4_2" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_2_2){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_4_3" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_2_3){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    {{-- --}}
    <td>
        <div>
            <select data-col-name="r_5_1" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_2_1){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_5_2" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_2_2){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_5_3" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_2_3){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    {{-- --}}
    <td>
        <div>
            <select data-col-name="r_6_1" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_2_1){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_6_2" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_2_2){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_6_3" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_2_3){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    {{-- --}}
    <td>
        <div>
            <select data-col-name="r_7_1" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_2_1){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_7_2" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_2_2){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_7_3" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_2_3){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    {{-- --}}
    <td>
        <div>
            <select data-col-name="r_8_1" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_2_1){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_8_2" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_2_2){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_8_3" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_2_3){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    {{-- --}}
    <td>
        <div>
            <select data-col-name="r_9_1" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_2_1){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_9_2" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_2_2){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_9_3" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_2_3){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    {{-- --}}
    <td>
        <div>
            <select data-col-name="r_10_1" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_2_1){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_10_2" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_2_2){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_10_3" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_2_3){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>

    <td>
        <div>
            <input name="" class="form-control form-control-sm my-2" type="text" value="{{$value->position_final}}" readonly />
        </div>
    </td>
</tr>
@endforeach
<tbody>
</tbody>


<script>
    $(".score_input").on("focusout", function(event) {
        var row_id = $(this).closest('tr').data('row-id');
        // const CSRF = $('meta[name="csrf-token"]').attr('content');
        var event_no = $('#event_no').val();
        $.ajax({
            url: "/score/update-score"
            , type: 'POST'
            , data: {
                col: event.target.name
                , val: event.target.value
                , row_id
                , event_no
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
        if (value == '') {
            $('[name=' + col_name + ']').prop("disabled", false);
            value = 0;
        }
        // const CSRF = $('meta[name="csrf-token"]').attr('content');
        var event_no = $('#event_no').val();
        $.ajax({
            url: "/score/update-score"
            , type: 'POST'
            , data: {
                col: col_name
                , val: value
                , row_id
                , event_no
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
