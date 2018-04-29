<?php $value = '';?>
@if(isset($data[$field]['value']))
  <?php $value = $data[$field]['value'];?>
@elseif(!isset($value))
  <?php $value = '';?>
@endif

@if(empty($class))
  <?php $class = [];?>
@endif

@if(isset($data[$field]['label']))
  <?php $label = $data[$field]['label'];?>
@elseif(empty($label))
  <?php $label = '';?>
@endif

@if(empty($type))
  <?php $type = 'text';?>
@endif

@if($type =='text')
  <?php $fieldId = sprintf("%s_id", $field);?>
  {!! Form::label($field, $label, ['class'=>'control-label']) !!}
  {!! Form::text($field, $value, ['id'=> $field,'class'=>'form-control']) !!}
@endif

@if($type == 'select')
  <?php $fieldId = sprintf("%s_id", $field);?>
  {!! Form::label($field, $label, ['class'=>'control-label']) !!}
  {!! Form::select($field, $masterLists[$field], $value, $class) !!}
@endif

@if($type == 'radio')
  {!! Form::label($field, $label, ['class'=>'control-label']) !!}
  <?php $loopIndex =0; ?>
  @foreach($masterLists[$field] as $radioval => $radiolabel)
     <?php
        $loopIndex++;
        $checked = ($value == $radioval);
        $labelIndex = sprintf("%s_%s", $field, $loopIndex)
     ?>
    {!! Form::radio($field, $radioval, $checked,['id' => $labelIndex]) !!}
    {!! Form::label($labelIndex, $radiolabel, ['class'=>'control-label']) !!}
  @endforeach
@endif

@if($type == 'checkbox')
  {!! Form::label($field, $label, ['class'=>'control-label']) !!}
  <?php $loopIndex =0; ?>
  @foreach($masterLists[$field] as $checkval => $checklabel)
  <div class="checkbox-inline">
    <?php
      $loopIndex++;
      $checked = ($value == $checkval);
      $labelIndex = sprintf("%s_%s", $field, $loopIndex);
      $checkfield = sprintf("%s[]", $field);
    ?>
    {!! Form::checkbox($checkfield, $checkval, $checked ,['id'=> $labelIndex]) !!}
    {!! Form::label($labelIndex, $checklabel, ['class'=>'control-label']) !!}
  </div>
  @endforeach
@endif
