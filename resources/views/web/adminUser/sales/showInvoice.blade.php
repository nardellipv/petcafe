@extends('layouts.mainAdminSite')

@section('content')
<div class="page-content">

    <div class="card radius-10">
        <div class="card-body">
            <div class="row row-cols-auto g-3">
                <div class="col">
                    <button type="button" onclick="printCertificate()" class="btn btn-sm btn-primary px-5"><i class='bx bx-printer mr-1'></i>Imprimir Recibo</button>
                </div>
                @if($invoiceInfo->client_id != 0)
                <div class="col">
                    <a href="{{ route('invoiceClient.mail', ['idInvoice'=>$invoiceInfo->invoice, 'idClient'=>$invoiceInfo->client_id, 'total'=>$invoiceTotal]) }}" type="button" class="btn btn-sm btn-primary px-5"><i class='bx bx-mail-send mr-1'></i>Enviar por email</a>
                </div>
                @endif
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-body" id="certificate">
            <div id="invoice">
                <div class="invoice overflow-auto">
                    <div style="min-width: 600px">
                        <header>
                            <div class="row">
                                <div class="col">
                                    <img src="assets/images/logo-icon.png" width="80" alt="" />
                                </div>
                                <div class="col company-details">
                                    <h2 class="name">
                                        {{ $invoiceInfo->shop->name }}
                                    </h2>
                                    <div>{{ $invoiceInfo->shop->address }}</div>
                                    <div>{{ $invoiceInfo->shop->phone }}</div>
                                    <div>{{ $invoiceInfo->shop->user->email }}</div>
                                </div>
                            </div>
                        </header>
                        <main>
                            <div class="row contacts">
                                <div class="col invoice-to">
                                    <div class="text-gray-light">Recibo para:</div>
                                    @if($invoiceInfo->client_id != 0)
                                    <h2 class="to">{{ $invoiceInfo->client->name }}</h2>
                                    <div class="address">{{ $invoiceInfo->client->address }}</div>
                                    <div class="address">{{ $invoiceInfo->client->city->name }}</div>
                                    <div class="email">{{ $invoiceInfo->client->email }}</div>
                                    @else
                                    <h5><small>Venta sin Cliente registrado</small></h5>
                                    @endif
                                    <div class="col invoice-details">
                                        <h4 class="invoice-id"># {{ $invoiceInfo->invoice }}</h4>
                                        <div class="date">Fecha Recibo: {{ \Carbon\Carbon::parse($invoiceInfo->create_at)->format('d/m/Y') }}</div>
                                        <br>
                                    </div>
                                </div>
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="text-center">Cantidad</th>
                                            <th class="text-left">Producto</th>
                                            <th class="text-left">Descripción</th>
                                            <th class="text-right">Precio Unitario</th>
                                            <th class="text-right">TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($invoiceProducts as $sale)
                                        <tr>
                                            <td class="text-center">{{ $sale->quantity }}</td>
                                            <td class="text-left">
                                                <h3>{{ $sale->product->name }}</h3>
                                            </td>
                                            <td>
                                                {{ $sale->product->description }}
                                                <p><em><small>{{ $sale->comment }}</small></em></p>
                                            </td>
                                            <td class="unit">${{ $sale->sellPrice / $sale->quantity }}</td>
                                            <td class="total">${{ $sale->sellPrice }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2">SUBTOTAL</td>
                                            <td>${{ $invoiceTotal }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </main>
                        <footer>Documento no válido como Factura.</footer>
                    </div>
                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
        function printCertificate() {
        const printContents = document.getElementById('certificate').innerHTML;
        const originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
@endsection