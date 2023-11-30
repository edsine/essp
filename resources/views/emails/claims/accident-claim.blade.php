<!-- resources/views/emails/disease-claim.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Disease Claim Submission</title>
</head>
<body>
    <p>Dear Employer,</p>

    <p>This is to notify you of a new disease claims from ESSP portal.</p>

    <p>Details of the death claim:</p>
    <ul>
        <li>Employer Name: {{ $accidentClaim->employer->contact_firstname.' '.$accidentClaim->employer->contact_surname }}</li>
        <li>Employee Name: {{ $accidentClaim->employee->first_name.' '.$accidentClaim->employee->last_name }}</li>
        <li>Accident Date: {{ $accidentClaim->accident_date }}</li>
        <li>Accident Time: {{ $accidentClaim->accident_time }}</li>
        <li>Accident Town: {{ $accidentClaim->accident_town }}</li>
        <li>Accident Report Date: {{ $accidentClaim->accident_report_date }}</li>
        <li>Accident Report Time: {{ $accidentClaim->accident_report_time }}</li>
        <li>Employee Earning: {{ $accidentClaim->employee_earning }}</li>
        <li>Employee Task: {{ $accidentClaim->employee_task }}</li>
        <li>Nature Of Injury: {{ $accidentClaim->nature_of_injury }}</li>
        <li>Course Of Work: {{ $accidentClaim->course_of_work }}</li>
        <li>First Aid Given: {{ $accidentClaim->first_aid_given }}</li>
        <li>Medical First Name: {{ $accidentClaim->medical_first_name }}</li>
        <li>Medical Last Name: {{ $accidentClaim->medical_last_name }}</li>
        <li>Medical Practice Number: {{ $accidentClaim->medical_practice_number }}</li>
        <li>Branch Name: {{ $accidentClaim->employer->branch->branch_name }}</li>
        <li><a href="{{ asset($accidentClaim->document) }}" target="_blank" class="text-dark">Open PDF Document</a></li>
        <!-- Add more details as needed -->
    </ul>

    <p>Visit the url below to follow up on the claims and approve when necessary</p>

    <p><a href="https://ebs.nsitf.gov.ng/claim/disease/">Claim Status</a></p>

    <p>Best regards,</p>
    <p>NSITF EBS Portal</p>
</body>
</html>
