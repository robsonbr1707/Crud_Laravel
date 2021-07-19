<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEditRecord;
use Illuminate\Support\Str;
use App\Http\Requests\StoreUpdateRecord;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function index()
    {
        $search = request('search');
        if($search):
            $registros = Record::where([['nome', 'like', '%'.$search.'%']])->get();
        else:
            $registros = Record::all();

        endif;

        return view('index', ['registros'=>$registros, 'search'=>$search]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(StoreUpdateRecord $request)
    {
        $data = $request->all();
        if($request->image->isValid()):

            if($request->image->isValid()):

                $nameFile =  Str::of($request->nome)->slug('-'). '.' .$request->image->getClientOriginalExtension();
                $file = $request->image->storeAs('public/images',$nameFile);
                $file = str_replace('public/','',$file);
                $data['image'] = $file;
            endif;
            
        else:
            return redirect()->back();
        endif;

        Record::create($data);
        return redirect()->route('index.home')->with
        ('msg_create','Registro Criado Com Sucesso!!');
    }

    public function edit($id)
    {

        if(!$registros = Record::find($id)):
            return redirect()->back();
        endif;

            return view('edit', compact('registros'));
    }

    public function update(StoreEditRecord $request, $id)
    {

        if(!$registros = Record::find($id)):
            return redirect()->back();
        endif;

        $data = $request->all();

        if($request->image && $request->image->isValid()):

            if(Storage::exists($registros->image)):
                Storage::delete($registros->image);
            endif;
            
            $nameFile =  Str::of($request->nome)->slug('-'). '.' .$request->image->getClientOriginalExtension();
            $file = $request->image->storeAs('public/images',$nameFile);
            $file = str_replace('public/','',$file);
            $data['image'] = $file;
        endif;

        $registros->update($data);
        return redirect()->route('index.home')->with('msg_up', 'Registro Atualizado Com Sucesso!!');
    }


    public function destroy($id)
    {
        Record::findOrFail($id)->delete();
        return redirect()->route('index.home')->with('msg_delete', 'Registro Apagado!');
    }
    
}
