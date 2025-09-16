<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(protected CommentService $commentService){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
        $data = $request->validate(
            [
                "comment_text" => "required"
            ]
        );
        $this->commentService->addComment($data,$id);
        return redirect()->route("ticket.show",["ticket"=>$id]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
