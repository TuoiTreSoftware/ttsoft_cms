<?php

namespace TTSoft\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use TTSoft\Post\Entities\Post;
use TTSoft\Post\Entities\Category;
use TTSoft\Page\Entities\Page;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use TTSoft\Frontend\Events\NotifyFormContact;
use TTSoft\Setting\Entities\Branch;
use TTSoft\Contact\Entities\Contact;

use SEOMeta;
use OpenGraph;
use Twitter;
## or
use SEO;

class FrontendController extends Controller
{
    protected $_news;
    public function __construct(Post $news, Page $page){
        $this->_news = $news;
        $this->_page = $page;
    }

    public function getHome(Request $request){
        $branchGroupByProvince = Branch::select('provinces_id')->groupBy('provinces_id')->get();
        $branches = Branch::findAll();
        return view('frontend::home.viken',compact('branchGroupByProvince','branches'));
    }

    public function getPageDetail($slug , $id){
        $page = $this->_page->findById($id);
        return view('frontend::page.detail',compact('page'));
    }

    public function getNewsDetail($slug , $id){
        $post = $this->_news->findById($id);
        SEOMeta::setTitle($post->name);
        SEOMeta::setDescription($post->meta_description);
        SEOMeta::addMeta('article:published_time', $post->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $post->category, 'property');
        SEOMeta::addKeyword($post->meta_keywords);
        OpenGraph::setDescription($post->meta_keywords);
        OpenGraph::setTitle($post->name);
        OpenGraph::setUrl($post->slug);
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'pt-br');
        OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);

        OpenGraph::addImage($post->slug);
        OpenGraph::addImage($post->image);/*->list('slug')*/
        OpenGraph::addImage(['url' => url($post->image), 'size' => 300]);
        OpenGraph::addImage(url($post->image), ['height' => 300, 'width' => 300]);

        OpenGraph::setTitle('Article')
        ->setDescription('Some Article')
        ->setType('article')
        ->setArticle([
            'published_time' => $post->created_at->toW3CString(),
            'modified_time' => $post->updated_at->toW3CString(),
            'expiration_time' => 'datetime',
            'author' => 'profile / array',
            'section' => 'string',
            'tag' => 'string / array'
        ]);

        // Namespace URI: http://ogp.me/ns/book#
        // book
        OpenGraph::setTitle('Book')
        ->setDescription('Some Book')
        ->setType('book')
        ->setBook([
            'author' => 'profile / array',
            'isbn' => 'string',
            'release_date' => 'datetime',
            'tag' => 'string / array'
        ]);

        // Namespace URI: http://ogp.me/ns/profile#
        // profile
        OpenGraph::setTitle('Profile')
        ->setDescription('Some Person')
        ->setType('profile')
        ->setProfile([
            'first_name' => 'string',
            'last_name' => 'string',
            'username' => 'string',
            'gender' => 'enum(male, female)'
        ]);

        // Namespace URI: http://ogp.me/ns/music#
        // music.song
        OpenGraph::setType('music.song')
        ->setMusicSong([
            'duration' => 'integer',
            'album' => 'array',
            'album:disc' => 'integer',
            'album:track' => 'integer',
            'musician' => 'array'
        ]);

        // music.album
        OpenGraph::setType('music.album')
        ->setMusicAlbum([
            'song' => 'music.song',
            'song:disc' => 'integer',
            'song:track' => 'integer',
            'musician' => 'profile',
            'release_date' => 'datetime'
        ]);

         //music.playlist
        OpenGraph::setType('music.playlist')
        ->setMusicPlaylist([
            'song' => 'music.song',
            'song:disc' => 'integer',
            'song:track' => 'integer',
            'creator' => 'profile'
        ]);

        // music.radio_station
        OpenGraph::setType('music.radio_station')
        ->setMusicRadioStation([
            'creator' => 'profile'
        ]);

        // Namespace URI: http://ogp.me/ns/video#
        // video.movie
        OpenGraph::setType('video.movie')
        ->setVideoMovie([
            'actor' => 'profile / array',
            'actor:role' => 'string',
            'director' => 'profile /array',
            'writer' => 'profile / array',
            'duration' => 'integer',
            'release_date' => 'datetime',
            'tag' => 'string / array'
        ]);

        // video.episode
        OpenGraph::setType('video.episode')
        ->setVideoEpisode([
            'actor' => 'profile / array',
            'actor:role' => 'string',
            'director' => 'profile /array',
            'writer' => 'profile / array',
            'duration' => 'integer',
            'release_date' => 'datetime',
            'tag' => 'string / array',
            'series' => 'video.tv_show'
        ]);

        // video.tv_show
        OpenGraph::setType('video.tv_show')
        ->setVideoTVShow([
            'actor' => 'profile / array',
            'actor:role' => 'string',
            'director' => 'profile /array',
            'writer' => 'profile / array',
            'duration' => 'integer',
            'release_date' => 'datetime',
            'tag' => 'string / array'
        ]);

        // video.other
        OpenGraph::setType('video.other')
        ->setVideoOther([
            'actor' => 'profile / array',
            'actor:role' => 'string',
            'director' => 'profile /array',
            'writer' => 'profile / array',
            'duration' => 'integer',
            'release_date' => 'datetime',
            'tag' => 'string / array'
        ]);

        // og:video
        OpenGraph::addVideo('http://example.com/movie.swf', [
            'secure_url' => 'https://example.com/movie.swf',
            'type' => 'application/x-shockwave-flash',
            'width' => 400,
            'height' => 300
        ]);

        // og:audio
        OpenGraph::addAudio('http://example.com/sound.mp3', [
            'secure_url' => 'https://secure.example.com/sound.mp3',
            'type' => 'audio/mpeg'
        ]);
        return view('frontend::tin_tuc.detail',compact('post','slug'));
    }
    // thêm liên hệ
    public function getLienhe(Request $request){
        $branches = Branch::findAll();
        return view('frontend::lien_he.index',compact('branches'));
    }

    public function postLienhe(Request $request){
     $data = $request->only(['name','email','phone_number','content','subject']);
     $info = Contact::create($data);
     event(new NotifyFormContact($info));
     flash_info(trans('Cảm ơn bạn đã liên hệ với chúng tôi.'));
     return redirect()->back();
 }
    // end thêm liên hệ

 public function getTintuc(Request $request){
    $posts = Post::orderBy('id','DESC')->where(['status' => 1])->paginate(env('WEB_PAGINATE',10));
    return view('frontend::tin_tuc.list',compact('posts'));
}

public function getGioithieu(Request $request){
    return view('frontend::gioi_thieu.index');
}

public function getAbout(Request $request){
    return view('frontend::about.about');
}

public function getNewsSlug($alias){
    $category = Category::where('slug',trim($alias))->first();
    if (!$category) {
        return redirect('/');
    }
    $posts = $category->posts()->where(['status' => 1])->orderBy('id','DESC')->paginate(env('WEB_PAGINATE',10));
    return view('frontend::tin_tuc.list',compact('posts','alias'));
}

    // Set Language Frontend
public function setlocaleLanguage($lang){
    session()->put('lang_locale_frontend', $lang);
    return redirect()->back();
}


}
