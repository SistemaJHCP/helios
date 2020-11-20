@extends('layouts.template')
@section('mini-cabecera')
<h1>
    Bienvenido
    <small>al sistema</small>
</h1>
<hr>
<ol class="breadcrumb">
    <li><i class=" glyphicon glyphicon-folder-open"> </i> Inicio</li>
</ol>

@endsection

@section('body')
<div class="col-md-4">
    <div style="background: white; padding:15px;">
        <p class="text-center">
            <strong>Goal Completion</strong>
        </p>

        <div class="progress-group">
            <span class="progress-text">Add Products to Cart</span>
            <span class="progress-number"><b>160</b>/200</span>

            <div class="progress sm">
            <div class="progress-bar progress-bar-aqua" style="width: 90%"></div>
            </div>
        </div>
        <!-- /.progress-group -->
        <div class="progress-group">
            <span class="progress-text">Complete Purchase</span>
            <span class="progress-number"><b>310</b>/400</span>

            <div class="progress sm">
            <div class="progress-bar progress-bar-red" style="width: 80%"></div>
            </div>
        </div>
        <!-- /.progress-group -->
        <div class="progress-group">
            <span class="progress-text">Visit Premium Page</span>
            <span class="progress-number"><b>480</b>/800</span>

            <div class="progress sm">
            <div class="progress-bar progress-bar-green" style="width: 80%"></div>
            </div>
        </div>
        <!-- /.progress-group -->
        <div class="progress-group">
            <span class="progress-text">Send Inquiries</span>
            <span class="progress-number"><b>250</b>/500</span>

            <div class="progress sm">
            <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
            </div>
        </div>
        <!-- /.progress-group -->
    </div>
</div>
<div class="col-md-8">
    trampa
</div>
@endsection
@section('js')

@endsection


