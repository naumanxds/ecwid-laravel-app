<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ShopConfiguration;

class ShopConfigurationController extends Controller
{
    /**
     * Ecwid Base Url for User Auth
     */
    const ECWID_AUTH_URL='https://my.ecwid.com/api/oauth/authorize';

    /**
     * Access response type required in Ecwid Authorization
     */
    const ECWID_RESPONSE_TYPE = 'code';

    /**
     * Access Scope for the Authorized User
     * List can be found on link below
     * https://api-docs.ecwid.com/reference/authentication-basics#access-scopes
     */
    const ECWID_ACCESS_SCOPE = 'read_orders';

    /**
     * Install Plugin for new Users
     *
     * @param Request $request
     */
    public function installPlugin(Request $request)
    {
        $request->validate([
            'shop_url' => 'required|url',
            'client_id' => 'required',
            'client_secret' => 'required',
            'number_field' => 'required|numeric|min:0'
        ]);

        $shopUrl = $request->shop_url;
        $clientId = $request->client_id;
        $clientSecret = $request->client_secret;
        $numberField = $request->number_field;

        if (
            $this->saveConfiguration($request->user(), $shopUrl, $clientId, $clientSecret, $numberField)
        ) {
            $this->authorizeUser($shopUrl, $clientId, $clientSecret);
        }

        return redirect()->route('dashboard', [
            'success' => False,
            'message' => 'Configuration Already Exists',
        ]);
    }

    /**
     * loads dashboard if valid configuration exists otherwise redirect to installation
     *
     * @param Request $request
     */
    public function loadDashboard(Request $request)
    {
        // Check if configuration exists and its valid
        if (
            is_null($request->user()->shopConfiguration)
        ) {
            return redirect('load_installation_form');
        }

        return view('dashboard', [
            'configuration' => $request->user()->shopConfiguration,
            'success' => $request->success ? $request->success : '',
            'message' => $request->message ? $request->message : ''
        ]);
    }

    /**
     * Save configuration of the Plugin
     *
     * @param Request $request
     */
    public function updateConfiguration(Request $request)
    {
        $request->validate([
            'number_field' => 'required|numeric|min:0'
        ]);

        $request->user()->shopConfiguration->update([
            'number_field' => $request->number_field
        ]);

        return redirect()->route('dashboard', [
            'success' => True,
            'message' => 'Configuration Updated Successfully',
        ]);
    }

    /**
     * Authorize User with Ecwid
     *
     * @param string $shopUrl
     * @param string $clientId
     */
    private function authorizeUser(
        string $shopUrl,
        string $clientId
    ) {
        $response = $this->doCurl('GET', self::ECWID_AUTH_URL, [
            'client_id' => $clientId,
            'redirect_uri' => 'http://localhost:8000/redirect',
            'response_type' => self::ECWID_RESPONSE_TYPE,
            'scope' => self::ECWID_ACCESS_SCOPE
        ]);
    }

    /**
     * Once the user is Authenticated he/she is redirect to this functions
     *
     * @param Request $request
     */
    public function redirectedUser(Request $request)
    {
        if (isset($request->code)) {
            dd('here=' . $request->code);
        } else {
            dd('here but error='. $request->error);
        }
    }

    /**
     * Save user Configuration
     *
     * @param User $user
     * @param string $shopUrl
     * @param string $clientId
     * @param string $clientSecret
     * @param int $numberField
     */
    private function saveConfiguration(
        User $user,
        string $shopUrl,
        string $clientId,
        string $clientSecret,
        int $numberField
    ) {
        if (!is_null($user->shopConfiguration)) {
            return False;
        }

        $configuration = new ShopConfiguration([
            'shop_url' => $shopUrl,
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'number_field' => $numberField
        ]);

        $user->shopConfiguration()->save($configuration);

        return True;
    }

    /**
     * Curl request
     *
     * @param string $requestType
     * @param string $path
     * @param array $query
     */
    private function doCurl(string $requestType, string $path, array $query =[])
    {
        try {
            $url = $path
                . '?client_id=' . $query['client_id']
                . '&redirect_uri=' . $query['redirect_uri']
                . '&response_type=' . $query['response_type']
                . '&scope=' . $query['scope'];

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
            $data = curl_exec($ch);
            if ($data == False) {
                echo 'error';
                dump(curl_error($ch));
            } else {
                echo 'success';
            }

            curl_close($ch);
        } catch (\Exception $e) {
            dd([
                'success' => False,
                'message' => $e->getMessage
            ]);
        }

        dump($data);
        dd('doCurl');

        return ['success' => True];
    }
}
