@component('mail::message')
# Sveiki

Dėkojame už užsakymą.

Užsakymo nr. {{$order['order']['order_reference']}} užsakymo data {{$order['order']['created_at']}}

---

# Prekės ( Kainos pateiktos su PVM )**

@component('mail::table')
| *Kodas*                                                                                | *Pavadinimas*        | *Kiekis*               | *Kaina*                                       | *Viso*                                                           |
| -------------------------------------------------------------------------------------- |:--------------------:|:----------------------:|:---------------------------------------------:|-----------------------------------------------------------------:|
@foreach($order['order']['products'] as $product)
| [{{$product['reference']}}](http://rm-autodalys.eu/products/{{$product['reference']}}) | {{$product['name']}} | {{$product['amount']}} | {{round($product['price']*1.21,2)}} EUR / vnt | {{round($product['price']*1.21 * $product['amount'],2)}} EUR     |
@endforeach
@endcomponent



Transportas ({{$order['order']['delivery']['name']}}): {{$order['order']['delivery']['price']}} EUR

Mokėjimas ({{$order['order']['payment']['name']}}): {{$order['order']['payment']['price']}} EUR

Pardavimo dokumentas: {{$order['order']['type_doc']}}

# Bendra užsakymo suma:	                {{$order['order']['total']}} EUR

---

**Kliento duomenys**

{{$order['order']['company']}}

Adresas: {{$order['order']['user']->address->country->name}}, {{$order['order']['user']->address->city->name}}, @if(isset($order['order']['user']->address->street)){{$order['order']['user']->address->street.' '.$order['order']['user']->address->building}}@endif, {{$order['order']['user']->address->post_code}}

@if(isset($order['order']['user']->address->phone))Telefonas: {{$order['order']['user']->address->phone}}@endif

E-mail: {{$order['order']['user']->email}}

@endcomponent
