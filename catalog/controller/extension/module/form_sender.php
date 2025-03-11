<?php
/**
 * Created by PhpStorm.
 * User: intos
 * Date: 30.12.2020
 * Time: 10:41
 */

class ControllerExtensionModuleFormSender extends Controller
{

    public function index(){
        $this->load->language('extension/module/form_sender');
        $json = array();
        $translate = [
            'name' => 'Имя',
            'phone' => "Телефон",
            'mail' => "Почта",
            'message' => 'Сообщение',
            'page' => 'Страница',
            'quantity' => 'Количество',
            'color' => 'Цвет',
            'modal_title' => "Заголовок формы"
        ];

        //validations
        /*
        if(isset($this->request->post['mail']) && stripos($this->request->post['mail'],'@') === false){ //some 8
            $json['error'] = $this->language->get('text_mail_error');
        }
        */

        if(isset($this->request->post['phone']) && strlen($this->request->post['phone']) < 8){ //some 8
            $json['error'] = $this->language->get('text_phone_error');
        }

        if(isset($this->request->post['name']) && strlen($this->request->post['name']) < 3){
            $json['error'] = $this->language->get('text_name_error');
        }

        /*
        if(isset($this->request->post['message']) && strlen($this->request->post['message']) < 3){
            $json['error'] = $this->language->get('text_message_error');
        }
        */
        //!validations

        /*
        if(isset($this->request->post['captcha'])){
            $secret= $this->config->get('captcha_google_secret');
            $response = $this->request->post["captcha"];
            $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
            $captcha_success = json_decode($verify);
            if ($captcha_success->success == false) {
                $json['error'] = "Ошибка каптчи";
            }
            unset($this->request->post['captcha']);
        }
        */
        /*
        if(isset($this->request->post['g-recaptcha-response'])){
            unset($this->request->post['g-recaptcha-response']);
        }
        */


//        if(isset($_FILES['file']) && empty($json)){// если нету ошибок
        if(isset($_FILES['file'])){
            $file_name = rand(0,1000).$_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], DIR_UPLOAD.'from_users/' . $file_name);
            unset($this->request->post['file']);
            $file_name = DIR_UPLOAD.'from_users/' . $file_name;
        }else{
            $file_name = false;
        }



            if(empty($json)){
            $json['success'] = $this->language->get('text_success');


            $mail = new Mail($this->config->get('config_mail_engine'));
            $mail->parameter = $this->config->get('config_mail_parameter');
            $mail->smtp_hostname = $this->config->get('config_mail_smtp_hostname');
            $mail->smtp_username = $this->config->get('config_mail_smtp_username');
            $mail->smtp_password = html_entity_decode($this->config->get('config_mail_smtp_password'), ENT_QUOTES, 'UTF-8');
            $mail->smtp_port = $this->config->get('config_mail_smtp_port');
            $mail->smtp_timeout = $this->config->get('config_mail_smtp_timeout');

            $subject = $this->language->get('heading_title');

            if(isset($this->request->post['modal_title'])){
                $subject .= ' - ' . $this->request->post['modal_title'];
            }

            $message = "<h1>".$subject."</h1>";
            $message .= "<table>";
            $message .= '<tbody>';

            foreach ($this->request->post as $key=>$field){
                $message .= '<tr>';
                $message .= '<td>';
                if(isset($translate[$key])){
                    $message .= $translate[$key].":";
                }else{
                    $message .= $key.":";
                }
                $message .= '</td>';

                $message .= '<td>';
                if($key == 'page'){
                    $message .= urldecode($field);
                }else{
                    $message .= $field;
                }
                $message .= '</td>';
                $message .= '</tr>';
            }

            $message .= '</tbody>';
            $message .= "</table>";

            $mail->setTo($this->config->get('config_email'));
            $mail->setFrom($this->config->get('config_email'));
            $mail->setSender(html_entity_decode($this->config->get('config_email'), ENT_QUOTES, 'UTF-8'));
            $mail->setSubject(html_entity_decode($subject, ENT_QUOTES, 'UTF-8'));
            $mail->setHtml($message);

            if($file_name){
                $mail->AddAttachment($file_name);
            }
            $mail->send();
        }

        echo json_encode($json);
    }

}

