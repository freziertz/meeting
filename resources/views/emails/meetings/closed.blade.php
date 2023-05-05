<x-mail::message>
# Meeting Published1

<x-mail::panel>
    Title: {{ $title }}
    {{-- Title: {{$title}} --}}
    venue: {{ $venue }}
</x-mail::panel>

    Description

    {{ $description}}

    Participant Notes

    {{ participants_notes }}

<x-mail::button :url="$url">
View Meeting
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
