<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CalendarDataController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AspnetApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CacheLockController;
use App\Http\Controllers\EcgDoctorIncentiveController;
use App\Http\Controllers\ExpensesInOutHeaderController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\LicenseModuleController;
use App\Http\Controllers\PatientTreatmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\TreatmentTypeHierarchyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AspnetMembershipController;
use App\Http\Controllers\AspnetPathController;
use App\Http\Controllers\AspnetPersonalizationAllUserController;
use App\Http\Controllers\AspnetPersonalizationPerUserController;
use App\Http\Controllers\AspnetProfileController;
use App\Http\Controllers\AspnetRoleController;
use App\Http\Controllers\AspnetSchemaVersionController;
use App\Http\Controllers\AspnetUserController;
use App\Http\Controllers\AspnetUsersInRoleController;
use App\Http\Controllers\AspnetWebEventEventController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\BankDepositController;
use App\Http\Controllers\CacheController;
use App\Http\Controllers\ChairSlotController;
use App\Http\Controllers\ClientClinicController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClinicAttributesDatumController;
use App\Http\Controllers\ClinicAttributesMasterController;
use App\Http\Controllers\ClinicChairController;
use App\Http\Controllers\ClinicCommunicationConfigController;
use App\Http\Controllers\ClinicCommunicationMasterController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\ClinicLabSupplierController;
use App\Http\Controllers\ClinicLabWorkComponentController;
use App\Http\Controllers\ClinicLabWorkController;
use App\Http\Controllers\ClinicLabWorkDetailController;
use App\Http\Controllers\ClinicModulesAccessController;
use App\Http\Controllers\ClinicSearchAgentController;
use App\Http\Controllers\ClinicTvClinicRSSDatumController;
use App\Http\Controllers\ClinicTvConfigurationController;
use App\Http\Controllers\ClinicTvNewsTickerController;
use App\Http\Controllers\ClinicTVRSSURLMasterController;
use App\Http\Controllers\CommunicationGroupMasterController;
use App\Http\Controllers\CTSecurityController;
use App\Http\Controllers\DOCVersionController;
use App\Http\Controllers\DWSCofigGalleryAlbumController;
use App\Http\Controllers\DWSConfigClinicTimingController;
use App\Http\Controllers\DWSConfigGalleryAlbumsFileController;
use App\Http\Controllers\DWSConfigProviderController;
use App\Http\Controllers\DWSConfigServiceController;
use App\Http\Controllers\DWSConfigWebsiteController;
use App\Http\Controllers\EcgActivityEventController;
use App\Http\Controllers\EcgClinicRoleConfigurationController;
use App\Http\Controllers\EcgClinicSubscriptionModelController;
use App\Http\Controllers\ECGConfigChannelController;
use App\Http\Controllers\ECGConfigChannelInformationController;
use App\Http\Controllers\ECGDoctorIncentiveDetailController;
use App\Http\Controllers\EcgExternalRefferalDatumController;
use App\Http\Controllers\EcgExternalRefferalMasterController;
use App\Http\Controllers\ECGMRoleConfigurationController;
use App\Http\Controllers\ECGMSubscriptionModelController;
use App\Http\Controllers\ECGMTreatmentTypeHierarchyController;
use App\Http\Controllers\ECGPerpetualLicenseMappingController;
use App\Http\Controllers\ECGPerpetualLicenseMasterController;
use App\Http\Controllers\ECGSupportQueryController;
use App\Http\Controllers\ECGWebmessageController;
use App\Http\Controllers\ECGWebRequestController;
use App\Http\Controllers\EmailAttachmentController;
use App\Http\Controllers\EmailSituationController;
use App\Http\Controllers\EmailTemplateController;
use App\Http\Controllers\EmailTemplatesTagController;
use App\Http\Controllers\EmailTransactionController;
use App\Http\Controllers\ExpensesInOutDetailController;
use App\Http\Controllers\FeedbackQuestionController;
use App\Http\Controllers\FeedbackResponseBaseController;
use App\Http\Controllers\FeedbackResponseController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemCustomerController;
use App\Http\Controllers\ItemsHierarchyController;
use App\Http\Controllers\ItemStockController;
use App\Http\Controllers\ItemSupplierController;
use App\Http\Controllers\ItemType1Controller;
use App\Http\Controllers\ItemTypeController;
use App\Http\Controllers\JobBatchController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LookUpController;
use App\Http\Controllers\LookUpsMasterController;
use App\Http\Controllers\OtherCommunicationGroupController;
use App\Http\Controllers\PatientAllergyAttributeController;
use App\Http\Controllers\PatientDentalHistoryAttributeController;
use App\Http\Controllers\PatientDentalHistoryController;
use App\Http\Controllers\PatientDiagnosisController;
use App\Http\Controllers\PatientDOCFileController;
use App\Http\Controllers\PatientDOCFolderController;
use App\Http\Controllers\PatientDOCServerDocumentDetailController;
use App\Http\Controllers\PatientDocumentController;
use App\Http\Controllers\PatientDrugsPrescriptionController;
use App\Http\Controllers\PatientExaminationController;
use App\Http\Controllers\PatientExaminationDiagnosisController;
use App\Http\Controllers\PatientHistroyController;
use App\Http\Controllers\PatientInsuranceDetailController;
use App\Http\Controllers\PatientInvestigationController;
use App\Http\Controllers\PatientInvoiceController;
use App\Http\Controllers\PatientInvoicesDetailController;
use App\Http\Controllers\PatientInvoicesRBController;
use App\Http\Controllers\PatientLabController;
use App\Http\Controllers\PatientLabWorkController;
use App\Http\Controllers\PatientMedicalAttributeController;
use App\Http\Controllers\PatientMedicalCertificateController;
use App\Http\Controllers\PatientMedicalHistoryAttributeController;
use App\Http\Controllers\PatientObservationController;
use App\Http\Controllers\PatientPersonalAttributeController;
use App\Http\Controllers\PatientPrescriptionController;
use App\Http\Controllers\PatientReceiptController;
use App\Http\Controllers\PatientReceiptsDetailController;
use App\Http\Controllers\PatientSettingController;
use App\Http\Controllers\PatientTestimonialController;
use App\Http\Controllers\PatientTreatmentsDoneController;
use App\Http\Controllers\PatientTreatmentsPlanDetailController;
use App\Http\Controllers\PatientTreatmentsPlanHeaderController;
use App\Http\Controllers\PatientTreatmentTypeDoneController;
use App\Http\Controllers\PersonalReminderController;
use App\Http\Controllers\PersonalReminderNoteController;
use App\Http\Controllers\PrescriptionTemplateController;
use App\Http\Controllers\PrescriptionTemplateMasterController;
use App\Http\Controllers\PromotionalSMSTemplateController;
use App\Http\Controllers\ProviderSlotController;
use App\Http\Controllers\PurchaseOrderDetailController;
use App\Http\Controllers\PurchaseOrderHeaderController;
use App\Http\Controllers\SalesOrderDetailController;
use App\Http\Controllers\SalesOrderHeaderController;
use App\Http\Controllers\ServerSyncDatumController;
use App\Http\Controllers\ServerSyncTableController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SMSSituationController;
use App\Http\Controllers\SMSTemplateController;
use App\Http\Controllers\SMSTemplatesTagController;
use App\Http\Controllers\SMSTransactionController;
use App\Http\Controllers\SPTAppsDownloadInfoController;
use App\Http\Controllers\TreatmentDoctorPaymentController;
use App\Http\Controllers\UsersClinicInfoController;
use App\Http\Controllers\WaitingAreaPatientController;
use App\Http\Controllers\WhatsappSMSTransactionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PassportController;
use App\Http\Controllers\Reports\BillingReportController;
use App\Http\Controllers\Reports\DailyCollectionController;
use App\Http\Controllers\Reports\DailyNewPatientAttendanceController;
use App\Http\Controllers\Reports\DailyNewPatientListController;
use App\Http\Controllers\Reports\DoctorIncentiveReportController;
use App\Http\Controllers\Reports\DoctorWiseReportController;
use App\Http\Controllers\Reports\MailingListController;
use App\Http\Controllers\Reports\OutstandingBillsController;
use App\Http\Controllers\Reports\PatientMorbidityReportController;
use App\Http\Controllers\Reports\PatientsReportController;
use App\Http\Controllers\Reports\ReferrerReportController;
use App\Http\Controllers\Reports\SMSReportController;
use App\Http\Controllers\Reports\WaitingAreaReportController;
use App\Http\Controllers\Reports\WorkReportController;
use App\Http\Controllers\ReminderController;

