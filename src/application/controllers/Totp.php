<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'libraries/GoogleAuthenticator.php');

class Totp extends CI_Controller {

    private $title = 'totp-sample';
    private $name = 'test-user';

    public function __construct()
    {
        parent::__construct();
    }
	
	public function index()
	{
		$ga = new GoogleAuthenticator();

        // 秘密鍵の生成
		$secret = $ga->createSecret();

        // QRコードURL
        $qr_code_url = $ga->getQRCodeGoogleUrl($this->name, $secret, $this->title);

        $view_param = [
            'secret' => $secret,
            'qr_code_url' => $qr_code_url,
        ];

		$this->load->view('totp', $view_param);
	}

    public function verify()
    {
        $secret = $this->input->post('secret');
        $one_code = $this->input->post('one_code');

        $ga = new GoogleAuthenticator();

        // サーバとクライアントで許容する時間のずれ $discrepancy x 30秒 許容
        $discrepancy = 1;

        // 検証
        $result = null;
        $is_verify = $ga->verifyCode($secret, $one_code, $discrepancy);
        if ($is_verify) {
            $result = 'OK';
        } else {
            $result = 'NG';
        }

        $view_param = [
            'verify_result' => $result,
        ];

        $this->load->view('result', $view_param);
    }
}
