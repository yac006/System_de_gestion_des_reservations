<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Sessions\SessionsController;
use App\Http\Controllers\Notif\NotifController;
use App\Http\Controllers\Notif\New_account_notif_cont;
use App\Http\Controllers\MultiPages\MultipagesController;
use App\Http\Controllers\Full_calendar\full_calendar_controller;
use App\Http\Controllers\users_administraion\users_administration_cont;
use App\Http\Controllers\Notif\user_accounte_notif_cont;
use App\Http\Controllers\Validation\validation_controller;
use App\Http\Controllers\Full_calendar\Historique_planif_controller;
use App\Http\Controllers\Gestion_employes\Gest_employes_controller;
use App\Http\Controllers\Admin_reservations\Admin_rsv_controller;
//use App\Http\Controllers\jasperReoprt\Report_controller;
use App\Http\Controllers\Mpdf\MpdfController;
use App\Http\Controllers\Mail\Mail_Controller;
use App\Http\Controllers\ContactPage\ContactPgController;
use App\Http\Controllers\Gestion_salles\Gest_salle_controller;
use App\Http\Controllers\Gestion_vehicules\Gest_vehicules_controller;
use App\Http\Controllers\CrystalReport\crystal_report_cont;
use App\Http\Controllers\Dashboard\statistique_controller;
use App\Http\Controllers\Users_Account\Historique_des_demandes;
use Illuminate\Support\Facades\DB;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

// Route::get('/', function () { return view('welcome') ;});
Route::view('/' , 'auth.login')->name('Login');

/*--------------------------- Auth Routes ----------------------------*/
Route::view('Login' , 'auth.login')->name('Login');
Route::view('Register' , 'auth.register')->name('Register');

Route::post('Login' , [ LoginController::class ,'checkUsers']);
Route::post('Register' , [ RegisterController::class ,'create'])->middleware('register_validate');
Route::get('NotifAdmin' , [ RegisterController::class ,'notif_admin']);

/*--------------------------- Sessions Routes ----------------------------*/
Route::get('storeInSession' , [ SessionsController::class  , 'store_session_data']);
Route::get('deleteInSession' , [ SessionsController::class  , 'delete_session_data'])->name('logout');

//----------  Multi pages  -------------//
Route::get('multiPages/{param}' , [MultipagesController::class , 'verification'])->name('multiPages');

/*--------------------------- Notifications Routes ----------------------------*/
/*----- Admin pannel notif -----*/
Route::post('insertData' , [ NotifController::class ,'store_data'])->middleware('verification_demande_rsv');
Route::get('sendNotif' , [ NotifController::class ,'send_demande'])->name('sendNotif');
Route::get('broadcastNbrNotif' , [ NotifController::class ,'broadcast_nbr_notif']);
Route::get('markAsRead' , [NotifController::class ,'mark_as_read']);
Route::get('retriveAllNotif' , [NotifController::class ,'retrieve_all_notif']);
Route::get('showNotifBadge' , [NotifController::class ,'number_notif_badge']);
Route::get('DisplayNotifData' , [NotifController::class ,'display_notif_data']);


/*----- User accounte notif -----*/
Route::get('markAsReadUserNotif' , [user_accounte_notif_cont::class ,'mark_as_read']);
Route::get('showNotifBadgeUser' , [user_accounte_notif_cont::class ,'number_notif_badge']);

/*---- New account notif ----*/
Route::get('markAsRead2' , [New_account_notif_cont::class ,'mark_as_read']);
Route::get('showNotifBadge2' , [New_account_notif_cont::class ,'number_notif_badge']);
Route::get('showNotifData' , [New_account_notif_cont::class ,'display_notif_data']);
Route::get('accountActivation' , [New_account_notif_cont::class ,'compte_activation']);


//---------- Full-Calendar -------------//
Route::get('getData' , [ full_calendar_controller::class ,'retrieve']);
Route::get('storeData' , [ full_calendar_controller::class , 'store'])->middleware('check_repetition');
Route::put('updateData' , [  full_calendar_controller::class, 'update']);
Route::get('deleteData' , [ full_calendar_controller::class ,'delete']);
Route::get('ListNumDmnd' , [ full_calendar_controller::class ,'retrieve_list_num_dmnd']);

Route::get('retrieveSalPlan' , [ full_calendar_controller::class ,'retrieve_sal_plan_data']);
Route::get('retrieveVechPlan' , [ full_calendar_controller::class ,'retrieve_vech_plan_data']);

//formulaire de l'evenement planifier
Route::get('displayEventDetail' , function(){})->middleware('check_events_type');
Route::get('displayVechEventDetail' , [ full_calendar_controller::class ,'display_vech_event_detail'])->name('displayVechEventDetail');
Route::get('displaySalEventDetail' , [ full_calendar_controller::class ,'display_sal_event_detail'])->name('displaySalEventDetail');
Route::get('updateVechEventDetail' , [ full_calendar_controller::class ,'update_vech_event_detail']);
Route::get('updateSalEventDetail' , [ full_calendar_controller::class ,'update_sal_event_detail']);

