<?php
require_once dirname(__FILE__) . '/../../autoload.php';

$text = $database->select('dates', [
    'entekhab_vahed',
    'start_class',
    'del_add',
    'del_add_s',
    'del_one',
    'end_class',
    'exams'
]);

$telegram->sendMessage([
    'chat_id' => $data->user_id,
    'parse_mode' => 'Markdown',
    'text' =>
        '📅' . ' *' . 'تقویم آموزشی نیم سال اول ۹۵-۹۶' . "*\n\n" .
        '🔻' . 'تاریخ انتخاب واحد : `' . $text[0]['entekhab_vahed'] . '`' . "\n" .
        '🔻' . 'تاریخ شروع کلاس ها  : `' . $text[0]['start_class'] . '`' . "\n" .
        '🔻' . 'تاریخ حذف و اضافه : `' . $text[0]['del_add'] . '`' . "\n" .
        '🔻' . 'تاریخ حذف و اضافه موارد خاص : `' . $text[0]['del_add_s'] . '`' . "\n" .
        '🔻' . 'تاریخ حذف تکدرس : `' . $text[0]['del_one'] . '`' . "\n" .
        '🔻' . 'تاریخ پایان کلاس ها : `' . $text[0]['end_class'] . '`' . "\n" .
        '🔻' . 'تاریخ امتحانات : `' . $text[0]['exams']  . '`',
    'reply_markup' => $keyboard->key_start()
]);

