@extends('home.layout')
@section('title') Employees @endsection

@section('style') 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('mainbodycontent')
<div class="container">
    <div class="mb-4">
        <h2>Employee Details</h2>
    </div>
    <div class="card shadow-lg">
        <div class="card-body">
            <div class="table-responsive"> <!-- Added table-responsive class -->
                <table id="myTable" class="table table-striped table-bordered"> <!-- Added Bootstrap table classes -->
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample rows -->
                        @foreach($getdata as $gd)
                        <tr>
                            <td>{{ $gd->id }}</td>
                            <td>{{ $gd->name }}</td>
                            <td>{{ $gd->email }}</td>
                            <td>{{ $gd->role }}</td>
                            
                        </tr>
                        @endforeach
                        
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@section('lowerlink')
<script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
<script>
    $(document).ready(function(){
        $('#myTable').DataTable();
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection

<style>
    .card-body {
        position: relative;
        width: 100%;
    }
    .card-body:hover {
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.7);
    }
</style>
@endsection
