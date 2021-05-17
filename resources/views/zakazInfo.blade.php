@extends('layouts.app')

@section('content')
<div class="row">
   <div class="col-2"></div>
   <div class="col-8">
       <div class="row">
        <div class="col">
            <h5 for="inputState">Сортировать:</h5>
        </div>
        <div class="col">
        <select class="form-control"  onchange="window.location.href = this.options[this.selectedIndex].value">
      <option>---</option>
      <option>Все</option>
      <option>Новая</option>
      <option>Обработка данных</option>
      <option>Услуга оказана</option>
        </select>
        </div>
       </div>
   </div>
   <div class="col-2"></div>
</div>
    <div class="row">
        <div class="col-12 text-center">
            <h1>
                Ваши работы
            </h1>
            
                @if(session('success'))
                    <div class="ml-5 mr-5 alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
        </div>
        <div class="col-12">
         <table class="table">
          <thead>
            <tr>
              <th class="pl-5">Описание</th>
              <th scope="col">Кличка</th>
              <th scope="col">Категория</th>
              <th scope="col">Статус</th>
              <th class="text-right pr-5" scope="col">Действие</th>
            </tr>
          </thead>
          <tbody>
      
@foreach($works as $el)

            <tr>
              <td class="pl-5">{{ $el->description }}</td>
              <td>{{ $el->name }}</td>
              <td>{{ $el->category }}</td>
              <td>{{ $el->status }}</td>
              <td class="text-right pr-5">
<form method="get" action="/zakaz/delete/{{ $el->id }}" class="remove_order" onSubmit="return confirm('Вы уверены, что хотите удалить заявку?');">
 <input name="removeitem" type="hidden" value="1">
 <input type="submit" class="text-light btn btn-danger" value="Удалить заказ">
 </form>
<!--                <a href="/zakaz/delete/{{ $el->id }}" class="text-light btn btn-danger">Удалить</a>-->
              </td>
            </tr>
@endforeach
          </tbody>
        </table>
        </div>
    </div>
@endsection
