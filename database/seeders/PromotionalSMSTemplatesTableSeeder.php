<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PromotionalSMSTemplatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('PromotionalSMSTemplates')->delete();
        
        \DB::table('PromotionalSMSTemplates')->insert(array (
            0 => 
            array (
                'PromotionalSMSTemplateID' => '5A30E391-0505-45BF-B9E7-C75BC26A69B8',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'Title' => 'Review',
                'Message' => 'This is regarding your recent treatment experience. Please share your story on the below link. Your opinion is valuable. https://search.google.com/local/writereview?placeid=ChIJcageJPS45zsRUtZqylnVZ24',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-08-02 15:58:15.537',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2021-09-07 20:20:10.737',
                'LastUpdatedBy' => 'naman',
            ),
            1 => 
            array (
                'PromotionalSMSTemplateID' => 'A04C01DA-51C9-448C-829F-E6C084A32A47',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'Title' => 'retainer reminder',
                'Message' => 'Greetings!!
Gentle reminder from Dr. Vora\'s Dental Care.

Wearing your Retainers regularly is very very important in maintaining the beautiful smile, we have worked so hard for!! Kindly keep wearing them as instructed by Dr. Naman Vora. Here are the tips that help you to maintain a long-lasting radiant, healthy smile!

•  Keep reminder on your cell phone or use sticky notes to leave a reminder for yourself so that you don’t forget to wear your retainers as instructed. 

•  Cleaning your Retainer every time you remove it with regular water after every meal. 


•  Twice a day clean the retainer with a foamed brush after you have brushed your teeth and rinse it with water. once in a while you can also use liquid soap to clean your retainer if it has become sticky.

•  Keeping your retainer clean will make you more likely to wear it.


•  Always carry your retainer case with you whenever you go out.

•  Keep your retainer in case, when not in use.

•  Contact us immediately if you have lost your retainer or if it’s broken, cracked or uncomfortable.


•  If you’re concerned about your teeth shifting back into their improper position or if your retainer feels suddenly  tight / uncomfortable, be sure to contact us ,take appointment and let us evaluate.

+91 8425 85 85 85 
+91 22 25678000
+91 22 25678001',
                'IsDeleted' => '0',
                'CreatedOn' => '2022-07-22 11:03:18.237',
                'CreatedBy' => 'naman',
                'LastUpdatedOn' => '2023-02-01 11:25:30.563',
                'LastUpdatedBy' => 'naman',
            ),
            2 => 
            array (
                'PromotionalSMSTemplateID' => '53968A28-E854-4E9D-9D90-75F77E6A4B8B',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'Title' => 'Invisalign',
                'Message' => 'FAQs:
https://youtu.be/ZKi7qRDHMHY

Instructions :
https://youtu.be/yo-s0PIoD8o',
                'IsDeleted' => '0',
                'CreatedOn' => '2022-12-26 19:18:03.343',
                'CreatedBy' => 'naman',
                'LastUpdatedOn' => '2023-01-04 11:02:56.743',
                'LastUpdatedBy' => 'naman',
            ),
            3 => 
            array (
                'PromotionalSMSTemplateID' => 'CF9B49F7-1A95-4B99-BB96-4DAFC16223F8',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'Title' => 'review',
                'Message' => 'hii',
                'IsDeleted' => '1',
                'CreatedOn' => '2024-05-10 19:20:47.113',
                'CreatedBy' => 'karuna@drvorasdental.com',
                'LastUpdatedOn' => '2024-05-10 19:21:08.937',
                'LastUpdatedBy' => 'karuna@drvorasdental.com',
            ),
        ));
        
        
    }
}