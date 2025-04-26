
<h2>{{$msg->subject}}</h2>



<p>
<a href="{{ route('instructor.courses.show',[$msg->course->slug]) }}">{{ $msg->body }}</a>
</p>

