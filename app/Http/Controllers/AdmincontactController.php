<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admincontact;

class AdmincontactController extends Controller
{
    public function index()
    {
        $admincontacts = Admincontact::all();
        return view('admin.pages.contact.admin_contact.index')->with('admincontacts', $admincontacts);
    }

    public function create()
    {
        return view('admin.pages.contact.admin_contact.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('images', 'public');
            $input['image'] = $path;
        }

        Admincontact::create($input);
        return redirect('admin/admincontact')->with('flash_message', 'Admincontact Added!');
    }

    public function show($id)
    {
        $admincontact = Admincontact::find($id);
        return view('admin.pages.contact.admin_contact.show')->with('admincontact', $admincontact);
    }

    public function edit($id)
    {
        $admincontact = Admincontact::find($id);
        return view('admin.pages.contact.admin_contact.edit')->with('admincontact', $admincontact);
    }

    public function update(Request $request, $id)
    {
        $admincontact = Admincontact::find($id);
        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('images', 'public');
            $input['image'] = $path;
        }

        $admincontact->update($input);
        return redirect('admin/admincontact')->with('flash_message', 'Admincontact Updated!');
    }

    public function destroy($id)
    {
        Admincontact::destroy($id);
        return redirect('admin/admincontact')->with('flash_message', 'Admincontact deleted!');
    }
}
