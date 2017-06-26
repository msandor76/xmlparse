<?php

namespace App\Controllers;

//use Helpers\HTMLPurifier;
use Core\View;
use Core\Controller;
use Cocur\Slugify\Slugify;
use Zend\Escaper\Escaper;
use GUMP; // doksi:  https://github.com/Wixel/GUMP
use HTMLPurifier_Config;
use HTMLPurifier;
/*
chmod to 777 in /.../vendor/ezyang/htmlpurifier/library/HTMLPurifier/DefinitionCache/
*/


class Welcome extends Controller
{
	private $welcomeusers;

    /**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->language->load('Welcome');
        echo("welcome constructor");
    }

    /**
     * Define Index page title and load template files
     */
    public function index()
    {
        $data['title'] = $this->language->get('welcomeText');
        $data['welcome_message'] = $this->language->get('welcomeMessage');
		echo("welcome index");
        View::renderTemplate('header', $data);
        View::render('Welcome/welcome', $data);
        View::renderTemplate('footer', $data);
    }

    /**
     * Define Subpage page title and load template files
     */
    public function subPage()
    {
		//$this->welcomeusers = new \Models\WelcomeModel(); // WelcomeModel osztály __construct()
		//$data['content'] = "<script>alert(\"teszt\");</script>";
		//$content = HTMLPurifier::cleanHTML($data['content']); 
		/*$welcomeusers = new \Models\WelcomeModel();
		$data['welcomeusers'] = $welcomeusers->getUsers();*/
		
		//$slugify = new Slugify();
		//echo $slugify->slugify('Hello World!'); // hello-world
		
		//$input = '<script>alert("zf2")</script>';
		//$escaper = new Escaper('utf-8'); // $escaper = new \Zend\Escaper\Escaper('utf-8');
		//echo $escaper->escapeHtml($input);
		
		/*
		$validator = new GUMP();
		$validator->validation_rules(array(
			'comment' => 'required|max_len,500',
		));
		$validator->filter_rules(array(
			'comment' => 'basic_tags',
		));
		// Valid Data
		$_POST = array(
			'comment' => '<strong>this is freaking awesome</strong><script>alert(1);</script>'
		);
		$_POST = $validator->run($_POST);
		print_r($_POST);
		*/
		
		/*
		$dirty_html = "<p>ez egy teszt<script>alert()</script> és itt a szkript utáni rész</p>";
		$config = HTMLPurifier_Config::createDefault();
		$purifier = new HTMLPurifier($config);
		$clean_html = $purifier->purify($dirty_html);
		echo $clean_html;
		*/
		
        $data['title'] = $this->language->get('subpageText');
        $data['welcome_message'] = $this->language->get('subpageMessage');

        View::renderTemplate('header', $data);
        View::render('Welcome/subpage', $data);
        View::renderTemplate('footer', $data);
    }
}
