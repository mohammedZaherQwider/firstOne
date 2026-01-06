<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = Content::with('image')->latest()->get();
        return view('back_end.contents.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back_end.contents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'link'    => 'nullable|max:1000',
            'id'      => 'nullable|integer|exists:contents,id',
        ]);
        // dd("dd");
        $data = $request->only(['title', 'content', 'link']);

        if ($request->id) {
            $content = Content::findOrFail($request->id);
            $content->update($data);
            if ($request->has('uploaded_images')) {
                $images = array_filter($request->uploaded_images);
                foreach ($images as $filename) {
                    $content->image()->create([
                        'image' => $filename
                    ]);
                }
            }
            $msg = 'Content updated successfully';
        } else {
            $content = Content::create($data);
             if ($request->has('uploaded_images')) {
                $images = array_filter($request->uploaded_images);
                foreach ($images as $filename) {
                    $content->image()->create([
                        'image' => $filename
                    ]);
                }
            }
            $msg = 'Content created successfully';
        }

        return redirect()->route('contents.index')->with([
            'status' => 'success',
            'msg'    => $msg,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content)
    {
        return view('back_end.contents.show', compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $content)
    {
        return view('back_end.contents.create', compact('content'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Content $content)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        $content->delete();

        return response()->json([
            'status' => 'success',
            'msg'    => 'Content deleted successfully',
        ]);
    }
}
