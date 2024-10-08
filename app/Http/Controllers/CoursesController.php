<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\College;
use App\Models\University;
use App\Models\Loc\Country;
use App\Models\Loc\State;
use App\Models\Loc\City;
use App\Models\Qualification;
use App\Models\InstituteType;
use App\Models\ProgramLength;
use App\Models\SchoolType;
use App\Models\Subject;
use App\Models\CourseLevel;
use App\Models\IletsScore;
use App\Models\EnglishScore;
use App\Models\Intake;
use App\Models\MergeIntake;
use App\Models\CourseIntake;
use App\Models\ProgramTitle;
use App\Models\MathScore;
use Bitfumes\Multiauth\Model\Admin;
use Validator;
use Session;
use DB;
use Excel;
use App\Imports\UsersImport;
use Auth;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $collegeId = base64_decode($id);
        $courses = Course::where("college_id", $collegeId)->get();
        $college = College::with(["city"])
            ->where("id", $collegeId)
            ->first();

        return view(
            "admin.courses.coursesList",
            compact("courses", "collegeId", "college")
        );
    }
    public function Deactivate($id)
    {
        $id = base64_decode($id);
        $deactivate = Course::where("id", $id)->update(["status" => 0]);
        Session::flash("success", "course ativated");
        return back();
    }
    public function Activate($id)
    {
        $id = base64_decode($id);
        $activate = Course::where("id", $id)->update(["status" => 1]);
        Session::flash("success", "course deativated");
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $collegeId = base64_decode($id);
        $countries = Country::all();

        $course = Course::where("college_id", $collegeId)->first();
        $qualifications = Qualification::all();
        $programLengths = ProgramLength::all();
        $subjects = Subject::all();
        $courseLevels = CourseLevel::all();
        $iletsScores = IletsScore::all();
        $englishScores = EnglishScore::all();
        $intakes = Intake::all();
        $mergeIntakes = MergeIntake::all();
        $college = College::with(["city"])
            ->where("id", $collegeId)
            ->first();
        $programTitles = ProgramTitle::all();
        $mathScores = MathScore::all();
        return view(
            "admin.courses.addCourses",
            compact(
                "intakes",
                "mergeIntakes",
                "countries",
                "course",
                "collegeId",
                "qualifications",
                "programLengths",
                "college",
                "subjects",
                "courseLevels",
                "iletsScores",
                "englishScores",
                "programTitles",
                "mathScores"
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validate($request, [
            "name" => "required|min:2",
            "subject" => "required",
            "Plength" => "required",
            "intake" => "required",
            "merge_intake_id" => "required",
            "qualification" => "required",
            "courseLevel" => "required",
            "program_weblink" => "required",
            "tutionFee" => "required|min:1|max:3000",
            "applicationFee" => "required|min:1|max:3000",
            // 'course_unique_id' => 'required|unique:courses',
            "Pstatus" => "required",
            "priority" => "required",
            "country_id" => "required",
            "state_id" => "required",
            "city_id" => "required",
            // 'Pdelivery' => 'required',

            "totalCommission" => "required|min:1|max:500",
            "agentCommission" => "required|min:1|max:300",
            "admissionOverseasCut" => "required|min:1|max:300",
            "processingTime" => "required",
            "college_id" => "required",
        ]);
        $user = Auth::guard("admin")->user();
        if (!array_key_exists("isMath", $request->all())) {
            $request["isMath"] = "no";
        }

        $college = College::where("id", (int) $request->college_id)->first();

        if ($college["status"] == "1") {
            $status = "1";
        } else {
            $status = "0";
        }
        $course = Course::create([
            "inserted_by" => $user["id"],
            "name" => $request->name,
            "subject" => $request->subject,
            "status" => $status,
            "description" => $request->description,
            "program_length" => $request->Plength,
            "programTitle_id" => $request->programTitle,
            "qualification" => $request->qualification,
            "course_level" => $request->courseLevel,
            "institute_type" => $request->institute_type,
            "program_weblink" => $request->program_weblink,
            "durationText" => $request->duration_text,
            "tution_fee" => $request->tutionFee,
            "application_fee" => $request->applicationFee,
            "isIlets" => $request->isIlets,
            "country" => $request->country_id,
            "state" => $request->state_id,
            "city" => $request->city_id,
            "intake" => $request->intake,
            "merge_intake_id" => $request->merge_intake_id,
            "ilets_score" => $request->iletsScore,
            "english_score" => $request->englishScore,
            "program_status" => $request->Pstatus,
            // 'program_delivery'=>$request->Pdelivery,
            "scholarship" => $request->scholarship,
            "workexp" => $request->workexp,
            "internship" => $request->internship,
            "highlyCompetitive" => $request->highlyCompetitive,
            "priority" => $request->priority,
            "academicRequirement" => $request->academicRequirement,
            "isMath" => $request->isMath,
            "mathScore" => $request->mathScore,
            "total_commission" => $request->totalCommission,
            "agent_commission" => $request->agentCommission,
            "admission_overseasCut" => $request->admissionOverseasCut,
            "processing_time" => $request->processingTime,
            "college_id" => $request->college_id,
            "college_name" => $college["name"],
            "note" => $request->note,
        ]);
        $course->save();
        $courseId = $course->id;

        if ($request->course_unique_id) {
            $course = Course::where("id", $courseId)->update([
                "course_unique_id" => $request->course_unique_id . $courseId,
            ]);
        }
        // foreach($request->intake as $intake ){
        //     $courseIntake = CourseIntake::create([
        //         'intake_id'=> $intake,
        //         'course_id'=> $course['id'],
        //     ]);
        //     $courseIntake->save();
        // }
        Session::flash("success", "New Course created");
        return back()->withInput($request->all());
        // return back()->withInput($request->all());
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = base64_decode($id);

        $countries = Country::all();

        $qualifications = Qualification::all();
        $programLengths = ProgramLength::all();
        $courseLevels = CourseLevel::all();
        $iletsScores = IletsScore::all();
        $englishScores = EnglishScore::all();
        $intakes = Intake::all();
        $course = Course::with("Courseintakes")
            ->where("id", $id)
            ->first();
        // $subjects = Subject::where('qualification',$course['qualification'])->get();
        $subjects = Subject::get();
        $programTitles = ProgramTitle::all();
        $college = College::with(["city"])
            ->where("id", $course["college_id"])
            ->first();
        $mathScores = MathScore::all();
        return view(
            "admin.courses.showCourses",
            compact(
                "intakes",
                "countries",
                "course",
                "college",
                "qualifications",
                "programLengths",
                "subjects",
                "courseLevels",
                "iletsScores",
                "englishScores",
                "programTitles",
                "mathScores"
            )
        );
    }
    public function CourseVerify(Request $request)
    {
        $user = Auth::guard("admin")->user();
        $course = Course::find($request->course_id);
        $course->update(["verify_by" => $user["id"]]);
        Session::flash("success", "Course Verified Successfully");
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = base64_decode($id);
        $countries = Country::all();
        $qualifications = Qualification::all();
        $programLengths = ProgramLength::all();
        $courseLevels = CourseLevel::all();
        $iletsScores = IletsScore::all();
        $englishScores = EnglishScore::all();
        $intakes = Intake::all();
        $mergeIntakes = MergeIntake::all();
        $course = Course::with("Courseintakes")
            ->where("id", $id)
            ->first();
        // $subjects = Subject::where('qualification',$course['qualification'])->get();
        $subjects = Subject::get();
        $programTitles = ProgramTitle::all();
        $college = College::with(["city"])
            ->where("id", $course["college_id"])
            ->first();
        $mathScores = MathScore::all();
        return view(
            "admin.courses.editCourses",
            compact(
                "intakes",
                "mergeIntakes",
                "countries",
                "course",
                "college",
                "qualifications",
                "programLengths",
                "subjects",
                "courseLevels",
                "iletsScores",
                "englishScores",
                "programTitles",
                "mathScores"
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $this->validate($request, [
            "name" => "required|min:2",
            "subject" => "required",
            "Plength" => "required",
            "intake" => "required",
            "merge_intake_id" => "required",
            "qualification" => "required",
            "courseLevel" => "required",
            "program_weblink" => "required",
            "tutionFee" => "required|min:1|max:3000",
            "applicationFee" => "required|min:1|max:3000",
            "Pstatus" => "required",
            "priority" => "required",
            // 'Pdelivery' => 'required',
            "scholarship" => "required",
            "totalCommission" => "required|min:1|max:500",
            "agentCommission" => "required|min:1|max:300",
            "admissionOverseasCut" => "required|min:1|max:300",
            "processingTime" => "required",
            "college_id" => "required",
        ]);
        $courseCountry = Course::where("id", $id)->first();
        if (!$request->country_id) {
            $country = $courseCountry["country"];
        } else {
            $country = $request->country_id;
        }
        if (!$request->state_id) {
            $state = $courseCountry["state"];
        } else {
            $state = $request->state_id;
        }
        if (!$request->city_id) {
            $city = $courseCountry["city"];
        } else {
            $city = $request->city_id;
        }
        if (!array_key_exists("isMath", $request->all())) {
            $request["isMath"] = "no";
        }
        $user = Auth::guard("admin")->user();
        $college = College::where("id", (int) $request->college_id)->first();
        Course::where("id", $id)->update([
            "inserted_by" => $user["id"],
            "name" => $request->name,
            "subject" => $request->subject,
            "description" => $request->description,
            "program_length" => $request->Plength,
            "programTitle_id" => $request->programTitle,
            "qualification" => $request->qualification,
            "course_level" => $request->courseLevel,
            "institute_type" => $request->institute_type,
            "program_weblink" => $request->program_weblink,
            "tution_fee" => $request->tutionFee,
            "application_fee" => $request->applicationFee,
            "isIlets" => $request->isIlets,
            "ilets_score" => $request->iletsScore,
            "country" => $country,
            "state" => $state,
            "city" => $city,
            "intake" => $request->intake,
            "merge_intake_id" => $request->merge_intake_id,
            "durationText" => $request->duration_text,
            "english_score" => $request->englishScore,
            "program_status" => $request->Pstatus,
            "program_delivery" => $request->Pdelivery,
            "scholarship" => $request->scholarship,
            "workexp" => $request->workexp,
            "internship" => $request->internship,
            "highlyCompetitive" => $request->highlyCompetitive,
            "priority" => $request->priority,
            "academicRequirement" => $request->academicRequirement,
            "isMath" => $request->isMath,
            "mathScore" => $request->mathScore,
            "total_commission" => $request->totalCommission,
            "agent_commission" => $request->agentCommission,
            "admission_overseasCut" => $request->admissionOverseasCut,
            "processing_time" => $request->processingTime,
            "college_id" => $request->college_id,
            "college_name" => $college["name"],
            "note" => $request->note,
        ]);
        // CourseIntake::where('course_id',$id)->delete();
        // foreach($request->intake as $intake ){
        //     CourseIntake::create([
        //         'intake_id'=> $intake,
        //         'course_id'=> $id,
        //     ]);
        // }
        Session::flash("success", "Course detail updated");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::where("id", $id)->delete();
        Session::flash("success", "Course deleted");
        return back();
    }
    public function getSubjects($id)
    {
        $subjects = Subject::where("qualification", $id)->get();

        return $subjects;
    }
    public function importCountryStateCity($cname, $sname, $ccname)
    {
        $country = Country::where("name", $cname)->first();
        if (!$country) {
            $newCountry = Country::create(["name" => $cname]);
            $newCountry->save();
            $cId = $newCountry["id"];
        } else {
            $cId = $country["id"];
        }
        $state = State::where("name", $sname)->first();
        if (!$state) {
            $newState = State::create(["name" => $sname, "country_id" => $cId]);
            $newState->save();
            $sId = $newState["id"];
        } else {
            $sId = $state["id"];
        }
        $city = City::where("name", $ccname)->first();
        if (!$city) {
            $newCity = City::create([
                "name" => $ccname,
                "state_id" => $sId,
                "country_id" => $cId,
            ]);
            $newCity->save();
            $ccId = $newCity["id"];
        } else {
            $ccId = $city["id"];
        }

        return ["countryId" => $cId, "stateId" => $sId, "cityId" => $ccId];
    }
    public function importPrgramLength($durationName)
    {
        $programLength = ProgramLength::where("name", $durationName)->first();
        if (!$programLength) {
            $newprogramLength = ProgramLength::create([
                "name" => $durationName,
            ]);
            $newprogramLength->save();
            $dId = $newprogramLength["id"];
        } else {
            $dId = $programLength["id"];
        }

        return $dId;
    }
    public function importPrgramTitle($programTitle)
    {
        $ProgramTitle = ProgramTitle::where("name", $programTitle)->first();
        if (!$ProgramTitle) {
            $newProgramTitle = ProgramTitle::create(["name" => $programTitle]);
            $newProgramTitle->save();
            $ptId = $newProgramTitle["id"];
        } else {
            $ptId = $ProgramTitle["id"];
        }

        return $ptId;
    }
    public function importmathScore($mathScore)
    {
        $data = MathScore::where("name", $mathScore)->first();
        if (!$data) {
            $newData = MathScore::create(["name" => $mathScore]);
            $newData->save();
            $id = $newData["id"];
        } else {
            $id = $data["id"];
        }

        return $id;
    }

    public function importIeltsScore($ieltsScore)
    {
        $data = IletsScore::where("name", $ieltsScore)->first();
        if (!$data) {
            $newData = IletsScore::create(["name" => $ieltsScore]);
            $newData->save();
            $id = $newData["id"];
        } else {
            $id = $data["id"];
        }

        return $id;
    }
    public function importEnglishScore($englishScore)
    {
        $data = EnglishScore::where("score", $englishScore)->first();
        if (!$data) {
            $newData = EnglishScore::create(["score" => $englishScore]);
            $newData->save();
            $id = $newData["id"];
        } else {
            $id = $data["id"];
        }

        return $id;
    }

    function importCourse(Request $request)
    {
        $this->validate($request, [
            "select_file" => "required|mimes:xls,xlsx",
        ]);
        ini_set("memory_limit", "-1");
        ini_set("max_execution_time", 1500);

        $path = $request->file("select_file")->getRealPath();
        // $data = Excel::import(new UsersImport, $path);
        $data = Excel::import(new UsersImport, $path, null, \Maatwebsite\Excel\Excel::XLSX);
        Session::flash("success", "Students Excel sheet Successfully loaded");
        return back();
    }
}
