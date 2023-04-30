<?php

namespace App\Models;

use Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use PDO;

class SchoolManagement extends Model
{
    use HasFactory;

    protected $table='school_management';

    protected $fillable=[
        'name',
        'address',
        'open_time',
        'close_time',
        'info',
        'top_students',
        'achievements',
        'gallery',
        'fee_structure',
        'status',
        'image'
    ];

    public static function store(Request $request){

        $data=$request->all();
        $achievement=[];
        $topStudent=[];
        $fee_structure=[];
        $gallery=[];
        $header_image=[];

        $data['info']['principal_image']=isset($request->info['principal_image'])?url('images/school_images/principal_image').'/'.Helper::uploadDocuments($request->info['principal_image'],public_path('images/school_images/principal_image')):$request->old_principal_image;

        foreach($request->top_students['name'] as $key=>$value){
            $topStudent[]=[
                 'name'=>$value,
                 'class'=>$request->top_students['class'][$key],
                 'image'=>isset($request->top_students['image'][$key])?url('images/school_images/top_students').'/'. Helper::uploadDocuments($request->top_students['image'][$key],public_path('images/school_images/top_students')):$request->old_top_students['image'][$key],
            ];

        }

        foreach($request->achievements['name'] as $key=>$value){
            $achievement[]=[
                'name'=>$value,
                'year'=>$request->achievements['year'][$key],
                'description'=>$request->achievements['description'][$key],
                'image'=>isset($request->achievements['image'][$key])?url('images/school_images/achievements').'/'. Helper::uploadDocuments($request->achievements['image'][$key],public_path('images/school_images/achievements')):$request->old_achievements['image'][$key],
            ];
        }



        foreach($request->fee_structure['title'] as $key=>$value){
            $fee_structure[]=[
                'title'=>$value,
                'content'=>$request->fee_structure['content'][$key],
                'registration'=>$request->fee_structure['registration'][$key],
                'quarter1'=>$request->fee_structure['quarter1'][$key],
                'quarter2'=>$request->fee_structure['quarter2'][$key],
                'quarter3'=>$request->fee_structure['quarter3'][$key],

            ];
        }

        if(isset($request->gallery['url'][0]))
           $gallery[]=['url'=>url('images/school_images/gallery').'/'.Helper::uploadDocuments($request->gallery['url'][0],public_path('images/school_images/gallery'))];

           if(isset($request->image[0]))
             $header_image[]=url('images/school_images/header_image').'/'.Helper::uploadDocuments($request->image[0],public_path(('images/school_images/header_image')));


        if(isset($request->old_gallery)){

            foreach($request->old_gallery['url']as $key=>$value){
                if(isset($request->gallery['url'][0]) && $key==0)
                   continue;

                $gallery[]=['url'=>$value];
            }
        }

        if(isset($request->gallery)){

            foreach($request->gallery['url']as $key=>$value){
                if($key==0)
                  continue;
                $gallery[]=['url'=>url('images/school_images/gallery').'/'.Helper::uploadDocuments($value,public_path('images/school_images/gallery'))];
            }
        }
        if(isset($request->old_image)){
            foreach($request->old_image as $key=>$value){
                if(isset($request->image[0]) && $key==0)
                  continue;
                $header_image[]=$value;
            }
        }
        if($request->image){
            foreach($request->image as $key=>$value){
                if($key==0)
                  continue;
                $header_image[]=url('images/school_images/header_image').'/'.Helper::uploadDocuments($value,public_path(('images/school_images/header_image')));
            }
        }

        return  static::updateOrCreate(['id'=>$data['id']],[
        'name'=>$data['name'],
        'address'=>$data['address'],
        'open_time'=>$data['open_time'],
        'close_time'=>$data['close_time'],
        'info'=>json_encode($data['info']),
        'top_students'=>json_encode($topStudent),
        'achievements'=>json_encode($achievement),
        'gallery'=>json_encode($gallery),
        'image'=>json_encode($header_image),
        'fee_structure'=>json_encode($fee_structure),
        'status'=>$data['status']
      ]);

    }


}
