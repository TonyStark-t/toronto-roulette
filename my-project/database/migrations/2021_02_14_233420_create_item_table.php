<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID');
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->nullable()->comment('カテゴリーID:カテゴリーテーブルへのリレーション');
            $table->bigInteger('region_id')->unsigned();
            $table->foreign('region_id')->references('id')->on('regions')->nullable()->comment('領域ID:領域テーブルへのリレーション');
            $table->datetime('registered_day')->comment('登録日');
            $table->tinyInteger('week')->nullable()->comment('週:月の何周目に該当するか、1~6の数字を入れる。');
            $table->integer('amount')->nullable()->comment('金額');
            $table->text('details')->nullable()->comment('詳細');

            $table->timestamps();
            $table->softDeletes();
        });

        // Schema::table('categories', function(Blueprint $table) {
        //     $table->bigInteger('created_user_id')->after('created_at')->nullable()->comment('作成者ID:ユーザーテーブルへのリレーション');
        //     $table->bigInteger('updated_user_id')->after('updated_at')->nullable()->comment('更新者ID:ユーザーテーブルへのリレーション');
        //     $table->bigInteger('deleted_user_id')->after('deleted_at')->nullable()->comment('削除者ID:ユーザーテーブルへのリレーション');
        // });

        DB::statement("ALTER TABLE `items` COMMENT 'アイテム:収支またはノートを格納する。'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item');
    }
}
