<?php

namespace App\Http\Controllers;

use App\Traits\FlashMessages;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    //
    use FlashMessages;
    protected $data = null;

    /**
     * @param $title
     * @param $subTitle
     */

    protected function setPageTitle($title, $subTitle)
    {
        //This function is taking two parameters $title and $subtitle. We use the view() helper function to attach them using share() method.

        view()->share(['pageTitle' => $title, 'subTitle' => $subTitle]);
    }

    /**
     * method to show error page with our custom message and type of error page we want to load.
     * @param int $errorCode
     * @param null $message
     * @return \Illuminate\Http\Response
     */
    protected function showErrorPage($errorCode = 404, $message = null)
    {
        $data['message'] = $message;
        return response()->view('errors.'.$errorCode, $data, $errorCode);
    }

    /**
     * For VueJS
     * @param bool $error
     * @param int $responseCode
     * @param array $message
     * @param null $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function responseJson($error = true, $responseCode = 200, $message = [], $data = null)
    {
        return response()->json([
            'error'         =>  $error,
            'response_code' => $responseCode,
            'message'       => $message,
            'data'          =>  $data
        ]);
    }

    /**
     * redirect to a page or route if the request is HTTP
     * @param $route
     * @param $message
     * @param string $type
     * @param bool $error
     * @param bool $withOldInputWhenError
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function responseRedirect($route, $message, $type = 'info', $error = false, $withOldInputWhenError = false)
    {
        $this->setFlashMessage($message, $type);
        $this->showFlashMessages();

        if ($error && $withOldInputWhenError) {
            return redirect()->back()->withInput();
        }

        return redirect()->route($route);
    }

    /**
     *
     * @param $message
     * @param string $type
     * @param bool $error
     * @param bool $withOldInputWhenError
     * @return \Illuminate\Http\RedirectResponse
     */

    /**
     * we might want to redirect the user to the previous page,
     * for example when we update a category we should send
     * the user to the same category view.
     */

    protected function responseRedirectBack($message, $type = 'info', $error = false, $withOldInputWhenError = false)
    {
        $this->setFlashMessage($message, $type);
        $this->showFlashMessages();

        return redirect()->back();
    }
}
