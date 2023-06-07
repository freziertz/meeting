<x-mail::message>


<x-mail::panel>
    Title: {{ $title }}
    {{-- Title: {{$title}} --}}
    venue: {{ $venue }}
</x-mail::panel>

    Description

    {{ $description}}

    Contributors Notes

    Please contribute your agenda on time

<x-mail::button :url="$url">
View Meeting
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
