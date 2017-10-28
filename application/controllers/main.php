<?php

/* http://localhost/todo/index.php/main/lists의 주소형식으로 접속해야 하는데
http://localhost/todo/application/controllers/main.php로 접속을 시도할 경우 프로그램이 실행되는 것을 막아줌. */
if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * todo 컨트롤러
 * User: EunSeo
 * Date: 2017-10-27
 * Time: 오후 6:23
 */
// 클래스명은 컨트롤러 파일명과 동일. (파일명 첫글자 소문자, 클래스명 첫글자 대문자)
class Main extends CI_Controller {

    // 생성자(Constructor)  : 컨트롤러 내부에서 사용할 변수를 선언하거나 라이브러리, 모델, 헬퍼를 로딩할 수 있음.
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('todo_m');
        $this->load->helper('url');
    }

    /**
     * 주소에서 메서드가 생략되었을 때 실행되는 기본 메서드
     */
    public function index()
    {
        $this->lists();
    }

    /**
     * todo 목록
     */
    public function lists()
    {
        $data['list'] = $this->todo_m->get_list();
        $this->load->view('todo/list_v', $data);
    }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */