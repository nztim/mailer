@extends('emails.templates.responsive.base')

@section('main')
    @include('emails.templates.responsive._title', ['title' => 'The title of the email'])
    @include('emails.templates.responsive._body', ['content' => 'Lorem ipsum dolor sit amet, tibique moderatius scribentur pro an, quodsi oporteat no his, in sed idque dicit consul. Fugit soleat graeci an nec, quis adolescens sit cu.'])
    @include('emails.templates.responsive._button', ['link' => '#', 'text' => 'Example button'])
    @include('emails.templates.responsive._body', ['content' => 'Lorem ipsum dolor sit amet, tibique moderatius scribentur pro an, quodsi oporteat no his, in sed idque dicit consul. Fugit soleat graeci an nec, quis adolescens sit cu.'])
    @include('emails.templates.responsive._image', ['src' => 'http://placehold.it/350x150', 'alt' => 'An image', 'width' => '350', 'height' => '150'])
    @include('emails.templates.responsive._body', ['content' => 'Lorem ipsum dolor sit amet, tibique moderatius scribentur pro an, quodsi oporteat no his, in sed idque dicit consul. Fugit soleat graeci an nec, quis adolescens sit cu.'])
@stop

@section('footer')
    <a href="https://google.com">Unsubscribe</a> from notifications
@stop
