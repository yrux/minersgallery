<x-app-layout>
    <x-slot name="title">
        {{$title}}
    </x-slot>
    <div class="shipping">
        <div class="row">
            <div class="col-12">
                <div class="invoice-title">
                    <h2>Invoice</h2><h3 class="pull-right">Order # {{$order->id}}</h3>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <address>
                        <strong>Billed To:</strong><br>
                            {{$order->first_name}} {{$order->last_name}}<br>
                            {{$order->address}}<br>
                            {{$order->country}}, {{$order->city}} {{$order->zip}}
                        </address>
                    </div>
                    <div class="col-6 text-right">
                        <address>
                        <strong>Shipped To:</strong><br>
                            {{$order->first_name}} {{$order->last_name}}<br>
                            {{$order->address}}<br>
                            {{$order->country}}, {{$order->city}} {{$order->zip}}
                        </address>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <address>
                            <strong>Phone and Email:</strong><br>
                            {{$order->phone}}<br>
                            {{$order->email}}
                        </address>
                    </div>
                    <div class="col-6 text-right">
                        <address>
                            <strong>Order Date:</strong><br>
                            {{date('F d, Y',strtotime($order->created_at))}}
                            <br><br>
                        </address>
                    </div>
                    @if($order->notes)
                    <div class="col-12">
                        Message: {{$order->notes}}
                    </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Order summary</strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="table table-responsive">
                            <table class="table table-condensed" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <td><strong>Item</strong></td>
                                        <td class="text-center"><strong>Price</strong></td>
                                        <td class="text-center"><strong>Quantity</strong></td>
                                        <td class="text-right"><strong>Totals</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->products as $product)
                                    <tr>
                                        <td>{{$product->product->name}}</td>
                                        <td class="text-center">${{$product->price}}</td>
                                        <td class="text-center">{{$product->qty}}</td>
                                        <td class="text-right">${{$product->rowtotal}}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td class="thick-line"></td>
                                        <td class="thick-line"></td>
                                        <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                        <td class="thick-line text-right">${{$order->order_rowtotal}}</td>
                                    </tr>
                                    @if($order->discount>0)
                                    <tr>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line text-center"><strong>Discount %</strong></td>
                                        <td class="no-line text-right">${{$order->discount}}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line text-center"><strong>Total</strong></td>
                                        <td class="no-line text-right">${{$order->order_total}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@push('css')
<style>
.text-right{
    text-align:right;
}
.shipping {
    padding: 15px;
}
</style>
@endpush
@push('js')
<script>
    
</script>
@endpush
</x-app-layout>