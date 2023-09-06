<?php

namespace App\Http\Controllers;

use App\Models\genre;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class GenreController extends Controller
{
   

    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $genres = genre::latest()->paginate(5);

        //render view with posts
        return view('genre.index-genre', compact('genres'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('genre.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        

       

        //create post
        genre::create([
            'id'    => $request->id,
            'genre' => $request->genre
           

        ]);

        //redirect to index
        return redirect()->route('genre.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * delete
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $genres = genre::findOrFail($id);

        //delete post
        $genres->delete();

        //redirect to index
        return redirect()->route('genre.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get post by ID
        $genres = genre::findOrFail($id);

        //render view with post
        return view('genre.edit', compact('genres'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        

        //get post by ID
        $genres = genre::findOrFail($id);

          

            //update post without image
            $genres->update([
                'id'    => $request->id,
                'genre' => $request->genre
            ]);

        //redirect to index
        return redirect()->route('genre.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
