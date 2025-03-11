<?php

class ControllerExtensionModuleHTML2Generator extends Controller
{
    private $error = array();

    public function index() {
        $this->load->language('extension/module/html2_generator');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('extension/module/html2');


        $this->getList();
    }

    protected function getList() {


        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_extension'),
            'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
        );
        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('extension/module/html2_generator', 'user_token=' . $this->session->data['user_token'], true)
        );


        $data['add'] = $this->url->link('extension/module/html2_generator/add', 'user_token=' . $this->session->data['user_token'], true);
        $data['delete'] = $this->url->link('extension/module/html2_generator/delete', 'user_token=' . $this->session->data['user_token'], true);
        $data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);


        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        if (isset($this->session->data['success'])) {
            $data['success'] = $this->session->data['success'];

            unset($this->session->data['success']);
        } else {
            $data['success'] = '';
        }


        $data['modules'] = $this->model_extension_module_html2->generatorList();



        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/module/html2_generator', $data));
    }

    public function add() {
        $this->load->language('extension/module/html2_generator');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('extension/module/html2');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {

            $status = $this->model_extension_module_html2->generatorAdd($this->request->post);

            if($status){
                $this->session->data['success'] = $this->language->get('text_success');
            }else{
                $this->session->data['error'] = "Ошибка Записи! Дубль имени";
            }

            $this->response->redirect($this->url->link('extension/module/html2_generator', 'user_token=' . $this->session->data['user_token'], true));
        }

        $this->getForm();
    }

    public function edit() {
        $this->load->language('extension/module/html2_generator');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('extension/module/html2');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
            $this->model_extension_module_html2->generatorEdit($this->request->get['id'],$this->request->post);
            $this->session->data['success'] = $this->language->get('text_success');


            $this->response->redirect($this->url->link('extension/module/html2_generator', 'user_token=' . $this->session->data['user_token'], true));
        }

        $this->getForm();
    }

    public function delete() {
        $this->load->language('extension/module/html2_generator');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('extension/module/html2');

        if (($this->request->server['REQUEST_METHOD'] == 'GET') && $this->validateForm()) {
            $this->model_extension_module_html2->generatorDelete($this->request->get['id']);
            $this->session->data['success'] = $this->language->get('text_success');


            $this->response->redirect($this->url->link('extension/module/html2_generator', 'user_token=' . $this->session->data['user_token'], true));
        }
        $this->getList();
    }

    protected function getForm() {
        $data['text_form'] = !isset($this->request->get['category_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');

        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        if (isset($this->error['name'])) {
            $data['error_name'] = $this->error['name'];
        } else {
            $data['error_name'] = array();
        }

        $url = '';

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_extension'),
            'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('extension/module/html2_generator', 'user_token=' . $this->session->data['user_token'], true)
        );


        if (!isset($this->request->get['id'])) {
            $data['action'] = $this->url->link('extension/module/html2_generator/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
        } else {
            $data['action'] = $this->url->link('extension/module/html2_generator/edit', 'user_token=' . $this->session->data['user_token'] . '&id=' . $this->request->get['id'] . $url, true);
        }

        $data['cancel'] = $this->url->link('extension/module/html2_generator', 'user_token=' . $this->session->data['user_token'] . $url, true);

        if (isset($this->request->get['id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
            $module_info = $this->model_extension_module_html2->generatorGet($this->request->get['id']);

            if($module_info['name']){
                $data['name'] = $module_info['name'];
            }
            if($module_info['title']){
                $data['title'] = $module_info['title'];
            }
            if($module_info['title']){
                $data['migx'] = $module_info['migx'];
            }

            if($module_info['fields']){
                $data['fields'] = $module_info['fields'];
            }
        }


        $data['types'] = ['text'=>'Текст','textarea'=>"Текстовое поле",'summernote'=>'Текстовый редактор','image'=>"Изображение",'migx'=>'MIGX'];

        $data['user_token'] = $this->session->data['user_token'];


        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/module/html2_generator_form', $data));

    }

    protected function validate()
    {
        if (!$this->user->hasPermission('modify', 'extension/module/html2_generator')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 64)) {
            $this->error['name'] = $this->language->get('error_name');
        }

        return !$this->error;
    }


    private function validateForm(){
        //TODO
        return true;
    }
}