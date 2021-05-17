@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <img src="data:image/png;base64,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" alt="..." class="img-thumbnail">

        </div>
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                   <h5>Личный кабинет {{ Auth::user()->name }} </h5>
                    <br>
                            <p class="mb-0">Количество заказов: {{$you_work}}</p>
                    <br>
                            <p class="mb-3">Количество завершённых заказов: {{$end_work}}</p>
            <div class="col-12 text-center">
                <a href="/zakaz" class="btn btn-outline-success btn-lg text-dark">Оставить заказ</a>
                <a href="/zakaz/info" class="btn btn-outline-success btn-lg text-dark">Ваши заказы</a>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
           <br>
@endsection
