<div style="font-family: 'Segoe UI', Tahoma, sans-serif; background-color: #ffffff; padding: 30px; color: #333333; line-height: 1.6; font-size: 16px;">

    <h2 style="font-size: 24px; margin-bottom: 15px;">Hey there 👋</h2>

    <p style="margin-bottom: 20px;">Just a quick reminder regarding your subscription:</p>

    <blockquote style="border-left: 4px solid #007BFF; padding-left: 15px; margin: 20px 0; font-style: italic; color: #444;">
  {{$description}}
    </blockquote>

    <p style="margin-bottom: 20px;">Here are some of our plans to consider:</p>

    <ul style="padding-left: 20px; margin-bottom: 20px;">
        @foreach ($plans as $plan)
            <li style="margin-bottom: 12px;">
                <a href="{{ url('/subscribe/'.$user->id ) }}" 
                   style="text-decoration: none; color: #007BFF;">
                    <strong>{{ $plan->name }}</strong>
                </a> — {{ $plan->description }}
            </li>
        @endforeach
    </ul>

    <p style="margin-top: 30px; font-size: 14px; color: #6c757d;">If you need any help or have questions, just let us know.</p>

    <p style="margin-top: 20px;">
        Cheers,<br>
        <strong>The Team at [Your Service]</strong>
    </p>
</div>
