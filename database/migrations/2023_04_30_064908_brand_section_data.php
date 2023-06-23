<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BrandSectionData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_section_data', function (Blueprint $table) {
            $table->integer('sno')->primary();

            $table->text('sec_1_title')->nullable();
            $table->text('sec_1_short_desac')->nullable();
            $table->text('div_1_title')->nullable();
            $table->text('div_1_text')->nullable();
            $table->text('div_1_img')->nullable();
            $table->text('div_2_title')->nullable();
            $table->text('div_2_text')->nullable();
            $table->text('div_2_img')->nullable();
            $table->text('div_3_title')->nullable();
            $table->text('div_3_text')->nullable();
            $table->text('div_3_img')->nullable();
            $table->text('div_4_title')->nullable();
            $table->text('div_4_text')->nullable();
            $table->text('div_4_img')->nullable();
            $table->text('div_5_title')->nullable();
            $table->text('div_5_text')->nullable();
            $table->text('div_5_img')->nullable();
            $table->text('div_6_title')->nullable();
            $table->text('div_6_text')->nullable();
            $table->text('div_6_img')->nullable();
            $table->text('div_7_title')->nullable();
            $table->text('div_7_text')->nullable();
            $table->text('div_7_img')->nullable();
            $table->text('div_8_title')->nullable();
            $table->text('div_8_text')->nullable();
            $table->text('div_8_img')->nullable();

            $table->text('sec_2_title')->nullable();
            $table->text('sec_2_short_desac')->nullable();
            $table->text('supply_img')->nullable();
            $table->text('supply_title')->nullable();
            $table->text('supply_text')->nullable();
            $table->text('fulfil_img')->nullable();
            $table->text('fulfil_title')->nullable();
            $table->text('fulfil_text')->nullable();
            $table->text('ecom_img')->nullable();
            $table->text('ecom_title')->nullable();
            $table->text('ecom_text')->nullable();
            $table->text('sec_2_1_title')->nullable();
            $table->text('sec_2_1_text')->nullable();
            $table->text('sec_2_1_img')->nullable();
            $table->text('sec_2_2_title')->nullable();
            $table->text('sec_2_2_text')->nullable();
            $table->text('sec_2_2_img')->nullable();
            $table->text('sec_2_3_title')->nullable();
            $table->text('sec_2_3_text')->nullable();
            $table->text('sec_2_3_img')->nullable();
            $table->text('sec_2_4_title')->nullable();
            $table->text('sec_2_4_text')->nullable();
            $table->text('sec_2_4_img')->nullable();
            $table->text('sec_2_5_title')->nullable();
            $table->text('sec_2_5_text')->nullable();
            $table->text('sec_2_5_img')->nullable();
            $table->text('sec_2_6_title')->nullable();
            $table->text('sec_2_6_text')->nullable();
            $table->text('sec_2_6_img')->nullable();
            $table->text('sec_2_7_title')->nullable();
            $table->text('sec_2_7_text')->nullable();
            $table->text('sec_2_7_img')->nullable();
            $table->text('sec_2_8_title')->nullable();
            $table->text('sec_2_8_text')->nullable();
            $table->text('sec_2_8_img')->nullable();

            $table->timestamp('created_at')->current();
        });




        Schema::create('brand_rest_section_data', function (Blueprint $table) {
            $table->integer('sno')->primary();

            $table->text('sec_3_title')->nullable();
            $table->text('launch_img')->nullable();
            $table->text('launch_title')->nullable();
            $table->text('launch_text')->nullable();
            $table->text('launch_red_text')->nullable();
            $table->text('streamline_img')->nullable();
            $table->text('streamline_title')->nullable();
            $table->text('streamline_text')->nullable();
            $table->text('streamline_red_text')->nullable();
            $table->text('scale_img')->nullable();
            $table->text('scale_title')->nullable();
            $table->text('scale_text')->nullable();
            $table->text('scale_red_text')->nullable();

            $table->text('sec_4_title')->nullable();
            $table->text('chain_1_title')->nullable();
            $table->text('chain_1_short_text')->nullable();
            $table->longText('chain_1_long_text')->nullable();
            $table->text('chain_1_img')->nullable();
            $table->text('chain_2_title')->nullable();
            $table->text('chain_2_short_text')->nullable();
            $table->longText('chain_2_long_text')->nullable();
            $table->text('chain_2_img')->nullable();
            $table->text('chain_3_title')->nullable();
            $table->text('chain_3_short_text')->nullable();
            $table->longText('chain_3_long_text')->nullable();
            $table->text('chain_3_img')->nullable();
            $table->text('chain_4_title')->nullable();
            $table->text('chain_4_short_text')->nullable();
            $table->longText('chain_4_long_text')->nullable();
            $table->text('chain_4_img')->nullable();

            $table->text('sec_5_title')->nullable();
            $table->text('subscription_1_img')->nullable();
            $table->text('subscription_1_title')->nullable();
            $table->text('subscription_1_text')->nullable();
            $table->text('subscription_2_img')->nullable();
            $table->text('subscription_2_title')->nullable();
            $table->text('subscription_2_text')->nullable();
            $table->text('subscription_3_img')->nullable();
            $table->text('subscription_3_title')->nullable();
            $table->text('subscription_3_text')->nullable();
            $table->text('subscription_4_img')->nullable();
            $table->text('subscription_4_title')->nullable();
            $table->text('subscription_4_text')->nullable();

            $table->timestamp('created_at')->current();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
