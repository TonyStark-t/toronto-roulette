<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID');
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('category')->nullable()->comment('カテゴリーID:カテゴリーテーブルへのリレーション');
            $table->string('name')->comment('領域名');
            $table->string('remarks')->nullable()->comment('備考');

            $table->timestamps();
            $table->softDeletes();
        });

        // Schema::table('category', function(Blueprint $table) {
        //     $table->bigInteger('created_user_id')->after('created_at')->nullable()->comment('作成者ID:ユーザーテーブルへのリレーション');
        //     $table->bigInteger('updated_user_id')->after('updated_at')->nullable()->comment('更新者ID:ユーザーテーブルへのリレーション');
        //     $table->bigInteger('deleted_user_id')->after('deleted_at')->nullable()->comment('削除者ID:ユーザーテーブルへのリレーション');
        // });

        DB::statement("ALTER TABLE `region` COMMENT '領域:領域名を格納する。'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('region');
    }
}
