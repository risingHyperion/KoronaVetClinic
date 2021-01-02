@extends('admin.layouts.main')

@section('content')

<!-- Pentru realizarea acestui blade am folosit codul din /public/template/pages/table-datatable.html -->
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-inbox bg-blue"></i>
                <div class="d-inline">
                    <h5>Medici</h5>
                    <span>Mai jos puteti gasi lista cu toti medicii nostri</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.html"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Medici</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Tabel</li>
                </ol>
            </nav>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h3>Lista medici</h3></div>
            <div class="card-body">
                <table id="data_table" class="table">
                    <thead>
                        <tr>
                            <th>Nume intreg</th>
                            <th class="nosort">Avatar</th>
                            <th>Adresa email</th>
                            <th>Adresa domiciliu</th>
                            <th>Numar de telefon</th>
                            <th>Specializare</th>
                            <th>Rol</th>
                            <th>Gen</th>
                            <th class="nosort">&nbsp;</th>
                            <th class="nosort">&nbsp;</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($users)>0)
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user -> name }}</td>
                                <td><img src="{{ asset('images') }}/{{ $user -> image }}" class="table-user-thumb" alt=""></td>
                                <td>{{ $user -> email }}</td>
                                <td>{{ $user -> address }}</td>
                                <td>{{ $user -> phone_number }}</td>
                                <td>{{ $user -> department }}</td>
                                <td>
                                    <p class="badge badge-pill badge-dark">
                                        {{ $user -> role -> name }}
                                    </p>
                                </td>
                                <td>{{ $user -> gender }}</td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{route('doctor.edit',[$user->id])}}"><i class="ik ik-edit-2"></i></a>
                                        
                                        <a href="{{route('doctor.show',[$user->id])}}"><i class="ik ik-trash-2"></i>
                                        </a>
                                    </div>
                                </td>
                                <td>x</td>
                            </tr>
                        @endforeach
                        @else
                            <td>Nu avem nicio persoana de afisat.</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection