@extends('layout')
@section('page_title')
Login
@endsection

@section('content')

  <div class="container">
  <a href="{{ route('logout')}}" class="btn btn-warning">Logout</a> <br>
    <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Make an order') }}</div>
          
            <div class="card-body">
              <form action="{{ route('order') }}" method="POST">
                @csrf
               <div class="form-group">
                 <label >Select Product</label>
                 <select class="form-control" name="product_id" id="product_id" @error('product_id') is-invalid @enderror>
                   <option value="">Choose Product</option>
                  @foreach($products as $product)
                  <option value="{{$product->id}}">{{$product->name}}-Weight: {{$product->weight}}gms-{{$product->price}}Tsh</option>
                  @endforeach

                 </select>
                 @error('product_id')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                @enderror
               </div>
               <div class="form-group">
                <label >Select Location</label>
                <select class="form-control" name="location_id" id="location_id" @error('location_id') is-invalid @enderror>
                  <option value="">Choose Location</option>
                  @foreach($locations as $location)
                  <option value="{{$location->id}}">{{$location->name}}-{{$location->price}}Tsh</option>
                  @endforeach
                </select>
                @error('location_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
               @enderror
              </div>
              <div class="form-group" >
                <label >Estimated Price</label>
              <input class="form-control"  id="total_price" name="total_price"  @error('total_price') is-invalid @enderror readonly />
              @error('total_price')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
             @enderror
              </div>
              <div class="form-group">
               
              <input type="submit" class="btn btn-primary" value="Place order"  />
              </div>
              <form>
            </div>
        </div>
    </div>    <br><br>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>Product</th>
            <th>Location</th>
            <th>Weight(gms)</th>
            <th>Total Price</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orders as $order)
          <tr>
           <td>{{ $order->product->name}}</td>
            <td>{{ $order->location->name}}</td>
            <td>{{ $order->product->weight}}</td>
            <td>{{ $order->total_price}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>    
  </div>
  <script> 
    $(document).ready(() => {
      console.log('So');
    $("#product_id").change(calc);
    $("#location_id").change(calc);
    console.log({!! str_replace("'", "\'", json_encode($products)) !!});

  function calc() {
   const products = {!! str_replace("'", "\'", json_encode($products)) !!};
   const locations = {!! str_replace("'", "\'", json_encode($locations)) !!};
   let product_price = 0;
   let location_price = 0;
  
  if($("#product_id").val() && $("#location_id").val()) {
   product_price = products.filter(data => data.id === parseInt($("#product_id").val()))[0].price;
   location_price = locations.filter(data => data.id === parseInt($("#location_id").val()))[0].price;
   
      $('#total_price').val(
          parseFloat(product_price, 10) + parseFloat(location_price , 10)
         
      );
  }
  }
 
    })
</script>
@endsection