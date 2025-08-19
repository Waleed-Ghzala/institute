<?php

namespace App\Http\Controllers\advertisements;

use App\Traits\WebResponse;
use Illuminate\Http\Request;
use App\Models\Advertisements;
use App\Http\Controllers\Controller;
use App\Http\Requests\advertisementsRequest;
use App\Http\Resources\AdvertisementsResource;

class new_advertisements extends Controller
{// middlewere للتحقق ان المستخدم مدرس او موظف
 use   WebResponse;
    public function add_advertisements(advertisementsRequest $request){ // الاعلانات اما صور او ملفات

$path = $request->file('advertisement_Content')->store('advertisements', 'public');

$data=Advertisements::create([
'type'=>$request->type,
'advertisement_Content'=>$path,
'date'=>$request->date,
]);

return $this->response(new AdvertisementsResource($data),'Added successfully',200);

    }
}
