<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;
use App\User;

use App\Http\Requests\ContactStoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //お問い合わせ
    public function index()
    {
        $contacts = Contact::join('users','contacts.user_id','users.id')->where('team_id', Auth::user()->team->id)->paginate(1);

        return view('contacts.index', [
            'contacts' => $contacts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('contacts.create', [
            'id' => $id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactStoreRequest $request)
    {
        $contact = new Contact;

        ///ユーザーIDの取得
        $contact->user_id = Auth::id();
        $contact->user_name = Auth::user()->name;
        $contact->team_id = $request->team_id;
        $contact->message = $request->message;
        $contact->email = Auth::user()->email;
        $contact->tel = $request->tel;

        $contact->save();

        return redirect()->route('teams.show',$request->team_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //お問い合わせ　詳細ページ
    public function show($id)
    {
        return view('contacts.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
