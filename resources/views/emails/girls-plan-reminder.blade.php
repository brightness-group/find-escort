@component('mail::message')

Hello {{ $details->username }}, Thank for your trust, we are happy working with you.<br>
Your FindHer subscription will expire soon the {{ $details->plan_expiry }}.<br>
You can log into renew your subscription or contact us directly by what’s app +41 79 260 18 87.<br>
Stay safe, have a good day<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent