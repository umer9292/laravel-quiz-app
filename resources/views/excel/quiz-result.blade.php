<table width="100%">
    <tr>
        <td >
            Title: <b>{{$quiz->title}}</b>
        </td>
        <td>
            Date: {{toDateString($quiz->created_at)}}
        </td>
    </tr>
</table>
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
