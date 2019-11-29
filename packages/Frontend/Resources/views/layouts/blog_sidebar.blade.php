<div class="sidebar nobottommargin clearfix">
   <div class="sidebar-widgets-wrap">
      <div class="row">
         @if(get_featured_post())
         <div class="col-md-12">
            <div class="kh-inf-2">
               <div class="info-title"><h4>TIN NỔI BẬT</h4></div>
               <div class="inf-kh">
                  @foreach(get_featured_post() as $relate)
                  <div class="spost clearfix" style="margin-top: 0 !important;">
                     <div class="entry-image">
                        <a href="{{ $relate->getRoute() }}"><img src="{{ $relate->getImage() }}" alt="Image" style="height: auto;"></a>
                     </div>
                     <div class="entry-c">
                        <div class="entry-title">
                           <h4><a href="{{ $relate->getRoute() }}">{{ $relate->getTitle() }}</a></h4>
                        </div>

                     </div>
                  </div>
                  @endforeach
               </div>                  
            </div>
         </div>
         @endif
         
      </div>

   </div>
</div><!-- .sidebar end -->