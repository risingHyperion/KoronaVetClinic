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
            <div class="card">
                <div class="card-header">
                    <h2>Adauga un medic</h2>
                </div>

                <div class="card-body">
                    <form action="" class="forms-sample">

                        <!-- Sectiunea pentru numele si adresa de email a doctorului -->
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Nume complet</label>
                                <input type="text" name="name" class="form-control" placeholder="ex: Ion Popescu">
                            </div>

                            <div class="col-lg-6">
                                <label for="">Adresa email</label>
                                <input type="email" name="email" class="form-control" placeholder="ex: ion.popescu@gmail.com">
                                <br>
                            </div>
                        </div>

                        <!-- Sectiunea pentru parola si gen -->
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Parola</label>
                                <input type="password" name="password" class="form-control" placeholder="parola">
                            </div><br>

                            <div class="col-lg-6">
                                <label for="">Gen</label>
                                <select name="gender" class="form-control">
                                    <option value="male">Barbat</option>
                                    <option value="female">Femeie</option>
                                </select>
                                <br>
                            </div>
                        </div>

                        <!-- Sectiunea pentru educatie si adresa -->
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Educatie</label>
                                <input type="text" name="education" class="form-control" placeholder="ex: Diploma de masterat">
                            </div><br>

                            <div class="col-lg-6">
                                <label for="">Adresa domiciliu</label>
                                <input type="text" name="address" class="form-control" placeholder="ex: Str. Principala Nr.2, Brasov, jud. Brasov">
                                <br>
                            </div>
                        </div>

                        <!-- Sectiunea pentru specializare si numar de telefon -->
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Specializare</label>
                                <input type="text" name="department" class="form-control" placeholder="ex: medic generalist">
                            </div><br>

                            <div class="col-lg-6">
                                <label for="">Adresa domiciliu</label>
                                <input type="text" name="phone_number" class="form-control" placeholder="ex: 07XXXXXXXX">
                                <br>
                            </div>
                        </div>

                        <!-- Sectiunea pentru adaugarea unei descrieri -->
                        <div class="form-group">
                            <label for="exampleTextarea1">Despre</label>
                            <textarea name="description" id="exampleTextarea1" rows="4" class="form-control"></textarea>
                        </div>

                        <!-- Sectiunea pentru adaugarea unei imagini de profil --> 
                        <div class="row">
                            <div class="form-group">
                                <label for="">Incarca imagine</label>
                                <input type="file" class="file-upload-default" name="img[]">

                                <div class="input-group col-xs-12">
                                    <input name="image" type="file" class="form-control file-upload-info" placeholder="Incarca imagine">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary">Cauta imagine</button>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Sectiunea de final cu butoane de Adauga sau Renunta --> 
                        <button class="btn btn-primary mr-2">Adauga</button>
                        <button class="btn btn-light">Renunta</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection