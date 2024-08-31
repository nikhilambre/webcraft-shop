<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Template;

class TemplateController extends Controller
{
    public function postTemplate(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'typeId' => 'required',
            'typeName' => 'required',
            'typeDescription' => 'required',
        ]);

        /**
        * To display errors use
        *
        * echo $validator->errors()->first('email');   in your html view below your respective field.
        * It will show first error on email field, there can be many, will show one at a time
        */

        $template = new Template();

        $template->type = $request->input('type');
        $template->typeId = $request->input('typeId');
        $template->subType = $request->input('subType');
        $template->typeName = $request->input('typeName');
        $template->typeDescription = $request->input('typeDescription');
        $template->htmlContent = $request->input('htmlContent');
        $template->customStyle = $request->input('customStyle');
        $template->vendorStyle = $request->input('vendorStyle');
        $template->fonts = $request->input('fonts');
        $template->vendorScripts = $request->input('vendorScripts');
        $template->scripts = $request->input('scripts');

        $template->save();
        return response()->json(['template' => $template], 201);
    }

    public function getTemplates()
    {
        //  $filters = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $template = Template::select('id','typeName','type','typeId','subType','created_at')
                            ->get();

        $response = [
            'data' => $template
        ];
        return response()->json($response, 200);
    }

    public function getTemplate($id)
    {
        $template = Template::select('id','type','typeId','subType','typeName','typeDescription','htmlContent','customStyle','vendorStyle','fonts','vendorScripts','scripts','created_at')
                            ->where('id', '=', $id)
                            ->get();

        $response = [
            'data' => $template
        ];
        return response()->json($response, 200);
    }

    public function putTemplate(Request $request, $id)
    {
        $template = Template::find($id);

        if(!$template) {
            return response()->json(['message' => 'Template not found'], 404);
        }

        $this->validate($request, [
            'type' => 'required',
            'typeId' => 'required',
            'typeName' => 'required',
            'typeDescription' => 'required',
        ]);

        $template->type = $request->input('type');
        $template->typeId = $request->input('typeId');
        $template->subType = $request->input('subType');
        $template->typeName = $request->input('typeName');
        $template->typeDescription = $request->input('typeDescription');
        $template->htmlContent = $request->input('htmlContent');
        $template->customStyle = $request->input('customStyle');
        $template->vendorStyle = $request->input('vendorStyle');
        $template->fonts = $request->input('fonts');
        $template->vendorScripts = $request->input('vendorScripts');
        $template->scripts = $request->input('scripts');

        $template->update();

        return response()->json(['template' => $template], 200);
    }

    public function deleteTemplate($id)
    {
        $template = Template::find($id);
        $template->delete();
        return response()->json(['message' => 'Template deleted Successfully.', 200]);
    }
}
