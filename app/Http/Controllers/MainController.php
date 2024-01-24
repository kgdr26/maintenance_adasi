<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;
use \Illuminate\Support\Facades\File;
use Illuminate\Support\Arr;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\user;
use Auth;
use Hash;
use Redirect;
use DB;

class MainController extends Controller
{

    function dasbor() : object {
        $idn_user   = idn_user(auth::user()->id);
        $data = array(
            'title'     => 'Dashboard',
            'idn_user'  => $idn_user
        );
     
        return view('Dashboard.list')->with($data);

    }

    // Manage Data
    function managerole() : object {
        $idn_user   = idn_user(auth::user()->id);
        $arr    = DB::table('mst_role')->where('is_active', 1)->get();
        $data = array(
            'title'     => 'Manage Data',
            'arr'       => $arr,
            'idn_user'  => $idn_user
        );
     
        return view('Managedata.role')->with($data);

    }

    function manageusers() : object {
        $idn_user   = idn_user(auth::user()->id);
        $arr    = DB::table('users')->select('users.*', 'mst_role.name as level')->leftJoin('mst_role', 'mst_role.id', '=', 'users.role_id')->where('users.is_active', 1)->get();
        $role   = DB::table('mst_role')->where('is_active', 1)->get();
        $data = array(
            'title'     => 'Manage Data',
            'arr'   => $arr,
            'role'  => $role,
            'idn_user'  => $idn_user
        );
     
        return view('Managedata.users')->with($data);

    }

    function managelocation() : object {
        $idn_user   = idn_user(auth::user()->id);
        $arr    = DB::table('mst_location')->where('is_active', 1)->get();
        $data = array(
            'title'     => 'Manage Data',
            'arr'       => $arr,
            'idn_user'  => $idn_user
        );
     
        return view('Managedata.location')->with($data);

    }

    function managesection() : object {
        $idn_user   = idn_user(auth::user()->id);
        $arr    = DB::table('mst_section')->where('is_active', 1)->get();
        $data = array(
            'title'     => 'Manage Data',
            'arr'       => $arr,
            'idn_user'  => $idn_user
        );
     
        return view('Managedata.section')->with($data);

    }

    function managemachine() : object {
        $idn_user   = idn_user(auth::user()->id);
        $arr        = DB::table('mst_machine')->select('mst_machine.*', 'mst_location.name as location', 'mst_section.name as section')->leftJoin('mst_location', 'mst_location.id', '=', 'mst_machine.id_location')->leftJoin('mst_section', 'mst_section.id', '=', 'mst_machine.id_section')->where('mst_machine.is_active', 1)->get();
        $section    = DB::table('mst_section')->where('is_active', 1)->get();
        $location   = DB::table('mst_location')->where('is_active', 1)->get();
        $data = array(
            'title'     => 'Manage Data',
            'arr'       => $arr,
            'section'   => $section,
            'location'  => $location,
            'idn_user'  => $idn_user
        );
     
        return view('Managedata.machine')->with($data);

    }

    // End Manage Data

    // Production
    function createcorrective() : object {
        $idn_user   = idn_user(auth::user()->id);

        $data = array(
            'title'     => 'Corrective',
            'idn_user'  => $idn_user
        );
     
        return view('Corrective.create')->with($data);

    }

    // End Production

    // Maintenance
    function actioncorrective() : object {
        $idn_user   = idn_user(auth::user()->id);
        $arr        = DB::table('trx_corrective')->select('trx_corrective.*', 'mst_machine.name as mc_name', 'mst_machine.type as mc_type', 'mst_location.name as location', 'mst_section.name as section', 'users.name as pic_name', 'mst_status.name as st_name', 'mst_status.color as st_color')
                                ->leftJoin('mst_status', 'mst_status.id', '=', 'trx_corrective.id_status')
                                ->leftJoin('mst_machine', 'mst_machine.id', '=', 'trx_corrective.id_machine')
                                ->leftJoin('mst_section', 'mst_section.id', '=', 'mst_machine.id_section')
                                ->leftJoin('mst_location', 'mst_location.id', '=', 'mst_machine.id_location')
                                ->leftJoin('users', 'users.id', '=', 'trx_corrective.id_user')->orderBy('trx_corrective.date_create', 'desc')->get();
        $data = array(
            'title'     => 'Corrective',
            'arr'       => $arr,
            'idn_user'  => $idn_user
        );
     
        return view('Corrective.action')->with($data);

    }

    
    // End Maintenance

    // Deptman
    function finishedcorrective() : object {
        $idn_user   = idn_user(auth::user()->id);
        $arr        = DB::table('trx_corrective')->select('trx_corrective.*', 'mst_machine.name as mc_name', 'mst_machine.type as mc_type', 'mst_location.name as location', 'mst_section.name as section', 'users.name as pic_name', 'mst_status.name as st_name', 'mst_status.color as st_color')
                                ->leftJoin('mst_status', 'mst_status.id', '=', 'trx_corrective.id_status')
                                ->leftJoin('mst_machine', 'mst_machine.id', '=', 'trx_corrective.id_machine')
                                ->leftJoin('mst_section', 'mst_section.id', '=', 'mst_machine.id_section')
                                ->leftJoin('mst_location', 'mst_location.id', '=', 'mst_machine.id_location')
                                ->leftJoin('users', 'users.id', '=', 'trx_corrective.id_user')
                                ->orderBy('trx_corrective.date_create', 'desc')->where('trx_corrective.id_status', 5)->get();
        $data = array(
            'title'     => 'Corrective',
            'arr'       => $arr,
            'idn_user'  => $idn_user
        );
        
        return view('Corrective.action')->with($data);

    }

    
    // End Deptman



    // Upload Image
    function upload_profile(Request $request) : object {

        if($request->hasFile('add_foto')){
            $fourRandomDigit = rand(10,99999);
            $photo      = $request->file('add_foto');
            $fileName   = $fourRandomDigit.'.'.$photo->getClientOriginalExtension();

            $path = public_path().'/assets/profiles/';

            File::makeDirectory($path, 0777, true, true);

            $request->file('add_foto')->move($path, $fileName);

            return response($fileName);
        }elseif($request->hasFile('add_image')){
            $fourRandomDigit = rand(10,99999);
            $photo      = $request->file('add_image');
            $fileName   = $fourRandomDigit.'.'.$photo->getClientOriginalExtension();

            $path = public_path().'/assets/corrective/';

            File::makeDirectory($path, 0777, true, true);

            $request->file('add_image')->move($path, $fileName);

            return response($fileName);
        }elseif($request->hasFile('add_mc')){
            $fourRandomDigit = rand(10,99999);
            $photo      = $request->file('add_mc');
            $fileName   = $fourRandomDigit.'.'.$photo->getClientOriginalExtension();

            $path = public_path().'/assets/machine/';

            File::makeDirectory($path, 0777, true, true);

            $request->file('add_mc')->move($path, $fileName);

            return response($fileName);
        }else{
            return response('Failed');
        }

    }

    // Action Add
    function actionadd(Request $request) : object {
        $table      = $request['table'];
        $dt         = $request['data'];
        if($table == 'users'){
            $data   = array(
                'username'  => $dt['username'],
                'password'  => Hash::make($dt['password']),
                'pass'      => $dt['password'],
                'role_id'   => $dt['role_id'],
                'name'      => $dt['name'],
                'email'     => $dt['email'],
                'no_tlp'    => $dt['no_tlp'],
                'foto'      => $dt['foto'],
                'status'    => 0,
                'is_active' => 1,
                'update_by' => auth::user()->id,
            );
        }else{
            $data   = $request['data'];
        }
        // $data       = $request['data'];
        DB::table($table)->insert([$data]);
        return response('success');
    }

    // Action Edit
    function actionedit(Request $request) : object {
        $table      = $request['table'];
        $id         = $request['id'];
        $whr        = $request['whr'];
        $dt         = $request['dats'];
        if($table == 'users'){
            $data   = array(
                'username'  => $dt['username'],
                'password'  => Hash::make($dt['password']),
                'pass'      => $dt['password'],
                'role_id'   => $dt['role_id'],
                'name'      => $dt['name'],
                'email'     => $dt['email'],
                'no_tlp'    => $dt['no_tlp'],
                'foto'      => $dt['foto'],
                'status'    => 0,
                'update_by' => auth::user()->id,
            );
        }else{
            $data   = $request['dats'];
        }

        DB::table($table)->where($whr, $id)->update($data);
        return response('success');
    }

    function actioneditwmulti(Request $request) : object {
        $table      = $request['table'];
        $id1        = $request['id1'];
        $whr1       = $request['whr1'];
        $id2        = $request['id2'];
        $whr2       = $request['whr2'];
        $data       = $request['dats'];

        DB::table($table)->where($whr1, $id1)->where($whr2, $id2)->update($data);
        return response('success');
    }

    // Action Delete
    function actiondelete(Request $request) : object {
        $table      = $request['table'];
        $id         = $request['id'];
        $whr        = $request['whr'];
        $data   = array(
            'is_active' => 0,
            'update_by' => 1,
        );
        DB::table($table)->where($whr, $id)->update($data);
        return response('success');
    }

    // Action Show Data
    function actionshowdata(Request $request) : object {
        $id     = $request['id'];
        $field  = $request['field'];
        $table  = $request['table'];
        $arr['data']    = DB::table($table)->where($field, $id)->first();
        return response($arr);
    }

    function actionshowdatawmulti(Request $request) : object {
        $id1     = $request['id1'];
        $field1  = $request['field1'];
        $id2     = $request['id2'];
        $field2  = $request['field2'];
        $table   = $request['table'];
        $arr['data']    = DB::table($table)->where($field1, $id1)->where($field2, $id2)->first();
        return response($arr);
    }

    // Action List Data
    function actionlistdata(Request $request) : object {
        if($request['id'] == 0 || $request['id'] == null){
            $id     = 1;
        }else{
            $id     = $request['id'];
        }
        $field  = $request['field'];
        $table  = $request['table'];
        $arr    = DB::select("SELECT * FROM $table WHERE $field=$id AND is_active=1 ");
        return response($arr);
    }

    // Generate QR
    function qrgeneratemachine(Request $request) : object {
        $arr    = DB::select("SELECT * FROM mst_machine");
        $jml    = count($arr)+1;

        $qrname = date('Y').'.'.date('m').'.'.sprintf("%09d", $jml);
        $qrCode = QrCode::size(300)->generate($qrname);
        $filePath = 'assets/qr/'.$qrname.'.svg';
        file_put_contents(public_path($filePath), $qrCode);

        $dt     = array(
            'qrname'    => $qrname
        );
        return response($dt);
    }

}
