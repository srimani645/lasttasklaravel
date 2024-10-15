@extends('home.layout')
@section('title')
    Tables
@endsection

@section('mainbodycontent')
<div class="container">
    <div class="row">
        <div class="col-lg-5">

    <div class="card shadow-lg mb-4"> <!-- Card wrapper -->
        <div class="card-header text-white bg-primary">
            <h5 class="mb-0">Total Login Records</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        
                        <th scope="col">Email</th>
                        <th scope="col">Login</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($totalLogins as $totallogin)
                    <tr>
                        <td>1</td>
                        <td>{{ $totallogin->email }}</td>
                        <td>{{ $totallogin->Total_Login }}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-lg-7">

    <div class="card shadow-lg mb-4"> <!-- Card wrapper -->
        <div class="card-header text-white bg-primary">
            <h5 class="mb-0">Total Login Records</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                       
                        <th scope="col">Email</th>
                        <th scope="col">Month</th>
                        <th scope="col">Logincount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($month_wise_login_count as $mwtl)
                    <tr>
                       
                        <td>{{ $mwtl->email }}</td>
                        <td>{{ $mwtl->Month_Name }}</td>
                        <td>{{ $mwtl->count }}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
@endsection
