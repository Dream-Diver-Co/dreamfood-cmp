<?php

namespace App\Http\Controllers;

use App\Models\SpecialContact;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SpecialContactController extends Controller
{
    // public function index()
    // {
    //     $contacts = SpecialContact::all();
    //     // Alternatively, filter by authenticated user if necessary:
    //     // $contacts = SpecialContact::where('user_id', auth()->id())->get();

    //     return view('admin.pages.special.index', compact('contacts'));
    // }





//     public function index()
// {
//     $contacts = SpecialContact::all();
//     // $contacts = SpecialContact::where('user_id', auth()->id())->get();

//     // Check each contact's date and update status if necessary
//     foreach ($contacts as $contact) {
//         // Calculate the date difference
//         $dateDifference = now()->diffInDays($contact->date);

//         // If date is today and status is Pending, update to Gift
//         if ($dateDifference == 0 && $contact->status === 'Pending') {
//             $contact->update(['status' => 'Gift']);
//         }
//     }

//     return view('admin.pages.special.index', compact('contacts'));
// }




public function index()
{
    $contacts = SpecialContact::all();

    foreach ($contacts as $contact) {
        // Convert the date to a Carbon instance
        $contactDate = Carbon::parse($contact->date);

        // Check if the month and day match today's month and day
        $isSameDayAndMonth = $contactDate->format('m-d') === now()->format('m-d');

        // If today's month and day match the contact's date and status is Pending, update to Gift
        if ($isSameDayAndMonth && $contact->status === 'Pending') {
            $contact->update(['status' => 'Gift']);
        }
    }

    return view('admin.pages.special.index', compact('contacts'));
}











// public function index()
// {
//     $contacts = SpecialContact::all();
//     // Check each contact's date and update status if necessary
//     foreach ($contacts as $contact) {
//         // Check if status is 'Pending'
//         if ($contact->status === 'Pending') {
//             // Find the last 'Gift' status contact for this user
//             $lastGiftContact = SpecialContact::where('user_id', auth()->id())
//                 ->where('status', 'Gift')
//                 ->orderBy('date', 'desc')
//                 ->first();

//             // Calculate the date difference if there was a previous Gift
//             $daysSinceLastGift = $lastGiftContact
//                 ? now()->diffInDays($lastGiftContact->date)
//                 : 366; // Assume more than 365 days if no Gift was found

//             // If 365 days have passed since the last Gift, update the current status to 'Gift'
//             if ($daysSinceLastGift >= 365) {
//                 $contact->update(['status' => 'Gift']);
//             }
//         }
//     }

//     return view('admin.pages.special.index', compact('contacts'));
// }




    public function create()
    {
        return view('admin.pages.special.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string',
            'note' => 'nullable|string',
            'address' => 'required|string',
            'date' => 'required|date',
            'day_name' => 'required|string',
            'status' => 'nullable|string|in:Pending,Gift', // Validate status if provided
        ]);

        // Check if a contact with the same email or phone number already exists for this user
        $existingContact = SpecialContact::where('user_id', auth()->id())
                                        ->where(function($query) use ($request) {
                                            $query->where('email', $request->email)
                                                  ->orWhere('phone', $request->phone);
                                        })->first();

        if ($existingContact) {
            return redirect()->back()->withErrors(['error' => 'You have already submitted a contact with this email or phone number.']);
        }


        // Save contact with the user's ID and a default status if not provided
        $input = $request->all();
        $input['user_id'] = auth()->id();  // Set the user ID
        $input['status'] = $input['status'] ?? 'Pending';  // Default to 'Pending' if status not provided

        SpecialContact::create($input);

        return redirect()->back()->with('success', 'Contact added successfully.');
    }

    public function show(SpecialContact $specialcontact)
    {
        return view('admin.pages.special.show', compact('specialcontact'));
    }

    public function edit(SpecialContact $specialcontact)
    {
        return view('admin.pages.special.edit', compact('specialcontact'));
    }

    public function update(Request $request, SpecialContact $specialcontact)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string',
            'note' => 'nullable|string',
            'address' => 'required|string',
            'date' => 'required|date',
            'day_name' => 'required|string',
            'status' => 'nullable|string|in:Pending,Gift', // Validate status if provided
        ]);

        $input = $request->all();

        // Update the special contact with the new data
        $specialcontact->update($input);

        return redirect()->back()->with('success', 'Contact updated successfully.');
    }

    public function updateStatus(Request $request, SpecialContact $specialcontact)
    {
        $request->validate([
            'status' => 'required|string|in:Pending,Gift',
        ]);

        // Update the status
        $specialcontact->update(['status' => $request->status]);

        return redirect()->route('specialcontacts.index')->with('success', 'Status updated successfully.');
    }


    public function destroy(SpecialContact $specialcontact)
    {
        $specialcontact->delete();

        return redirect()->route('specialcontacts.index')->with('success', 'Contact deleted successfully.');
    }
}
