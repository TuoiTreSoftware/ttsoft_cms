@extends('frontend::layouts.master')
@section('content')
<section id="page-title">

   <div class="container clearfix">
      <h1>Vikensports Viet Nam</h1>
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
         <li class="breadcrumb-item active" aria-current="page"><a href={{ route('frontend.tintuc.get') }}>Tin tức</a></li>
      </ol>
   </div>

</section><!-- #page-title end -->

<section id="content">

   <div class="content-wrap">

      <div class="container topmargin clearfix">

         <div class="postcontent nobottommargin clearfix">

            <!-- Posts ============================================= -->
            <div class="single-post nobottommargin">

               <!-- Single Post -->
               <div class="entry clearfix">
                  <h3>{{ $page->getTitle() }}</h3>
                  <!-- Entry Meta -->
                  <ul class="entry-meta clearfix">
                     <li><i class="icon-calendar3"></i> 10th July 2014</li>
                     <li><i class="icon-folder-open"></i> <a href="#">General</a>, <a href="#">Media</a></li>
                  </ul><!-- .entry-meta end -->

                  <!-- Entry Content -->
                  <div class="entry-content hct-post-content notopmargin">

                     {!! $page->getContent() !!}
                     <!-- Post Single - Content End -->


                     @if($page->tags)
                     <!-- Tag Cloud -->
                     <div class="tagcloud clearfix bottommargin">
                        @foreach($page->tags as $t)
                        <a href="{{ $t->getRoute() }}">{{ $t->getTitle() }}</a>
                        @endforeach
                     </div><!-- .tagcloud end -->
                     @endif
                     <div class="clear"></div>

                     <!-- Post Single - Share -->
                     <div class="si-share noborder clearfix">
                        <span>{{ trans('frontend::frontend.sharenew') }}:</span>
                        <div>
                           <a href="#" class="social-icon si-borderless si-facebook">
                              <i class="icon-facebook"></i>
                              <i class="icon-facebook"></i>
                           </a>
                           <a href="#" class="social-icon si-borderless si-twitter">
                              <i class="icon-twitter"></i>
                              <i class="icon-twitter"></i>
                           </a>
                           <a href="#" class="social-icon si-borderless si-pinterest">
                              <i class="icon-pinterest"></i>
                              <i class="icon-pinterest"></i>
                           </a>
                           <a href="#" class="social-icon si-borderless si-gplus">
                              <i class="icon-gplus"></i>
                              <i class="icon-gplus"></i>
                           </a>
                           <a href="#" class="social-icon si-borderless si-rss">
                              <i class="icon-rss"></i>
                              <i class="icon-rss"></i>
                           </a>
                           <a href="#" class="social-icon si-borderless si-email3">
                              <i class="icon-email3"></i>
                              <i class="icon-email3"></i>
                           </a>
                        </div>
                     </div><!-- Post Single - Share End -->

                  </div>
               </div><!-- .entry end -->

            </div>
         </div><!-- .postcontent end -->

         <!-- Sidebar============================================= -->
         @include('frontend::layouts.blog_sidebar')

      </div>

   </div>

</section><!-- #content end -->

@endsection