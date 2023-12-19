<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TestController extends Controller
{
    public function index()
    {
        if (env('APP_ENV') !== 'local') {
            abort(404);
        }
        $img = Image::make(public_path('img/diwali.jpg'));
        $logo = Image::make(public_path('img/new/white-bg-small.png'));
        $logo->resize(100, 100);


        $img->rectangle(0, 512, 580, 553, function ($draw) {
            $draw->background('#ff0000');
        });

        $img->text('+91 8980373630', 505,43, function($font) {
            $font->file(public_path('fonts/roboto/Roboto-BoldItalic.ttf'));
            $font->size(15);
            $font->color('#ffffff');
            $font->align('center');
            $font->valign('top');
        });

        $img->text('B/7, Sushilnagar Part-2,Opp- Metro Pillar No.125Drive In Road, Memnagar, Ahmedabad - 380052', 290,533, function($font) {
            $font->file(public_path('fonts/roboto/Roboto-BoldItalic.ttf'));
            $font->size(12);
            $font->color('#ffffff');
            $font->align('center');
            $font->valign('center');
        });

        $img->insert($logo,'top-left', 10,8);
        return $img->response('jpg'); 
    }
}
