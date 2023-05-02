<x-mail::message>
# Meeting Published

<x-mail::panel>
    Title: {{ $title }}
    {{-- Title: {{$title}} --}}
    {{-- venue: {{$venue}} --}}
</x-mail::panel>

    Description

    {{ $description}}

<x-mail::button :url="$url">
View Meeting
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
