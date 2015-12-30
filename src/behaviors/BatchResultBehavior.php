<?php
/**
 * User: 李鹏飞 <523260513@qq.com>
 * Date: 2015/12/30
 * Time: 15:12
 */

namespace pavle\batch\behaviors;

use pavle\batch\components\BatchResult;


class BatchResultBehavior extends CActiveRecordBehavior
{
    public $batchSize = 100;

    /**
     * @param string $condition
     * @param array $params
     * @param int $size
     * @return BatchResult
     */
    public function batch($condition='',$params=array(), $size = null){
        if(!$size){
            $size = $this->batchSize;
        }

        $model = $this->owner;
        $criteria=$model->getCommandBuilder()->createCriteria($condition,$params);
        $batch = new BatchResult($model, $criteria);
        $batch->batchSize = $size;
        $batch->each = false;
        return $batch;
    }

    /**
     * @param string $condition
     * @param array $params
     * @param int $size
     * @return BatchResult
     */
    public function each($condition='',$params=array(), $size = null){
        if(!$size){
            $size = $this->batchSize;
        }

        $model = $this->owner;
        $criteria=$model->getCommandBuilder()->createCriteria($condition,$params);
        $batch = new BatchResult($model, $criteria);
        $batch->batchSize = $size;
        $batch->each = true;
        return $batch;
    }
}