<?php

namespace App\Forms;
use Yaml;
use Validator;

class FormCheck{

    public $formParams;

    /**
     *フォームのインスタンス生成
     *
     * @param string $formName   フォームの名称
     * @param array  $modelParam 編集時のディフォ値の設置
     */
    public function __construct($formName, $modelParam = null)
    {
        $formFilePath = sprintf("Forms/%s.yaml", $formName);
        $yamlContents = Yaml::parse(file_get_contents(app_path($formFilePath)));
        if (!empty($yamlContents['params'])) {
            $this->formParams = $yamlContents['params'];
        }

        if($modelParam != null) {
            $this->setModelParam($modelParam);
        }
    }

    /**
     * モデルの値のセット
     *
     * @param array $modelParam モデルのセット
     */
    private function setModelParam($modelParam)
    {
        foreach($this->formParams as &$field) {
            $name = $field['name'];
            $value = @$modelParam[$name]?:'';
            $field['default'] = $value;
        }
    }

    /**
     * フォームのデータを取得する
     *
     * @param array $request リクエストパラメーター
     * @param bool $isPost POSTあり
     * @return array ハッシュ化されたフォームのパラメータ
     */
    public function getFormParam($request = null, $isPost = false)
    {
        $formHash = [];
        foreach($this->formParams as $field) {
            $name = $field['name'];
            $label = $field['label'];

            $value = $this->getValue($field, $request, $isPost);

            $formHash[$name] = [
              'name'=> $name,
              'label' => $label,
              'value' => $value
            ];
        }
        return $formHash;
    }

    /**
     * 値の取得
     *
     * @param  string $field   フィールド名
     * @param  string $request リクエストパラメーター
     * @param  bool   $isPost 投稿あり
     * @return string valueとなる値
     */
    private function getValue($field, $request = null, $isPost = false)
    {
        $fieldName = $field['name'];
        //値がPOSTされた場合
        if($isPost) {
            if (isset($request[$fieldName])) {
                return $request[$fieldName];
            } else {
                return '';
            }
        }

        //ディフォ値
        if (isset($field['default'])) {
            return $field['default'];
        }
        return '';
    }

    /**
     * エラーメッセージの取得
     *
     * @param  array $formHash フォームデータのハッシュ
     * @return Validator バリデーションオブジェクト
     */
    public function getErrorMessage($formHash)
    {
        list($postValue, $errorRules, $errorMessageHash) = $this->getValidateParam($formHash);
        $validator = Validator::make($postValue, $errorRules, $errorMessageHash);
        return $validator;
    }

    /**
     * エラーメッセージの取得
     *
     * @param  array $formHash フォームデータのハッシュ
     * @return array  postの値、エラールール、エラーメッセージ
     */
    private function getValidateParam($formHash)
    {
        $errorRules = [];
        $errorMessageHash = [];
        $postValue = [];
        foreach ($this->formParams as $field) {
            if(!empty($field['validation'])) {
                $fieldName = $field['name'];
                $errorRules[$fieldName] = $this->getValidationInfo($fieldName, $field['validation'], $errorMessageHash);
                $postValue[$fieldName] = $formHash[$fieldName]['value'];
              }
        }
        return [$postValue, $errorRules, $errorMessageHash];
    }

    /**
     * 単一のフィールドのバリデーション情報の取得
     *
     * @param  string $fieldName フィールド名
     * @param  array $validations エラーチェック
     * @param  array $errorMessageHash エラーメッセージ
     * @return
     */
    private function getValidationInfo($fieldName, $validations, &$errorMessageHash)
    {
        $errorRules = [];
        foreach($validations as $validation) {
            $errorRules[] = $validation['error_type'];
            $errorType = sprintf("%s.%s", $fieldName, $validation['error_type']);
            $errorMessageHash[$errorType] = $validation['message'];
        }
        $concatErrorRule = implode('|', $errorRules);
        return $concatErrorRule;
    }

}
