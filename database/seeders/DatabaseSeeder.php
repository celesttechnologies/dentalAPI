<?php

namespace Database\Seeders;

ini_set('memory_limit', '512M');

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            // PatientDOCFilesTableSeeder::class,
            // PatientCommunicationGroupTableSeeder::class,
            // ClinicLabWorkTableSeeder::class,
            // EcgDoctorIncentiveDetailsTableSeeder::class,
            // PatientInvoicesRBTableSeeder::class,
            // PatientAddressTableSeeder::class,
            // PersonalReminderTableSeeder::class,
            // PatientDrugsPrescriptionTableSeeder::class,
            // PatientPrescriptionsTableSeeder::class,
            // WhatsappSMSTransactionsTableSeeder::class,
            // PersonalReminderNotesTableSeeder::class,
            // TreatmentTypeHierarchyTableSeeder::class,
            // ProviderTableSeeder::class,
            // AspnetApplicationsTableSeeder::class,
            // ClinicTableSeeder::class,
            // ItemTableSeeder::class,
            // LookUpsTableSeeder::class,
            // PatientMedicalHistoryAttributeTableSeeder::class,
            // AspnetMembershipTableSeeder::class,
            // AspnetRolesTableSeeder::class,
            // AspnetUsersTableSeeder::class,
            // ECGMTreatmentTypeHierarchyTableSeeder::class,
            // PatientTreatmentsPlanDetailsTableSeeder::class,
            // ActivityInOutDetailTableSeeder::class,
            // ActivityInOutHeaderTableSeeder::class,
            // CTSecuritiesTableSeeder::class,
            // ChairSlotsTableSeeder::class,
            // ClientClinicsTableSeeder::class,
            // ClientsTableSeeder::class,
            // ClinicAttributesDataTableSeeder::class,
            // ClinicAttributesMasterTableSeeder::class,
            // ClinicChairsTableSeeder::class,
            // ClinicCommunicationConfigTableSeeder::class,
            // ClinicCommunicationMasterTableSeeder::class,
            // ClinicLabSupplierTableSeeder::class,
            // ClinicLabWorkComponentsTableSeeder::class,
            // ClinicLabWorkDetailsTableSeeder::class,
            // ClinicModulesAccessTableSeeder::class,
            // ClinicTVConfigurationTableSeeder::class,
            // CommunicationGroupMasterTableSeeder::class,
            // DrugsTableSeeder::class,
            // ECGClinicRoleConfigurationTableSeeder::class,
            // ECGMRoleConfigurationTableSeeder::class,
            // EcgDoctorIncentiveTableSeeder::class,
            // EmailSituationsTableSeeder::class,
            // EmailTemplatesTableSeeder::class,
            // EmailTransactionTableSeeder::class,
            // ExpensesInOutDetailTableSeeder::class,
            // ExpensesInOutHeaderTableSeeder::class,
            // FeedbackQuestionsTableSeeder::class,
            // FeedbackResponseTableSeeder::class,
            // FeedbackResponseBaseTableSeeder::class,
            // ItemStockTableSeeder::class,
            // ItemSupplierTableSeeder::class,
            // ItemTypeTableSeeder::class,
            // LicenseModulesTableSeeder::class,
            // LookUpsMasterTableSeeder::class,
            // PatientAllergyAttributeTableSeeder::class,
            // PatientDOCFoldersTableSeeder::class,
            // PatientDOCServerDocumentDetailsTableSeeder::class,
            // PatientDentalHistoryAttributeTableSeeder::class,
            // PatientExaminationDiagnosisTableSeeder::class,
            // PatientInvestigationsTableSeeder::class,
            // PatientMedicalCertificatesTableSeeder::class,
            // PatientPersonalAttributesTableSeeder::class,
            // PatientTreatmentsPlanHeaderTableSeeder::class,
            // PatientInsuranceDetailTableSeeder::class,
            // PrescriptionTemplateTableSeeder::class,
            // PrescriptionTemplateMasterTableSeeder::class,
            // PromotionalSMSTemplatesTableSeeder::class,
            // ProviderSlotsTableSeeder::class,
            // PurchaseOrderDetailTableSeeder::class,
            // PurchaseOrderHeaderTableSeeder::class,
            // SMSSituationsTableSeeder::class,
            // SMSTemplatesTableSeeder::class,
            // SMSTemplatesTagTableSeeder::class,
            // ServerSyncTablesTableSeeder::class,
            // StateTableSeeder::class,
            // UsersTableSeeder::class,
            // UsersClinicInfoTableSeeder::class,
            // AspnetSchemaVersionsTableSeeder::class,
            // AspnetUsersInRolesTableSeeder::class,
            // CountriesTableSeeder::class
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
