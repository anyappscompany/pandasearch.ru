<?php

class AntiCaptcha {
    const WRONG_INPUT = 0;
    const CURL_ERROR = 1;
    const SERVER_ERROR = 2;
    const TIMEOUT = 3;

    public $key;
    public $server = 'http://antigate.com';
    public $phrase = false;
    public $regsense = false;
    public $numeric = false;
    public $min_len = 0;
    public $max_len = 0;

    public $ocr_step_time = 5;
    public $ocr_timeout = 120;

    public $curl_timeout = 30;

    function __construct($key) {
        $this->key = $key;
    }

    function recognize($captcha, $auto = false) {
        $data = array(
            'method'    => 'base64',
            'key'       => $this->key,
            'phrase'    => (int)$this->phrase,
            'regsense'    => (int)$this->regsense,
            'numeric'    => (int)$this->numeric,
            'min_len'    => $this->min_len,
            'max_len'    => $this->max_len,
        );

        if ($auto !== true && is_file($captcha)) {
            $data['body'] = base64_encode(file_get_contents($captcha));
            $data['ext'] = strtolower(pathinfo($captcha, PATHINFO_EXTENSION));
        } else if ($captcha = imageCreateFromString($captcha)) {
            ob_start();
            imageJpeg($captcha, null, 80);
            $data['body'] = base64_encode(ob_get_contents());
            $data['ext'] = 'jpg';
            ob_end_clean();
        } else {
            throw new Exception('ANTICAPTCHA: wrong input', self::WRONG_INPUT);
        }

        $id = $this->startRecognize($data);
        $start = time();

        while (
            ($result = $this->getResult($id)) === false
            && !$timeout = ((time() - $start) > $this->ocr_timeout)
        ) {
            sleep($this->ocr_step_time);
        }

        if ($timeout) {
            throw new Exception('ANTICAPTCHA: OCR timeout', self::TIMEOUT);
        }

        return $result;
    }

    private function startRecognize($data) {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $this->server.'/in.php');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, $this->curl_timeout);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        $result = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new Exception('ANTICAPTCHA: '.curl_error($curl), self::CURL_ERROR);
        }

        curl_close($curl);

        if (strpos($result, 'OK') !== 0) {
            throw new Exception('ANTICAPTCHA: '.$result, self::SERVER_ERROR);
        }

        list(, $id) = explode('|', $result);

        return $id;
    }

    private function getResult($id) {
        $curl = curl_init();

        $data = array(
            'key' => $this->key,
            'action' => 'get',
            'id' => $id,
        );

        curl_setopt($curl, CURLOPT_URL, $this->server.'/res.php?'.http_build_query($data, '', '&'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, $this->curl_timeout);

        $result = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new Exception('ANTICAPTCHA: '.curl_error($curl), self::CURL_ERROR);
        }

        curl_close($curl);

        if (strpos($result, 'OK') === 0) {
            list(, $result) = explode('|', $result);
            return $result;
        } else if ($result !== 'CAPCHA_NOT_READY') {
            throw new Exception('ANTICAPTCHA: '.$result, self::TIMEOUT);
        }

        return false;
    }
}

?>