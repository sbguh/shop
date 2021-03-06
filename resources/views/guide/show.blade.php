@extends('layouts.app')

@section('title', $seo_title)
@section('description', $seo_description)

@section('content')

<div class="container-fluid user_guide">
  <div class="container">
<div class="row ">
  <div class="col-sm-12 col-xs-12 user_guide_section_a">
    <h2>Guide</h2>
    <p>The Ultimate Free YouTube Downloader</p>
  </div>
<div class="col-sm-12 col-xs-12 user_guide_section_b">

  <div class="row">
  <div class="col-sm-3">

  <div class="panel-group" id="userguide" role="tablist" aria-multiselectable="true">
  @foreach($menu_user_guide as $menu_guide_item)
    <div class="panel panel-default">
     <div class="panel-heading" role="tab" id="headingOne">
       <h4 class="panel-title">
         <a role="button" data-toggle="collapse" data-parent="#userguide" href="#{{str_replace(' ','_',$menu_guide_item->label)}}" aria-expanded="true" aria-controls="collapseOne">
           {{$menu_guide_item->label}}
         </a>
       </h4>
     </div>
     <div id="{{str_replace(' ','_',$menu_guide_item->label)}}" class="panel-collapse collapse">
       <div class="panel-body">
         @if($menu_guide_item->hasChildren())
         <ul>
           @foreach($menu_guide_item->hasChildren as $sub_menu_guide_item)
           <li @if($sub_menu_guide_item->label == $guideitem->title) class="selected" @endif ><a href="{{$sub_menu_guide_item->link}}">{{$sub_menu_guide_item->label}}</a>

           </li>
           @endforeach
         </ul>
         @endif
       </div>
     </div>
   </div>
   @endforeach
  </div>
  </div>
  <div class="col-sm-9 userguide_show">
  <h1>{{$guideitem->title}}</h1>
  <p> {!! $guideitem->description !!}</p>

  <div class="row">
    <div class="col-sm-6">
      @if($guideitem->prev_item)
    Previous:  <a href="{{route('guide.show',$guideitem->previtem->slug)}}">{{$guideitem->previtem->title}}</a>
      @endif

    </div>

  <div class="col-sm-6">
    @if($guideitem->next_item)
    Next:  <a href="{{route('guide.show',$guideitem->nextitem->slug)}}">{{$guideitem->nextitem->title}}</a>
    @endif

  </div>
  </div>

  </div>

  </div>

</div>
</div>
</div>
</div>


@section('scriptsAfterJs')
<script>
  $(document).ready(function () {

$("#userguide .selected").css("text-decoration",'underline');
$("#userguide .selected").parents(".panel-collapse").addClass('collapse in');
$(".userguide_show img").addClass('img-responsive');

  });
</script>
@endsection

@endsection
