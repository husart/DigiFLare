<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Contact;
use Validator;
use Auth;

class ContactsController extends Controller
{

    /**
     * Show the contacts view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $contacts = Contact::get();
        return view('contacts.index', ['contacts' => $contacts]);
    }

    /**
     * Stores a new contact.
     *
     * @param \Illuminate\Http\Response $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        $user = Auth::user();
        $input_data = $request->input();
        $input_data['user_id'] = $user->id;
        $record = Contact::create($input_data);
    }

    /**
     * Edits an existing contact.
     *
     * @param \Illuminate\Http\Response $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $input_data = $request->input();
        $record = Contact::find($input_data['id']);
        $record->update($request->all());
    }

    /**
     * Deletes a contact.
     *
     * @param \Illuminate\Http\Response $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request) {
        $id = $request->input('id');
        $account = Contact::find($id);
        $account->delete();
    }

     /**
     * Displays a form for joining as a contact for a user.
     * This is only for demo purposes.
     *
     * @param \Illuminate\Http\Response $request
     * @return \Illuminate\Http\Response
     */
    public function join_from_outside(Request $request) {
        return view('contacts.join_as_contact');
    }

    /**
     * Stores a new contact for somebody that wants to join an user.
     * This is only for demo purposes.
     *
     * @param \Illuminate\Http\Response $request
     * @return \Illuminate\Http\Response
     */
    public function join_as_contact(Request $request) {
        $input_data = $request->input();
        $input_data['user_id'] = 1; // fixed value
        $input_data['phone'] = "0000000000"; // just a default value - field cannot be emty
        $input_data['address'] = "MyAddress";// just a default value - field cannot be emty
        $record = Contact::create($input_data);
        return view('contacts.thank_you_for_joining');
    }

}
