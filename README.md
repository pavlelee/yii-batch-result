#Yii1.x 数据分批获取扩展
1.简介：
查询大量的数据库中的数据时，建议您尽可能使用批处理查询，尽量减少您的内存使用情况。

2.安装方式：

```shell
composer require pavle/yii-batch-result
```

3.使用方式：

```php
public function behaviors()
{
    return array(
        array(
            'class' => '\pavle\batch\behaviors\BatchResultBehavior',
            'batchSize' => 20
        ),
    );
}
```
在需要使用批处理的地方

```php
foreach(Product::model()->batch($condition, $params, $batchSize) as $products){
    //products是一个batchSize数量的数据集
}

foreach(Product::model()->each($condition, $params, $batchSize) as $product){
    //product是一个数据对象
}
```