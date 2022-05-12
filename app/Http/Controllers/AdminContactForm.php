<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class AdminContactForm extends Controller
{
    //
    public function index()
    {
        $messages = Contact::paginate(4);
        return view('admin.messages.index', compact('messages'));
    }
    public function destroy($id)
    {
        $item = Contact::findOrFail($id);
        $item->delete();
        return back();
    }
}
