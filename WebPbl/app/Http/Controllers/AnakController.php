<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AnakController extends Controller
{
    public function list(){
        $data['getRecord'] = User::getAnak();
        $data['header_title'] = "Anak List";
        return view('admin.anak.list',$data);
    }

    public function add(){

        $data['header_title'] = "add new anak";
        return view('admin.anak.add',$data);
    }

    public function insert(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users',
            'height' => 'max:10',
            'height' =>'max:10',
        ]);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'tmp_lahir' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'nm_ibu' => 'nullable|string|max:255',
            'tmp_lahir_ibu' => 'nullable|string|max:255',
            'tgl_lahir_ibu' => 'nullable|date',
            'nm_ayah' => 'required|string|max:255',
            'tmp_lahir_ayah' => 'required|string|max:255',
            'tgl_lahir_ayah' => 'required|date',
            'password' => 'required|string|min:8',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
       $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->tmp_lahir = $validatedData['tmp_lahir'];
        $user->tgl_lahir = $validatedData['tgl_lahir'];
        $user->alamat = $validatedData['alamat'];
        $user->gender = $validatedData['gender'];
        $user->nm_ibu = $validatedData['nm_ibu'] ?? null; // handle nullable fields
        $user->tmp_lahir_ibu = $validatedData['tmp_lahir_ibu'] ?? null;
        $user->tgl_lahir_ibu = $validatedData['tgl_lahir_ibu'] ?? null;
        $user->nm_ayah = $validatedData['nm_ayah'];
        $user->tmp_lahir_ayah = $validatedData['tmp_lahir_ayah'];
        $user->tgl_lahir_ayah = $validatedData['tgl_lahir_ayah'];

        if ($request->hasFile('profile')) {
            $fileName = time().'.'.$request->profile->extension();
            $request->profile->move(public_path('profiles'), $fileName);
            $user->profile = $fileName;
        }

        $user->save();

        return redirect('admin/anak/list')->with('success',"Anak Successfully created");
    }
    public function edit($id){

        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = "edit data Anak";
            return view('admin.anak.edit',$data);
        }else{
            abort(404);
        }

    }

    public function update(Request $request, $id)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'tmp_lahir' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,'.$id,
        'tgl_lahir' => 'required|date',
        'alamat' => 'required|string|max:255',
        'gender' => 'required|string|max:255',
        'nm_ibu' => 'nullable|string|max:255',
        'tmp_lahir_ibu' => 'nullable|string|max:255',
        'tgl_lahir_ibu' => 'nullable|date',
        'nm_ayah' => 'required|string|max:255',
        'tmp_lahir_ayah' => 'required|string|max:255',
        'tgl_lahir_ayah' => 'required|date',
        'password' => 'nullable|string|min:8',
        'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Find the user by ID
    $user = User::findOrFail($id);

    // Update user fields with the validated data
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    if (!empty($validatedData['password'])) {
        $user->password = Hash::make($validatedData['password']);
    }
    $user->tmp_lahir = $validatedData['tmp_lahir'];
    $user->tgl_lahir = $validatedData['tgl_lahir'];
    $user->alamat = $validatedData['alamat'];
    $user->gender = $validatedData['gender'];
    $user->nm_ibu = $validatedData['nm_ibu'] ?? null; // handle nullable fields
    $user->tmp_lahir_ibu = $validatedData['tmp_lahir_ibu'] ?? null;
    $user->tgl_lahir_ibu = $validatedData['tgl_lahir_ibu'] ?? null;
    $user->nm_ayah = $validatedData['nm_ayah'];
    $user->tmp_lahir_ayah = $validatedData['tmp_lahir_ayah'];
    $user->tgl_lahir_ayah = $validatedData['tgl_lahir_ayah'];

    // Handle the profile picture if it exists in the request
    if ($request->hasFile('profile')) {
        $fileName = time().'.'.$request->profile->extension();
        $request->profile->move(public_path('profiles'), $fileName);
        $user->profile = $fileName;
    }

    // Save the updated user data
    $user->save();

    return redirect('admin/anak/list')->with('success',"Anak Successfully update");
}
    public function delete($id){
    $user = User::getAnak($id);
    $user->is_delete = 1;

    return redirect('admin/anak/list')->with('success',"anak Successfully Deleted");
}


}

