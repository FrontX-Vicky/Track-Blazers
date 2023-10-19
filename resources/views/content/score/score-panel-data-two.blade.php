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
        <th colspan="3">M.</th>
        <th colspan="3">M.</th>
        <th colspan="3">M.</th>
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
            <select data-col-name="r_11" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_11){ echo "selected"; } @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
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
            <select data-col-name="r_21" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_21){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
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
            <select data-col-name="r_31" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_21){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_32" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_22){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_33" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_23){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    {{-- --}}
    <td>
        <div>
            <select data-col-name="r_41" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_21){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_42" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_22){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_43" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_23){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    {{-- --}}
    <td>
        <div>
            <select data-col-name="r_51" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_21){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_52" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_22){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_53" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_23){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    {{-- --}}
    <td>
        <div>
            <select data-col-name="r_61" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_21){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_62" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_22){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_63" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_23){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    {{-- --}}
    <td>
        <div>
            <select data-col-name="r_71" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_21){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_72" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_22){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_73" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_23){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    {{-- --}}
    <td>
        <div>
            <select data-col-name="r_81" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_21){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_82" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_22){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_83" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_23){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    {{-- --}}
    <td>
        <div>
            <select data-col-name="r_91" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_21){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_92" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_22){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_93" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_23){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    {{-- --}}
    <td>
        <div>
            <select data-col-name="r_101" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_21){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_102" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_22){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div>
            <select data-col-name="r_103" class="form-select form-select-sm mark-dropdown">
                @foreach ($options as $item)
                <option value="{{$item}}" @php if($item==$value->r_23){ echo "selected";} @endphp>{{$item}}</option>
                @endforeach
            </select>
        </div>
    </td>

    <td>
        <div>
            <input name="" class="form-control form-control-sm my-2" type="text" value="{{$value->position_final}}" readonly />
        </div>
    </td>
    <td>
        <div>
            <input name="" class="form-control form-control-sm my-2" type="text" value="{{$value->position_final}}" readonly />
        </div>
    </td>
    <td>
        <div>
            <input name="" class="form-control form-control-sm my-2" type="text" value="{{$value->position_final}}" readonly />
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
