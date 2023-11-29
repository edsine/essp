<!-- resources/views/emails/death-claim.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Death Claim Submission</title>
</head>
<body>
    <p>Dear Employer,</p>

    <p>This is to notify you of a new death claims from ESSP portal.</p>

    <p>Details of the death claim:</p>
    <ul>
        <li>Employer Name: {{ $deathClaim->employer->contact_firstname.' '.$deathClaim->employer->contact_surname }}</li>
        <li>Employee Name: {{ $deathClaim->employee->first_name.' '.$deathClaim->employee->last_name }}</li>
        <li>Description: {{ $deathClaim->incident_description }}</li>
        <li>Last Salary: {{ $deathClaim->last_salary }}</li>
        <li>Monthly Contribution: {{ $deathClaim->monthly_contribution }}</li>
        <li>Incident Date: {{ $deathClaim->incident_date }}</li>
        <li>Incident Time: {{ $deathClaim->incident_time }}</li>
        <li>Employer Account Name: {{ $deathClaim->employer_account_name }}</li>
        <li>Employer Account Number: {{ $deathClaim->employer_account_number }}</li>
        <li>Employer Bank Name: {{ $deathClaim->employer_bank_name }}</li>
        <li>Employer Sort Code: {{ $deathClaim->employer_sort_code }}</li>
        <li>Employee Account Name: {{ $deathClaim->employee_account_name }}</li>
        <li>Employee Account Number: {{ $deathClaim->employee_account_number }}</li>
        <li>Employee Bank Name: {{ $deathClaim->employee_bank_name }}</li>
        <li>Employee Sort Code: {{ $deathClaim->employee_sort_code }}</li>
        <li>Branch Name: {{ $deathClaim->employer->branch->branch_name }}</li>
        <li><a href="{{ asset($deathClaim->document) }}" target="_blank" class="text-dark">Open PDF Document</a></li>
        <!-- Add more details as needed -->
    </ul>

    <p>Visit the url below to follow up on the claims and approve when necessary</p>

    <p><a href="https://ebs.nsitf.gov.ng/claim/death/">Claim Status</a></p>

    <p>Best regards,</p>
    <p>NSITF EBS Portal</p>
</body>
</html>
