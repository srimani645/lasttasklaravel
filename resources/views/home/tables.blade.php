@extends('home.layout')
@section('title')
    Tables
@endsection

@section('mainbodycontent')
<div class="container">
    <h2 class="my-4 text-center">Total Login Table</h2>
    <div class="card shadow-lg mb-4"> <!-- Card wrapper -->
        <div class="card-header text-white bg-primary">
            <h5 class="mb-0">Total Login Records</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Total Login</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>mark@gmail.com</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>jack@gail.com</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>larry@gmail.com</td>
                        <td>3</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
