<?php

class UnknownController extends BaseController {

public function getUnknowns()
    {
        $data = Unknown::all();
        return View::make('home.unknown')
        ->with('datas',$data);
    }

}