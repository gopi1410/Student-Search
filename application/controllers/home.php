<?php

class Home extends CI_Controller {

    function index() {

        //Enter your Application Id and Application Secret keys
        $config['appId'] = '261651680594750';
        $config['secret'] = '7115e0970440b0c1b9ef32e0af2832c1';

        //Do you want cookies enabled?
        $config['cookie'] = true;
        
        //load Facebook php-sdk library with $config[] options
        $this->load->library('facebook', $config);

        //Load Session class for saving access token later
        $this->load->library('session');

        //Check to see if there is an active Facebook session.
        //We will not know if the session is valid until the call is made
        $session = $this->facebook->getSession();
        
        //Check to see if the access_token is present in Facebook session data
        if (!empty($session['access_token'])) {

            //Save token to Session data for later use
            $this->session->set_userdata('access_token', $session['access_token']);

        } else {

            //Extended Permissions requested from the API at time of login
            $auth_config['req_perms'] = 'publish_stream';

            //Dialog Form Factors used to display login page
            $auth_config['display'] = 'popup';

            //Callback URL once user is authenticated
            $auth_config['next'] = 'http://sourcewerks.com/fb-werks/index.php/home';

            //Get the login URL using the parameters in $auth_config array
            $login_url = $this->facebook->getLoginUrl($auth_config);
            header('Location: ' . $login_url);
        }

        //This is where you will make your all your calls

        //Example call using POST
        $params['message'] = 'Testing Facebook php-sdk with Codeigniter by Brandon Beasley http://brandonbeasley.com/';
        $this->facebook->api('/tbrandonbeasley/feed', 'POST', $params);

        //Example call listing friends of active user using GET (default)
        $data['api_info']    = $this->facebook->api('/me/friends');
        
        //Get the logout URL
        $data['logout_url'] = $this->facebook->getLogoutUrl();

        //Load view to display results of API calls
        $this->load->view('example', $data);
    }    
}

