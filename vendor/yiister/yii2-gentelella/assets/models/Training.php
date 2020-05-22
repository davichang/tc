<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "training".
 *
 * @property int $id 培训编号
 * @property string $title 培训标题
 * @property string $teacher 主讲
 * @property string $content 内容简介
 * @property string $department_ids 参加部门
 * @property string $training_time 培训时间
 * @property int $apply_department_id 申请部门
 * @property int $status 审核状态
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 * @property string|null $extro 备注
 */
class Training extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'training';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'teacher', 'content', 'department_ids', 'training_time'], 'required'],
            [['content', 'extro'], 'string'],
            [['training_time'], 'safe'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['teacher'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'title' => '主题',
            'teacher' => '主讲',
            'content' => '简介',
            'department_ids' => '参加部门',
            'training_time' => '培训时间',
            'apply_department_id' => '申请部门',
            'status' => '状态',
            'created_at' => '申请时间',
            'updated_at' => '批准时间',
            'extro' => '备注',
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
}
