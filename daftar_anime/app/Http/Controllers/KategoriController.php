<?php

namespace App\Http\Controllers;

//import Model "kategori
use App\Models\kategori;

use App\Models\genre;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
     /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $kategoris = kategori::with('genre')->paginate(5);



        //render view with posts
        return view('kategori.index', compact('kategoris'));
    }

     /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        $kategoris = genre::latest()->get();
        


        return view('kategori.create',compact('kategoris'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'total'   => 'required|min:2',
            'tanggal'   => 'required|min:2'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/kategori', $image->hashName());

        //create post
        kategori::create([
            'image'     => $image->hashName(),
            'genre_id'     => $request->genre_id,
            'total'   => $request->total,
            'tanggal' => $request->tanggal

        ]);

        //redirect to index
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $kategoris = kategori::findOrFail($id);

        //render view with post
        return view('kategori.show', compact('kategoris'));
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
        $kategoris = kategori::findOrFail($id);

        //render view with post
        return view('kategori.edit', compact('kategoris'));
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
        $kategoris = kategori::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/kategori', $image->hashName());

            //delete old image
            Storage::delete('public/kategori/'.$kategoris->image);

            //update post with new image
            $kategoris->update([
                'image'     => $image->hashName(),
                'genre'     => $request->genre,
                'total'   => $request->total,
                'tanggal' => $request->tanggal
            ]);

        } else {

            //update post without image
            $kategoris->update([
                'genre'     => $request->genre,
                'total'   => $request->total,
                'tanggal' => $request->tanggal
            ]);
        }

        //redirect to index
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Diubah!']);
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
        $kategori = kategori::findOrFail($id);

        //delete image
        Storage::delete('public/kategori/'. $kategori->image);

        //delete post
        $kategori->delete();

        //redirect to index
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
