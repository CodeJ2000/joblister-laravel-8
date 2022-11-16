<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProfilesController extends Controller
{
    public function edit(User $user)
    {
        return view('account.update-profile', compact('user'));
        
    }

    public function update (User $user, Request $request)
    {

      $data = $this->validateProfileUpdate($request);

      if ($request->hasFile('image')) {
        $fileNameToStore = $this->getFileName($request->file('image'));
        $logoPath = $request->file('image')->storeAs('public/profile', $fileNameToStore);
        if ($user->profile->image) {
            Storage::delete('public/profile/' . basename($user->image));
        }
        $user->profile->image = 'storage/public/profile/' . $fileNameToStore;
        }

        if ($request->hasFile('resume_file')) {
        $fileNameToStore = $this->getFileName($request->file('resume_file'));
        $coverPath = $request->file('resume_file')->storeAs('public/user/resume-files', $fileNameToStore);
        if ($user->profile->resume_file) {
            Storage::delete('public/user/resume-files/' . basename($user->resume_file));
        }
        $user->profile->resume_file = 'storage/public/user/resume-files/' . $fileNameToStore;
    } 

        if($user->profile->update($data))
        {
            Alert::toast('Profile Edited!', 'success');
            return redirect()->route('account.index');
        }
        Alert::toast('Failed!', 'error');
        return redirect()->route('account.index');
        
        // $this->validateProfileUpdate($request);

        // $profile = auth()->user()->profile;
        // if ($this->profileUpdate($profile, $request)) {
        //     Alert::toast('Profile Edited!', 'success');
        //     return redirect()->route('account.index');
        // }
        // Alert::toast('Failed!', 'error');
        // return redirect()->route('account.index');
        
    //     if (request()->hasFile('image')) {
    //         $fileNameToStore = $this->getFileName(request()->file('image'));
    //         $logoPath = request()->file('image')->storeAs('public/companies/profile', $fileNameToStore);
    //         if ($user->image) {
    //             Storage::delete('public/companies/profile/' . basename($user->image));
    //         }
    //         $user->image = 'storage/public/companies/profile/' . $fileNameToStore;
        
        
    // }


    
    // if ($user->profile()->update($data)) {
    //     Alert::toast('Profile is set successfully.', 'success');
    //     return redirect()->route('profile.edit');
    // }
    // Alert::toast('Failed!', 'error');
    // return redirect()->route('account.index');
}

protected function validateProfileUpdate(Request $request)
{
    return $request->validate([
        'image' => 'image',
        'address' => 'required',
        'educ' => 'required',
        'contact_number' => 'required',
        'birthdate' => 'required',
        'resume_file' => 'mimes:pdf,docx|max:2048',
        'gender' => 'required',
    ]);
}

public function show()
{
    $data = Profile::all();

return view('account.show-profile', compact('data'));
}

protected function getFileName($file)
{
    $fileName = $file->getClientOriginalName();
    $actualFileName = pathinfo($fileName, PATHINFO_FILENAME);
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    return $actualFileName . time() . '.' . $fileExtension;
}


}