<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {

        $posts = Post::paginate();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(StoreUpdatePost $request)
    {
        $data = $request->all();

        if($request->image->isValid()):

            $nameFile =  Str::of($request->title)->slug('-'). '.' .$request->image->getClientOriginalExtension();
            $file = $request->image->storeAs('public/posts',$nameFile);
            $file = str_replace('public/','',$file);
            $data['image'] = $file;
        endif;

       Post::create($data);

       return redirect()->route('posts.index')->with('msg','Registro criado com Sucesso!!');
    }
    
    public function show($id)
    {
        //$post = Post::where('id', $id);
       
        if( !$post = Post::find($id)):
            return redirect()->route('posts.index');
        endif;

        return view('admin.posts.show', compact('post'));
    }

    public function destroy($id)
    {

        if(!$post = Post::find($id)):
            return redirect()->route('posts.index');
        endif;

        if(Storage::exists($post->image)):
            Storage::delete($post->image);
        endif;

        $post->delete();

        return redirect()->route('posts.index')->with('msg_del','Registro Apagado!!');
    }

    public function edit($id)
    {

        if(!$post = Post::find($id)):
            return redirect()->back();
        endif;

        return view('admin.posts.edit', compact('post'));
    }

    public function update(StoreUpdatePost $request, $id)
    {

        if(!$post = Post::find($id)){
            return redirect()->back();
        }
        $data = $request->all();

        if($request->image && $request->image->isValid()){

            if(Storage::exists($post->image))
                Storage::delete($post->image);
            
            
            $nameFile =  Str::of($request->title)->slug('-'). '.' .$request->image->getClientOriginalExtension();
            $file = $request->image->storeAs('public/posts',$nameFile);
            $file = str_replace('public/','',$file);
            $data['image'] = $file;
        }
 
        $post->update($data);

        return redirect()->route('posts.index')->with('msg',"<p class='p-3 mb-2 bg-danger text-white'>Registro atualizado com Sucesso!!</p>");
    }

    public function search(Request $request)
    {

        $filters = $request->except('_token');

        $posts = Post::where('title', 'LIKE', "%{$request->search}%")->paginate(1);

        return view('admin.posts.index', compact('posts','filters'));
    }

}
