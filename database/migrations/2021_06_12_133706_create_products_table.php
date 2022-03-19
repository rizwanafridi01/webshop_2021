<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('thumbnail')->nullable()->default('NO_IMG.png');
            $table->string('slug')->nullable();
            $table->decimal('discount',10,2)->default('0');
            $table->decimal('amount',10,2)->default('0');
            $table->decimal('currentAmount',10,2)->default('0');
            $table->text('updateDescription')->nullable();
            $table->unsignedBigInteger('sub_category_id')->default(0);
            $table->unsignedBigInteger('Product_percentage_id')->default(0);
            $table->unsignedBigInteger('user_id')->default(0);
            $table->unsignedBigInteger('company_id')->default(0);
            $table->unsignedBigInteger('product_brand_id')->default(0);
            $table->timestamp('createdDate')->useCurrent();
            $table->text('excerpt')->nullable();
            $table->text('description')->nullable();
            $table->text('uses')->nullable();
            $table->text('shippingInstruction')->nullable();
            $table->text('aboutBrand')->nullable();
            $table->text('vendorInfo')->nullable();
            $table->boolean('isActive')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
