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
        <li>Employer Name: {{ $diseaseClaim->employer->contact_firstname.' '.$diseaseClaim->employer->contact_surname }}</li>
        <li>Employee Name: {{ $diseaseClaim->employee->first_name.' '.$diseaseClaim->employee->last_name }}</li>
        <li>Nature Of Work: {{ $diseaseClaim->nature_of_work }}</li>
        <li>Nature Of Disease: {{ $diseaseClaim->nature_of_disease }}</li>
        <li>Disease Diagnosed Date: {{ $diseaseClaim->date_disease_diagnosed }}</li>
        <li>Nature Of Injury: {{ $diseaseClaim->nature_of_injury }}</li>
        <li>Exposure Year: {{ $diseaseClaim->exposure_years }}</li>
        <li>Exposure Month: {{ $diseaseClaim->exposure_months }}</li>
        <li>Exposure Day: {{ $diseaseClaim->exposure_days }}</li>
        <li>Accident Report Date: {{ $diseaseClaim->accident_report_date }}</li>
        <li>Course Of Work: {{ $diseaseClaim->course_of_work }}</li>
        <li>Employment Year: {{ $diseaseClaim->employment_years }}</li>
        <li>Employment Month: {{ $diseaseClaim->employment_months }}</li>
        <li>Former Employer: {{ $diseaseClaim->former_employers }}</li>
        <li>Medical First Name: {{ $diseaseClaim->medical_first_name }}</li>
        <li>Medical Last Name: {{ $diseaseClaim->medical_last_name }}</li>
        <li>Medical Practice Number: {{ $diseaseClaim->medical_practice_number }}</li>
        <li>Branch Name: {{ $diseaseClaim->employer->branch->branch_name }}</li>
        <li><a href="{{ asset($diseaseClaim->document) }}" target="_blank" class="text-dark">Open PDF Document</a></li>
        <!-- Add more details as needed -->
    </ul>

    <p>Visit the url below to follow up on the claims and approve when necessary</p>

    <p><a href="https://ebs.nsitf.gov.ng/claim/disease/">Claim Status</a></p>

    <p>Best regards,</p>
    <p>NSITF EBS Portal</p>
</body>
</html>
