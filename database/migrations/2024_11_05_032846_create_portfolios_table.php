<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    public function up()
    {
        // Create portfolios table
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('category')->nullable();
            $table->date('project_date')->nullable();
            $table->string('project_url')->nullable();
            $table->string('main_thumbnail')->nullable()->default('default-thumbnail.png');

            // Client Details
            $table->string('client_company_name')->nullable();
            $table->string('client_author')->nullable();
            $table->string('client_role')->nullable();
            $table->string('client_feedback')->nullable();
            $table->string('client_author_image')->nullable();
            $table->timestamps();
        });

        // Create portfolio_images table
        Schema::create('portfolio_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portfolio_id')->constrained('portfolios')->onDelete('cascade')->index();
            $table->string('image');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('portfolio_images');
        Schema::dropIfExists('portfolios');
    }
}
