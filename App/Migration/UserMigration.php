<?php

namespace App\Migration;

use TimePHP\Database\AbstractMigration;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class UserMigration extends AbstractMigration {

   /**
    * Create the correspondong table in the database
    *
    * @return void
    */
   public function up(): void {
      if (!Capsule::schema()->hasTable("User")) {
         Capsule::schema()->create("User", function (Blueprint $table) {
            $table->uuid("uuid");

            $table->string('username', 255);
            $table->string('password', 255);
            $table->string('role', 50)->default('user');
            
            $table->timestamp("createdAt")->default(Capsule::raw("CURRENT_TIMESTAMP"));
            $table->timestamp("updatedAt")->default(Capsule::raw("CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP"));

            $table->primary("uuid");
         });
   
      }
   }

   /**
    * Drop the corresponding table
    *
    * @return void
    */
   public function down(): void {
      Capsule::schema()->dropIfExists("User");
   }
}