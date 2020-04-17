<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result</title>
</head>
<body>
    <table width="100%">
        <tr>
            <td width="70%">
                <img src="{{url('assets/images/school-logo.png')}}" alt="logo" width="120px">
            </td>
            <td width="30%">
                Title: <b>{{$quiz->title}}</b><br>
                Date: {{toDateString($quiz->created_at)}}
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table width="100%">
                    <tr style="background: black; color: white">
                        <th><b>Question No.</b></th>
                        <th><b>Your Answers</b></th>
                        <th><b>Correct Answers</b></th>
                        <th><b>Result</b></th>
                    </tr>
                    @foreach($questions as $question)
                        <tr style="text-align: center">
                            <td>{{$question->question_id}}</td>
                            <td>{{$question->selected_answer}}</td>
                            <td>{{$question->question->correct_answer}}</td>
                            <td>
                                @if($question->question->correct_answer === $question->selected_answer)
                                    <strong style="color: green; font-weight: bold">Correct</strong>
                                @else
                                    <strong style="color: red; font-weight: bold;">Incorrect</strong>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Total Marks</th>
                        <th>{{$obtainMarks.'/'.$totalMarks}}</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Mark In %</th>
                        <th>{{$findPercentage}}%</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Result Status</th>
                        <th>{{$result}}</th>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
