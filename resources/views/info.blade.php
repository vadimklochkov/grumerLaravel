@extends('layouts.app')

@section('content')
@include('style')
<div class="row">
   <div class="col-2"></div>
   <div class="col-8">
   </div>
   <div class="col-2"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            
        </div>
                
                    
    </div>
@foreach($works as $el)
<div style="width: 75%;margin-left:12%">
<div class="card w-100">
  <div class="card-header">
            <div class="text-left">
                <h6>Информация о выполненной работе</h6>
            </div>
  </div>
  <div class="card-body">
    <div class="card-text">
    
  <div class="form-group">
    <label class="">Статус</label> 
    <div class="card">
      <div class="card-body">
        {{ $el->status }} 
       </div>
    </div>
    </div>
  <div class="form-group">
    <label class="">Кличка</label> 
    <div class="card">
      <div class="card-body">
        {{ $el->name }} 
       </div>
    </div>
    </div>
    
  <div class="form-group">
   
     <label class="">Категория</label> 
    <div class="card">
      <div class="card-body">
       
           {{ $el->category }} 
       
       </div>
    </div>
    </div>
    
    
</div>
    
    <div class="bid-photo-block mt-10">
        <div class="bid-carousel">
            <img class="bid-photo disp-block w-100" src="{{ asset('/storage/' . $el->image) }}" alt="">
            <img class="bid-photo disp-block w-100" src="{{ asset('/storage/' . $el->image_gotovo) }}" alt="">
        </div>
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
