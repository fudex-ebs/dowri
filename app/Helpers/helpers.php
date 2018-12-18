<?php
function SendSms($mobile_number,$msg){
        $curl = curl_init();
        $msg_encoded=iconv('UTF-8','WINDOWS-1256' , $msg);
        $msg_url_encoded=urlencode($msg_encoded);
        $fields_str="userName=".env('SMS_USER_NAME', 'test')."&userPassword=".env('SMS_PASSWORD', 'test')."&numbers=".$mobile_number."&userSender=".env('SMS_SENDER', 'test')."&msg=".$msg_url_encoded."&By=API";
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://sms.rasaelna.com/gw/",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
        ));

        curl_setopt($curl, CURLOPT_POSTFIELDS,$fields_str);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        return $response;
    };

  function time_format($time){
      switch ($time) {
        case 'p_7_00':
          return '7:00 - 7:15';
          break;
        case 'p_7_15':
            return '7:15 - 7:30';
            break;
        case 'p_7_30':
          return '7:30 - 7:45';
          break;
        case 'p_7_45':
            return '7:45 - 8:00';
            break;
        case 'p_8_00':
          return '8:00 - 8:15';
          break;
        case 'p_8_15':
            return '8:15 - 8:30';
            break;
        case 'p_8_30':
          return '8:30 - 8:45';
          break;
        case 'p_8_45':
            return '8:45 - 9:00';
            break;
        case 'p_9_00':
          return '9:00 - 9:15';
          break;
        case 'p_9_15':
            return '9:15 - 9:30';
            break;
        case 'p_9_30':
          return '9:30 - 9:45';
          break;
        case 'p_9_45':
            return '9:45 - 10:00';
            break;
        case 'p_10_00':
          return '10:00 - 10:15';
          break;
        case 'p_10_15':
            return '10:15 - 10:30';
            break;
        case 'p_10_30':
          return '10:30 - 10:45';
          break;
        case 'p_10_45':
            return '10:45 - 11:00';
            break;
        case 'p_11_00':
          return '11:00 - 11:15';
          break;
        case 'p_11_15':
            return '11:15 - 11:30';
            break;
        case 'p_11_30':
          return '11:30 - 11:45';
          break;
        case 'p_11_45':
            return '11:45 - 12:00';
            break;
        case 'p_12_00':
          return '12:00 - 12:15';
          break;
        case 'p_12_15':
            return '12:15 - 12:30';
            break;
        case 'p_12_30':
          return '12:30 - 12:45';
          break;
        case 'p_12_45':
            return '12:45 - 13:00';
            break;
        case 'p_13_00':
          return '13:00 - 13:15';
          break;
        case 'p_13_15':
            return '13:15 - 13:30';
            break;
        case 'p_13_30':
          return '13:30 - 13:45';
          break;
        case 'p_13_45':
            return '13:45 - 14:00';
            break;
        case 'p_14_00':
          return '14:00 - 14:15';
          break;
        case 'p_14_15':
            return '14:15 - 14:30';
            break;
        case 'p_14_30':
          return '14:30 - 14:45';
          break;
        case 'p_14_45':
            return '14:45 - 15:00';
            break;
        case 'p_15_00':
          return '15:00 - 15:15';
          break;
        case 'p_15_15':
            return '15:15 - 15:30';
            break;
        case 'p_15_30':
          return '15:30 - 15:45';
          break;
        case 'p_15_45':
            return '15:45 - 16:00';
            break;
        case 'p_16_00':
          return '16:00 - 16:15';
          break;
        case 'p_16_15':
            return '16:15 - 16:30';
            break;
        case 'p_16_30':
          return '16:30 - 16:45';
          break;
        case 'p_16_45':
            return '16:45 - 17:00';
            break;
      }
  };
  function get_time_periods(){
    return $time_periods = [
    'p_7_00','p_7_15','p_7_30','p_7_45',
    'p_8_00','p_8_15','p_8_30','p_8_45',
    'p_9_00','p_9_15','p_9_30','p_9_45',
    'p_10_00','p_10_15','p_10_30','p_10_45',
    'p_11_00','p_11_15','p_11_30','p_11_45',
    'p_12_00','p_12_15','p_12_30','p_12_45',
    'p_13_00','p_13_15','p_13_30','p_13_45',
    'p_14_00','p_14_15','p_14_30','p_14_45',
    'p_15_00','p_15_15','p_15_30','p_15_45',
    'p_16_00','p_16_15','p_16_30','p_16_45',
  ];
  }
  function sat_work_hours(){
    return $time_periods = [
      'p_7_00','p_7_15','p_7_30','p_7_45',
      'p_8_00','p_8_15','p_8_30','p_8_45',
      'p_9_00','p_9_15','p_9_30','p_9_45',
      'p_10_00','p_10_15','p_10_30','p_10_45',
      'p_11_00','p_11_15','p_11_30','p_11_45',
      'p_12_00','p_12_15','p_12_30','p_12_45',
      'p_13_00','p_13_15','p_13_30','p_13_45',
    ];
  }

  function date_is_friday($date){
    $mydate = new Carbon\Carbon($date);
    return $mydate->englishDayOfWeek == 'Friday' ? true : false;

  }
  function date_is_sat($date){
        $mydate = new Carbon\Carbon($date);
        return $mydate->englishDayOfWeek == 'Saturday' ? true : false;

    }

