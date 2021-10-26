<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Factura {{ $order->id }}</title>
    
    <style>
          
  .clearfix:after {
    content: "";
    display: table;
    clear: both;
  }

  a {
    color: #0087C3;
    text-decoration: none;
  }

  body {
    position: relative;
    width: 18cm;  
    height: 29.7cm; 
    margin: 0 auto; 
    color: #555555;
    background: #FFFFFF; 
    font-family: Arial, sans-serif; 
    font-size: 14px; 
    font-family: SourceSansPro;
  }

  header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #AAAAAA;
  }

  #logo {
    float: left;
    margin-top: 8px;
  }

  #logo img {
    height: 70px;
  }

  #company {
    text-align: right;
  }


  #details {
    margin-bottom: 50px;
  }

  #client {
    padding-left: 6px;
    border-left: 6px solid #0087C3;
    float: left;
  }

  #client .to {
    color: #777777;
  }

  h2.name {
    font-size: 1.4em;
    font-weight: normal;
    margin: 0;
  }

  #invoice {
    text-align: right;
  }

  #invoice h1 {
    color: #025e85;
    font-size: 1.9em;
    line-height: 1em;
    font-weight: normal;
    margin: 0  0 10px 0;
  }

  #invoice .date {
    font-size: 1.1em;
    color: #777777;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px;
  }

  table th,
  table td {
    padding: 15px;
    background: #EEEEEE;
    text-align: center;
    border-bottom: 1px solid #FFFFFF;
  }

  table th {
    white-space: nowrap;        
    font-weight: normal;
  }

  table td {
    text-align: right;
  }

  table td h3{
    color: #397e11;
    font-size: 1.2em;
    font-weight: normal;
    margin: 0 0 0.2em 0;
  }

  table .no {
    color: #FFFFFF;
    font-size: 1.2em;
    background: #599437;
  }

  table .desc {
    text-align: left;
  }

  table .unit {
    background: #DDDDDD;
  }

  table .qty {
  }

  table .total {
    background: #599437;
    color: #FFFFFF;
  }

  table td.unit,
  table td.qty,
  table td.total {
    font-size: 1.2em;
  }

  table tbody tr:last-child td {
    border: none;
  }

  table tfoot td {
    padding: 7px 20px;
    background: #FFFFFF;
    border-bottom: none;
    font-size: 1.2em;
    white-space: nowrap; 
    border-top: 1px solid #AAAAAA; 
  }

  table tfoot tr:first-child td {
    border-top: none; 
  }

  table tfoot tr:last-child td {
    color: #3c771b;
    font-size: 1.4em;
    border-top: 1px solid #57B223; 

  }

  table tfoot tr td:first-child {
    border: none;
  }

  #thanks{
    font-size: 2em;
    margin-bottom: 50px;
  }

  #notices{
    padding-left: 6px;
    border-left: 6px solid #0087C3;  
  }

  #notices .notice {
    font-size: 1.2em;
  }

  footer {
    color: #777777;
    width: 100%;
    height: 30px;
    position: absolute;
    bottom: 0;
    border-top: 1px solid #AAAAAA;
    padding: 8px 0;
    text-align: center;
  }


</style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{ asset('img/logo-fruitcas.jpg') }}">
      </div>
      <div id="company">
        <h2 class="name">ASOCIACIÓN DE PRODUCTORES DE CASANARE</h2>
        <div>FruitCas Tauramena Casanare Carrera 8 # 5 - 40 Barrio Palmarito</div>
        <div>Tel: (+57) 311 290 99 87</div>
        <div>NIT: 9001638721</div>
        <div><a href="mailto:yimh_87@hotmail.com">yimh_87@hotmail.com</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">FACTURA A:</div>
          <h2 class="name">{{$order->contact}}</h2>

          @if ($order->envio_type == 1)
            <div>Los productos deben ser recogidos en tienda</div>
            <div>FruitCas Tauramena Casanare Carrera 8 # 5 - 40 Barrio Palmarito</div>
          @else
            <div>Los productos seran enviados a:</div>
            <div>{{$envio->department}} - {{$envio->city}} - {{$envio->district}} - {{{$envio->address}}}</div>
          @endif

          <div class="address">Tel: {{$order->phone}}</div>
          <div class="email"><a href="mailto:{{$order->user->email}}">{{$order->user->email}}</a></div>

        </div>
        <div id="invoice">
          <h1>FACTURA No FE{{ $order->id }}</h1>
          <div class="date">Fecha de pago: {{$order->created_at->format('d/m/Y')}}</div>
          <div class="date">Hora: {{$order->updated_at->format('g:i A')}}</div>
          @if ($order->efectivo <> NULL)
          <div>Metodo de Pago: Efectivo</div>
          @else
          <div>Metodo de Pago: Contado</div>
          @endif   
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">Ref.</th>
            <th class="desc">DESCRIPCIÓN</th>
            <th class="unit">PRECIO UNITARIO</th>
            <th class="qty">CANTIDAD</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)    
                <tr>
                    <td class="no">{{$item->id}}</td>
                    <td class="desc"><h3>{{$item->name}}</h3></td>
                    <td class="unit">$ {{number_format(($item->price / 1.19), 0, '', '.')}}</td>
                    <td class="qty" style="text-align: center">{{$item->qty}}</td>
                    <td class="total">$ {{number_format((($item->price * $item->qty) / 1.19), 0, '', '.')}} COP</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td>$ {{number_format((($order->total - $order->shipping_cost) / 1.19), 0, '', '.')}} COP</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">IVA 19%</td>
            <td>$ {{number_format(($order->total - $order->total / 1.19), 0, '', '.')}} COP</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">Descuentos</td>
            <td>$ {{number_format(($order->discount), 0, '', '.')}} COP</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">Recargos</td>
            <td>$ {{number_format(($order->surcharge), 0, '', '.')}} COP</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">TOTAL</td>
            <td>$ {{number_format(($order->total - $order->shipping_cost), 0, '', '.')}} COP</td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">¡Gracias por su Compra!</div>
      <div id="notices">
        <div>NOTA:</div>
        <div class="notice">La siguiente cuenta como comprobante de pago de sus productos.</div>
      </div>
    </main>
    <footer>
        La factura se creó en una computadora y es válida sin la firma y el sello.
    </footer>
  </body>
</html>