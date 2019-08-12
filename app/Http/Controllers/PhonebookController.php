<?php

namespace App\Http\Controllers;

use App\Phonebook;
use Illuminate\Http\Request;
use App\Http\Requests\PhonebookRequest;

class PhonebookController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function getData(){
       return Phonebook::orderBy('name','ASC')->get();
    }


    public function store(PhonebookRequest $request)
    {
        $phone = new Phonebook;
        $phone->name = $request->name;
        $phone->email = $request->email;
        $phone->phone_number = $request->phone_number;

        $phone->save();

        return $phone;
    }


    public function update(PhonebookRequest $request, Phonebook $phonebook)
    {

        $phonebook->name = $request->name;
        $phonebook->email = $request->email;
        $phonebook->phone_number = $request->phone_number;
        $phonebook->update();
    }


    public function destroy(Phonebook $phonebook)
    {
        $phonebook->delete();
    }
}
