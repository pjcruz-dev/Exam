<?php

namespace App\Http\Controllers;

use App\User;
use App\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    //
    //form render
    
    public function create(Request $request){

        return view('create');
    }

    
    //Save here
    public function store(Request $request){
        Contact::create($request->all());
        return redirect('home');
    }
    
    public function addToFavorite($contact_id){
        $user = auth()->user();
        $contact = Contact::find($contact_id);
        $user->contacts()->syncWithoutDetaching([$contact_id]);

        return redirect('favorites');
    }

    
    public function removeToFavorite($contact_id){
        $user = auth()->user();
        $contact = Contact::find($contact_id);
        $user->contacts()->detach([$contact_id]);

        return redirect('favorites');
        
    }

    
    public function delete($contact_id){
        $contact = Contact::find($contact_id);
        $contact->delete();

        return redirect('home');
    }

    public function favorites(Request $request){
        $user = User::with('contacts')->findOrFail(auth()->user()->id);

        return view('favorites', ['contacts' => $user->contacts]);
    }

}
