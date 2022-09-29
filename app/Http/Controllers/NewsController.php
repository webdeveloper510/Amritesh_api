<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
   public function index(){
        return view('form');
   }

   public function createNews(Request $request)
    {  
        echo "<pre>";
        print_r($request->all());die;
        $validator = Validator::make($request->all(), [
            'news_name' => 'required',
            'image' => 'required',
            'pdf' => 'required',
            'youtube_link' => 'required',
            'description' => 'required'
        ]);
 
        if ($validator->fails()) {
            return "Input fields are required";
        }
        $validated = $validator->validated(); 

        $news = new News;
        $news->news_name = $request->news_name;
        $news->image = $request->image;
        $news->pdf = $request->pdf;
        $news->youtube_link = $request->youtube_link;
        $news->description = $request->description;
        $news->save();  
        return response()->json([
            "success" => true,
            "message" => "News created successfully.",
            "data" => $news
            ]);
    }

   public function showNews($id)
    {
        $News = News::find($id);

        if (is_null($News)) {
        return response()->json([
        "success" => true,
        "message" => "News not found.",
        "data" => $News
        ]);
        }
        return response()->json([
        "success" => true,
        "message" => "News retrieved successfully.",
        "data" => $News
        ]);
        }
        
   public function updateNews(Request $request, $id)
        {            
            $validator = Validator::make($request->all(), [
                'news_name' => 'required',
                'image' => 'required',
                'pdf' => 'required',
                'youtube_link' => 'required',
                'description' => 'required'
            ]);
     
            if ($validator->fails()) {
                return "Input fields are required";
            }
            $validated = $validator->validated(); 
    
            $news = News::find($id);
            $news->news_name = $request->news_name;
            $news->image = $request->image;
            $news->pdf = $request->pdf;
            $news->youtube_link = $request->youtube_link;
            $news->description = $request->description;
            $news->save();  
            return response()->json([
                "success" => true,
                "message" => "News updated successfully.",
                "data" => $news
                ]);
        }  
        
    public function deleteNews($id) {        
        $news = News::find($id);
        if ($news != null) 
        {
        $news->delete();
        return response()->json([
            "success" => true,
            "message" => "News Successfully Deleted.",
            "data" => $news
            ]);
        }
           else
        {
            return response()->json([
                "success" => true,
                "message" => "Unable to Delete.",
                "data" => $news
                ]);
         }

    }  

}