function reportRoutes(): void
{
    Route::get('daily-collection', [DailyCollectionController::class, 'index']);
    Route::get('daily-new-patient-list', [DailyNewPatientListController::class, 'index']);
    Route::get('daily-new-patient-attendance', [DailyNewPatientAttendanceController::class, 'index']);
    Route::get('outstanding-bills', [OutstandingBillsController::class, 'index']);
    Route::get('work', [WorkReportController::class, 'index']);
    Route::get('calendar-data', [CalendarDataController::class, 'index']);
    Route::get('waiting-area', [WaitingAreaReportController::class, 'index']);
    Route::get('doctor-incentive', [DoctorIncentiveReportController::class, 'index']);
    Route::get('doctor-wise', [DoctorWiseReportController::class, 'index']);
    Route::get('mailing-list', [MailingListController::class, 'index']);
    Route::get('patient', [PatientsReportController::class, 'index']);
    Route::get('sms', [SMSReportController::class, 'index']);
    Route::get('billing/credit', [BillingReportController::class, 'credit']);
    Route::get('billing/debit', [BillingReportController::class, 'debit']);
    Route::get('patient-morbidity', [PatientMorbidityReportController::class, 'index']);
    Route::get('referrer', [ReferrerReportController::class, 'index']);
}

function patientRoutes(): void
{
    Route::post('', [PatientController::class, 'store']);
    Route::get('', [PatientController::class, 'index']);
    Route::get('search', [PatientController::class, 'advanceSearch']);
    Route::get('{patient}', [PatientController::class, 'show']);
    Route::delete('{patient}', [PatientController::class, 'destroy']);
    Route::put('{patient}', [PatientController::class, 'update']);
    // Route::get('{patient}/diagnosis', [PatientController::class, 'getPatientDiagnosis']);
    Route::prefix('{patient}')->group(function (): void {
        Route::get('summary', [PatientController::class, 'fullDetails']);

        Route::get('treatment/plan-detail', [PatientTreatmentsPlanDetailController::class, 'index']);
        Route::post('treatment/plan-detail', [PatientController::class, 'storeTreatmentPlanDetails']);
        Route::put('treatment/plan-detail/{id}', [PatientTreatmentsPlanDetailController::class, 'update']);

        Route::get('allergy', [PatientAllergyAttributeController::class, 'index']);
        Route::post('allergy', [PatientAllergyAttributeController::class, 'store']);
        Route::put('allergy/{id}', [PatientAllergyAttributeController::class, 'update']);
        
        Route::get('treatments', [PatientTreatmentController::class, 'showPatientTreatment']);
        Route::post('treatments', [PatientTreatmentController::class, 'store']);
        Route::put('treatments/{id}', [PatientTreatmentController::class, 'update']);

        Route::get('appointments', [AppointmentController::class, 'index']);
        Route::post('appointments', [AppointmentController::class, 'store']);

        Route::get('treatment/done', [PatientTreatmentsDoneController::class, 'index']);
        Route::post('treatment/done', [PatientTreatmentsDoneController::class, 'store']);
        Route::put('treatment/done/{id}', [PatientTreatmentsDoneController::class, 'update']);

        Route::get('history', [PatientHistroyController::class, 'index']);
        Route::post('history', [PatientHistroyController::class, 'store']);
        Route::put('history/{id}', [PatientHistroyController::class, 'update']);
        
        Route::get('dental/history/attributes', [PatientDentalHistoryAttributeController::class, 'index']);
        Route::post('dental/history/attributes', [PatientDentalHistoryAttributeController::class, 'store']);
        Route::put('dental/history/attributes/{id}', [PatientDentalHistoryAttributeController::class, 'update']);

        Route::get('dental/history', [PatientDentalHistoryController::class, 'index']);
        Route::post('dental/history', [PatientDentalHistoryController::class, 'store']);
        Route::put('dental/history/{id}', [PatientDentalHistoryController::class, 'update']);

        Route::get('diagnosis', [PatientDiagnosisController::class, 'index']);
        Route::post('diagnosis', [PatientDiagnosisController::class, 'store']);
        Route::put('diagnosis/{id}', [PatientDiagnosisController::class, 'update']);
        
        Route::get('doc/file', [PatientDOCFileController::class, 'index']);
        Route::post('doc/file', [PatientDOCFileController::class, 'store']);
        Route::put('doc/file/{id}', [PatientDOCFileController::class, 'update']);
        
        Route::get('doc/folder', [PatientDOCFolderController::class, 'index']);
        Route::post('doc/folder', [PatientDOCFolderController::class, 'store']);
        Route::put('doc/folder/{id}', [PatientDOCFolderController::class, 'update']);
        
        Route::get('doc/server-document-detail', [PatientDOCServerDocumentDetailController::class, 'index']);
        Route::post('doc/server-document-detail', [PatientDOCServerDocumentDetailController::class, 'store']);
        Route::put('doc/server-document-detail/{id}', [PatientDOCServerDocumentDetailController::class, 'update']);
        
        Route::get('document', [PatientDocumentController::class, 'index']);
        Route::post('document', [PatientDocumentController::class, 'store']);
        Route::put('document/{id}', [PatientDocumentController::class, 'update']);
        
        Route::get('drugs/prescription', [PatientDrugsPrescriptionController::class, 'index']);
        Route::post('drugs/prescription', [PatientDrugsPrescriptionController::class, 'store']);
        Route::put('drugs/prescription/{id}', [PatientDrugsPrescriptionController::class, 'update']);
        
        Route::get('examination', [PatientExaminationController::class, 'index']);
        Route::post('examination', [PatientExaminationController::class, 'store']);
        Route::put('examination/{id}', [PatientExaminationController::class, 'update']);
        
        Route::get('examination/diagnosis', [PatientExaminationDiagnosisController::class, 'index']);
        Route::post('examination/diagnosis', [PatientExaminationDiagnosisController::class, 'store']);
        Route::put('examination/diagnosis/{id}', [PatientExaminationDiagnosisController::class, 'update']);
        
        Route::get('insurance', [PatientInsuranceDetailController::class, 'index']);
        Route::post('insurance', [PatientInsuranceDetailController::class, 'store']);
        Route::put('insurance/{id}', [PatientInsuranceDetailController::class, 'update']);
        
        Route::get('investigation', [PatientInvestigationController::class, 'index']);
        Route::post('investigation', [PatientInvestigationController::class, 'store']);
        Route::put('investigation/{id}', [PatientInvestigationController::class, 'update']);
        
        Route::get('invoices', [PatientInvoiceController::class, 'index']);
        Route::post('invoices', [PatientInvoiceController::class, 'store']);
        Route::put('invoices/{id}', [PatientInvoiceController::class, 'update']);
        
        Route::get('invoice/detail', [PatientInvoicesDetailController::class, 'index']);
        Route::post('invoice/detail', [PatientInvoicesDetailController::class, 'store']);
        Route::put('invoice/detail/{id}', [PatientInvoicesDetailController::class, 'update']);
        
        Route::get('invoice/rb', [PatientInvoicesRBController::class, 'index']);
        Route::post('invoice/rb', [PatientInvoicesRBController::class, 'store']);
        Route::put('invoice/rb/{id}', [PatientInvoicesRBController::class, 'update']);
        
        Route::get('lab', [PatientLabController::class, 'index']);
        Route::post('lab', [PatientLabController::class, 'store']);
        Route::put('lab/{id}', [PatientLabController::class, 'update']);
        
        Route::get('lab/work', [PatientLabWorkController::class, 'index']);
        Route::post('lab/work', [PatientLabWorkController::class, 'store']);
        Route::put('lab/work/{id}', [PatientLabWorkController::class, 'update']);
        
        Route::get('medical/attribute', [PatientMedicalAttributeController::class, 'index']);
        Route::post('medical/attribute', [PatientMedicalAttributeController::class, 'store']);
        Route::put('medical/attribute/{id}', [PatientMedicalAttributeController::class, 'update']);
        
        Route::get('medical/certificate', [PatientMedicalCertificateController::class, 'index']);
        Route::post('medical/certificate', [PatientMedicalCertificateController::class, 'store']);
        Route::put('medical/certificate/{id}', [PatientMedicalCertificateController::class, 'update']);
        
        Route::get('medical/history-attribute', [PatientMedicalHistoryAttributeController::class, 'index']);
        Route::post('medical/history-attribute', [PatientMedicalHistoryAttributeController::class, 'store']);
        Route::put('medical/history-attribute/{id}', [PatientMedicalHistoryAttributeController::class, 'update']);
        
        Route::get('observation', [PatientObservationController::class, 'index']);
        Route::post('observation', [PatientObservationController::class, 'store']);
        Route::put('observation/{id}', [PatientObservationController::class, 'update']);
        
        Route::get('personal/attribute', [PatientPersonalAttributeController::class, 'index']);
        Route::post('personal/attribute', [PatientPersonalAttributeController::class, 'store']);
        Route::put('personal/attribute/{id}', [PatientPersonalAttributeController::class, 'update']);
        
        Route::get('prescription', [PatientPrescriptionController::class, 'index']);
        Route::post('prescription', [PatientPrescriptionController::class, 'store']);
        Route::put('prescription/{id}', [PatientPrescriptionController::class, 'update']);
        
        Route::get('receipt', [PatientReceiptController::class, 'index']);
        Route::post('receipt', [PatientReceiptController::class, 'store']);
        Route::put('receipt/{id}', [PatientReceiptController::class, 'update']);
        
        Route::get('receipt/detail', [PatientReceiptsDetailController::class, 'index']);
        Route::post('receipt/detail', [PatientReceiptsDetailController::class, 'store']);
        Route::put('receipt/detail/{id}', [PatientReceiptsDetailController::class, 'update']);
        
        Route::get('setting', [PatientSettingController::class, 'index']);
        Route::post('setting', [PatientSettingController::class, 'store']);
        Route::put('setting/{id}', [PatientSettingController::class, 'update']);
        
        Route::get('testimonials', [PatientTestimonialController::class, 'index']);
        Route::post('testimonials', [PatientTestimonialController::class, 'store']);
        Route::put('testimonials/{id}', [PatientTestimonialController::class, 'update']);
        
        Route::get('treatment/plan-header', [PatientTreatmentsPlanHeaderController::class, 'index']);
        Route::post('treatment/plan-header', [PatientTreatmentsPlanHeaderController::class, 'store']);
        Route::put('treatment/plan-header/{id}', [PatientTreatmentsPlanHeaderController::class, 'update']);
        
        Route::get('treatment/type-done', [PatientTreatmentTypeDoneController::class, 'index']);
        Route::post('treatment/type-done', [PatientTreatmentTypeDoneController::class, 'store']);
        Route::put('treatment/type-done/{id}', [PatientTreatmentTypeDoneController::class, 'update']);

        Route::prefix('notes')->group(function (): void {
            Route::get('', [\App\Http\Controllers\PatientNoteController::class, 'index']);
            Route::post('', [\App\Http\Controllers\PatientNoteController::class, 'store']);
        });

        Route::get('whatsapp/transaction', [WhatsappSMSTransactionController::class, 'index']);
        Route::post('whatsapp/transaction', [WhatsappSMSTransactionController::class, 'store']);
        Route::put('whatsapp/transaction/{whatsappSMSTransaction}', [WhatsappSMSTransactionController::class, 'update']);

        Route::get('email/transaction', [EmailTransactionController::class, 'index']);
        Route::post('email/transaction', [EmailTransactionController::class, 'store']);
        Route::put('email/transaction/{emailTransaction}', [EmailTransactionController::class, 'update']);

        Route::get('sms/transactions', [SMSTransactionController::class, 'index']);
        Route::post('sms/transactions', [SMSTransactionController::class, 'store']);
        Route::put('sms/transactions/{sMSTransaction}', [SMSTransactionController::class, 'update']);

        Route::get('clinic-lab-work', [ClinicLabWorkController::class, 'index']);
        Route::post('clinic-lab-work', [ClinicLabWorkController::class, 'store']);
        Route::put('clinic-lab-work/{clinicLabWork}', [ClinicLabWorkController::class, 'update']);

        Route::get('reminders', [PersonalReminderController::class, 'index']);
        Route::post('reminders', [PersonalReminderController::class, 'store']);
        Route::put('reminders/{personalReminder}', [PersonalReminderController::class, 'update']);

        Route::get('passport', [PassportController::class, 'patientPassport']);
        Route::get('photo', [PatientController::class, 'uploadPhoto']);
    });
}

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function (): void {
    Route::post('/logout', [AuthController::class, 'logout']);
    
    Route::get('/home', [HomeController::class, 'home']);
    Route::get('/calendar-stats', [HomeController::class, 'calendarStats']);

    Route::get('reminders', [PersonalReminderController::class, 'index']);
    Route::post('reminders', [PersonalReminderController::class, 'store']);
    Route::put('reminders/{personalReminder}', [PersonalReminderController::class, 'update']);

    Route::get('invoices', [PatientInvoiceController::class, 'index']);
    Route::get('receipts', [PatientReceiptController::class, 'index']);
    Route::get('passport', [PassportController::class, 'patientPassport']);

    Route::prefix('dashboard')->group(function (): void {
        Route::get('', [DashboardController::class, 'index']);
        Route::get('/appointments', [DashboardController::class, 'appointments']);
        Route::get('/waiting', [DashboardController::class, 'waitingArea']);
        Route::get('/treatments/{status}', [DashboardController::class, 'treatments']);
        Route::post('/waiting-area/{appointment}', [WaitingAreaPatientController::class, 'store']);
        Route::post('/waiting-area', [WaitingAreaPatientController::class, 'direct']);
        Route::patch('/waiting-area/{waitingAreaPatient}', [WaitingAreaPatientController::class, 'update']);
    });

    Route::prefix('calendar')->group(function (): void {
        Route::get('/appointments', [CalendarController::class, 'getAllAppointments']);
        Route::get('/appointments/{id}', [CalendarController::class, 'getAllAppointments']);
    });

    Route::get('appointments', [AppointmentController::class, 'index']);
    Route::post('appointments', [AppointmentController::class, 'store']);

    Route::prefix('patients')->group(function (): void {
        patientRoutes();
        Route::get('/reminders/all', [ReminderController::class, 'fetchAllPatientReminders']);
        Route::get('/reminders/birthday', [ReminderController::class, 'fetchBirthdayReminders']);
        Route::get('/reminders/checkup', [ReminderController::class, 'fetchCheckupReminders']);
    });

    Route::prefix('reports')->group(function (): void {
        reportRoutes();
    });

    Route::prefix('providers')->group(function (): void {
        Route::get('', [ProviderController::class, 'index']);
        Route::post('', [ProviderController::class, 'store']);
        Route::put('{provider}', [ProviderController::class, 'update']);
    });

    Route::prefix('clinic-lab-work')->group(function (): void {
        Route::get('', [ClinicLabWorkController::class, 'index']);
        Route::post('', [ClinicLabWorkController::class, 'store']);
        Route::put('{clinicLabWork}', [ClinicLabWorkController::class, 'update']);
    });

    Route::prefix('treatment-type-hierarchy')->group(function (): void {
        Route::get('{parentId?}', [TreatmentTypeHierarchyController::class, 'index']);
        Route::post('', [TreatmentTypeHierarchyController::class, 'store']);
        Route::put('{treatmentTypeHierarchy}', [TreatmentTypeHierarchyController::class, 'update']);
    });

    Route::prefix('states')->group(function (): void {
        Route::get('', [StateController::class, 'index']);
        Route::post('', [StateController::class, 'store']);
        Route::put('{state}', [StateController::class, 'update']);
    });

    Route::prefix('countries')->group(function (): void {
        Route::get('', [CountryController::class, 'index']);
        Route::post('', [CountryController::class, 'store']);
        Route::put('{country}', [CountryController::class, 'update']);
    });

    Route::prefix('users')->group(function (): void {
        Route::get('', [UserController::class, 'index']);
        Route::post('', [UserController::class, 'store']);
        Route::put('{user}', [UserController::class, 'update']);
    });

    Route::prefix('drugs')->group(function (): void {
        Route::get('', [DrugController::class, 'index']);
        Route::post('', [DrugController::class, 'store']);
        Route::put('{drug}', [DrugController::class, 'update']);
    });

    Route::prefix('aspnet')->group(function (): void {
        Route::prefix('applications')->group(function (): void {
            Route::get('', [AspnetApplicationController::class, 'index']);
            Route::post('', [AspnetApplicationController::class, 'store']);
            Route::put('{aspnetApplication}', [AspnetApplicationController::class, 'update']);
        });
        Route::prefix('membership')->group(function (): void {
            Route::get('', [AspnetMembershipController::class, 'index']);
            Route::post('', [AspnetMembershipController::class, 'store']);
            Route::put('{aspnetMembership}', [AspnetMembershipController::class, 'update']);
        });
        Route::prefix('path')->group(function (): void {
            Route::get('', [AspnetPathController::class, 'index']);
            Route::post('', [AspnetPathController::class, 'store']);
            Route::put('{aspnetPath}', [AspnetPathController::class, 'update']);
        });
        Route::prefix('personalization')->group(function (): void {
            Route::get('', [AspnetPersonalizationAllUserController::class, 'index']);
            Route::post('', [AspnetPersonalizationAllUserController::class, 'store']);
            Route::put('{aspnetPersonalizationAllUser}', [AspnetPersonalizationAllUserController::class, 'update']);
        });
        Route::prefix('personalization-peruser')->group(function (): void {
            Route::get('', [AspnetPersonalizationPerUserController::class, 'index']);
            Route::post('', [AspnetPersonalizationPerUserController::class, 'store']);
            Route::put('{aspnetPersonalizationPerUser}', [AspnetPersonalizationPerUserController::class, 'update']);
        });
        Route::prefix('profile')->group(function (): void {
            Route::get('', [AspnetProfileController::class, 'index']);
            Route::post('', [AspnetProfileController::class, 'store']);
            Route::put('{aspnetProfile}', [AspnetProfileController::class, 'update']);
        });
        Route::prefix('role')->group(function (): void {
            Route::get('', [AspnetRoleController::class, 'index']);
            Route::post('', [AspnetRoleController::class, 'store']);
            Route::put('{aspnetRole}', [AspnetRoleController::class, 'update']);
        });
        Route::prefix('schema')->group(function (): void {
            Route::get('', [AspnetSchemaVersionController::class, 'index']);
            Route::post('', [AspnetSchemaVersionController::class, 'store']);
            Route::put('{aspnetSchemaVersion}', [AspnetSchemaVersionController::class, 'update']);
        });
        Route::prefix('user-service')->group(function (): void {
            Route::get('', [AspnetUserController::class, 'index']);
            Route::post('', [AspnetUserController::class, 'store']);
            Route::put('{aspnetUser}', [AspnetUserController::class, 'update']);
        });
        Route::prefix('users-in-role')->group(function (): void {
            Route::get('', [AspnetUsersInRoleController::class, 'index']);
            Route::post('', [AspnetUsersInRoleController::class, 'store']);
            Route::put('{aspnetUsersInRole}', [AspnetUsersInRoleController::class, 'update']);
        });
        Route::prefix('web-event')->group(function (): void {
            Route::get('', [AspnetWebEventEventcontroller::class, 'index']);
            Route::post('', [AspnetWebEventEventcontroller::class, 'store']);
            Route::put('{aspnetWebEventEvent}', [AspnetWebEventEventcontroller::class, 'update']);
        });
    });

    Route::prefix('bank')->group(function (): void {
        Route::get('accounts', [BankAccountController::class, 'index']);
        Route::post('accounts', [BankAccountController::class, 'store']);
        Route::put('accounts/{bankAccount}', [BankAccountController::class, 'update']);
        
        Route::get('deposit', [BankDepositController::class, 'index']);
        Route::post('deposit', [BankDepositController::class, 'store']);
        Route::put('deposit/{bankDeposit}', [BankDepositController::class, 'update']);
    });

    Route::prefix('cache')->group(function (): void {
        Route::get('', [CacheController::class, 'index']);
        Route::post('', [CacheController::class, 'store']);
        Route::put('{cache}', [CacheController::class, 'update']);

        Route::get('lock', [CacheLockController::class, 'index']);
        Route::post('lock', [CacheLockController::class, 'store']);
        Route::put('lock/{cacheLock}', [CacheLockController::class, 'update']);
    });

    Route::prefix('chair')->group(function (): void {
        Route::get('slots', [ChairSlotController::class, 'index']);
        Route::post('slots', [ChairSlotController::class, 'store']);
        Route::put('slots/{chairSlot}', [ChairSlotController::class, 'update']);
    });

    Route::prefix('clients')->group(function (): void {
        Route::get('', [ClientController::class, 'index']);
        Route::post('', [ClientController::class, 'store']);
        Route::put('/{client}', [ClientController::class, 'update']);

        Route::get('clinic', [ClientClinicController::class, 'index']);
        Route::post('clinic', [ClientClinicController::class, 'store']);
        Route::put('clinic/{clientClinic}', [ClientClinicController::class, 'update']);
    });

    Route::prefix('clinic')->group(function (): void {
        Route::get('', [ClinicController::class, 'index']);
        Route::post('', [ClinicController::class, 'store']);
        Route::put('{clinic}', [ClinicController::class, 'update']);

        Route::get('/attributes/datum', [ClinicAttributesDatumController::class, 'index']);
        Route::post('attributes/datum', [ClinicAttributesDatumController::class, 'store']);
        Route::put('attributes/datum/{clinicAttributesDatum}', [ClinicAttributesDatumController::class, 'update']);

        Route::get('attributes/master', [ClinicAttributesMasterController::class, 'index']);
        Route::post('attributes/master', [ClinicAttributesMasterController::class, 'store']);
        Route::put('attributes/master/{clinicAttributesMaster}', [ClinicAttributesMasterController::class, 'update']);

        Route::get('chair', [ClinicChairController::class, 'index']);
        Route::post('chair', [ClinicChairController::class, 'store']);
        Route::put('chair/{clinicChair}', [ClinicChairController::class, 'update']);

        Route::get('communication-config', [ClinicCommunicationConfigController::class, 'index']);
        Route::post('communication-config', [ClinicCommunicationConfigController::class, 'store']);
        Route::put('communication-config/{clinicCommunicationConfig}', [ClinicCommunicationConfigController::class, 'update']);

        Route::get('communication-master', [ClinicCommunicationMasterController::class, 'index']);
        Route::post('communication-master', [ClinicCommunicationMasterController::class, 'store']);
        Route::put('communication-master/{clinicCommunicationMaster}', [ClinicCommunicationMasterController::class, 'update']);

        Route::get('group-communication-master', [CommunicationGroupMasterController::class, 'index']);
        Route::post('group-communication-master', [CommunicationGroupMasterController::class, 'store']);
        Route::put('group-communication-master/{groupCommunicationMaster}', [CommunicationGroupMasterController::class, 'update']);

        Route::get('lab-supplier', [ClinicLabSupplierController::class, 'index']);
        Route::post('lab-supplier', [ClinicLabSupplierController::class, 'store']);
        Route::put('lab-supplier/{clinicLabSupplier}', [ClinicLabSupplierController::class, 'update']);

        Route::get('labwork-component', [ClinicLabWorkComponentController::class, 'index']);
        Route::post('labwork-component', [ClinicLabWorkComponentController::class, 'store']);
        Route::put('labwork-component/{clinicLabWorkComponent}', [ClinicLabWorkComponentController::class, 'update']);

        Route::get('labwork-detail', [ClinicLabWorkDetailController::class, 'index']);
        Route::post('labwork-detail', [ClinicLabWorkDetailController::class, 'store']);
        Route::put('labwork-detail/{clinicLabWorkDetail}', [ClinicLabWorkDetailController::class, 'update']);

        Route::get('modules-access', [ClinicModulesAccessController::class, 'index']);
        Route::post('modules-access', [ClinicModulesAccessController::class, 'store']);
        Route::put('modules-access/{clinicModulesAccess}', [ClinicModulesAccessController::class, 'update']);

        Route::get('search-aagent', [ClinicSearchAgentController::class, 'index']);
        Route::post('search-aagent', [ClinicSearchAgentController::class, 'store']);
        Route::put('search-aagent/{clinicSearchAgent}', [ClinicSearchAgentController::class, 'update']);

        Route::get('tv/clinic-rss-datum', [ClinicTVClinicRSSDatumController::class, 'index']);
        Route::post('tv/clinic-rss-datum', [ClinicTVClinicRSSDatumController::class, 'store']);
        Route::put('tv/clinic-rss-datum/{clinicTVClinicRSSDatum}', [ClinicTVClinicRSSDatumController::class, 'update']);

        Route::get('tv/configuration', [ClinicTVConfigurationController::class, 'index']);
        Route::post('tv/configuration', [ClinicTVConfigurationController::class, 'store']);
        Route::put('tv/configuration/{clinicTVConfiguration}', [ClinicTVConfigurationController::class, 'update']);

        Route::get('tv/news-ticker', [ClinicTVNewsTickerController::class, 'index']);
        Route::post('tv/news-ticker', [ClinicTVNewsTickerController::class, 'store']);
        Route::put('tv/news-ticker/{clinicTVNewsTicker}', [ClinicTVNewsTickerController::class, 'update']);

        Route::get('tv/rss/url-master', [ClinicTVRSSURLMasterController::class, 'index']);
        Route::post('tv/rss/url-master', [ClinicTVRSSURLMasterController::class, 'store']);
        Route::put('tv/rss/url-master/{clinicTVRSSURLMaster}', [ClinicTVRSSURLMasterController::class, 'update']);
    });

    Route::prefix('communication-group-master')->group(function (): void {
        Route::get('', [CommunicationGroupMasterController::class, 'index']);
        Route::post('', [CommunicationGroupMasterController::class, 'store']);
        Route::put('{communicationGroupMaster}', [CommunicationGroupMasterController::class, 'update']);
    });

    Route::prefix('ct-security')->group(function (): void {
        Route::get('', [CtSecurityController::class, 'index']);
        Route::post('', [CtSecurityController::class, 'store']);
        Route::put('{cTSecurity}', [CtSecurityController::class, 'update']);
    });

    Route::prefix('doc-version')->group(function (): void {
        Route::get('', [DOCVersionController::class, 'index']);
        Route::post('', [DOCVersionController::class, 'store']);
        Route::put('{dOCVersion}', [DOCVersionController::class, 'update']);
    });

    Route::prefix('dws/config')->group(function (): void {
        Route::prefix('gallery')->group(function (): void {
            Route::get('album', [DWSCofigGalleryAlbumController::class, 'index']);
            Route::post('album', [DWSCofigGalleryAlbumController::class, 'store']);
            Route::put('{dWSCofigGalleryAlbum}', [DWSCofigGalleryAlbumController::class, 'update']);

            Route::prefix('album/file')->group(function (): void {
                Route::get('', [DWSConfigGalleryAlbumsFileController::class, 'index']);
                Route::post('', [DWSConfigGalleryAlbumsFileController::class, 'store']);
                Route::put('{dWSConfigGalleryAlbumsFile}', [DWSConfigGalleryAlbumsFileController::class, 'update']);
            });
        });
        Route::prefix('clinic-timing')->group(function (): void {
            Route::get('', [DWSConfigClinicTimingController::class, 'index']);
            Route::post('', [DWSConfigClinicTimingController::class, 'store']);
            Route::put('{dWSConfigClinicTiming}', [DWSConfigClinicTimingController::class, 'update']);
        });
        
        Route::prefix('provider')->group(function (): void {
            Route::get('', [DWSConfigProviderController::class, 'index']);
            Route::post('', [DWSConfigProviderController::class, 'store']);
            Route::put('{dWSConfigProvider}', [DWSConfigProviderController::class, 'update']);
        });
        Route::prefix('service')->group(function (): void {
            Route::get('', [DWSConfigServiceController::class, 'index']);
            Route::post('', [DWSConfigServiceController::class, 'store']);
            Route::put('{dWSConfigService}', [DWSConfigServiceController::class, 'update']);
        });
        Route::prefix('website')->group(function (): void {
            Route::get('', [DWSConfigWebsiteController::class, 'index']);
            Route::post('', [DWSConfigWebsiteController::class, 'store']);
            Route::put('{dWSConfigWebsite}', [DWSConfigWebsiteController::class, 'update']);
        });
    });

    Route::prefix('ecg')->group(function (): void {
        Route::get('activity-event', [EcgActivityEventController::class, 'index']);
        Route::post('', [EcgActivityEventController::class, 'store']);
        Route::put('{ecgActivityEvent}', [EcgActivityEventController::class, 'update']);

        Route::prefix('clinic')->group(function (): void {
            Route::get('role', [ECGClinicRoleConfigurationController::class, 'index']);
            Route::post('role', [ECGClinicRoleConfigurationController::class, 'store']);
            Route::put('role/{eCGClinicRoleConfiguration}', [ECGClinicRoleConfigurationController::class, 'update']);

            Route::get('subscription', [ECGClinicSubscriptionModelController::class, 'index']);
            Route::post('susbcription', [ECGClinicSubscriptionModelController::class, 'store']);
            Route::put('subscription/{eCGClinicSubscriptionModel}', [ECGClinicSubscriptionModelController::class, 'update']);
        });

        Route::prefix('config')->group(function (): void {
            Route::get('channel', [ECGConfigChannelController::class, 'index']);
            Route::post('channel', [ECGConfigChannelController::class, 'store']);
            Route::put('channel/{eCGConfigChannel}', [ECGConfigChannelController::class, 'update']);

            Route::get('channel/information', [ECGConfigChannelInformationController::class, 'index']);
            Route::post('channel/information', [ECGConfigChannelInformationController::class, 'store']);
            Route::put('channel/information/{eCGConfigChannelInformation}', [ECGConfigChannelInformationController::class, 'update']);
        });

        Route::prefix('doctor')->group(function (): void {
            Route::get('incentive', [EcgDoctorIncentiveController::class, 'index']);
            Route::post('incentive', [EcgDoctorIncentiveController::class, 'store']);
            Route::put('incentive/{ecgDoctorIncentive}', [EcgDoctorIncentiveController::class, 'update']);

            Route::get('incentive/details', [EcgDoctorIncentiveDetailController::class, 'index']);
            Route::post('incentive/details', [EcgDoctorIncentiveDetailController::class, 'store']);
            Route::put('incentive/details/{ecgDoctorIncentiveDetail}', [EcgDoctorIncentiveDetailController::class, 'update']);
        });

        Route::prefix('external/refferal')->group(function (): void {
            Route::get('datum', [EcgExternalRefferalDatumController::class, 'index']);
            Route::post('datum', [EcgExternalRefferalDatumController::class, 'store']);
            Route::put('datum/{ecgExternalRefferalDatum}', [EcgExternalRefferalDatumController::class, 'update']);

            Route::get('master', [EcgExternalRefferalMasterController::class, 'index']);
            Route::post('master', [EcgExternalRefferalMasterController::class, 'store']);
            Route::put('master/{ecgExternalRefferalMaster}', [EcgExternalRefferalMasterController::class, 'update']);
        });

        Route::get('role-configuration', [ECGMRoleConfigurationController::class, 'index']);
        Route::post('role-configuration', [ECGMRoleConfigurationController::class, 'store']);
        Route::put('role-configuration/{eCGMRoleConfiguration}', [ECGMRoleConfigurationController::class, 'update']);
        
        Route::get('subscription-model', [ECGMSubscriptionModelController::class, 'index']);
        Route::post('subscription-model', [ECGMSubscriptionModelController::class, 'store']);
        Route::put('subscription-model/{eCGMSubscriptionModel}', [ECGMSubscriptionModelController::class, 'update']);
        
        Route::get('treatment-type-hierarchy', [ECGMTreatmentTypeHierarchyController::class, 'index']);    
        Route::post('treatment-type-hierarchy', [ECGMTreatmentTypeHierarchyController::class, 'store']);
        Route::put('treatment-type-hierarchy/{eCGMTreatmentTypeHierarchy}', [ECGMTreatmentTypeHierarchyController::class, 'update']);

        Route::get('perpetual-license-mapping', [ECGPerpetualLicenseMappingController::class, 'index']);
        Route::post('perpetual-license-mapping', [ECGPerpetualLicenseMappingController::class, 'store']);
        Route::put('perpetual-license-mapping/{eCGPerpetualLicenseMapping}', [ECGPerpetualLicenseMappingController::class, 'update']);

        Route::get('perpetual-license-master', [ECGPerpetualLicenseMasterController::class, 'index']);
        Route::post('perpetual-license-master', [ECGPerpetualLicenseMasterController::class, 'store']);
        Route::put('perpetual-license-master/{eCGPerpetualLicenseMaster}', [ECGPerpetualLicenseMasterController::class, 'update']);

        Route::get('support-query', [ECGSupportQueryController::class, 'index']);
        Route::post('support-query', [ECGSupportQueryController::class, 'store']);
        Route::put('support-query/{eCGSupportQuery}', [ECGSupportQueryController::class, 'update']);

        Route::get('web-message', [ECGWebMessageController::class, 'index']);
        Route::post('web-message', [ECGWebMessageController::class, 'store']);
        Route::put('web-message/{eCGWebMessage}', [ECGWebMessageController::class, 'update']);

        Route::get('web-request', [ECGWebRequestController::class, 'index']);
        Route::post('web-request', [ECGWebRequestController::class, 'store']);
        Route::put('web-request/{eCGWebRequest}', [ECGWebRequestController::class, 'update']);
    });

    Route::prefix('email')->group(function (): void {
        Route::get('attachment', [EmailAttachmentController::class, 'index']);
        Route::post('attachment', [EmailAttachmentController::class, 'store']);
        Route::put('attachment/{emailAttachment}', [EmailAttachmentController::class, 'update']);

        Route::get('situation', [EmailSituationController::class, 'index']);
        Route::post('situation', [EmailSituationController::class, 'store']);
        Route::put('situation/{emailSituation}', [EmailSituationController::class, 'update']);

        Route::get('template', [EmailTemplateController::class, 'index']);
        Route::post('template', [EmailTemplateController::class, 'store']);
        Route::put('template/{emailTemplate}', [EmailTemplateController::class, 'update']);

        Route::get('template/tags', [EmailTemplatesTagController::class, 'index']);
        Route::post('template/tags', [EmailTemplatesTagController::class, 'store']);
        Route::put('template/tags/{emailTemplatesTag}', [EmailTemplatesTagController::class, 'update']);
    });

    Route::prefix('expenses')->group(function (): void {
        Route::get('in-out-detail', [ExpensesInOutDetailController::class, 'index']);
        Route::post('in-out-detail', [ExpensesInOutDetailController::class, 'store']);
        Route::put('in-out-detail/{expensesInOutDetail}', [ExpensesInOutDetailController::class, 'update']);

        Route::get('in-out-header', [ExpensesInOutHeaderController::class, 'index']);
        Route::post('in-out-header', [ExpensesInOutHeaderController::class, 'store']);
        Route::put('in-out-header/{expensesInOutHeader}', [ExpensesInOutHeaderController::class, 'update']);
    });

    Route::prefix('family')->group(function (): void {
        Route::get('', [FamilyController::class, 'index']);
        Route::post('', [FamilyController::class, 'store']);
        Route::put('{family}', [FamilyController::class, 'update']);
    });

    Route::prefix('feedback')->group(function (): void {
        Route::get('question', [FeedbackQuestionController::class, 'index']);
        Route::post('question', [FeedbackQuestionController::class, 'store']);
        Route::put('question/{feedbackQuestion}', [FeedbackQuestionController::class, 'update']);

        Route::get('response/base', [FeedbackResponseBaseController::class, 'index']);
        Route::post('response/base', [FeedbackResponseBaseController::class, 'store']);
        Route::put('response/base/{feedbackResponseBase}', [FeedbackResponseBaseController::class, 'update']);

        Route::get('response', [FeedbackResponseController::class, 'index']);
        Route::post('response', [FeedbackResponseController::class, 'store']);
        Route::put('response/{feedbackResponse}', [FeedbackResponseController::class, 'update']);
    });

    Route::prefix('item')->group(function (): void {
        Route::get('', [ItemController::class, 'index']);
        Route::post('', [ItemController::class, 'store']);
        Route::put('{item}', [ItemController::class, 'update']);

        Route::get('customer', [ItemCustomerController::class, 'index']);
        Route::post('customer', [ItemCustomerController::class, 'store']);
        Route::put('customer/{itemCustomer}', [ItemCustomerController::class, 'update']);

        Route::get('hierarchy', [ItemsHierarchyController::class, 'index']);
        Route::post('hierarchy', [ItemsHierarchyController::class, 'store']);
        Route::put('hierarchy/{itemsHierarchy}', [ItemsHierarchyController::class, 'update']);

        Route::get('stocks', [itemStockController::class, 'index']);
        Route::post('stocks', [itemStockController::class, 'store']);
        Route::put('stocks/{itemStock}', [itemStockController::class, 'update']);

        Route::get('supplier', [itemSupplierController::class, 'index']);
        Route::post('supplier', [itemSupplierController::class, 'store']);
        Route::put('supplier/{itemSupplier}', [itemSupplierController::class, 'update']);

        Route::get('type1', [itemType1Controller::class, 'index']);
        Route::post('type1', [itemType1Controller::class, 'store']);
        Route::put('type1/{itemType1}', [itemType1Controller::class, 'update']);

        Route::get('type', [itemTypeController::class, 'index']);
        Route::post('type', [itemTypeController::class, 'store']);
        Route::put('type/{itemType}', [itemTypeController::class, 'update']);
    });

    Route::prefix('job')->group(function (): void {
        Route::get('batch', [JobBatchController::class, 'index']);
        Route::post('batch', [JobBatchController::class, 'store']);
        Route::put('batch/{jobBatch}', [JobBatchController::class, 'update']);

        Route::get('', [JobController::class, 'index']);
        Route::post('', [JobController::class, 'store']);
        Route::put('{job}', [JobController::class, 'update']);
    });

    Route::prefix('license')->group(function (): void {
        Route::get('module', [LicenseModuleController::class, 'index']);
    });

    Route::prefix('lookup')->group(function (): void {
        Route::get('{category?}', [LookUpController::class, 'index']);
        Route::post('', [LookUpController::class, 'store']);
        Route::put('{lookUp}', [LookUpController::class, 'update']);

        Route::get('master', [LookUpsMasterController::class, 'index']);
        Route::post('master', [LookUpsMasterController::class, 'store']);
        Route::put('master/{lookUpsMaster}', [LookUpsMasterController::class, 'update']);
    });

    Route::get('other-communicaton-group', [OtherCommunicationGroupController::class, 'index']);
    Route::post('other-communicaton-group', [OtherCommunicationGroupController::class, 'store']);
    Route::put('other-communicaton-group/{otherCommunicationGroup}', [OtherCommunicationGroupController::class, 'update']);

    Route::get('reminder/note', [PersonalReminderNoteController::class, 'index']);
    Route::post('reminder/note', [PersonalReminderNoteController::class, 'store']);
    Route::put('reminder/note/{personalReminderNote}', [PersonalReminderNoteController::class, 'update']);

    Route::prefix('prescription')->group(function (): void {
        Route::get('templates', [PrescriptionTemplateController::class, 'index']);
        Route::post('templates', [PrescriptionTemplateController::class, 'store']);
        Route::put('templates/{prescriptionTemplate}', [PrescriptionTemplateController::class, 'update']);

        Route::get('template/master', [PrescriptionTemplateMasterController::class, 'index']);
        Route::post('template/master', [PrescriptionTemplateMasterController::class, 'store']);
        Route::put('template/master/{prescriptionTemplateMaster}', [PrescriptionTemplateMasterController::class, 'update']);
    });

    Route::get('personal-sms-template', [PromotionalSMSTemplateController::class, 'index']);
    Route::post('personal-sms-template', [PromotionalSMSTemplateController::class, 'store']);
    Route::put('personal-sms-template/{promotionalSMSTemplate}', [PromotionalSMSTemplateController::class, 'update']);

    Route::get('providers/slot', [ProviderSlotController::class, 'index']);
    Route::post('providers/slot', [ProviderSlotController::class, 'store']);
    Route::put('providers/slot/{providerSlot}', [ProviderSlotController::class, 'update']);

    Route::get('purchase-orders', [PurchaseOrderDetailController::class, 'index']);
    Route::post('purchase-orders', [PurchaseOrderDetailController::class, 'store']);
    Route::put('purchase-orders/{purchaseOrderDetail}', [PurchaseOrderDetailController::class, 'update']);

    Route::get('purchase-order-header', [PurchaseOrderHeaderController::class, 'index']);
    Route::post('purchase-order-header', [PurchaseOrderHeaderController::class, 'store']);
    Route::put('purchase-order-header/{purchaseOrderHeader}', [PurchaseOrderHeaderController::class, 'update']);

    Route::get('sales-order-detail', [SalesOrderDetailController::class, 'index']);
    Route::post('sales-order-detail', [SalesOrderDetailController::class, 'store']);
    Route::put('sales-order-detail/{salesOrderDetail}', [SalesOrderDetailController::class, 'update']);

    Route::get('sales-order-header', [SalesOrderHeaderController::class, 'index']);
    Route::post('sales-order-header', [SalesOrderHeaderController::class, 'store']);
    Route::put('sales-order-header/{salesOrderHeader}', [SalesOrderHeaderController::class, 'update']);

    Route::get('server-sync-datum', [ServerSyncDatumController::class, 'index']);
    Route::post('server-sync-datum', [ServerSyncDatumController::class, 'store']);
    Route::put('server-sync-datum/{serverSyncDatum}', [ServerSyncDatumController::class, 'update']);

    Route::get('server-sync-table', [ServerSyncTableController::class, 'index']);
    Route::post('server-sync-table', [ServerSyncTableController::class, 'store']);
    Route::put('server-sync-table/{serverSyncTable}', [ServerSyncTableController::class, 'update']);

    Route::prefix('sms')->group(function (): void {
        Route::get('situations', [SMSSituationController::class, 'index']);
        Route::post('situations', [SMSSituationController::class, 'store']);
        Route::put('situations/{sMSSituation}', [SMSSituationController::class, 'update']);

        Route::get('templates', [SMSTemplateController::class, 'index']);
        Route::post('templates', [SMSTemplateController::class, 'store']);
        Route::put('templates/{sMSTemplate}', [SMSTemplateController::class, 'update']);

        Route::get('template-tag', [SMSTemplatesTagController::class, 'index']);
        Route::post('template-tag', [SMSTemplatesTagController::class, 'store']);
        Route::put('template-tag/{sMSTemplatesTag}', [SMSTemplatesTagController::class, 'update']);
    });

    Route::get('spt-apps-download-info', [SPTAppsDownloadInfoController::class, 'index']);

    Route::get('treatment-doctor-payment', [TreatmentDoctorPaymentController::class, 'index']);
    Route::post('treatment-doctor-payment', [TreatmentDoctorPaymentController::class, 'store']);
    Route::put('treatment-doctor-payment/{treatmentDoctorPayment}', [TreatmentDoctorPaymentController::class, 'update']);

    Route::get('user-clinical-info', [UsersClinicInfoController::class, 'index']);
    Route::post('user-clinical-info', [UsersClinicInfoController::class, 'store']);
    Route::put('user-clinical-info/{usersClinicInfo}', [UsersClinicInfoController::class, 'update']);
});
