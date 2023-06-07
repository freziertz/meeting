<!DOCTYPE html>
<html>
<head>
    <title>Meeting Pack</title>


    <style>
        table {
           border-collapse: collapse;
        }
        .center {
            text-align: center;
        }

        td {

            vertical-align: top;
        }

        tr {

            padding-top: 10px;

       }

       ol{
        margin-bottom: 15px;
       }

       li{
        margin-bottom: 5px;
        margin-top: 5px;
       }

    </style>
</head>
<body>
    <h1 class="center">{{ $title }} <br>
        At {{ $venue }} </h1>


    <h2>Dates</h2>
    <p>
    @foreach ($schedules as $schedule)
     {{-- {{ date('d-m-Y', strtotime($schedule->meeting_date))}} --}}
     {{ Carbon\Carbon::createFromDate($schedule->meeting_date)->isoFormat('dddd, MMM d, YYYY') }}
      from {{ $schedule->meeting_start_time }} to
     {{ $schedule->meeting_end_time }} <br>
    @endforeach
    </p>

    <h2>Attendees</h2>
    <table>
        <th>No</th>
        <th>Title</th>
        <th>Name</th>
        <th>Designation</th>
        <th>Meeting Role</th>
        @foreach ($participants as $key => $participant)
        <tr>
            <td>{{ $key + 1 }}.</td>
            <td>{{ $participant->user->title }}. {{ $participant->user->first_name }} {{ $participant->user->last_name }}</td>
            <td>{{ $participant->title }}</td>
            <td>{{ $participant->meeting_role->name }}</td>

        </tr>
        @endforeach
    </table>


    <h2>Absentees</h2>

    <h2>Agenda</h2>

    <ol>
        @foreach ($agendas as $key => $agenda)

        <li>{{ $agenda->title }} will take {{ $agenda->minutes}} minutes, presented by  </li>

           <ol>
                @foreach ($documents as $key => $document)

                @if($document->agenda_id == $agenda->id)

                    <li><a href="http://localhost:8000{{$document->fullpath}}">{{ $document->name }}</a></li>

                @endif

                @endforeach

            </ol>

        @endforeach
    </ol>



    {{-- <table>
        <th>No</th>
        <th>Title</th>
        <th>Minutes</th>
        <th>Documents</th>
        @foreach ($agendas as $key => $agenda)
        <tr>
            <td>{{ $key + 1 }}.</td>
            <td>{{ $agenda->title }}</td>
            <td>{{ $agenda->minutes}}</td>
            <td>
                <table>

                    @foreach ($documents as $key => $document)
                    @if($document->agenda_id == $agenda->id)
                    <tr>
                        <td> {{$key + 1}} </td>
                        <td><a href="http://localhost:8000{{$document->fullpath}}">{{ $document->name }}</a</td>
                    </tr>
                    @endif
                    @endforeach
                </table>
            </td>
        </tr>
        @endforeach
    </table> --}}

</body>
</html>
