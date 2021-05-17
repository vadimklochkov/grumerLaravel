@extends('layouts.app')

@section('content')
<div class="row">
   <div class="col-2"></div>
   <div class="col-8">
       <div class="row">
        <div class="col">
            <h5 for="inputState">Выберите раздел АДМИНКИ</h5>
        </div>
        <div class="col">
        <select class="form-control"  onchange="window.location.href = this.options[this.selectedIndex].value">
          <option>Заказы</option>
          <option value="/admin">Создание категории</option>
          <option value="/admin/delete">Удаление категории</option>
        </select>
        </div>
       </div>
   </div>
   <div class="col-2"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>
                Работы
            </h1>
        </div>
                 @if(session('success'))
                    <div class="ml-5 mr-5 alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                 @if(session('error'))
                    <div class="ml-5 mr-5 alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    
    </div>
@foreach($works as $el)
<div style="width: 75%;margin-left:12%">
<div class="card w-100">
  <div class="card-header">
            <div class="text-left">
                <h6>{{ $el->customer_name }}</h6>
            </div>
  </div>
  <div class="card-body">
    <div class="card-text">
    
  <div class="form-group">
    <label class="">Кличка</label> 
    <div class="card">
      <div class="card-body">
        {{ $el->name }} 
       </div>
    </div>
    </div>
    
  <div class="form-group">
   
     <lab
     el class="">Категория</label> 
    <div class="card">
      <div class="card-body">
       
           {{ $el->category }} 
       
       </div>
    </div>
    </div>
    
  <div class="form-group">
    <label class="">Email для связи</label> 
    <div class="card">
      <div class="card-body">
        {{ $el->customer_email }} 
       </div>
    </div>
    </div>
    <div class="form-group">
    <label class="">Максимальная цена</label> 
    <div class="card">
      <div class="card-body">
        {{ $el->max_prise }}
       </div>
    </div>
    </div>
  <div class="form-group">
    <label class="">Статус</label> 
    <div class="card">
      <div class="card-body">
        {{ $el->status }} 
       </div>
    </div>
    </div>
       <form action="/worksAdmin/{{ $el->id }}" method="post" enctype="multipart/form-data">
       @csrf
        <div class="form-group">
            <label for="">Изменение статуса</label>
        </div>
        <div class="form-group">
        <select class="form-control" name="status">
          <option>---</option>
          <option>Новая</option>
          <option>Обработка данных</option>
          <option>Услуга оказана</option>
        </select>
        </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Фото отремонтированного помещения</label>
            <br>
            <div class="card">
                <div class="card-body">

             <input type="file" name="image">
                </div>
            </div>
         </div>
        <div class="form-group">
            <input type="text" name="id" maxlength="255" value="{{ $el->id }}" readonly style="display:none;">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success">Изменить статуc</button>
        </div>
        </form>
    
</div>
    
    
  <div class="form-group">
    <label for="exampleInputEmail1">Фото собаки</label><br>
    <img class="img-fluid" src="{{ asset('/storage/' . $el->image) }}" alt="">
  </div>
        
    </div>
  </div>
  </div>
</div>
<br>
</div>
@endforeach       
        </div>
@endsection
