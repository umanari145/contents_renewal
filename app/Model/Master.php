<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Cache;
use Yaml;

class Master extends Model
{

    private $yamlLists = [];
    private $dbInfo = [];
    /**
     * コンストラクタ
     */
    public function __construct()
    {
      $yamlContents = Yaml::parse(file_get_contents(config_path('lists.yaml')));
      if (!empty($yamlContents['db'])){
          $this->dbInfo = $yamlContents['db'];
      }
      if (!empty($yamlContents['text'])){
          $data = $this->convHashToArr($yamlContents['text']);
          $this->yamlLists = $data;
      }
    }

    /**
     * label,hashのリストをプルダウンで加工しやすいように変更
     *
     * @param array $hashLists ハッシュの配列
     * @return array 加工されたハッシュ配列
     */
    private function convHashToArr($hashLists = [])
    {
        $lists = [];
        foreach ($hashLists as $listName => $listsData) {
            $hash = [];
            foreach ($listsData as $listData) {
                $value = isset($listData['value']) ? $listData['value'] :'';
                $label = isset($listData['label']) ? $listData['label'] :'';
                $hash[$value] = $label;
            }
            $lists[$listName] = $hash;
        }
        return $lists;
    }

    /**
     * リストに空白を入れる
     *
     * @param $item 配列全体
     * @param $listName リストの名前
     *
     * @return array リスト名
     */
    public function insertBlank($items, $listName)
    {
        $listData = $items[$listName];
        $listData2 = [];
        $listData2[''] = '';
        foreach ($listData as $value => $label) {
            $listData2[$value] = $label;
        }
        return $listData2;
    }

    /**
     * プルダウンのkey => valueを取得
     *
     * @param  array $listsInfo リストの情報
     * @return array  全リストのハッシュ
     */
    public function getLists($listsInfo)
    {
        $totalLists = [];
        foreach ($listsInfo as $listName) {
          if (!empty($this->dbInfo[$listName])) {
              $colInfo = $this->dbInfo[$listName];
              $dbData = $this->getValueLabelArr($listName, $colInfo);
              if (!empty($dbData)) {
                $totalLists[$listName] = $dbData;
              }
          }

          if (!empty($this->yamlLists[$listName])) {
              $totalLists[$listName] = $this->yamlLists[$listName];
          }

        }
        return $totalLists;
    }

    /**
     * ラベルの配列の取得
     *
     * @param  string $listName リスト名
     * @param  string $colInfo  カラムの情報
     * @return array  リストのデータ
     */
    private function getValueLabelArr($listName, $colInfo)
    {
        $labelCol = @$colInfo['label_col']?:'';
        $valueCol = (isset($colInfo['value_col'])) ? $colInfo['value_col'] :'';
        $lists = DB::table($listName);

        if (!empty($colInfo['where'])) {
            foreach($colInfo['where'] as $whereInfo) {
              $lists->where($whereInfo['col'], $whereInfo['operant'], $whereInfo['value']);
            }
        }

        if (!empty($colInfo['order_by'])) {
            foreach($colInfo['order_by'] as $orderInfo) {
                $lists->orderBy($orderInfo['col'], $orderInfo['order']);
            }
        }

        return $lists->pluck($valueCol, $labelCol)->toArray();
    }

}
