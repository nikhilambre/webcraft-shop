<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Editsection;
use App\Seo;
use App\Message;

class ProfileController extends Controller
{
    public function getHomePage()
    {
        $pageName = 'HOME';
        $seo = Seo::GetForPagename($pageName)->get();

        $sectionContent = Editsection::GetSectionContent($pageName)->get();
        $sectionImages = Editsection::GetSectionImages($pageName)->get();

        $sectionContentArr = [];
        foreach($sectionContent as $temp) {
            $sectionContentArr[$temp->sectionId] = $temp->sectionContent;
        }

        return view('profile.profile-home')->with([
            'pageName' => $pageName,
            'seo' => $seo,
            'sc' => $sectionContentArr,
            'sectionImages' => $sectionImages,
        ]);
    }

    public function getAboutPage()
    {
        $pageName = 'ABOUT';
        $seo = Seo::GetForPagename($pageName)->get();

        $sectionContent = Editsection::GetSectionContent($pageName)->get();
        $sectionImages = Editsection::GetSectionImages($pageName)->get();

        $sectionContentArr = [];
        foreach($sectionContent as $temp) {
            $sectionContentArr[$temp->sectionId] = $temp->sectionContent;
        }

        return view('profile.profile-about')->with([
            'pageName' => $pageName,
            'seo' => $seo,
            'sc' => $sectionContentArr,
            'sectionImages' => $sectionImages,
        ]);
    }

    public function getContactPage()
    {
        $pageName = 'CONTACT';
        $seo = Seo::GetForPagename($pageName)->get();

        $sectionContent = Editsection::GetSectionContent($pageName)->get();
        $sectionImages = Editsection::GetSectionImages($pageName)->get();

        $sectionContentArr = [];
        foreach($sectionContent as $temp) {
            $sectionContentArr[$temp->sectionId] = $temp->sectionContent;
        }

        return view('profile.profile-contact')->with([
            'pageName' => $pageName,
            'seo' => $seo,
            'sc' => $sectionContentArr,
            'sectionImages' => $sectionImages,
        ]);
    }

    public function postContactPage(Request $request)
    {
        $this->validate($request, [
            'g-recaptcha-response' => 'required|captcha',
            'messageName' => 'required',
            'messageEmail' => 'required',
            'messageContact' => 'required',
            'messageText' => 'required',
        ]);

        $captcha = $request->input('g-recaptcha-response');
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $privatekey = '';

        if ($captcha) {
            $response = file_get_contents("$url?secret=$privatekey&response=$captcha");
            $result = json_decode($response);

            if (isset($result->success) AND $result->success==true) {
                $message = new Message();

                $message->messageName = $request->input('messageName');
                $message->messageEmail = $request->input('messageEmail');
                $message->messageContact = $request->input('messageContact');
                $message->messageFlag = 'Unread';
                $message->messageText = $request->input('messageText');
        
                $message->save();
                return response()->json(['message' => 'Message Saved Successfully.'], 201);

            } else {
                return $result->error_code;
            }
        } else {
            return redirect('/');
        }

    }

    public function getTermsPage()
    {
        $sectionContent = Editsection::GetSectionContent($pageName)->get();
        $sectionImages = Editsection::GetSectionImages($pageName)->get();

        $sectionContentArr = [];
        foreach($sectionContent as $temp) {
            $sectionContentArr[$temp->sectionId] = $temp->sectionContent;
        }

        return view('profile.profile-terms')->with([
            'pageName' => $pageName,
            'sc' => $sectionContentArr,
            'sectionImages' => $sectionImages,
        ]);
    }

    public function getPrivacyPage()
    {
        $sectionContent = Editsection::GetSectionContent($pageName)->get();
        $sectionImages = Editsection::GetSectionImages($pageName)->get();

        $sectionContentArr = [];
        foreach($sectionContent as $temp) {
            $sectionContentArr[$temp->sectionId] = $temp->sectionContent;
        }

        return view('profile.profile-privacy')->with([
            'pageName' => $pageName,
            'sc' => $sectionContentArr,
            'sectionImages' => $sectionImages,
        ]);
    }
}
