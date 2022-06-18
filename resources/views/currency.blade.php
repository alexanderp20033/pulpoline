<!DOCTYPE html>
<html>
<head>
<title>Conversor de moneda Edwin Peña</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sistema de conversion de monedas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<div class="container mt-5">
<div class="card">
<div class="card-header">
Sistema de conversion de monedas
</div>
<div class="card-body">
<form id="currency-exchange-rate" action="#" method="post" class="form-group">
<div class="row mb-3">
<div class="col-md-4">
<input type="text" name="amount" class="form-control" value="1">
            </div>
                    <div class="col-md-4">
                            <select name="from_currency" class="form-control">
                                <option value='AUD'>AUD</option>
                                <option value='BGN'>BGN</option>
                                <option value='BRL'>BRL</option>
                                <option value='CAD'>CAD</option>
                            </select>
                     </div>


                    <div class="col-md-4">
                        <select name="to_currency" class="form-control">
                            <option value='AUD'>AUD</option>
                            <option value='BGN'>BGN</option>
                            <option value='BRL'>BRL</option>
                            <option value='CAD'>CAD</option>
                    </select>
            </div>
</div>
            <div class="row">
                <div class="col-md-4">
                <input type="submit" name="submit" id="btnSubmit" class="btn btn-success " value="Convertir">
                </div>
            </div>
</form>
</div>
<div class="card-footer">

</div>
</div>
</div>
            </div>
        </div>
    </div>
</x-app-layout>




<script>
$(document).ready(function () {
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$("#btnSubmit").click(function (event) {
//stop submit the form, we will post it manually.
event.preventDefault();
// Get form
var form = $('#currency-exchange-rate')[0];
// Create an FormData object
var data = new FormData(form);
// disabled the submit button
$("#btnSubmit").prop("disabled", true);
$.ajax({
type: "POST",
url: "{{ url('currency') }}",
data: data,
processData: false,
contentType: false,
cache: false,
timeout: 800000,
success: function (data) {
$("#output").html(data);
$("#btnSubmit").prop("disabled", false);
},
error: function (e) {
$("#output").html(e.responseText);
console.log("ERROR : ", e);
$("#btnSubmit").prop("disabled", false);
}
});
});
});
</script>
</body>
</html>
