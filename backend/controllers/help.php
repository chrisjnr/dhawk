<?php
//other code to remember 

// to retrieve the user identity

Yii::$app->user->identity->username;


/// downloading composer to a directory
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

// datepicker

echo $form->field($model, 'date_1')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Enter birth date ...'],
    'pluginOptions' => [
        'autoclose'=>true
    ]
]);



<?= GridView::widget([
 'dataProvider' => $dataProvider,
'columns' => [
 'Title', // same as 'Title:text'
 'Snippet:html', // will be HTML purified
 'Description:ntext', // plaintext but new lines as <br>
 'Email:email', // will be shown as mailto: link
 'WebSite:url', // will be shown as hyperlink
 'Picture:image', // <img src="value of Picture column" />
 'Maried:boolean', // true or false
 'Birthdate:date',
 'Birthdate:time',
 'Birthdate:datetime',
 'Birthdate:timestamp',
 'Size:integer',
 'Cost:spellout', // number as text
 'DiskSize:size', // as bytes, for example `12 kilobytes`
 'Size:decimal',
 'Ratio:percent',
 ]
);
?>