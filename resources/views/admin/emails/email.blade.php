<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Notify Students' Learning Results</title>
</head>
<body>
<h1>Hello: {{$user->username}}</h1><br>
@if($user->student->studentSubjects->avg('score') < 5)
    <p>You failed.Your average score is : {{number_format($user->student->studentSubjects->avg('score'),2)}} </p>
    @else
    <p>You passed .Your average score is : {{number_format($user->student->studentSubjects->avg('score'),2)}} </p>
    @endif

</body>
</html>