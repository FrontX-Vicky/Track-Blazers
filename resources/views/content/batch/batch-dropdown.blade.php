<option value="">Select Batch</option>
@foreach($uploads as $key => $value)
  <option value="{{$value->id}}">{{$value->original_name}}</option>
@endforeach
