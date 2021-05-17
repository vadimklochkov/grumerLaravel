@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
           
<style>
p {   
  animation: blink 400ms alternate infinite;
}

@keyframes blink {
  from {
    opacity: 1;
  }
  to {
    opacity: 0;
  }
}
</style>
            <h1>
                ГрумRoom
            </h1>
        </div>
        @if(session('error'))
                    <div class="col-12 alert alert-danger">
        {{ session('error') }}
                    </div>
                    @endif
        <div class="col-12">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident suscipit nesciunt ea dolorum molestiae numquam perspiciatis unde, dolorem est facilis quam fugiat eligendi nobis consectetur, illum in ducimus ex. Minima!
            <br>
            <br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae cupiditate, obcaecati, nihil deleniti placeat nulla delectus totam velit sunt quam, unde! Non culpa iste dicta, impedit quidem, magni accusamus voluptate libero ipsum molestias quaerat totam iure fugit rem numquam harum! Dolores sit fuga adipisci eveniet assumenda similique quo numquam cumque!
            <br>
            <br>
            @guest
            <div class="col-12 text-center">
                <a href="/register" class="btn btn-outline-success btn-lg text-dark">Регистрация</a>
                <a href="/login" class="btn btn-outline-success btn-lg text-dark">Авторизация</a>
            </div>
            @else
            <div class="col-12 text-center">
                <a href="/zakaz" class="btn btn-outline-success btn-lg text-dark">Оставить заказ</a>
                <a href="/zakaz/info" class="btn btn-outline-success btn-lg text-dark">Ваши заказы</a>
            </div>
            @endguest
            <br>
            <br>
            <div class="alert alert-success text-center">
<p class="mb-1 mt-1">Всего выполнено заявок {{$col}}</p>             
            </div>
            <table class="table">
          <thead>
            <tr>
              <th class="pl-5">Завершили</th>
              <th scope="col">Клички</th>
              <th scope="col">Категория</th>
              <th scope="col">Статус</th>
              <th class="text-right pr-5" scope="col">Информация</th>
            </tr>
          </thead>
          <tbody>
@foreach($works as $el)

            <tr>
              <td class="pl-5">{{ $el->updated_at }}</td>
              <td>{{ $el->name }}</td>
              <td>{{ $el->category }}</td>
              <td>{{ $el->status }}</td>
              <td class="text-right pr-5">    
                <a href="/info/{{ $el->id }}" class="btn btn-success">Информация</a>
              </td>
            </tr>
@endforeach
        </div>
    </div>
</div>
@endsection
