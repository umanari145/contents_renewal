@if(!isset($value))
  <?php $value = '';?>
@endif

@if(empty($class))
  <?php $class = [];?>
@endif

@if(empty($label))
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
  <?php $loopIndex =0; ?>
  @foreach($masterLists[$field] as $radioval => $label)
     <?php
        $loopIndex++;
        $checked = ($value == $radioval);
        $labelIndex = sprintf("%s_%s", $field, $loopIndex)
     ?>
    {!! Form::radio($field, $radioval, $checked,['id' => $labelIndex]) !!}
    {!! Form::label($labelIndex, $label, ['class'=>'control-label']) !!}
  @endforeach
@endif

@if($type == 'checkbox')
  <?php $loopIndex =0; ?>
  @foreach($masterLists[$field] as $checkval => $label)
  <div class="checkbox-inline">
    <?php
      $loopIndex++;
      $checked = ($value == $checkval);
      $labelIndex = sprintf("%s_%s", $field, $loopIndex);
      $checkfield = sprintf("%s[]", $field);
    ?>
    {!! Form::checkbox($checkfield, $checkval, $checked ,['id'=> $labelIndex]) !!}
    {!! Form::label($labelIndex, $label, ['class'=>'control-label']) !!}
  </div>
  @endforeach
@endif
