@extends('frontend::layouts.master')
@push('css')

<!-- meta -->
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
{!! Twitter::generate() !!}
<!-- end meta -->

@endpush
@section('content')
<section id="page-title">

   <div class="container clearfix">
      <h1>{{ trans('frontend::frontend.sharing') }}</h1>
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
         <li class="breadcrumb-item active" aria-current="page"><a href={{ route('frontend.tintuc.get') }}>{{ trans('frontend::frontend.new') }}</a></li>
         <li class="breadcrumb-item active" aria-current="page"><a href={{ getTitleposts($slug)->getRoute() }}> {{ getTitleposts($slug)->name }}</a></li>
      </ol>
   </div>

</section><!-- #page-title end -->

<section id="content">

   <div class="content-wrap">

      <div class="container notopmargin clearfix">
        {{-- class postcontent --}}
        <div class=" nobottommargin clearfix">

         <!-- Posts ============================================= -->
         <div class="single-post nobottommargin">

            <!-- Single Post -->
            <div class="entry clearfix">
               <h3>{{ $post->getTitle() }}</h3>
               <!-- Entry Meta -->
               <ul class="entry-meta clearfix">
                  <li><i class="icon-calendar3"></i> {{ $post->getCreatedAt() }} </li>
                  <li><i class="icon-folder-open"></i> {!! $post->getCategoryTitle() !!}</li>

               </ul><!-- .entry-meta end -->

               <!-- Entry Content -->
               <div class="entry-content hct-post-content notopmargin">

                  {!! $post->getContent() !!}
                  <!-- Post Single - Content End -->


                  @if($post->tags)
                  <!-- Tag Cloud -->
                  <div class="tagcloud clearfix bottommargin-sm topmargin-sm">
                     @foreach($post->tags as $t)
                     <a href="{{ $t->getRoute() }}">{{ $t->getTitle() }}</a>
                     @endforeach
                  </div><!-- .tagcloud end -->
                  @endif
                  <div class="clear"></div>

                  <!-- Product Single - Share -->
                  <div class="si-share noborder clearfix" style="margin-top: 15px;">
                    <span>{{ trans('frontend::frontend.share') }}:</span>
                    <div>
                     @push('css')
                     <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
                     @endpush
                     <span class='st_facebook_large' displayText='Facebook'></span>
                     <span class='st_googleplus_large' displayText='Poogleplus'></span>
                     <span class='st_twitter_large' displayText='Tweet'></span>
                     <span class='st_linkedin_large' displayText='LinkedIn'></span>
                     <span class='st_pinterest_large' displayText='Pinterest'></span>
                     <span class='st_email_large' displayText='Email'></span>
                  </div>
               </div>

            </div>
         </div><!-- .entry end -->

               <!-- Post Navigation --> <?php /* 
               <div class="post-navigation clearfix">

                  <div class="col_half nobottommargin">
                     <a href="#">⇐ This is a Standard post with a Slider Gallery</a>
                  </div>

                  <div class="col_half col_last tright nobottommargin">
                     <a href="#">This is an Embedded Audio Post ⇒</a>
                  </div>

               </div><!-- .post-navigation end -->
               <div class="line"></div>
               */ ?>
               @php
               $related_post = get_related_post($post->getCategoryId(),$post->getId())
               @endphp
               
               @if($related_post)

               <h4>{{ trans('frontend::frontend.related') }}:</h4>
               <div class="related-posts clearfix">
                  <div class="row">
                     @foreach($related_post as $key => $v)
                     <div class="col-md-3">
                        <div class="entry clearfix">
                           <div class="entry-image">
                              <a href="{{ $v->getRoute() }}" data-lightbox="image"><img class="image_fade" src="{{ $v->getImage() }}" alt="Standard Post with Image"></a>
                           </div>
                           <div class="entry-title">
                              <h2><a href="{{ $v->getRoute() }}">{{ $v->getName() }}</a></h2>
                           </div>
                           <ul class="entry-meta clearfix">
                              <li><i class="icon-calendar3"></i> {{ $v->getCreatedAt() }}</li>
                           </ul>
                        </div>
                     </div>
                     @endforeach
                  </div>
               </div>
               @endif
            </div>
         </div><!-- .postcontent end -->

         {{-- Sidebar=============================================
            @include('frontend::layouts.blog_sidebar') --}}

         </div>

      </div>

   </section><!-- #content end -->

   @endsection