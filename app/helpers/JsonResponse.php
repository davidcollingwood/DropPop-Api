<?php

class JsonResponse extends Illuminate\Support\Facades\Facade {
    protected static function getFacadeAccessor() { return 'JsonResponseInstance'; }
}

class JsonResponseInstance {

    /**
     * JSON success repsonse.
     * 
     * @param   object  $data
     * @param   object  $meta   
     * @param   mixed   $message 
     * @return  Response
     */
    public function success($data = null, $meta = null, $messages = null) {
        $response = array(
            'status' => 200,
            'success' => true
        );
        
        if ( $messages ) {
            $response['message'] = is_array($messages) ? $messages : array($messages);
        }

        if ( $meta ) {
            $response['meta'] = $meta;
        }
        
        if ($data) {
            $response = array_merge($response, array(
                'data' => $data
            ));
        }

        return Response::json($response);
    }


    /**
     * JSON success message response.
     * 
     * @param   mixed   $message 
     * @return  Response
     */
    public function message($messages) {
        $response = array(
            'status' => 200,
            'success' => true,
            'message' => is_array($messages) ? $messages : array($messages)
        );

        return Response::json($response);
    }


    /**
     * JSON error response.
     *  
     * @param   mixed   $messages
     * @return  Response
     */
    public function error($messages = null) {
        // Are the messages in a message bag
        if ( $messages instanceof Illuminate\Support\MessageBag ) {
            $messages = $messages->all();
        }

        if ( ! is_array($messages) ) {
            $messages = array($messages);
        }

        return Response::json(array(
            'status' => 500,
            'success' => false,
            'error' => $messages
        ), 500);
    }


    /**
     * JSON auth response.
     *
     * @param   mixed $messages
     * @return  Response
     */
    public function auth($messages = null) {
        $messages = ($messages)?: Lang::get('messages.login_required');

        return Response::json(array(
            'status' => 401,
            'success' => false,
            'error' => $messages
        ), 401);
    }

}