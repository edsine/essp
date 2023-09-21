@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
            @else
                {{-- {{ $slot }} --}}
                {{-- <img style="width: 125px !important;height: 125px !important;max-height: 125px !important;"
                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/images/NSITF-logo.png'))) }}"
                    alt="logo"> --}}
                <img style="width: 125px !important;height: 125px !important;max-height: 125px !important;"
                    src="https://essp.nsitf.gov.ng/assets/assets/images/NSITF-logo.png"
                    alt="logo">
                <p
                    style="font-size: 1.5rem; font-family: Nunito, sans-serif; font-weight: 700; line-height: 1.2; color: #364a63; padding-top: 12px; text-align: center">
                    Nigeria Social Insurance Trust Fund<br />Employer Self
                    Service Portal</p>
            @endif
        </a>
    </td>
</tr>
