<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Repositories\CommentEloquentRepository;
use App\Repositories\interfaces\CommentRepositoryInterface;
use App\Repositories\PostEloquentRepository;
use App\Repositories\interfaces\PostRepositoryInterface;
use App\Repositories\AccountEloquentRepository;
use App\Repositories\interfaces\AccountRepositoryInterface;
use Carbon\Carbon;

class CommentController extends Controller
{
    protected $postRepository;
    protected $userRepository;
    protected $commentRepository;

    public function __construct(PostRepositoryInterface $postRepository,AccountRepositoryInterface $userRepository,CommentRepositoryInterface $commentRepository){
        $this->post = $postRepository;
        $this->user = $userRepository;
        $this->cmt = $commentRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cmtList = $this->cmt->getAll();
        return view('admin.Comment.index', compact('cmtList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
