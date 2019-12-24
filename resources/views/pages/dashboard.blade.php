@extends('layout')
@section('page_title')
Login
@endsection

@section('content')

  <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Make an order') }}</div>

            <div class="card-body">
               <div class="form-group">
                 <label >Select Product</label>
                 <select class="form-control">
                   <option value=""></option>
                 </select>
               </div>
               <div class="form-group">
                <label >Select Location</label>
                <select class="form-control">
                  <option value=""></option>
                </select>
              </div>
              <div class="form-group">
                <label >Select Product</label>
                <input class="form-control" />
              </div>
            </div>
        </div>
    </div>        
  </div>

@endsection