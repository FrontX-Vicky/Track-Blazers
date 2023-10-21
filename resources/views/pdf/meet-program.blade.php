<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <style>
    table{
      width: 100%;
    }
    #data_table table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
    #data_table th,#data_table td {
      padding: 15px;
    }
    .page-break {
            page-break-after: always;
        }

  </style>
</head>

<body>
  <header>
      <table>
        <tbody>
          <tr><td style="width: 100px; height:70px">{{$header['date']}}<br>{{$header['time']}}</td><td style="border: 2px solid black;text-align:center"><h2>Sample Data</h2></td></tr>
          <tr><td colspan="2" style="text-align:center;"><u><h4>Meet Program</h4></u></td></tr>
        </tbody>
      </table>
  </header>
  <main>
        @php
          $count = 1;
        @endphp
        @foreach ($events_rounds as $event_name => $rounds)
            @foreach ($rounds as $round => $date_time)
             Event : {{$event_name}}<br>
             Round : {{$round}}<br>
                @foreach($date_time as $time => $athletes)
                 Time : {{$time}}<br><br>
                  <table id="data_table">
                  <thead><tr>
                    <th>Sr. No.</th>
                    <th>UID</th>
                    <th>NAME</th>
                    <th>AFFILIATION</th>
                    <th>SEEDING</th>
                  </tr></thead>

                  @foreach($athletes as $athlete)
                    <tr>
                      <td>{{$count}}</td>
                      <td>{{$athlete['athlete_uid']}}</td>
                      <td>{{$athlete['fname']}} {{$athlete['lname']}}</td>
                      <td>{{$athlete['affiliation']}}</td>
                      <td>NT</td>
                    </tr>
                    @php
                      $count++;
                    @endphp
                  @endforeach
                </table>
                @endforeach
                <br><br>
                <div class="page-break"></div>
            @endforeach

        @endforeach

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>
