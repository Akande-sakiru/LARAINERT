<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TopicController extends Controller
{
    //
    public function index(){
       return Inertia::render('Topics/index',[
        'topics'=>Topic::all()->map(function($topic){
            return [
                'id'=>$topic->id,
                'name'=>$topic->name,
                'image'=>asset('storage/'.$topic->image)
            ];
        })
       ]);
    }

    public function create(){
        return Inertia::render('Topics/create');
     }
     public function store(Request $req){
        $image=$req->file('image')->store('Topics', 'public');
        Topic::create([
            'name'=> $req->input('name'),
            'image'=>  $image
        ]);
        return to_route('topics.index');
     }
     public function edit(Topic $topic){
       return inertia::render('Topics/edit',[
        'topic'=>$topic,
        'image'=>asset('storage/'.$topic->image)
       ]);
     }

     public function update(Request $req,Topic $topic){
        $image= $topic->image;
        if($req->file('image')){
            Storage::delete('public/'.$topic->image);
            $image=$req->file('image')->store('Topics', 'public');
        }
        $topic->update([
            'name'=> $req->input('name'),
            'image'=>  $image
        ]);
        return to_route('topics.index');
      }
      public function destroy(Topic $topic){
        Storage::delete('public/'.$topic->image);
        $topic->delete();
        return to_route('topics.index');
      }
} 
