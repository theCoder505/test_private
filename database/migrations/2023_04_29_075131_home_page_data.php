<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HomePageData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homepage_data', function (Blueprint $table) {
            $table->integer('sno')->primary();
            $table->text('slider1')->nullable();
            $table->text('slider2')->nullable();
            $table->text('slider3')->nullable();
            $table->text('slider4')->nullable();
            $table->text('slider5')->nullable();
            $table->text('slider6')->nullable();
            $table->text('slider7')->nullable();
            $table->text('slider8')->nullable();
            $table->text('left_img_file')->nullable();
            $table->text('sec2_title')->nullable();
            
            $table->text('sec2_text')->nullable();
            $table->text('right_img_file')->nullable();
            $table->text('pdf_src1_img')->nullable();
            $table->text('pdf_file_src1')->nullable();
            $table->text('sm_dtls_txt_1')->nullable();
            $table->text('pdf_src2_img')->nullable();
            $table->text('pdf_file_src2')->nullable();
            $table->text('sm_dtls_txt_2')->nullable();
            $table->text('pdf_src3_img')->nullable();
            $table->text('pdf_file_src3')->nullable();

            $table->text('sm_dtls_txt_3')->nullable();
            $table->text('pdf_src4_img')->nullable();
            $table->text('pdf_file_src4')->nullable();
            $table->text('sm_dtls_txt_4')->nullable();
            $table->text('brand_line_images')->nullable();
            $table->text('potential_img_1')->nullable();
            $table->text('potential_title_1')->nullable();
            $table->longText('potential_short_desc_1')->nullable();
            $table->longText('potential_desc_1')->nullable();
            $table->text('potential_img_2')->nullable();

            $table->text('potential_title_2')->nullable();
            $table->longText('potential_short_desc_2')->nullable();
            $table->longText('potential_desc_2')->nullable();
            $table->text('potential_img_3')->nullable();
            $table->text('potential_title_3')->nullable();
            $table->longText('potential_short_desc_3')->nullable();
            $table->longText('potential_desc_3')->nullable();
            $table->text('potential_img_4')->nullable();
            $table->text('potential_title_4')->nullable();
            $table->longText('potential_short_desc_4')->nullable();

            $table->longText('potential_desc_4')->nullable();
            $table->text('overview_img1')->nullable();
            $table->text('overview_text_1')->nullable();
            $table->text('overview_img2')->nullable();
            $table->text('overview_text_2')->nullable();
            $table->text('overview_img3')->nullable();
            $table->text('overview_text_3')->nullable();
            $table->text('sourcing_title')->nullable();
            $table->text('sourcing_text')->nullable();
            $table->text('sourcing_img')->nullable();

            $table->text('storage_img')->nullable();
            $table->text('storage_title')->nullable();
            $table->text('storage_text')->nullable();
            $table->text('ecommerce_title')->nullable();
            $table->text('ecommerce_text')->nullable();
            $table->text('ecommerce_img')->nullable();
            $table->text('screenshot_img')->nullable();
            $table->text('screenshot_text')->nullable();
            $table->text('soap_img')->nullable();
            $table->text('soap_text')->nullable();

            $table->text('daddy_img')->nullable();
            $table->text('daddy_text')->nullable();
            $table->text('varifiedss_img')->nullable();
            $table->text('lowcostss_img')->nullable();
            $table->text('ecomss_img')->nullable();
            $table->timestamp('created_at')->nullable();
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
