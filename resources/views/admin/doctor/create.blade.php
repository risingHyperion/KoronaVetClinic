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
                    <h2>Adauga un medic</h2>
                </div>

                <div class="card-body">

                    <!-- Formularul trebuie sa salveze datele introduse in baza de date, deci la action vom avea doctor.store -->
                    <!-- Metoda folosita pentru salvarea in baza de date este POST -->
                    <!-- multipart/form-data este necesar deoarece dorim sa facem upload pentru un fisier de tip imagine -->
                    <form enctype="multipart/form-data" method="POST" action="{{ route('doctor.store') }}" class="forms-sample">

                        <!-- Tokenul csrf oferit de Laravel ne ajuta sa ne protejam aplicatia/site-ul impotriva artacurilor de tip "cross-site request forgery" -->
                        @csrf

                        <!-- Sectiunea pentru numele si adresa de email a doctorului -->
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Nume complet</label>
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control @error('name') is valid @enderror" placeholder="ex: Ion Popescu">

                                <!-- Functia de validare pentru nume -->
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label for="">Adresa email</label>
                                <input type="email" value="{{ old('email') }}" name="email" class="form-control  @error('email') is valid @enderror" placeholder="ex: ion.popescu@gmail.com">
                                <br>

                                <!-- Functia de validare pentru email -->
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Sectiunea pentru parola si gen -->
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Parola</label>
                                <input type="password" value="{{ old('password') }}" name="password" class="form-control  @error('password') is valid @enderror" placeholder="parola">

                                <!-- Functia de validare pentru parola -->
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><br>

                            <div class="col-lg-6">
                                <label for="">Gen</label>
                                <select name="gender" value="{{ old('gender') }}" class="form-control  @error('gender') is valid @enderror">
                                    <option value="">Alege un gen</option>
                                    <option value="male">Barbat</option>
                                    <option value="female">Femeie</option>
                                </select>
                                <br>

                                <!-- Functia de validare pentru gen -->
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Sectiunea pentru educatie si adresa -->
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Educatie</label>
                                <input type="text" value="{{ old('education') }}" name="education" class="form-control  @error('education') is valid @enderror" placeholder="ex: Diploma de masterat">

                                <!-- Functia de validare pentru educatie -->
                                @error('education')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><br>

                            <div class="col-lg-6">
                                <label for="">Adresa domiciliu</label>
                                <input type="text" value="{{ old('address') }}" name="address" class="form-control  @error('adress') is valid @enderror" placeholder="ex: Str. Principala Nr.2, Brasov, jud. Brasov">
                                <br>

                                <!-- Functia de validare pentru adresa de domiciliu -->
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Sectiunea pentru specializare si numar de telefon -->
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Departament</label>
                                <select name="department" value="" class="form-control  @error('gender') is valid @enderror">
                                    <option value="">Alege un departament</option>
                                    <option value="internal">Medicina interna</option>
                                    <option value="surgery">Chirurgie</option>
                                    <option value="dermatology">Dermatologie</option>
                                </select>

                                <!-- Functia de validare pentru specializare -->
                                @error('departament')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><br>

                            <div class="col-lg-6">
                                <label for="">Numar de telefon</label>
                                <input type="text" value="{{ old('phone_number') }}" name="phone_number" class="form-control  @error('phone_number') is valid @enderror" placeholder="ex: 07XXXXXXXX">
                                <br>

                                <!-- Functia de validare pentru numar de telefon -->
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Sectiunea pentru adaugarea unei descrieri -->
                        <div class="form-group">
                            <label for="exampleTextarea1">Despre</label>
                            <textarea name="description" id="exampleTextarea1" rows="4" class="form-control @error('description') is valid @enderror">{{ old('description') }}</textarea>

                            <!-- Functia de validare pentru descriere -->
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        <!-- Sectiunea pentru adaugarea unei imagini de profil si setarea rolului --> 
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Incarca imagine</label>
                                    <input name="image" type="file" class="form-control file-upload-info  @error('image') is valid @enderror" placeholder="Incarca imagine">
                                    <br>
                                    <!-- <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary">Incarca</button>
                                    </span> -->

                                    <!-- Functia de validare pentru incarcarea imaginii de profil -->
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <label for="">Rol</label>
                                <select id="" class="form-control  @error('role') is valid @enderror" name="role_id">
                                    <option value="">Alegeti rolul</option>

                                    <!-- Doctorul poate fi si administrator, insa nu dorim sa fie pacient, asa ca eliminam aceasta posibilitate -->
                                    @foreach(App\Models\Role::where('name', '!=', 'patient') -> get() as $role)
                                        <option value="{{ $role->id }}">
                                            {{ $role -> name }}
                                        </option>
                                    @endforeach
                                </select>

                                <!-- Functia de validare pentru rol -->
                                @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        

                        <!-- Sectiunea de final cu butoane de Adauga sau Renunta --> 
                        <div class="row">
                            <button class="btn btn-primary mr-4">Adauga</button>
                            <button class="btn btn-light">Renunta</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection