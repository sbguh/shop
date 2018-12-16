<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tip;


class TipController extends Controller
{

  public function show($category_slug,$slug){


    $tip = Tip::whereSlug($slug)->first();
    $prevtip_id=$this->getPrevTipId($tip->id);
    $nexttip ="";
    $prevtip ="";
    if($prevtip_id){
      $prevtip = Tip::find($prevtip_id);
    }

    $nexttip_id=$this->getNextTipId($tip->id);

    if($nexttip_id){
      $nexttip = Tip::find($nexttip_id);
    }

    $seo_title = $tip->seo_title?$tip->seo_title:$tip->title;
    $seo_description = $tip->seo_description?$tip->seo_description:substr(strip_tags($tip->description),0,200);


    return view('tip.show', ['tip' => $tip,'prevtip'=>$prevtip,'nexttip'=>$nexttip, 'seo_title'=>$seo_title,'seo_description'=>trim($seo_description)]);

  }


  protected function getPrevTipId($id)
  {
    return Tip::where('id', '<', $id)->max('id');
  }


  protected function getNextTipId($id)
  {
    return Tip::where('id', '>', $id)->min('id');
  }


}