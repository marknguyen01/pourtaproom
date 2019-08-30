<html>
	<head>
        <style>
            .button {
                border: 2px solid #5C5C5D;
                background-color: transparent;
                color: #5C5C5D;
                width: 200px;
                display: inline-block;
                text-align: center;
                padding: 12px 0;
                margin-right: 24px;
                text-decoration: none;
                transition: background-color 0.75s ease-in, border-color 0.75s ease, color 0.75s ease;
            }
            .button:hover {
                border-color: #B10000;
                color: #B10000;
            }
        </style>
    </head>
	<body>
        <p><strong>By:</strong> {{ $first_name . ' ' . $last_name }}</p>
        @if($company)
        <p><strong>Company:</strong> {{ $company }}</p>
        @endif
        <p><strong>Date and Time:</strong> {{ (new DateTime($date_time))->format('M-d-y h:i A') }}</p>
        <p><strong>Estimated Number of People:</strong> {{ $num_people }}</p>
        <p><strong>Event Type:</strong> {{ $event }}</p>
        @if($catering)
        <p><strong>Catering Needs:</strong> {{ $catering }}</p>
        @endif

        <a class="button" href="mailto:{{ $email }}">EMAIL</a>
        <a class="button" href="tel:{{ $phone_number }}">PHONE</a>
	</body>
</html>
