<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Contact;
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
     * Stores a new contact.
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

}
