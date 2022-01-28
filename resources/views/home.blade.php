@extends('layouts.main', ['activePage' => 'dashboard', 'titlePage' => __('Calendario')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="container">
                <div id="agenda">
                </div>
             </div>
        </div>
    </div>
</div>

@endsection
