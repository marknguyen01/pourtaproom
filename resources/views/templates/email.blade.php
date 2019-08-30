<html>
	<head>
        <style>
            .button {
                border: 2px solid #5C5C5D;
                background-color: transparent;
                color: #5C5C5D;
                width: 100%;
            }
        </style>
    </head>
	<body>
        <p>By: {{ $first_name . ' ' . $last_name }}</p>
        @if($company)
        <p>Company: {{ $company }}</p>
        @endif
        <p>Date and Time: {{ $date_time }}</p>
        <p>Estimated Number of People: {{ $num_people }}</p>
        <p>Event Type: {{ $event }}</p>
        @if($catering)
        <p>Catering Needs: {{ $catering }}</p>
        @endif

        <a class="button" href="mailto:{{ $email }}">EMAIL</a>
        <a class="button" href="tel:{{ $phone_number }}">PHONE</a>
	</body>
</html>