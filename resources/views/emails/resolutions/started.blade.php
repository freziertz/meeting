<x-mail::message>


<x-mail::panel>
    Title: {{ $title }}
    {{-- Title: {{$title}} --}}

</x-mail::panel>


Voting Deadline

{{ $voting_deadline}}

Notes to voters

{{ $notes_to_voters }}

<x-mail::button :url="$url">
View Resolution
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
