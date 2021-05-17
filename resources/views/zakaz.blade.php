@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
       <div class="col-0 col-xl-2"></div>
        <div class="col-12 col-xl-8">
            <div class="card border-success" style="">
          <div class="card-body">
                 @isset ($path)
                 <img class="img-fluid" src="{{ asset('/storage/' . $path) }}" alt="">
                 @endisset
              <h4>Создать свой заказ</h4>
                <form action="/test" method="post" enctype="multipart/form-data">
                 @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail1">Кличка вашего животного</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Описание</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="5"></textarea>
                  </div>
                   <div class="form-group">
                    <label for="exampleFormControlTextarea1">Категория</label>
                    <select class="form-control" name="category">
@foreach($works as $el)
                      <option>{{$el->category}}</option>
@endforeach
                    </select>
                    </div>
                    
                  <div class="form-group">
                    <label for="exampleInputEmail1">Максимальная цена</label>
                    <input type="number" name="max_prise" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Фото собаки</label>
                    <br>
                    <div class="card">
                        <div class="card-body">
                            
                     <input type="file" name="image">
                        </div>
                    </div>
                 </div>
                 <button class="btn btn-success" type="submit">Отправить</button>
                </form>
          </div>
        </div>
        </div>
       <div class="col-0 col-xl-2"></div>
    </div>
</div>
@endsection