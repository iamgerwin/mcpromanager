<?php

class HomeController extends BaseController {

    public function postKeywords()
    {
        $data = Account::all();
        return View::make('home.keywords')
        ->with('datas',$data);
    }
    public function postUnknowns()
    {
        $data = Unknown::all();
        return View::make('home.unknowns')
        ->with('datas',$data);
    }
    public function postKeywordsadd()
    {
        $rules = [
                            'keyword' => 'required|alpha_num|unique:tbl_account,keyword',
                            'name' => 'required|unique:tbl_account,name',
                            'url' => 'required|url|unique:tbl_account,url',
                            'active' => 'required|in:1,0'
                        ];

        $validator = Validator::make(Input::all(), $rules);

        if($validator->passes()) {
            Account::insert([
                'keyword' => Input::get('keyword'), 
                'name' => Input::get('name'),
                'url' => Input::get('url'),
                'active' => Input::get('active')
            ]);
            $success = "<script>    setTimeout(function() {
                            $.bootstrapGrowl('Successfully Added! :)', { type: 'success' });
                             }, 1000);</script>
                            <!--<ul class='alert alert-success'><li>Successfully Added!</li></ul>-->";
            return $success;
        } else {
            $errors = $validator->messages();
            $err = '<ul class="alert alert-error">';
            foreach ($errors->all() as $error) {
                $err .= '<li>'.$error.'</li>';
            }
            $err .= '</ul>';
            $err = "<script>
                setTimeout(function() {
                            $.bootstrapGrowl('Ouch! :( $err ', { type: 'danger' });
                             }, 0);</script>
            </script>";
            return $err;
        }
    }
    public function postKeywordsedit()
    {
        $id = Input::get('id');
        $rules = [
                            'keyword' => 'required|alpha_num|unique:tbl_account,keyword,'.$id.'',
                            'name' => 'required|unique:tbl_account,name,'.$id.'',
                            'url' => 'required|url|unique:tbl_account,url,'.$id.'',
                            'active' => 'required|in:1,0'
                        ];

        $validator = Validator::make(Input::all(), $rules);

        if($validator->passes()) {

            Account::where('id',Input::get('id'))
                ->update([
                'keyword' => Input::get('keyword'), 
                'name' => Input::get('name'),
                'url' => Input::get('url'),
                'active' => Input::get('active')
            ]);
            
            $success = "<script>    setTimeout(function() {
                            $.bootstrapGrowl('Successfully Updated! :)', { type: 'success' });
                             }, 0);</script>
                            <!--<ul class='alert alert-success'><li>Successfully Updated!</li></ul>-->";
            return $success;
        } else {
            $errors = $validator->messages();
            $err = '<ul class="alert alert-error">';
            foreach ($errors->all() as $error) {
                $err .= '<li>'.$error.'</li>';
            }
            $err .= '</ul>';
            $err = "<script>
                setTimeout(function() {
                            $.bootstrapGrowl('Ouch! :( $err ', { type: 'danger' });
                             }, 0);</script>
            </script>";
            return $err;
        }

    }

    public function getKeywordsdata()
    {
        $contents = Account::all()->toJson();
        $response = Response::make($contents, '200');
        $response->header('Content-Type', 'application/json');
        
        return ($response);
    }
}