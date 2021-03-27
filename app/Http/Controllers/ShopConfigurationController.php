<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopConfigurationController extends Controller
{
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
    public function saveConfiguration(Request $request)
    {
        $request->validate([
            'number_field' => 'required|numeric|min:0'
        ]);
         
        $request->user()->shopConfiguration->number_field = $request->number_field;
        $request->user()->shopConfiguration->save();

        return redirect()->route('dashboard', [
            'success' => True,
            'message' => 'Configuration Updated Successfully', 
        ]);
    }
}
