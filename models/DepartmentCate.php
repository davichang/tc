<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "department_cate".
 *
 * @property int $id 分类编号
 * @property string $cate_name 分类名
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 */
class DepartmentCate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'department_cate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cate_name', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['cate_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cate_name' => '分类名称',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
