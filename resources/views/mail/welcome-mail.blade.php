<x-mail::message>
# Introduction

The body of your message.

<x-mail::button :url="'http://127.0.0.1:8000/product'">
Visit Products Page
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
