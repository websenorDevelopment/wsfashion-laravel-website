<?php

namespace App\Http\Controllers;


use App\Models\Section;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $sections = Section::latest();

        if (!empty($request->get("keyword"))) {
            $sections = $sections->where("name", "like", "%" . $request->get("keyword") . "%");
        }
        $sections = $sections->paginate(10);

        // dd($sections); // For Debugging Purpose Only (-  #Removable-Content )
        return view("admin.sections.list", compact("sections")); // Sending Data To View Using "compact()" function.
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $sections = Section::all(); // Fetch all sections
        return view('admin.sections.create', compact('sections')); // Pass sections to the view
        // echo "<h1> Category Create Page </h1>";
        // return view("admin.sections.create"); // Form To Add Categories
    }

    /**
     * Store a newly created resource in storage.
     */ public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:categories',
            'status' => 'required|in:0,1', // Ensure status is either 0 or 1
        ]);

        if ($validator->passes()) {
            $sections = new Section(); // Making a new Instance of Category Model.
            $sections->name = $request->name; // Getting Name (Values) From The Form Using Request Method
            $sections->slug = $request->slug;
            $sections->status = $request->status;
            $sections->showhome = $request->showhome;
            $sections->save();
            // Save Temporary Image Permanently In Dtabase Here.
            if (!empty($request->image_id)) {

                $tempImage = TempImage::find($request->image_id);
                $extArray = explode('.', $tempImage->name);
                $ext = last($extArray);
                $newImageName = $sections->id . '.' . $ext;
                $sPath = public_path("/tempImgs/$tempImage->name");
                $dPath = public_path("/uploads/Sections/$newImageName");
                // File::copy($sPath, $dPath);
                File::move($sPath, $dPath);
                $sections->image = $newImageName;
                $sections->save();
            }
            Session::flash('success', 'Section Has Been Added Successfully');

            return response()->json([
                'status' => true,
                'message' => 'Section Has Been Added Successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Sorry Section Could Not Be Added. It Might Be Already Present. Please Check Once Againg'
            ]);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */ public function edit($sectionId, Request $request)
    {
        // echo $sectionId; // Testing Purpose
        $section = Section::find($sectionId);
        if (empty($section)) {
            return redirect()->route('sections.index');
        }
        return view('admin.sections.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($sectionId, Request $request)
    {
        $section = Section::find($sectionId);
        if (empty($section)) {
            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => 'Section Not Found'
            ]);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:sections,slug,' . $section->id . ',id',
        ]);
        if ($validator->passes()) {
            $section->name = $request->name; // Getting Name (Values) From The Form Using Request Method
            $section->slug = $request->slug;
            $section->status = $request->status;
            $section->showhome = $request->showhome;
            $section->save();

            $oldImage = $section->image;

            if (!empty($request->image_id)) {
                $tempImage = TempImage::find($request->image_id);
                $extArray = explode('.', $tempImage->name);
                $ext = last($extArray);

                $newImageName = $section->id . '-' . time() . '.' . $ext;

                $sPath = public_path("/tempImgs/$tempImage->name");
                $dPath = public_path("/uploads/Sections/$newImageName");

                // File::copy($sPath, $dPath);
                File::move($sPath, $dPath);

                $section->image = $newImageName;
                $section->save();

                // Deleting Old Image, To Reduce Server Load.
                // File::delete(public_path("/tempImg/$tempImage->name"));
                File::delete(public_path("/uploads/Sections/$oldImage"));
            }

            // return redirect()->route('categories.index');

            Session::flash('success', 'Section Has Been Updated Successfully');

            return response()->json([
                'status' => true,
                'message' => 'Section Has Been Updated Successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Sorry. The Section Could Not Be Updated.'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($sectionId, Request $request)
    {
        $section = Section::find($sectionId); // TO Find Category By Using ID
        if (empty($section)) {
            // return redirect()->route('categories.index');

            Session::flash("error", "Section Could Not Be Found.");

            return response()->json([
                "status" => false,
                "message" => "Section Could Not Be Deleted Successfully."
            ]);
        }

        File::delete(public_path("/uploads/Sections/$section->image"));
        File::delete(public_path("/tempImgs/$section->image"));

        $section->delete();


        Session::flash("success", "Section Has Been Successfully Deleted.");

        return response()->json([
            "status" => true,
            "message" => "Section Has Been Deleted Successfully !",
        ]);
    }
}
