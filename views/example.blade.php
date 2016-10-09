@extends('emails.templates.base')

@section('main')
    <h1>The title of the email</h1>
    <p>Lorem ipsum dolor sit amet, tibique moderatius scribentur pro an, quodsi oporteat no his, in sed idque dicit consul. Fugit soleat graeci an nec, quis adolescens sit cu.</p>
    @include('emails.templates.button', ['link' => '#', 'text' => 'Example button'])
    <p>Eu aeterno <a href="#">gubergren mei</a>, ad per quando nonumes. Est no prompta constituto. Sea no tota altera sententiae, pri suscipit atomorum urbanitas ad, quot elit sanctus eum ne.</p>
    @include('emails.templates.image', ['src' => 'http://placehold.it/350x150'])
    <p>Eu aeterno <a href="#">gubergren mei</a>, ad per quando nonumes. Est no prompta constituto. Sea no tota altera sententiae, pri suscipit atomorum urbanitas ad, quot elit sanctus eum ne.</p>
@stop

@section('footer')
    <a href="#">Unsubscribe</a> from notifications
@stop
