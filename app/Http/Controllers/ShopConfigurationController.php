<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopConfigurationController extends Controller
{
    /**
     * Save Configuration Submitted by the User
     * 
     * @param Request $request
     * @return view
     */
    public function saveConfiguration(Request $request)
    {
        // TODO
    }

    /**
     * Install Plugin for new Users
     */
    public function installPlugin()
    {
        // TODO
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
            || !$request->user()->shopConfiguration->configuration_success
        ) {
            return redirect('load_installation_form');
        }

        return view('dashboard');
    }
}
