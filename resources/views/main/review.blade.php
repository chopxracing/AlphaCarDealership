@extends('main.layout')

@section('title')
    Отзывы
@endsection
@section('main_content')

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="/review/check">
        @csrf

        <input type="email" name="email" id="email" placeholder="Введите email" class="form-control">
        <input type="text" name="subject" id="subject" placeholder="Введите ваше имя" class="form-control">
        <textarea name="message" id="message" class="form-control" placeholder="Отзыв"></textarea>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>

    <h1>Все отзывы</h1>
    @foreach($reviews as $review)
        <div class="alert alert-warning">
            <h3>{{$review->subject}}</h3>
            <b>{{$review->email}}</b>
            <p>{{$review->message}}</p>
        </div>
    @endforeach
@endsection
