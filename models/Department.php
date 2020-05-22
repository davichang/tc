<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "department".
 *
 * @property int $id
 * @property string $department_name 部门名称
 * @property int $status 1:正常0:无效
 * @property int $department_cate_id 上级部门ID
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['department_name', 'status', 'department_cate_id'], 'required'],
            [['status', 'department_cate_id', 'created_at', 'updated_at'], 'integer'],
            [['department_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'department_name' => '部门名称',
            'status' => '状态',
            'department_cate_id' => '分类',
            'created_at' => '添加时间',
            'updated_at' => '更新时间',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),//类
                'attributes'=> [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at','updated_at'],//数据插入之前更新二者
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],//数据更新之前，修改updated_at
                ],
                'value' => time(), //将需要修改的字段修改为当前时间戳
            ],
        ];
    }

    public function getDepartmentCate(){
        return $this->hasOne(DepartmentCate::className(),['id' => 'department_cate_id']);
    }
}