//formulaire de planification de la demande 
Route::get('displayDmndDetail' , function(){})->middleware('check_dmnd_type');
Route::get('displayVechDmndDetail' , [ full_calendar_controller::class ,'display_vech_dmnd_detail'])->name('displayVechDmndDetail');
Route::get('displaySalDmndDetail' , [ full_calendar_controller::class ,'display_sal_dmnd_detail'])->name('displaySalDmndDetail');
Route::get('modelVechList' , [ full_calendar_controller::class ,'get_model_vech_list']);
Route::get('SallesList' , [ full_calendar_controller::class ,'get_salles_list']);
Route::get('typeVechList' , [ full_calendar_controller::class ,'get_type_vech_list']);

//---------- Mpdf (PDF GENERATOR) -------------//
Route::get('generatePdf' , [ MpdfController::class , 'generate_pdf'])->name('generatePdf');


//---------- Contact Page  -------------//
Route::get('getUsersList' , [ ContactPgController::class ,'get_users_list']);
Route::get('getSelectedUser' , [ ContactPgController::class ,'get_data_of_selected_user']);
Route::get('sendMailFromContactPg' , [ ContactPgController::class ,'send_mail']);


/*----------- Users Accountes Administration -----------*/
Route::resource('getAllUsers' , users_administration_cont::class)->names(['index' => 'getAllUsers.index']);
Route::resource('getSelectedUserData' , users_administration_cont::class)->names(['show' => 'getAllUsers.show']);
Route::resource('updateUserData' , users_administration_cont::class)->names(['update' => 'updateUserData.update']);
Route::resource('deleteUser' , users_administration_cont::class)->names(['delete' => 'deleteUser.delete']);
Route::resource('bloqueUser' , users_administration_cont::class)->names(['store' => 'bloqueUser.store']);

Route::get('refreshAdministrationPage' , function(){
    $param = "administration";
    return redirect()->route('multiPages' , $param);
});

//---------- DataTables Demandes (Validations)  -------------//
Route::get('getValidationData' ,[validation_controller::class, 'get_validation_data'])->name('getValidationData');
Route::post('validate' , [validation_controller::class ,'validate_demande'])->middleware('check_validations');
Route::post('reject' , [validation_controller::class ,'reject_demande'])->middleware('check_validations');
Route::get('broadcastNbrNotifusers' , [ validation_controller::class ,'broadcast_nbr_notif_users'])->name('broadcastNbrNotifusers');
Route::get('planifAuto' , [validation_controller::class ,'planif_auto']);
//Route::get('checkAndDeletePlan' , [validation_controller::class ,'check_and_delete_plan']);

//---------- DataTables (Gest employes)  -------------//
Route::resource('getEmployesData' , Gest_employes_controller::class)->names(['index' => 'getEmployesData.index']);
Route::resource('updateEmployesData' , Gest_employes_controller::class)->names(['update' => 'updateEmployesData.update']);
Route::resource('getSelectedEmployesData' , Gest_employes_controller::class)->names(['show' => 'getSelectedEmployesData.show']);
Route::resource('deleteEmployes' , Gest_employes_controller::class)->names(['destroy' => 'deleteEmployes.destroy']);
Route::resource('bloqueEmployes' , Gest_employes_controller::class)->names(['store' => 'bloqueEmployes.store']);
        

//---------- DataTables (Historique des planifications)  -------------//
Route::get('getPlanifVehc' ,[Historique_planif_controller::class, 'show_planifications_vech'])->name('getPlanifVehc');
Route::get('getPlanifSal' ,[Historique_planif_controller::class, 'show_planifications_sal'])->name('getPlanifSal');

//---------- DataTables (Gestion salles)  -------------//
Route::resource('getSalles' , Gest_salle_controller::class); 
Route::resource('addSalles' , Gest_salle_controller::class);
Route::resource('updateSalles' , Gest_salle_controller::class);
Route::resource('deleteSalles' , Gest_salle_controller::class);

//---------- DataTables (Gestion vehicules)  -------------//
Route::resource('getVehicules' , Gest_vehicules_controller::class); 
Route::resource('addVehicules' , Gest_vehicules_controller::class);
Route::resource('updateVehicules' , Gest_vehicules_controller::class);
Route::resource('deleteVehicules' , Gest_vehicules_controller::class);

Route::resource('getListTypeVehc' , Gest_vehicules_controller::class);

//---------- DataTables (Historique des demande (users account))  -------------//
Route::get('getDemandesData' ,[Historique_des_demandes::class, 'get_demandes_data'])->name('getDemandesData');

//------------  JasperReport (generate report) -------------//
// Route::get('report' ,[Report_controller::class, 'generateReport'])->name('report');

//------------  Mail -------------//
Route::get('sendMail' , [Mail_Controller::class , 'send_Mail'])->name('sendMail');
Route::get('prpSendMail' , [validation_controller::class , 'prepare_send_mail'])->name('prpSendMail');

//------------  Dashboard Statistique  -------------//
//pie chart
Route::get('countNbrRsvSalles' , [statistique_controller::class , 'count_nbr_rsv_salles']);
Route::get('countNbrRsvVehicules' , [statistique_controller::class , 'count_nbr_rsv_vehicules']);
Route::get('countNbrEmpInSecteur' , [statistique_controller::class , 'count_nbr_emp_in_secteur']);
//line chart
Route::get('countNbrValidationsInMonth' , [statistique_controller::class , 'count_nbr_validations_in_month']);



Route::get('test' , function(Request $request){

    Session::flush();

});








