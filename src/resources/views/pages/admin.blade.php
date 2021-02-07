@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('layouts.sidemenu')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ $title }}</div>
                <div class="card-body">
                    <table class="table table-hover table-sm">
                        <thead class="table-info">
                            <tr>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($admins as $admin => $i){ ?>
                            <tr>
                                <td><?=$i->username?></td>
                                <td><?=$i->name?></td>
                                <td><?=$i->email?></td>
                                <td><?=$i->isActive == '1'?'<span class="badge badge-success">Active | Admin</span>':($i->isActive == '2'?'<span class="badge badge-success">Active | Superadmin</span>':'<span class="badge badge-warning">Inactive</span>')?></td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <button id="act" type="button" class="btn btn-outline-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                        <div class="dropdown-menu" aria-labelledby="act">
                                            <a class="dropdown-item" href="#">Details</a>
                                            <a class="dropdown-item text-danger" href="#">Deactive</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection