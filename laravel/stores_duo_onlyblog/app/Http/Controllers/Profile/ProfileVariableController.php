<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Seo;
use App\Editsection;

class ProfileVariableController extends Controller
{
    public function getOnePage()
    {
        $pageName = 'SOME1';
        $seo = Seo::GetForPagename($pageName)->get();

        $sectionContent = Editsection::GetSectionContent($pageName)->get();
        $sectionImages = Editsection::GetSectionImages($pageName)->get();

        $sectionContentArr = [];
        foreach($sectionContent as $temp) {
            $sectionContentArr[$temp->sectionId] = $temp->sectionContent;
        }

        return view('profile.profile-one')->with([
            'pageName' => $pageName,
            'seo' => $seo,
            'sc' => $sectionContentArr,
            'sectionImages' => $sectionImages,
        ]);
    }

    public function getTwoPage()
    {
        $pageName = 'SOME2';
        $seo = Seo::GetForPagename($pageName)->get();

        $sectionContent = Editsection::GetSectionContent($pageName)->get();
        $sectionImages = Editsection::GetSectionImages($pageName)->get();

        $sectionContentArr = [];
        foreach($sectionContent as $temp) {
            $sectionContentArr[$temp->sectionId] = $temp->sectionContent;
        }

        return view('profile.profile-two')->with([
            'pageName' => $pageName,
            'seo' => $seo,
            'sc' => $sectionContentArr,
            'sectionImages' => $sectionImages,
        ]);
    }

    public function getThreePage()
    {
        $pageName = 'SOME3';
        $seo = Seo::GetForPagename($pageName)->get();

        $sectionContent = Editsection::GetSectionContent($pageName)->get();
        $sectionImages = Editsection::GetSectionImages($pageName)->get();

        $sectionContentArr = [];
        foreach($sectionContent as $temp) {
            $sectionContentArr[$temp->sectionId] = $temp->sectionContent;
        }

        return view('profile.profile-three')->with([
            'pageName' => $pageName,
            'seo' => $seo,
            'sc' => $sectionContentArr,
            'sectionImages' => $sectionImages,
        ]);
    }

    public function getFourPage()
    {
        $pageName = 'SOME4';
        $seo = Seo::GetForPagename($pageName)->get();

        $sectionContent = Editsection::GetSectionContent($pageName)->get();
        $sectionImages = Editsection::GetSectionImages($pageName)->get();

        $sectionContentArr = [];
        foreach($sectionContent as $temp) {
            $sectionContentArr[$temp->sectionId] = $temp->sectionContent;
        }

        return view('profile.profile-four')->with([
            'pageName' => $pageName,
            'seo' => $seo,
            'sc' => $sectionContentArr,
            'sectionImages' => $sectionImages,
        ]);
    }

    public function getFivePage()
    {
        $pageName = 'SOME5';
        $seo = Seo::GetForPagename($pageName)->get();

        $sectionContent = Editsection::GetSectionContent($pageName)->get();
        $sectionImages = Editsection::GetSectionImages($pageName)->get();

        $sectionContentArr = [];
        foreach($sectionContent as $temp) {
            $sectionContentArr[$temp->sectionId] = $temp->sectionContent;
        }

        return view('profile.profile-five')->with([
            'pageName' => $pageName,
            'seo' => $seo,
            'sc' => $sectionContentArr,
            'sectionImages' => $sectionImages,
        ]);
    }
}
