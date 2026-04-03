<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    /**
     * Show the General settings form.
     */
    public function generalPage()
    {
        $settings = SiteSetting::getGroup('general');
        return view('admin.settings.general', compact('settings'));
    }

    /**
     * Update the General settings.
     */
    public function updateGeneralPage(Request $request)
    {
        $fields = [
            'site_name', 'site_title', 'site_description', 'site_keywords', 
        ];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                SiteSetting::set($field, $request->input($field), 'general');
            }
        }

        // Handle File Uploads
        if ($request->hasFile('site_logo')) {
            $logoPath = $request->file('site_logo')->store('settings', 'public');
            
            // Set the new value
            SiteSetting::set('site_logo', $logoPath, 'general');
        }
        
        if ($request->hasFile('site_favicon')) {
            $faviconPath = $request->file('site_favicon')->store('settings', 'public');
            
            // Set the new value
            SiteSetting::set('site_favicon', $faviconPath, 'general');
        }

        return redirect()->route('admin.settings.general')->with('success', 'General settings updated successfully.');
    }

    /**
     * Show the About page settings form.
     */
    public function aboutPage()
    {
        $settings = SiteSetting::getGroup('about');
        return view('admin.settings.about', compact('settings'));
    }

    /**
     * Update the About page settings.
     */
    public function updateAboutPage(Request $request)
    {
        $fields = [
            'about_hero_title', 'about_hero_subtitle',
            'about_stat_1_value', 'about_stat_1_label',
            'about_stat_2_value', 'about_stat_2_label',
            'about_stat_3_value', 'about_stat_3_label',
            'about_stat_4_value', 'about_stat_4_label',
            'about_story_title', 'about_story_content',
            'about_mission', 'about_vision', 'about_values',
            'about_team_member_1_name', 'about_team_member_1_role',
            'about_team_member_2_name', 'about_team_member_2_role',
            'about_team_member_3_name', 'about_team_member_3_role',
            'about_team_member_4_name', 'about_team_member_4_role',
        ];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                SiteSetting::set($field, $request->input($field), 'about');
            }
        }

        return redirect()->route('admin.settings.about')->with('success', 'About page updated successfully.');
    }

    /**
     * Show the Contact page settings form.
     */
    public function contactPage()
    {
        $settings = SiteSetting::getGroup('contact');
        return view('admin.settings.contact', compact('settings'));
    }

    /**
     * Update the Contact page settings.
     */
    public function updateContactPage(Request $request)
    {
        $fields = [
            'contact_phone', 'contact_email', 'contact_address',
            'contact_working_hours_weekday', 'contact_working_hours_saturday',
            'contact_map_embed', 'contact_facebook', 'contact_instagram',
            'contact_linkedin', 'contact_whatsapp',
        ];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                SiteSetting::set($field, $request->input($field), 'contact');
            }
        }

        return redirect()->route('admin.settings.contact')->with('success', 'Contact page updated successfully.');
    }
}
