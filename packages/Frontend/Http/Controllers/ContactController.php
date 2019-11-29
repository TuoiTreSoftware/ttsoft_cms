<?php

namespace TTSoft\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use TTSoft\Post\Entities\Post;
use TTSoft\Post\Entities\Category;
use TTSoft\Page\Entities\Page;
use TTSoft\Setting\Entities\Branch;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use TTSoft\Frontend\Events\NotifyFormContact;
use TTSoft\Contact\Entities\Contact;
use TTSoft\Frontend\Http\Requests\Web\ContactFormRequest;
class ContactController extends Controller
{
    /* Thêm liên hệ */
    public function postContact(ContactFormRequest $request){
        $data = $request->only(['name','email','content','subject']);
        $info = Contact::create($data);
        event(new NotifyFormContact($info));
        flash_info(trans('Cảm ơn bạn đã liên hệ với chúng tôi.'));
        return redirect()->back();
    }
}
