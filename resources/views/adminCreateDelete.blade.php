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
          <option>Удаление категории</option>
          <option value="/admin">Создание категории</option>
          <option value="/worksAdmin">Заказы</option>
        </select>
        </div>
       </div>
   </div>
   <div class="col-2"></div>
</div>
    <div class="row">
        <div class="col-12 text-center">
            <h1>
                Удаление категории
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
              <th class="pl-5" scope="col">#</th>
              <th scope="col">Название категории</th>
              <th class="text-right pr-5" scope="col">Действие</th>
            </tr>
          </thead>
          <tbody>
           
@foreach($adminCreateDelete as $el)
            <tr>
              <th class="pl-5" scope="row">{{ $el->id }}</th>
              <td>{{ $el->category }}</td>
              <td class="text-right pr-5">
                <a href="/admin/delete/{{ $el->id }}" class="text-light btn btn-danger">Удалить категорию</a>
              </td>
            </tr>
@endforeach
          </tbody>
        </table>
        </div>
    </div>
@endsection
