@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Paskolos Anuitetiniu metodu mokėjimų grafikas</h2>
                    <button onclick='location.href="{{url('/home')}}"'
                        type="button"
                        class="btn btn-info float-right">
                        Grįžti į skaičiuoklę
                    </button>
                    <button type="button" name="file" class="btn btn-info" >
                        <a href="payments.csv">Parsisiųsti mokėjimų .csv failą</a></button>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                        @include('layouts.errors')
                        <table class="table table-sm table-hover">
                            @foreach ($paymentsData as $data)
                                <tr>
                                    @foreach ($data as $line)
                                        <th>{{ $line }}</th>
                                    @endforeach
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
