<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DoctorController extends Controller
{
    /**
     * doctor/ este indexul unde afisam toti doctorii inregistrati in baza de date
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('admin.doctor.index', compact('users'));
    }

    /**
     * Functia create afiseaza o pagina unde putem introduce datele unui medic/admin
     * pentru a-l salva in baza de date
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctor.create');
    }

    /**
     * Functia store salveaza datele introduse in baza de date atunci cand apasam butonul Adauga
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|max:25',
            'gender' => 'required',
            'education' => 'required',
            'address' => 'required',
            'department' => 'required',
            'phone_number' => 'required|numeric',
            'image' => 'required|mimes:jpeg,jpg,png',
            'role_id' => 'required',
            'description' => 'required'

        ]);

        $data = $request->all();
        $image = $request->file('image');

        # Folosim functia de hashName pentru a schimba numele imaginii in baza de date
        $name = $image->hashName();

        # Imaginile uploadate le salvam in folderul images din folderul public al aplicatiei
        $destination = public_path('/images');
        $image->move($destination, $name);

        $data['image'] = $name;

        # Folosim functia bcrypt pentru a salva parola criptata in baza de date pentru mai multa securitate
        $data['password'] = bcrypt('$request->password');
        User::create($data);

        return redirect()->back()->with('mesajSalvareSucces', 'Persoana a fost salvata cu succes in baza de date!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.doctor.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}