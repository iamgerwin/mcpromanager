<?php

class GatewayController extends BaseController {

    public function postOut()
    {
      /*
          Keyword = string/numbers
          To = 09323333333,0932222222
          Msg = Hello world
      */
      $snd = Send::all();
        foreach($snd as $sd) {

            if($sd->keyword == Input::get('Keyword')) {
                if($sd->active == 1) {
                    if($sd->ip == $_SERVER['REMOTE_ADDR']) {
                                        $checker = 1;
                                        $data =  new stdClass();
                                          $data->username = '';
                                          $data->password= '';
                                          $data->to= Input::get('To');
                                          $data->msg = rawurlencode(Input::get('Msg'));
                          $url = "";
                         
                         return file_get_contents($url);
                    } else{
                      return 'Invalid  IP <br />'.$_SERVER['REMOTE_ADDR']; 
                    }
                } else {
                  return 'Inactive Keyword';
                }
                return 'Keyword Unknown';
            }

        }
    	
    }
}
