@extends ('admin.layouts.main')

@section('content')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>Medici</h5>
                        <span>Sectiunea pentru adaugarea de medici in baza de date.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="../index.html"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Medic</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Adauga</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="col-lg-10">
                @if(Session::has('mesajSalvareSucces'))
                    <div class="alert bg-success alert-success text-white" role="alert">
                        {{Session::get('mesajSalvareSucces')}}
                    </div>
                @endif

            <div class="card">
                <div class="card-header">
                    <h2>Confirmare stergere</h2>
                </div>

                <div class="card-body">
                    <img src="{{ asset('images') }}/{{ $user -> image }}" alt="" width="150">
                    <h4>
                       <strong>{{ $user -> name }}</strong>
                    </h4>
                    <form class="forms-sample" action="{{route('doctor.destroy',[$user->id])}}" method="post" >
                        <!-- Metoda folosita pentru stergerea din baza de date este DELETE -->
                        @method('DELETE')
                        <!-- Tokenul csrf oferit de Laravel ne ajuta sa ne protejam aplicatia/site-ul impotriva artacurilor de tip "cross-site request forgery" -->
                        @csrf

                        <!-- Sectiunea de final cu butoane de Sterge sau Renunta --> 
                        <div class="card-footer">
                            <button type="submit" class="btn btn-danger mr-2">Confirma</button>
                            <a href="{{route('doctor.index')}}" class="btn btn-secondary">
                                Renunta
                            </a>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection