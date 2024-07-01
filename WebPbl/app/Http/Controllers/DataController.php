<?php
namespace App\Http\Controllers;
use App\Models\Data;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DataController extends Controller
{
    public function add(){

        $data['header_title'] = "add new ukur";
        return view('admin.ukur.add',$data);
    }

    public function list(){
        $data['getRecord'] = User::getAnak();
        $data['header_title'] = "Anak List";
        return view('admin.ukur.list',$data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
        ]);

        data::create([
            'user_id' => auth()->user()->id, // assuming you're using auth
            'height' => $request->height,
            'weight' => $request->weight,
        ]);

        return redirect('admin/ukur/list')->with('success', 'Data added successfully!');
    }

    public function edit($id)
    {
        $data = Data::findOrFail($id);
        return view('admin.ukur.edit', compact('data')); // changed 'measurement' to 'data'
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
        ]);

        $data = Data::findOrFail($id);
        $data->update([
            'height' => $request->height,
            'weight' => $request->weight,
        ]);

        return redirect('admin/ukur/list')->with('success', 'Data updated successfully!');
    }

    public function delete($id)
    {
        $data = Data::findOrFail($id);
        $data->delete();

        return redirect('admin/ukur/list')->with('success', 'Data deleted successfully!');
    }
}
