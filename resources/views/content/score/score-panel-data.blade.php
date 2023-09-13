@foreach($data as $key => $value)
<tr data-row-id="{{$value->id}}">
    <th scope="row">1</th>
    <td>{{$value->athlete_uid}}</td>
    <td>{{$value->fname.' '.$value->lname}}</td>
    <td>
        <div>
            <input id="r_1_{{$value->id}}" name="r_1" class="form-control form-control-sm my-2" type="text"  value="{{$value->r_1}}"/>
        </div>
        <div>
            <select id="smallSelect" class="form-select form-select-sm">
                <option value="" selected>Mark</option>
                <option value="X">X</option>
                <option value="-">-</option>
                <option value="DNS">DNS</option>
                <option value="r">r</option>
            </select>
        </div>
    </td>
    <td>
        <div>
            <input id="r_2_{{$value->id}}" name="r_2"  class="form-control form-control-sm my-2" type="text"  value="{{$value->r_2}}" />
        </div>
        <div>
            <select id="smallSelect" class="form-select form-select-sm">
                <option value="" selected>Mark</option>
                <option value="X">X</option>
                <option value="-">-</option>
                <option value="DNS">DNS</option>
                <option value="r">r</option>
            </select>
        </div>
    </td>
    <td>
        <div>
            <input id="r_3_{{$value->id}}" name="r_3" class="form-control form-control-sm my-2" type="text"  value="{{$value->r_3}}" />
        </div>
        <div>
            <select id="smallSelect" class="form-select form-select-sm">
                <option value=""selected>Mark</option>
                <option value="X">X</option>
                <option value="-">-</option>
                <option value="DNS">DNS</option>
                <option value="r">r</option>
            </select>
        </div>
    </td>
    <td>
        <div>
            <input name="" class="form-control form-control-sm my-2" type="text"  value="{{$value->best_3}}" readonly/>
        </div>
        {{-- <div>
            <select id="smallSelect" class="form-select form-select-sm">
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
            <select id="smallSelect" class="form-select form-select-sm">
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
            <input id="r_4_{{$value->id}}" name="r_4" class="form-control form-control-sm my-2" type="text"  value="{{$value->r_4}}" />
        </div>
        <div>
            <select id="smallSelect" class="form-select form-select-sm">
                <option value=""selected>Mark</option>
                <option value="X">X</option>
                <option value="-">-</option>
                <option value="DNS">DNS</option>
                <option value="r">r</option>
            </select>
        </div>
    </td>
    <td>
        <div>
            <input id="r_5_{{$value->id}}" name="r_5" class="form-control form-control-sm my-2" type="text"  value="{{$value->r_5}}" />
        </div>
        <div>
            <select id="smallSelect" class="form-select form-select-sm">
                <option value=""selected>Mark</option>
                <option value="X">X</option>
                <option value="-">-</option>
                <option value="DNS">DNS</option>
                <option value="r">r</option>
            </select>
        </div>
    </td>
    <td>
        <div>
            <input name="" class="form-control form-control-sm my-2" type="text"  value="{{$value->best_5}}" readonly/>
        </div>
        {{-- <div>
            <select id="smallSelect" class="form-select form-select-sm">
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
            <select id="smallSelect" class="form-select form-select-sm">
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
          <input id="r_6_{{$value->id}}" name="r_6" class="form-control form-control-sm my-2" type="text"  value="{{$value->r_6}}" />
      </div>
      <div>
          <select id="smallSelect" class="form-select form-select-sm">
              <option value=""selected>Mark</option>
              <option value="X">X</option>
              <option value="-">-</option>
              <option value="DNS">DNS</option>
              <option value="r">r</option>
          </select>
      </div>
  </td>
  <td>
      <div>
          <input  name="" class="form-control form-control-sm my-2" type="text"  value="{{$value->best_all}}" readonly/>
      </div>
      {{-- <div>
          <select id="smallSelect" class="form-select form-select-sm">
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
          <select id="smallSelect" class="form-select form-select-sm">
              <option value=""selected>Mark</option>
              <option value="X">X</option>
              <option value="-">-</option>
              <option value="DNS">DNS</option>
              <option value="r">r</option>
          </select>
      </div> --}}
  </td>
</tr>
@endforeach
<script>
      $("input").on("focusout", function(event) {
            var row_id = $(this).closest('tr').data('row-id');
            const CSRF = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "/score/update-score",
                type: 'POST',
                data: {
                    col: event.target.name,
                    val: event.target.value,
                    row_id
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
