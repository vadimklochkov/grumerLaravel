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
          <option>Создание категории</option>
          <option value="/admin/delete">Удаление категории</option>
          <option value="/worksAdmin">Заказы</option>
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
                Создание новой категории
            </h1>
        </div>
        <div class="col-2">
            
        </div>
        <div class="col-8">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
            <div class="card border-success">
              <div class="card-body">
                  <form href="/admin" method="post">
                  @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail1">Название категории</label>
                    <input type="text" name="category" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                    <small id="emailHelp" class="form-text text-muted">Выберите название категории для добавления.</small>
                  </div>
                  <button type="submit" class="btn btn-success">Добавить</button>
                </form>
              </div>
            </div>
        </div>
        <div class="col-2">
            
        </div>
    </div>
</div>
@endsection
