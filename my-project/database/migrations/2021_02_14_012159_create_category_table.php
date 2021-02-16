<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID');
            $table->string('category')->comment('カテゴリー'); // カテゴリー
            $table->string('classification')->comment('分類'); // 分類
            $table->string('remarks')->nullable()->comment('備考'); // 備考

            $table->timestamps();
            $table->softDeletes();
        });

        // Schema::table('category', function(Blueprint $table) {
        //     $table->bigInteger('created_user_id')->after('created_at')->nullable()->comment('作成者ID:ユーザーテーブルへのリレーション');
        //     $table->bigInteger('updated_user_id')->after('updated_at')->nullable()->comment('更新者ID:ユーザーテーブルへのリレーション');
        //     $table->bigInteger('deleted_user_id')->after('deleted_at')->nullable()->comment('削除者ID:ユーザーテーブルへのリレーション');
        // });

        DB::statement("ALTER TABLE `category` COMMENT 'カテゴリー:カテゴリー名および分類を保管する'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category');
    }
}
