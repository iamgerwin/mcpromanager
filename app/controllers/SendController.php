<?php

class SendController extends BaseController {

	public function getIndex()
   	 {
	    	$menus = [
		                    [
		                        'url' => 'home',
		                        'label' => 'Home',
		                        'icon' => 'icon-home',
		                        'active' => ''
		                    ],
		                    [
		                     'url' => 'send',
		                     'label' => 'Outgoing',
		                     'icon'=> 'icon-chevron-right',
		                     'active' => 'active'
		                    ],
		                    [
		                        'url' => 'out',
		                        'label' => 'Logout',
		                        'icon' => 'icon-signout',
		                        'active' => ''
		                    ]
		                ];
	        		return View::make('send')->with('menus',$menus);
	 }
	 public function postIndex()
	 {
	 	$data = Send::all();

	 	return View::make('send.index')
	 		->with('data',$data);
	 }
	 public function  postAdd()
	 {
	 	$input = Input::all();
	 	
	 	
	 	
	 	$rules = [
	 		'Keyword' => 'required|alpha_num|unique:tbl_send,keyword',
	 		'Name' => 'required|max:200',
	 		'IP' => 'required|ip'
	 	];

	 	$validator = Validator::make($input, $rules);

        if($validator->passes()) {
        	$d =  date("Y-m-d H:i:s", time());  
            Send::insert([
                'keyword' => Input::get('Keyword'), 
                'name' => Input::get('Name'),
                'ip' => Input::get('IP'),
                'created_at' => $d
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

	 public function postEdit()
	 {
	 	$id = Input::get('ID');
	 	$rules = [
	                            'Keyword' => 'required|alpha_num|unique:tbl_send,keyword,'.$id.'',
	                            'Name' => 'required|unique:tbl_send,name,'.$id.'',
	                            'IP' => 'required|ip',
	                            'Active' => 'required|in:1,0'
	                        ];
	$validator = Validator::make(Input::all(), $rules);

     	if($validator->passes()) {
	            Send::where('id',Input::get('ID'))
	                ->update([
	                'keyword' => Input::get('Keyword'), 
	                'name' => Input::get('Name'),
	                'ip' => Input::get('IP'),
	                'active' => Input::get('Active')
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

}