<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "training_stat".
 *
 * @property int $id 编号
 * @property int $training_id 培训编号
 * @property int $user_id 用户
 * @property int $apply_department_id 申请部门ID
 * @property string|null $extro 跨部门申请提交材料
 * @property int|null $created_at 申请日期
 * @property int|null $updated_at 处理日期
 * @property int|null $status 审核状态0：未批准1：已批准2：修改重交
 * @property int|null $process_department_id 处理部门ID
 */
class TrainingStat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'training_stat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['training_id', 'user_id', 'apply_department_id'], 'required'],
            [['training_id', 'user_id', 'apply_department_id', 'created_at', 'updated_at', 'status', 'process_department_id'], 'integer'],
            [['extro'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'training_id' => '培训编号',
            'user_id' => '用户编号',
            'apply_department_id' => '拟提交申请部门',
            'extro' => '备注',
            'created_at' => '申请时间',
            'updated_at' => '处理时间',
            'status' => '处理结果',
            'process_department_id' => '处理部门',
        ];
    }

    /**
     * 获取培训
     */
    public function getTraining()
    {
        return $this->hasOne(Training::className(),['id'=>'training_id']);
    }
    /**
     * 获取用户
     */
    public function getUser()
    {
        return $this->hasOne(User::className(),['id' => 'user_id']);
    }
}
