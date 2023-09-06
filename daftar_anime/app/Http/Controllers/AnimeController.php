<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\anime;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class AnimeController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $animes = anime::latest()->paginate(5);

        //render view with posts
        return view('anime.index-anime', compact('animes'));
    }



 /**
 * create
 *
 * @return View
 */
public function create(): View
{
    return view('anime.create');
}

/**
 * store
 *
 * @param  mixed $request
 * @return RedirectResponse
 */
public function store(Request $request): RedirectResponse
{
   

    //upload image
    $image = $request->file('image');
    $image->storeAs('public/anime', $image->hashName());

    
     /* validate form
     $this->validate($request, [
        'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        'nama' => 'regured|min:1',
        'sinopsis' => 'required|min:2',
        'genre' => 'required|min:2',
        'tanggal' => 'required|min:2',
        'jumlah' => 'required|min:2',
        'rating' => 'required|min:2'
    ]);
    */

    //create post
    anime::create([
        'image'     => $image->hashName(),
        'nama' => $request->nama,
        'sinopsis' => $request->sinopsis,
        'Genre' => $request->Genre,
        'tanggal' => $request->tanggal,
        'jumlah' => $request->jumlah,
        'rating' => $request->rating


    ]);

    //redirect to index
    return redirect()->route('anime.index')->with(['success' => 'Data Berhasil Disimpan!']);
}

 /**
 * show
 *
 * @param  mixed $id
 * @return View
 */
public function show(string $id): View
{
    //get post by ID
    $animes = anime::findOrFail($id);

    //render view with post
    return view('anime.show', compact('animes'));
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
    $animes = anime::findOrFail($id);

    //render view with post
    return view('anime.edit', compact('animes'));
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
    //validate form
   

    //get post by ID
    $anime = anime::findOrFail($id);

    //check if image is uploaded
    if ($request->hasFile('image')) {

        //upload new image
        $image = $request->file('image');
        $image->storeAs('public/anime', $image->hashName());

        //delete old image
        Storage::delete('public/anime/'.$anime->image);

        //update post with new image
        $anime->update([
            'image'     => $image->hashName(),
            'nama' => $request->nama,
            'sinopsis' => $request->sinopsis,
            'Genre' => $request->Genre,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'rating' => $request->rating
        ]);

    } else {

        //update post without image
        $anime->update([
            'nama' => $request->nama,
            'sinopsis' => $request->sinopsis,
            'Genre' => $request->Genre,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'rating' => $request->rating
        ]);
    }

    //redirect to index
    return redirect()->route('anime.index')->with(['success' => 'Data Berhasil Diubah!']);
}

/**
 * destroy
 *
 * @param  mixed $post
 * @return void
 */
public function destroy($id): RedirectResponse
{
    //get post by ID
    $anime = anime::findOrFail($id);

    //delete image
    Storage::delete('public/anime/'. $anime->image);

    //delete post
    $anime->delete();

    //redirect to index
    return redirect()->route('anime.index')->with(['success' => 'Data Berhasil Dihapus!']);
}



}