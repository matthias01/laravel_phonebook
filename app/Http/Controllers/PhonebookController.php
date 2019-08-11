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

    public function create()
    {
        //
    }


    public function store(PhonebookRequest $request)
    {
        $phone = new Phonebook;
        $phone->name = $request->name;
        $phone->email = $request->email;
        $phone->phone_number = $request->phone_number;

        $phone->save();

       // return $request->all();
    }


    public function show(Phonebook $phonebook)
    {
        //
    }


    public function edit(Phonebook $phonebook)
    {
        //
    }


    public function update(Request $request, Phonebook $phonebook)
    {
        //
    }


    public function destroy(Phonebook $phonebook)
    {
        //
    }
}
