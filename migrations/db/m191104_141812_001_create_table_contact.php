<?php

use yii\db\Migration;

class m191104_141812_001_create_table_contact extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%contact}}', [
            'id' => $this->integer(11)->unsigned()->notNull()->append('AUTO_INCREMENT PRIMARY KEY')->comment('شناسه'),
            'name' => $this->string(128)->notNull()->comment('نام'),
            'email' => $this->string(255)->notNull()->comment('ایمیل'),
            'phone' => $this->string(13)->comment('شماره تماس'),
            'type' => $this->string(190),
            'subject' => $this->string(255)->comment('موضوع'),
            'text' => $this->text()->notNull()->comment('پیام'),
            'is_faq' => $this->integer(11)->defaultValue('0'),
            'answer' => $this->text(),
            'created_at' => $this->integer(11)->comment('تاریخ ایجاد'),
            'ip' => $this->string(48)->comment('ip ایجاد کننده'),
            'user_id' => $this->integer(11)->unsigned()->comment('شناسه کاربر'),
            'status' => $this->tinyInteger(1)->notNull()->defaultValue('0')->comment('وضعیت'),
            'show_on_faq_page' => $this->integer(11)->defaultValue('0'),
        ], $tableOptions);

        $this->createIndex('fk_contact_user1_idx', '{{%contact}}', 'user_id');
    }

    public function down()
    {
        $this->dropTable('{{%contact}}');
    }
}
